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

//Ticket Submition
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $owner_id = $current_user->id;
    $assigned_hd = null;
    $created_at = new DateTime();
    $last_updated_at = $created_at;
    $subject = trim($_POST["ticket_subject"]);
    $description = trim($_POST["ticket_description"]); //message
    $category = $_POST["ticket_category"];
    $status = $_POST["ticket_status"];
    $ticket = new Ticket($owner_id, $assigned_hd, $created_at, $last_updated_at, $subject, $category, $status);
    $ticket->save();
    //Inserting the chat massage
    $database->executeDML("INSERT INTO chat_message 
                                (message_datetime, sender_id, ticket_id, content) 
                                VALUES (?,?,?,?)", [$created_at->format('Y-m-d H:i:s'),  $current_user->id, $ticket->id, $description]);
    header("Location: view_ticket.php?ticket_id= " . $ticket->id); //redirect to the ticket page

}

$categories = $database->executeDQL("SELECT * from ticket_category ORDER BY category_name='Autre', category_name");
$context["categories"] = $categories;

echo base_template(render_template("pages/create_ticket_template.php", $context), "Nouveau Ticket");