<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <?php

        include "dbconnect.php";

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            try {
                $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password); // build new connection object
                // set PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $userID = (htmlspecialchars($_POST['userID']));
                $userPassword = (htmlspecialchars($_POST['userPassword']));

                // search for user in users table
                $sql = $conn->prepare("SELECT * FROM `users` WHERE `user_ID` = ':userID' AND `user_password` = ':userPassword'");
                $sql->bindParam(":userID", $userID);
                $sql->bindParam(":userPassword", $userPassword);

                $sql->execute(); // execute the statement

                if(gettype($sql->rowCount()) != 'boolean') { // check if we have results by seeing if there are rows
                    $_SESSION["loggedIn"] = "admin";
                    header("Location: https://bh55zl.uoswebspace.co.uk/crimsonpath/admin.php");
                    exit();
                }
                else
                    {
                        echo 'Wrong username or password'; // message to display if no results
                    }
            }
            catch(PDOException $e)
                {
                echo $e->getMessage();
                }
        }
        else{
            echo "You're here by mistake";
        }
        ?>
</body>
</html>