<?php
$target_dir = "articles/";
if(isset($_POST['submit'])) {
$countfiles = count($_FILES['textToUpload']['name']);
for($i=0;$i<$countfiles;$i++) {
    $filename = $_FILES['textToUpload']['name'][$i];
    move_uploaded_file($_FILES['textToUpload']['tmp_name'][$i], $target_dir.$filename);

}}


?>

