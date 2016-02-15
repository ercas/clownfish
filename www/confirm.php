<!DOCTYPE html>
<html>
    <head>
        <meta charset=utf-8>
        <title>Clownfish - Upload a File</title>
        <link rel=stylesheet href=style.css>
    </head>
    <body>
        <h1>Clownfish</h1>
        <span class=description>a universal file conversion service</span>
        <br>
        <br>
<?php
$uploaded_file = basename($_FILES["file"]["name"]);
$target_path = "uploads/" . $uploaded_file;

if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_path)) {
    echo 'Converting <div class="label label-grey">' . $uploaded_file . '</div>' . "\n" . '<br>';
    echo '<br>from <div class="label label-blue">UNKOWN</div>';
    echo ' to <div class="label label-blue">UNKNOWN</div>';
    echo '<br>' . "\n" . '<br> using <div class="label label-blue">UNKOWN_CONVERTER</div>';
    echo '<br>' . "\n" . '<br><div class="label label-green">Start</div>';
} else
    echo 'An error occurred. <a href=/>Try again?</a>';
?>
        <div id=footer>
            <a href=https://github.com/ercas/clownfish><img src=GitHub-Mark-32px.png></a>
        </div>
    </body>
</html>
