<?php
if(isset($_POST['delname']) && isset($_POST['album'])) {
    $img = $_POST['delname'];
    $album = $_POST['album'];
}
else return 2;
echo $album;

$c1 = unlink('../albums/' . $album . '/images/' . $img);
$c2 = unlink('../albums/' . $album . '/thumbnails/' . $img);

$info = array('code' => 'del', 'album' => $album, 'deletedImage' => $img);

file_put_contents('../albums/' . $album . '/temp.info', json_encode($info));

if($c1 && $c2) echo 0;
else echo 1;
?>