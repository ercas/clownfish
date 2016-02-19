<!DOCTYPE html>
<html>
    <head>
        <meta charset=utf-8>
        <title>Clownfish - Download</title>
        <link rel=stylesheet href=style.css>
    </head>
    <body>
        <h1>Clownfish</h1>
        <span class=description>a universal file conversion service - <a href=about.html target=_blank>about</a></span>
        <br>
<?php
/* glob because of variable file extensions */
$file_glob = (glob("converted/" . $_GET["session_hash"] . "*"));
if (isset($_GET["session_hash"]) and count($file_glob) > 0)
    echo '
        <br><a class="label label-green" href="' . $file_glob[0] . '" download>Download your file</a>
';
else
    echo '<br>An error occurred. <a href=/>Try again?</a>';
?>
        <div id=footer>
            <a href=https://github.com/ercas/clownfish><img src=GitHub-Mark-32px.png></a>
        </div>
    </body>
</html>
