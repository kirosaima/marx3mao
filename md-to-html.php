<?php
session_start(); // allow session variables
if ($_SESSION["loggedIn"] != "admin") {
    header("Location: login_form.html"); // send them to the form to login
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Markdown to HTML Conversion</title>
</head>
<body>
    <h1>Convert MD to HTML</h1>
    <a href="index.html">Home</a><br>
    <br>
    <form action="convert.php" method="post" enctype="multipart/form-data">
        Select files to upload:
        <input type="file" name="md" id="md">
        <br>
        <input type="submit" value="Upload Markdown file" name="submit">
    </form>
    <hr>
    <a href="logout.php">Logout</a>
</body>
</html>