<?php
include '../../php/Album.class.php';
function InitAlbum()
{
    return Album::LoadAlbum(file_get_contents('properties.bin'));
}
?>