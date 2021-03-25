<?php
    include "Parsedown.php";
    include "File.php";

    use mikehaertl\tmp\File;

    $path_parts = pathinfo($_FILES['md']['name']);

    $filename = $path_parts['filename'];
    $Parsedown = new Parsedown();
    $fileContents = file_get_contents($_FILES['md']['tmp_name']);
    $html = $Parsedown
        ->setBreaksEnabled(true)
        ->setUrlsLinked(true)
        ->text($fileContents);
    
    $file = new File($html, '.html');
    $file->send($filename.'.html');
?>