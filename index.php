<?php
require_once("pages/base.php");
require_once("pages/render_template.php");

echo base_template(render_template("pages/test.php", ["user"=>"Oussama"]));