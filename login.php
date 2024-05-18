<?php
session_start();
require_once ("pages/utils/base.php");
require_once ("pages/utils/render_template.php");
require_once ("core/User.php");
$context=[];
$errors=[];

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = strtolower($_POST["email"]);
    $password = $_POST["password"];
    $current_user = User::UsersFromDB("SELECT * FROM employe where email = '$email'");
    if(count($current_user)==0){ //inexistent
        $errors[] = "Pas de comptes associées à l'adresse mail saisie";
    }else{
        $current_user = $current_user[0];
        if(!password_verify($password, $current_user->password_hash)){
            $errors[] = "Mot de passe incorrect";
        }elseif(!$current_user->isActive){
            $errors[] = "Compte inactive. Veuillez verifier votre boite pour un code d'activation ou contactez l'administration.";
        }else{
            $_SESSION["user_id"] = $current_user->id;
            header("Location: index.php");
        }
    }
}


$context = [
    "errors" => $errors,
];
echo base_template(render_template("pages/login_template.php", $context), "Connexion");