<?php
$targetPath = "uploads/" . basename($_FILES["file"]["name"]);
if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetPath))
    echo $targetPath;
else
    echo "error";
?>
