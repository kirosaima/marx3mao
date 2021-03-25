<?php
    include "dbconnect.php";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password); // build new connection object
            // set PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $searchQuery = htmlspecialchars($_POST['search_value']);
            $searchType = $_POST['searchType'];
            $sql = $conn->prepare("SELECT title FROM `search_titles` WHERE title LIKE :query AND filetype = :stype");
            $searchQuery = '%$searchQuery%';
            $sql->bindParam(":query", $searchQuery);
            $sql->bindParam(":stype", $searchType);
            $sql->execute();
            $results = $sql->fetchAll();
            }
        catch(PDOException $e)
            {
            echo $e->getMessage();
            }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Search</title>
</head>
<body>
    <ul>
        <?php foreach($results as $result): ?>
            <li><a href="articles/<?= $result['title']; ?>"><?= pathinfo($result['title'])['filename']; ?></a></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>