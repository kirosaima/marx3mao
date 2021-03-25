<?php
    include "Parsedown.php";
    include "File.php";

    use mikehaertl\tmp\File;

    $filename = $_FILES['md']['name'];
    $Parsedown = new Parsedown();
    $fileContents = file_get_contents($_FILES['md']['tmp_name']);
    $html = $Parsedown
        ->setBreaksEnabled(true)
        ->setUrlsLinked(true)
        ->text($fileContents);
    
    $file = new File($html, '.html');
    $file->send($filename.'.html');
?>