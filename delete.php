<?php
include "dbconnect.php";
session_start(); // allow session variables
if ($_SESSION["loggedIn"] != "admin") {
    header("Location: login_form.html"); // send them to the form to login
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password); // build new connection object
        // set PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $target_dir = "articles/";
        $file = $_POST['delete_list'];
        if (!unlink($target_dir.$file)) {
            echo "File cannot be deleted due to an error.";
        }
        else {
            echo "File has been deleted";
            $sql = $conn->prepare("DELETE FROM search_titles WHERE title = '$file'");
            $sql->execute();
            echo "\nSuccess!";
        }

        }
    catch(PDOException $e)
        {
        echo $e->getMessage();
        }
}



?>

