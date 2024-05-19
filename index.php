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

    if($current_user->user_type == UserType::ADMIN){
        $tickets = Ticket::TicketsFromDB("select * from ticket order by created_at desc");
        $context["tickets"] = $tickets;
        echo base_template(render_template("pages/admin_dashboard.php", $context), "Admin Dashboard");
    }elseif($current_user->user_type == UserType::HELPDESK){
        echo base_template(render_template("pages/helpdesk_dashboard.php", $context), "Helpdesk Dashboard");
    }elseif($current_user->user_type == UserType::EMPLOYE){
        echo base_template(render_template("pages/customer_dashboard.php", $context), "Employee Dashboard");
    }
}else{
 header("Location: login.php");
}