<?php
    include "dbconnect.php";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password); // build new connection object
        // set PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $category = "ecology";

        // search for user in users table
        $sql = $conn->prepare("SELECT title FROM search_titles WHERE category = :category AND filetype = 'html'");
        $sql->bindParam(":category", $category);

        $sql->execute(); // execute the statement
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
    <script src="script.js"></script>
    <title>Ecology</title>
</head>
<body>
<div class="navbar">
            <a href="index.php">HOME</a>
            <a href="textlist.php">TEXTS</a>
            <a href="news.php">NEWS</a>
            <a href="contact.php">CONTACT</a>
            <a href="about.html">ABOUT</a>
            <form action="search.php" method="post">
                <input type="text" name="search_value" id="search_value">
                <input type="submit" value="" style="background:url('images/Search-Icon.png');background-size:cover;border:none;color: transparent;">
            </form>
    </div>
    
<div class="main-body">
    <h1>Ecology</h1>
    <ul>
    <?php foreach($titles as $title): ?>
        <li><a href="articles/<?=$category?>/<?= $title['title']; ?>"><?= pathinfo($title['title'])['filename']; ?></a></li>
    <?php endforeach; ?>
    </ul>
</div>
<hr>
2021
</body>
</html>
