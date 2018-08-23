<?php
$file = basename($_GET['file']);
$album = $_GET['album'];
$file = '../../albums/' . $album . '/images/' . $file;

if(!file_exists($file)){ // file does not exist
    die('file not found');
} else {
    header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=" . basename($file));
    header("Content-Type: application/zip");
    header("Content-Transfer-Encoding: binary");

    // read the file from disk
    readfile($file);

    //header('Location: ../../albums' . $album . '/');
}
?>