<?php
    include "Parsedown.php";

    $Parsedown = new Parsedown();
    $fileContents = file_get_contents($_FILES['md']['tmp_name']);
    echo $Parsedown
        ->setBreaksEnabled(true)
        ->setUrlsLinked(true)
        ->text($fileContents);
?>