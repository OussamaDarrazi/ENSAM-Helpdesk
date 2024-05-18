<?php
require_once("pages/utils/base.php");
require_once("pages/utils/render_template.php");
require_once("core/EnsamHelpdeskDatabase.php");
$database = HelpdeskDatabase::getInstance();

if(!isset($_GET["email"])){
    #An email param is necessary for the page
    header("Location: signup.php");
}
else{
    $email = $_GET["email"];
    #I check if there is a verification pin awaiting activation
    $pins = $database->executeDQL("SELECT * FROM verification_pin WHERE email = '$email'");
    if(count($pins) == 0){
        header("Location: signup.php");
    }else{
        $pin = $pins[0]["pin"];
    }
}

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $pin_input = $_POST["digit-1"].$_POST["digit-2"].$_POST["digit-3"].$_POST["digit-4"];
    if($pin_input != $pin){
    }else{
        $database->executeDQL("DELETE FROM verification_pin WHERE email = '$email'");
        $database->executeDQL("UPDATE employe SET isActive=1 WHERE email = '$email'");
        header("Location: login.php");
    }
}
$context=[
    "email"=>$email
];

echo base_template(render_template("pages/confirm_template.php", $context), 'Activation du compte');