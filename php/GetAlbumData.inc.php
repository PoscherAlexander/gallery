<?php
include '../../php/Album.class.php';
function InitAlbum($name, $thumbnail)
{
    $a = new Album();
    $a->setName($name);
    $a->setThumbnail($thumbnail);
    return $a;
}
?>