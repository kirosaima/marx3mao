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
        if(isset($_POST['submit'])) {
            $countfiles = count($_FILES['textToUpload']['name']);
            for($i=0;$i<$countfiles;$i++) {
                $filename = $_FILES['textToUpload']['name'][$i];
                move_uploaded_file($_FILES['textToUpload']['tmp_name'][$i], $target_dir.$filename);

                    $filetype = pathinfo($filename)['extension'];
                    $sql = $conn->prepare("INSERT INTO search_titles (title, filetype) VALUES ('$filename', '$filetype')");
                    $sql->execute();
                    echo "Success";
                }
            }
        }
    catch(PDOException $e)
        {
        echo $e->getMessage();
        }
}
?>