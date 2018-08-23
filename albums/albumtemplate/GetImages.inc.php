<?php
include '../../php/Album.class.php';
$album = new Album(scandir('images'));
$album->setPath(basename(getcwd()));
$album->DisplayImages();
?>