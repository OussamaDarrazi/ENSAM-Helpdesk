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
}else{
    header("Location: login.php");
}

$categories = $database->executeDQL("SELECT * from ticket_category ORDER BY category_name='Autre', category_name");
$context["categories"] = $categories;

echo base_template(render_template("pages/create_ticket_template.php", $context));