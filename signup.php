<?php
require_once ("pages/utils/base.php");
require_once ("pages/utils/render_template.php");
require_once ("core/EnsamHelpdeskDatabase.php");
require_once ("core/User.php");
$MINIMUM_PASSWORD_LENGTH = 8;
$errors = [];
$database = HelpdeskDatabase::getInstance();
$departments = $database->executeDQL("SELECT * from dept  order by dept_name = 'Autre', dept_name");  //to keep Other hia l'option lkhra




if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    

        $email = strtolower($_POST["email"]);
        $phone_number = $_POST["phone_number"];
        $password = $_POST["password"];
        $password2 = $_POST["password2"];
        $first_name = htmlspecialchars(ucfirst($_POST["first-name"]));
        $last_name = htmlspecialchars(ucfirst($_POST["last-name"]));
        $department_id = $_POST["department"];
        
        $comptes_associées= User::UsersFromDB("SELECT * from employe where email='$email'");
        if(count($comptes_associées)>0){
            if($comptes_associées[0]->isActive){
                $errors[] = "Un compte actif est associé a cette adresse mail";
            }else{
                $errors[] = "Une tentative d'inscription est deja faite avec cette adresse mail, verifier votre boite mail pour activer votre compte.";
            }    
        }else if($password != $password2){
            $errors[] = "Les mots de passe ne se correspondent pas";
        }else if(strlen($password) < $MINIMUM_PASSWORD_LENGTH){
            $errors[] = "Le mot de passe doit contenir au moins $MINIMUM_PASSWORD_LENGTH caractères";
        }else{
            $password_hash = password_hash($password, PASSWORD_DEFAULT); 
            $user = new User($first_name, $last_name, $email, $phone_number, $password_hash, $department_id, UserType::EMPLOYE);
           if( $user->save()){
               $user->send_activation_pin();
               header("Location: confirm.php?email=$user->email");
           }
        
    }
}


$context = [
    "departments" => $departments,
    "errors" => $errors
];

echo base_template(render_template("pages/signup_template.php", $context), "Inscription");