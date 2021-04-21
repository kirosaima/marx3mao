<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <script src="../script.js"></script>
    <title>Markdown to HTML Conversion</title>
</head>
<body>
<div class="navbar">
        <ul>
            <a href="../index.php">HOME</a>
            <a href="../textlist.php">TEXTS</a>
            <a href="../news.php">NEWS</a>
            <a href="../contact.php">CONTACT</a>
            <a href="../about.html">ABOUT</a>
            <form action="../search.php" method="post">
                <input type="text" name="search_value" id="search_value">
                <input type="submit" value="" style="background:url('images/Search-Icon.png');background-size:cover;border:none;color: transparent;">
            </form>
    </div>
    <div class="main-body">
    <h2>Convert MD to HTML</h2>
    <br>
    <form action="../convert.php" method="post" enctype="multipart/form-data">
        Select files to upload:
        <input type="file" name="md" id="md">
        <br>
        <input type="submit" value="Upload Markdown file" name="submit">
    </form>
</div>
    <hr>
    2021
</body>
</html>