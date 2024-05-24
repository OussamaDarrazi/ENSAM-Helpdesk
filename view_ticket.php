<?php
session_start();
require_once("pages/utils/base.php");
require_once("pages/utils/render_template.php");
require_once ("core/User.php");
require_once ("core/Ticket.php");
$database = HelpdeskDatabase::getInstance();
$context=[];
if(isset($_SESSION["user_id"])){
    $id = $_SESSION["user_id"];
    $current_user = User::UsersFromDB("SELECT * FROM employe where employe_id = $id")[0];
    $context["current_user"] = $current_user;
}else{
    header("Location: login.php");
}

if($_SERVER["REQUEST_METHOD"] == 'GET'){
    if(isset($_GET["ticket_id"])){
        //getting the ticket
        $ticket_id = $_GET["ticket_id"];
        $ticket = Ticket::TicketsFromDB("SELECT * FROM ticket where ticket_id = $ticket_id")[0] or header("Location: index.php");
        $context["ticket"] = $ticket;

        //The owner
        $ticket_owner_id = $ticket->owner_id;
        $ticket_owner = $current_user = User::UsersFromDB("SELECT * FROM employe where employe_id = $ticket_owner_id")[0];
        $ticket_owner_department = $database->executeDQL("SELECT dept_name from dept where dept_id = ?", [$ticket_owner->department_id])[0]["dept_name"];
        $context["ticket_owner_department"] = $ticket_owner_department;
        $context["ticket_owner"] = $ticket_owner;
        
    }else{
        header("Location: index.php");
    }
}

$categories = $database->executeDQL("SELECT * from ticket_category ORDER BY category_name='Autre', category_name");
$context["categories"] = $categories;
echo base_template(render_template("pages/view_ticket_template.php", $context));