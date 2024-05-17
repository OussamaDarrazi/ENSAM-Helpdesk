<?php
require_once ("pages/utils/base.php");
require_once ("pages/utils/render_template.php");
require_once ("core/EnsamHelpdeskDatabase.php");
$errors = [];
$database = HelpdeskDatabase::getInstance();
$departments = $database->executeDQL("SELECT * from dept  order by dept_name = 'Autre', dept_name");  //to keep Other hia l'option lkhra




if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    /*TODO: sign up:
    case:
     first-timer: generate code, send confirmation code, redirect to the confirmation page
                 then for confirmation code: check code, if valid, create user, redirect to the login page
     already registered: redirect to login page with error message
    */
    $email = $_POST["email"];
    $password = $_POST["password"];
    $password2 = $_POST["password2"];
    $first_name = $_POST["first-name"];
    $last_name = $_POST["last-name"];
    $department_id = $_POST["department"];

    if($database->executeDQL("select * from employe where email='$email'")){
        $errors[] = "L'adresse email est déjà utilisée";
    }else if($password != $password2){
        $errors[] = "Les mots de passe ne se correspondent pas";
    }else{
        #TODO: Handle the signing up
    }
}


$context = [
    "departments" => $departments,
    "errors" => $errors
];

echo base_template(render_template("pages/signup_template.php", $context), "Inscription");