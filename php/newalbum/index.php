<?php
include '../Album.class.php';
if(isset($_POST['txtAlbumName']))
{
    $txtAlbumName = $_POST['txtAlbumName'];

    $a = new Album();
    $a->setName($txtAlbumName);
    $a->setPath(str_replace(' ', '', $txtAlbumName));

    $a->CreateNewAlbum('../../albums/');

    setInfo($txtAlbumName);

    header('Location: ../../');
}

function setInfo($albumName)
{
    $info = array('code' => 'add', 'album' => $albumName);
    file_put_contents('../../albums/temp.info', json_encode($info));
}
?>