<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Logging out</title>
</head>
<body>
    <h1>Crimson Path</h1>
    <p>Nothing to see here anymore</p>
    <hr>
<?php
session_start();
$_SESSION['loggedIn'] = 'nil';
echo "Logged out";
?>
</body>
</html>