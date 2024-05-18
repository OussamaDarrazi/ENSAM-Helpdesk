<?php
require_once("pages/utils/base.php");
require_once("pages/utils/render_template.php");
require_once("core/EnsamHelpdeskDatabase.php");
require_once ("core/User.php");
$database = HelpdeskDatabase::getInstance();

if(!isset($_GET["email"])){
    #An email param is necessary for the page
    header("Location: signup.php");
}
else{
    $email = $_GET["email"];
    #I check if there is a verification pin awaiting activation
    $user = User::UsersFromDB("SELECT 
    employe_id,
    first_name,
    last_name,
    employe.email as email,
    phone_number,
    password,
    dept_id,
    isAdmin,
    isHelpdesk,
    isActive,
    employe_id,
    pin
     FROM employe
    LEFT JOIN verification_pin ON employe.email = verification_pin.email
    WHERE employe.email = '$email'")[0];
    if(is_null($user->pin)){
        header("Location: signup.php");
    }
}

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $pin_input = $_POST["digit-1"].$_POST["digit-2"].$_POST["digit-3"].$_POST["digit-4"];
    if($pin_input != $user->pin){
    }else{
        $user->activate();
        header("Location: login.php");
    }
}

$context=[
    "email"=>$email
];

echo base_template(render_template("pages/confirm_template.php", $context), 'Activation du compte');