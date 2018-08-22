<?php
include '../../php/Album.class.php';
$album = new Album(scandir('images'));
$album->DisplayImages();
?>