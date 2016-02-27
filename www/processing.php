<!DOCTYPE html>
<html>
    <head>
        <meta charset=utf-8>
        <title>Clownfish - Processing</title>
        <link rel=stylesheet href=style.css>
    </head>
    <body>
        <h1>Clownfish</h1>
        <span class=description>a universal file conversion service - <a href=about.html target=_blank>about</a></span>
        <br><img src=convert-animation.gif style="width: 300px; max-width: 80%;">
<?php
/* run process.sh to start the conversion process if it hasn't started already */
/* the script exits on its own if it detects a duplicate, no need to worry */
exec("bash process.sh " . $_GET["session_hash"] . " " . $_GET["converter"] . " " . $_GET["output_format"] . " &");

/* glob because of variable file extensions */
if (count(glob("converted/" . $_GET["session_hash"] . "*")) > 0)
    /* conversion is done, redirect user to download page */
    $form_action = "download.php";
else
    /* conversion is not done, refresh this page */
    $form_action = "processing.php";

echo '
        <br>Converting ' . $_GET["input_format"] .' → ' . $_GET["output_format"] . ' using ' . $_GET["converter"] . '

        <br><br>If you want to come back later, you can use this link to check the progress of your conversion: <a id=link>[link]</a>

        <!-- this form stores all session data -->
        <form action=' . $form_action . ' method=get>
            <textarea name=session_hash readonly>' . $_GET["session_hash"] . '</textarea>
            <textarea name=input_format readonly>' . $_GET["input_format"] . '</textarea>
            <textarea name=output_format readonly>' . $_GET["output_format"] . '</textarea>
            <textarea name=converter readonly>' . $_GET["converter"] . '</textarea>
            <input id=refresh name=submit type=submit class=labeled-input>
        </form>

        <script>
            document.getElementById("link").setAttribute("href",window.location);
            setTimeout(function() {
                document.getElementById("refresh").click();
            }, 6000);
        </script>
';
?>
        <div id=footer>
            <a href=https://github.com/ercas/clownfish><img src=GitHub-Mark-32px.png></a>
        </div>
    </body>
</html>
