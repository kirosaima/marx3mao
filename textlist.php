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
            function getFileList($dir)
            {
            // array to hold return value
            $retval = [];

            // add trailing slash if missing
            if(substr($dir, -1) != "/") {
                $dir .= "/";
            }

            // open pointer to directory and read list of files
            $d = @dir($dir) or die("getFileList: Failed opening directory {$dir} for reading");
            while(FALSE !== ($entry = $d->read())) {
                // skip hidden files
                if($entry{0} == ".") continue;
                if(is_dir("{$dir}{$entry}")) {
                $retval[] = [
                    'name' => "{$dir}{$entry}/",
                    'type' => filetype("{$dir}{$entry}"),
                    'size' => 0,
                    'lastmod' => filemtime("{$dir}{$entry}")
                ];
                } elseif(is_readable("{$dir}{$entry}")) {
                $retval[] = [
                    'name' => "{$dir}{$entry}",
                    'type' => mime_content_type("{$dir}{$entry}"),
                    'size' => filesize("{$dir}{$entry}"),
                    'lastmod' => filemtime("{$dir}{$entry}")
                ];
                }
            }
            $d->close();

            return $retval;
            }
            $dirlist = getFileList("articles/");
            foreach ($dirlist as $file) {
                if($file['type'] != 'text/plain') {
                    continue;
                }
                echo "<li><a href=\"articles/",basename($file['name']),"\">",substr_replace(basename($file['name']),"",-5), "</a></li>\n";
            }
        ?>
    </ul>
</body>
</html>