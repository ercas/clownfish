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
$input_name = basename($_FILES["file"]["name"]);
$session_hash = hash("md5",exec('cat /dev/urandom | head -c 100'));
$target_path = "uploads/" . $session_hash;

if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_path)) {

    $input_format = exec('file -b "' . $target_path . '"');
    $output_format = "Content dump";
    $converter = "binwalk";

    echo '
        Converting <div class="label label-grey">' . $input_name . '</div>
        <br>from <div class="label label-blue">' . $input_format .'</div>
        <br>to <div class="label label-blue">' . $output_format . '</div>
        <br>using <div class="label label-blue">' . $converter. '</div>
        <br><label for=submit class="label label-green">Start</label>

        <form action=processing.php method=post>
            <textarea name=session_hash readonly>' . $session_hash . '</textarea>
            <textarea name=input_format readonly>' . $input_format . '</textarea>
            <textarea name=output_format readonly>' . $output_format . '</textarea>
            <textarea name=converter readonly>' . $converter . '</textarea>
            <input id=submit name=submit type=submit class=labeled-input>
        </form>
    ';

} else
    echo 'An error occurred. <a href=/>Try again?</a>';
?>
        <div id=footer>
            <a href=https://github.com/ercas/clownfish><img src=GitHub-Mark-32px.png></a>
        </div>
    </body>
</html>