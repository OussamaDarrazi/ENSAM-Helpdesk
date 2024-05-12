<?php
function base_template($content, $title = "ENSAM Helpdesk")
{
    ob_start();
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="src/output.css">
        <title><?= $title ?></title>
    </head>

    <body>
        <?= $content ?>
        <script src="./node_modules/preline/dist/preline.js"></script>
    </body>

    </html>
    <?php
    return ob_get_clean();
}

?>