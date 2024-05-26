<?php
session_start();
require_once("core/EnsamHelpdeskDatabase.php");
require_once ("core/User.php");
require_once ("core/Ticket.php");
require_once ("utils/send_feedback_survey.php");
$database = HelpdeskDatabase::getInstance();
$context=[];
$errors=[];

if(isset($_SESSION["user_id"])){
    $id = $_SESSION["user_id"];
    $current_user = User::UsersFromDB("SELECT * FROM employe where employe_id = $id")[0];
    if(isset($_GET['ticket_id'])){
        $ticket_id = $_GET['ticket_id'];
        $ticket = Ticket::TicketsFromDB("select * from ticket where ticket_id = $ticket_id")[0];
        $ticket->status_id = 4;
        $ticket->save();
        $owner_email = $database->executeDQL("SELECT email from employe where employe_id = ?", [$ticket->owner_id])[0]["email"];
        echo $owner_email;
        if(!send_feedback_survey($owner_email, $ticket_id)){
            echo "error sending the message to $owner_email, $ticket_id";
        }
    }
}
?>

<!-- This is for the htmx swap to swap the resolution button -->
<span
id="mark_resolved"
hx-swap-oob="true"

                    class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold text-teal-500  ">
                    Résolue
                </span>