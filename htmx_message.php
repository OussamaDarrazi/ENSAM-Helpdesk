<?php
session_start();
require_once ("pages/utils/base.php");
require_once ("pages/utils/render_template.php");
require_once ("core/User.php");
require_once ("core/Ticket.php");
require_once ("core/Message.php");
$ticket_id = $_GET["ticket_id"] or die("no ticket id provided");
$context = [];
if (isset($_SESSION["user_id"])) {
    $id = $_SESSION["user_id"];
    $current_user = User::UsersFromDB("SELECT * FROM employe where employe_id = $id")[0];
    $context["current_user"] = $current_user;
} else {
        header("Location: login.php");
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(!empty($_POST["message"])){   
        $message = nl2br(htmlspecialchars($_POST["message"]));
        $message = new Message($message, $current_user->id, $ticket_id, new DateTime());
        $message->save();
    }
    $latest_messages = Message::MessagesFromDB("SELECT * FROM chat_message WHERE ticket_id = $ticket_id ORDER BY message_datetime");
    $context["latest_messages"] = $latest_messages;
    include("components/message_list.php");
}