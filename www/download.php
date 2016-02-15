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
<?php
if (isset($_POST["session_hash"]) and file_exists("converted/" . $_POST["session_hash"]))
    echo '<br><a class="label label-green" href=converted/' . $_POST["session_hash"] . '>Download your file</a>';
else
    echo '<br>An error occurred. <a href=/>Try again?</a>';
?>
        <div id=footer>
            <a href=https://github.com/ercas/clownfish><img src=GitHub-Mark-32px.png></a>
        </div>
    </body>
</html>
