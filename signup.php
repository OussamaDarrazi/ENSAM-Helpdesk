<?php
require_once ("pages/utils/base.php");
require_once ("pages/utils/render_template.php");
require_once ("core/EnsamHelpdeskDatabase.php");
require_once ("utils/send_verification_pin.php");
$errors = [];
$database = HelpdeskDatabase::getInstance();
$departments = $database->executeDQL("SELECT * from dept  order by dept_name = 'Autre', dept_name");  //to keep Other hia l'option lkhra




if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    

        $email = strtolower($_POST["email"]);
        $phone_number = $_POST["phone_number"];
        $password = $_POST["password"];
        $password2 = $_POST["password2"];
        $first_name = ucfirst($_POST["first-name"]);
        $last_name = ucfirst($_POST["last-name"]);
        $department_id = $_POST["department"];
        
        $comptes_existant = $database->executeDQL("select * from employe where email='$email'");
        if($comptes_existant){
            if($comptes_existant[0]["isActive"]){
                $errors[] = "Un compte actif est associé a cette adresse mail";
            }else{
                $errors[] = "Une tentative d'inscription est deja faite avec cette adresse mail, verifier votre boite mail pour activer votre compte.";
            }    
        }else if($password != $password2){
            $errors[] = "Les mots de passe ne se correspondent pas";
        }else if(strlen($password)){
            $errors[] = "Le mot de passe doit contenir au moins 8 caractères";
        }else{
            $pin = send_verification_pin($email);
            $password_hash = password_hash($password, PASSWORD_DEFAULT); 
            $database->executeDML("INSERT INTO verification_pin (email, pin) VALUES ('$email', '$pin');");
            $database->executeDML("INSERT INTO employe 
        (first_name, last_name, email, phone_number , password, dept_id)
        VALUES ('$first_name', '$last_name', '$email', '$phone_number' ,'$password_hash', $department_id)");
        header("Location: confirm.php?email=$email");
        
    }
}


$context = [
    "departments" => $departments,
    "errors" => $errors
];

echo base_template(render_template("pages/signup_template.php", $context), "Inscription");