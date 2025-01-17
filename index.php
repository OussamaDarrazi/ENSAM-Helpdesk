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
    $articles = $database->executeDQL("SELECT * from knowledge_base_article");
    $context["articles"] = $articles;
    $context["categories"] = $categories;

    $helpdesk = User::UsersFromDB("SELECT * from employe where isHelpdesk=1 ORDER BY first_name");
    $context["helpdesk"] = $helpdesk;
    if($current_user->user_type == UserType::ADMIN){
        $stats = $database->executeDQL("SELECT * FROM daily_stats")[0];
        $context["stats"] = $stats;
        $tickets = Ticket::TicketsFromDB("SELECT * from ticket order by created_at desc");
        $context["tickets"] = $tickets;
        echo base_template(render_template("pages/admin_dashboard.php", $context), "Admin Dashboard");
    }elseif($current_user->user_type == UserType::HELPDESK){
        $tickets = Ticket::TicketsFromDB("SELECT * from ticket where assigned_to = ".$current_user->id." order by created_at desc");
        $stats = $database->executeDQL("SELECT * FROM daily_helpdesk_stats where helpdesk_id = ?", [$current_user->id]);
        $context["stats"] = $stats? $stats[0]:["AHT"=>"N/A","resolved_tickets"=>0];
        $context["tickets"] = $tickets;
        echo base_template(render_template("pages/helpdesk_dashboard.php", $context), "Helpdesk Dashboard");
    }elseif($current_user->user_type == UserType::EMPLOYE){
        $tickets = Ticket::TicketsFromDB("SELECT * from ticket where created_by = ".$current_user->id." order by created_at desc");
        $stats = $database->executeDQL("SELECT * FROM daily_employe_stats where owner_id = ?", [$current_user->id]);
        $context["stats"] = $stats? $stats[0]:["open_tickets"=>0,"resolved_tickets"=>0];

        $context["tickets"] = $tickets;
        echo base_template(render_template("pages/customer_dashboard.php", $context), "Employé Dashboard");
    }
}else{
 header("Location: login.php");
}