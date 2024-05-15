<?php
require_once("pages/utils/base.php");
require_once("pages/utils/render_template.php");
require_once("core/EnsamHelpdeskDatabase.php");
$database = HelpdeskDatabase::getInstance();
$departments = $database->executeDQL("SELECT * from dept  order by dept_name = 'Autre', dept_name");  //to keep Other hia l'option lkhra


$context = [
    "departments"=>$departments
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   /*TODO: sign up:
   case:
    first-timer: generate code, send confirmation code, redirect to the confirmation page
                then for confirmation code: check code, if valid, create user, redirect to the login page
    already registered: redirect to login page with error message
   */
}

echo base_template(render_template("pages/signup_template.php", $context), "Inscription");