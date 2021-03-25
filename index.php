<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Crimson Path</title>
</head>
<body>
    <a href="admin.php">Admin</a>
    <br>
    <form action="search.php" method="post">
        <input type="text" name="search_value" id="search_value">
        <br>
        <label for="textSearch">Regular search</label>
        <input type="radio" name="searchType" value="html"><br>
        <label for="pdfSearch">PDF Search</label>
        <input type="radio" name="searchType" value="pdf"><br>
        <input type="submit" value="Search">
    </form>
    <br>
    <a href="textlist.php">List of texts</a>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima non iusto perferendis hic! Non doloremque magnam cumque eius quia aliquam culpa veniam accusantium error. Voluptatem delectus similique a fugit dolore.</p>
</body>
</html>