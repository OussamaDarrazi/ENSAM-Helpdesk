<?php
session_start();
require_once("pages/utils/base.php");
require_once("pages/utils/render_template.php");
require_once("core/EnsamHelpdeskDatabase.php");
require_once ("core/User.php");
$database = HelpdeskDatabase::getInstance();

if(isset($_SESSION["user_id"])){
    $id = $_SESSION["user_id"];
    $current_user = User::UsersFromDB("SELECT * FROM employe where employe_id = $id")[0];
    if($current_user->user_type == UserType::ADMIN){
        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET["user_id"])){
            if(!$database->executeDML("UPDATE employe SET isHelpdesk=? WHERE employe_id=?", [$_POST["usertype"], $_GET["user_id"]])){
                echo ("Unable to change the UserType for user ". $_GET["user_id"]);
            }
        }
    }
}