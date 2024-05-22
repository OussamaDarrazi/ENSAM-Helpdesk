<?php
session_start();
require_once("core/EnsamHelpdeskDatabase.php");
require_once ("core/User.php");
require_once ("core/Ticket.php");
$context=[];
$errors=[];

if(isset($_SESSION["user_id"])){
    $id = $_SESSION["user_id"];
    $current_user = User::UsersFromDB("SELECT * FROM employe where employe_id = $id")[0];
    $context["current_user"] = $current_user;

    if($current_user->user_type == UserType::ADMIN){
        $helpdesk = User::UsersFromDB("SELECT * from employe where isHelpdesk=1 ORDER BY first_name");
        $context["helpdesk"] = $helpdesk;
    }
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $ticket_id = $_POST['ticket_id'];
    $ticket = Ticket::TicketsFromDB("select * from ticket where ticket_id = $ticket_id")[0];
    $ticket->assigned_helpdesk_id = $_POST['assign']?:null;
    if($_POST['assign']){
        $ticket->status_id = 2;
    }else{
        $ticket->status_id = 1;
    }
    $ticket->save();

    include("components/ticket_row.php");
}