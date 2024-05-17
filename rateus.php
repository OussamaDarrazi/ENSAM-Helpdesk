<?php
require_once ("pages/utils/base.php");
require_once ("pages/utils/render_template.php");
require_once ("core/EnsamHelpdeskDatabase.php");
$errors=[];
$context=[];
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST["rating"])){
        $errors[] = "Veuillez choisir l'option qui vous décrit le mieu";
    }
}

$context["errors"] = $errors;
echo base_template(render_template("pages/rateus_template.php", $context), "Évaluez nous");