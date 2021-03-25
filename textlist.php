<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>List of Texts</title>
</head>
<body>
    <ul>
        <?php
            $directory = "articles/";
            if (is_dir($directory)) {
                if ($opendirectory = opendir($directory)) {
                    while (($file = readdir($opendirectory)) !== false) {
                        if (pathinfo($file)['extension'] == "html") {
                            echo "<li><a href='$directory/$file'>$file</a></li>";
                        }
                        closedir($opendirectory);
                    }
                }
            }
        ?>
    </ul>
</body>
</html>