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
        <br><img src=convert-animation.gif style="width: 400px; max-width: 80%;">
<?php
if (file_exists("converted/" . $_POST["session_hash"]))
    $form_action = "download.php";
else
    $form_action = "processing.php";

echo '
        <br>Converting ' . $_POST["input_format"] .' → ' . $_POST["output_format"] . ' using ' . $_POST["converter"] . '
        <br>Your session hash is: ' . $_POST["session_hash"] . '

        <!-- this form stores all session data and is refreshed periodically -->
        <form action=' . $form_action . ' method=post>
            <textarea name=session_hash readonly>' . $_POST["session_hash"] . '</textarea>
            <textarea name=input_format readonly>' . $_POST["input_format"] . '</textarea>
            <textarea name=output_format readonly>' . $_POST["output_format"] . '</textarea>
            <textarea name=converter readonly>' . $_POST["converter"] . '</textarea>
            <input id=refresh name=submit type=submit class=labeled-input>
        </form>
        <script>
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
