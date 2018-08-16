<?php
error_reporting(E_ALL);
include '../../php/Album.class.php';
$album = new Album(scandir('images'));
echo implode(';', $album->getFiles());
?>