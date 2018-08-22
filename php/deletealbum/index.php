<?php
if(isset($_GET['a']))
{
    $album = $_GET['a'];
    $albums = json_decode(file_get_contents('../../albums/albums.ini'));

    rrmdir('../../albums/' . $album);
    unset($albums[array_search($album, $albums)]);

    file_put_contents('../../albums/albums.ini', json_encode(array_values($albums)));

    setInfo($album);

    header('Location: ../../');
}

function rrmdir($dir) {
    if (is_dir($dir)) {
        $objects = scandir($dir);
        foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
                if (is_dir($dir."/".$object))
                    rrmdir($dir."/".$object);
                else
                    unlink($dir."/".$object);
            }
        }
        rmdir($dir);
    }
}

function setInfo($albumName)
{
    $info = array('code' => 'del', 'album' => $albumName);
    file_put_contents('../../albums/temp.info', json_encode($info));
}
?>