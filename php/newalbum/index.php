<?php
include '../Album.class.php';
if(isset($_POST['txtAlbumName']))
{
    $txtAlbumName = $_POST['txtAlbumName'];

    $a = new Album();
    $a->setName($txtAlbumName);
    $a->setPath(str_replace(' ', '', $txtAlbumName));

    $a->CreateNewAlbum('../../albums/');

    header('Location: ../../');
}
?>