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
}else{
    header("Location: login.php");
}

if(isset($_GET["article_id"])){
    $article_id = $_GET["article_id"];
    $article = $database->executeDQL("SELECT *,
     ticket_category.category_name as category,
    employe.first_name as editor_first_name,
    employe.last_name as editor_last_name 
    FROM knowledge_base_article 
    LEFT JOIN ticket_category ON ticket_category.category_id = knowledge_base_article.category_id
    LEFT JOIN employe ON employe.employe_id = knowledge_base_article.last_edited_by
    WHERE article_id = ?", [$article_id])[0];
    $context["article"] = $article;
}
$context["errors"] = $errors;
echo base_template(render_template("pages/view_kb_article_template.php", $context), "Nouveau Article");