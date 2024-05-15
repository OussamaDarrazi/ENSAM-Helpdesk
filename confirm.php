<?php
require_once("pages/utils/base.php");
require_once("pages/utils/render_template.php");
require_once("core/EnsamHelpdeskDatabase.php");

$context=[
    "email"=>"myemail@mail.com"
];

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $pin = $_POST["digit-1"].$_POST["digit-2"].$_POST["digit-3"].$_POST["digit-4"];
    /*
     TODO: Add the confirmation mechanism 
     */
}

echo base_template(render_template("pages/confirm_template.php", $context), 'Activation du compte');