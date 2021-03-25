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
    <h1>Welcome to Crimson Path admin area</h1>
    <a href="index.html">Home</a><br>
    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quae rem atque doloremque explicabo totam debitis voluptatibus velit. Et atque corporis totam? Illum culpa consequatur non aliquam neque quidem harum praesentium!</p>
    <br>
    <hr>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Select files to upload:
        <input type="file" name="textToUpload[]" id="textToUpload" multiple>
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
    <hr>
    <a href="md-to-html.php">Markdown to HTML</a>
    <a href="logout.php">Logout</a>
</body>
</html>