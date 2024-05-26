<?php
session_start();
require_once("pages/utils/base.php");
require_once("pages/utils/render_template.php");
require_once ("core/User.php");
require_once ("core/Ticket.php");
$database = HelpdeskDatabase::getInstance();
$context=[];
$errors=[];

if(isset($_SESSION["user_id"])){
    $id = $_SESSION["user_id"];
    $current_user = User::UsersFromDB("SELECT * FROM employe where employe_id = $id")[0];
    $context["current_user"] = $current_user;
    $categories = $database->executeDQL("SELECT * from ticket_category ORDER BY category_name='Autre', category_name");
    $context["categories"] = $categories;

    if($current_user->user_type == UserType::ADMIN){
        $users = User::UsersFromDB("SELECT * FROM employe where isadmin = 0");
        $departments = $database->executeDQL("SELECT dept_name from dept order by dept_id");
        $context["departments"] = $departments;
        $context["users"] = $users;

        //stats
        $stats = $database->executeDQL("SELECT SUM(isHelpdesk) as nbr_helpdesk, COUNT(*) as nbr_employe from employe ");
        $context["stats"] = $stats[0];
        echo base_template(render_template("pages/users_template.php", $context));
    }else{
        header("Location: index.php");
    }
}else {
    header("Location: login.php");
}