<?php
include "dbconnect.php";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password); // build new connection object
        // set PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $target_dir = "articles/";
        if(isset($_POST['submit'])) {
            $countfiles = count($_FILES['textToUpload']['name']);
            $category = $_POST['upload_list'];
            for($i=0;$i<$countfiles;$i++) {
                $filename = $_FILES['textToUpload']['name'][$i];
                move_uploaded_file($_FILES['textToUpload']['tmp_name'][$i], $target_dir.$category."/".$filename);

                    $filetype = pathinfo($filename)['extension'];
                    $sql = $conn->prepare("INSERT INTO search_titles (title, filetype, category) VALUES (:ffilename, :filetype, :category)");
                    $sql->bindParam(":ffilename", $filename);
                    $sql->bindParam(":filetype", $filetype);
                    $sql->bindParam(":category", $category);
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
