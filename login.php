<?php
require_once ("pages/utils/base.php");
require_once ("pages/utils/render_template.php");
require_once ("core/EnsamHelpdeskDatabase.php");



$context=[];
echo base_template(render_template("pages/login_template.php", $context), "Connexion");