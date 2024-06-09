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
    $context["categories"] = $categories;
}else{
    header("Location: login.php");
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $article_title = $_POST["article_title"];
    $article_category = $_POST["article_category"];
    $article_content = nl2br($_POST["article_content"]);
    if(!$database->executeDML("INSERT INTO knowledge_base_article (article_title, category_id, last_edited_by, content) values (?,?,?,?)", [$article_title, $article_category, $current_user->id, $article_content])){
        $errors[] = "Erreur lors de l'ajout de l'article";
    }
}

$context["errors"] = $errors;
echo base_template(render_template("pages/create_kb_article_template.php", $context), "Knowledge Base");