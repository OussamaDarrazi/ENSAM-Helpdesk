<?php
session_start();
require_once ("pages/utils/base.php");
require_once ("pages/utils/render_template.php");
require_once ("core/User.php");
require_once ("core/Ticket.php");
$context = [];
if (isset($_SESSION["user_id"])) {
    $id = $_SESSION["user_id"];
    $current_user = User::UsersFromDB("SELECT * FROM employe where employe_id = $id")[0];
    $context["current_user"] = $current_user;
    $helpdesk = User::UsersFromDB("SELECT * from employe where isHelpdesk=1 ORDER BY first_name");
    $context["helpdesk"] = $helpdesk;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $search_term = addslashes($_POST["search_term"]);
            $ticket_search_query = "SELECT * FROM ticket 
            LEFT JOIN ticket_category ON ticket.category_id = ticket_category.category_id
            LEFT JOIN ticket_status ON ticket_status.status_id = ticket.status_id
            WHERE (
            ticket.subject LIKE '%$search_term%' OR
            ticket_category.category_name LIKE '%$search_term%' OR
            ticket_status.status_name LIKE '%$search_term%'
            )
            ";

        if($current_user->user_type == UserType::HELPDESK){
            $ticket_search_query.= " AND assigned_to = " . $current_user->id;
            }elseif($current_user->user_type == UserType::EMPLOYE){
            $ticket_search_query.= " AND created_by = " . $current_user->id;

        }
        $tickets = Ticket::TicketsFromDB($ticket_search_query . "ORDER BY created_at desc");
        $context["tickets"] = $tickets;
        include ("components/ticket_table.php");
    }
}