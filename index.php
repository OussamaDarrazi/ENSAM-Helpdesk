<?php
require_once("pages/utils/base.php");
require_once("pages/utils/render_template.php");

echo base_template(render_template("pages/test.php", ["user"=>"Oussama"]));