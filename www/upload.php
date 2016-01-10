<?php
$uploadDir = "uploads/";
$targetPath = $uploadDir . basename($_FILES["file"]["name"]);
move_uploaded_file($_FILES["file"]["tmp_name"], $targetPath);
echo $targetPath
?>
