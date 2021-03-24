<?php
$target_dir = "articles/";
$target_text = $target_dir . basename($_FILES["textToUpload"]["name"]);
$target_pdf = $target_dir . basename($_FILES["pdfToUpload"]["name"]);
$uploadOk = 1;

if (file_exists($target_text)) {
    echo "Sorry, text already exists.";
    $uploadOk = 0;
}
if (file_exists($target_pdf)) {
    echo "Sorry, the pdf already exists.";
    $uploadOk = 0;
}

$textFileType = strtolower(pathinfo($target_text,PATHINFO_EXTENSION));
$pdfFileType = strtolower(pathinfo($target_pdf,PATHINFO_EXTENSION));

if ($textFileType != "html" && $textFileType != "htm") {
    echo "Sorry, only HTML and HTM files are allowed for text upload.";
    $uploadOk = 0;
}
if ($pdfFileType != "pdf") {
    echo "Sorry, only PDF files are allowed for pdf upload.";
    $uploadOk = 0
}

if ($uploadOk == 0) {
    echo "Sorry, your files were not uploaded.";
} else {
    if (move_uploaded_file($_FILES["textToUpload"]["tmp_name"],$target_text) && move_uploaded_files($_FILES["pdfToUpload"]["tmp_name"],$taget_file)) {
        echo "The files ". htmlspecialchars( basename($_FILES["textToUpload"]["name]"])) . " and ". htmlspecialchars(basename($_FILES["pdfToUpload"]["name"])) . " have been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your files.";
    }
    }
}
?>

