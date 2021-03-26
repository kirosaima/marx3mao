<?php
session_start(); // allow session variables
if ($_SESSION["loggedIn"] != "admin") {
    header("Location: login_form.html"); // send them to the form to login
}
include "dbconnect.php";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password); // build new connection object
    // set PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = $conn->prepare("SELECT title FROM `search_titles`");
    $sql->execute();
    $titles = $sql->fetchAll();
}
catch(PDOException $e)
{
    echo $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Crimson Path Admin Area</title>
</head>
<body>
<div class="navbar">
        <ul>
            <a href="index.php">HOME</a>
            <a href="textlist.php">TEXTS</a>
            <a href="news.php">NEWS</a>
            <a href="contact.php">CONTACT</a>
            <a href="about.html">ABOUT</a></li>    
            <form action="search.php" method="post">
                <input type="text" name="search_value" id="search_value">
                <input type="submit" value="" style="background:url('images/Search-Icon.png');background-size:cover;border:none;color: transparent;">
            </form>
                
        </ul>
    </div>
    <div class="main-body">
    <h2>Welcome to Crimson Path admin area</h2>
    <hr>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Select files to upload:
        <input type="file" name="textToUpload[]" id="textToUpload" multiple>
        <select name="upload_list" id="upload_list">
            <option value="politics">Politics</option>
        </select>
        <br>
        <input type="submit" value="Upload Text and PDF" name="submit">
    </form>
    <hr>
    <form action="delete.php" method="post">
        <select name="delete_list" id="delete_list" width="50%">
            <?php foreach($titles as $title): ?>
                <option value="<?= $title['title']; ?>"><?= pathinfo($title['title'])['filename']; ?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Choose item to delete" name="deleteButton">
    </form>
            </div>
    <hr>
    <a href="md-to-html.php">Markdown to HTML</a>
    <a href="logout.php">Logout</a>
</body>
</html>