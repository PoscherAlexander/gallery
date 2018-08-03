<?php
include 'Gallery.class.php';
$albums = json_decode(file_get_contents('../albums/albums.ini'));
$gallery = new Gallery('newgal', $albums);
$gallery->DisplayAlbums();
?>