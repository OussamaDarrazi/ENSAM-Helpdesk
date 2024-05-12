<?php

function render_template($template_path, $context){
    if (!file_exists($template_path)) {
        throw new Exception("Template file '$template_path' not found.");
    }

    //pour extraire les variables du tableau 
    //en vars normales et les utiliser dans le template
    extract($context); 

    ob_start();
    include($template_path);
    return ob_get_clean();
}