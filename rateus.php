<?php
require_once ("pages/utils/base.php");
require_once ("pages/utils/render_template.php");
require_once ("core/EnsamHelpdeskDatabase.php");
$database = HelpdeskDatabase::getInstance();
$errors = [];
$context = [];
if (!empty($_GET["ticket_id"])) {
    if ($database->executeDQL("SELECT 1 FROM ticket where ticket_id=?", [$_GET["ticket_id"]])) {
        $ticket_id = $_GET["ticket_id"];
        $context["ticket_id"] = $ticket_id;
    } else {
        header("Location: index.php");
    }
} else {
    header("Location: index.php");
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $rating=$_POST["rating"];
    $feedback=$_POST["feedback"];
    if(!$database->executeDML("INSERT INTO ticket_rating (ticket_id, rating, feedback) VALUES (?,?,?)", [$ticket_id, $rating, $feedback])){
        $errors[] = "Error: Could not add rating";
    }else{
        header("Location: index.php");
    }
}



$context["errors"] = $errors;
echo base_template(render_template("pages/rateus_template.php", $context), "Évaluez nous");