<?php
$album = $_POST['album'];

$info = json_decode(file_get_contents('../albums/' . $album . '/temp.info'), true);

if($info['code'] != '0')
{
    if($info['code'] == 'del')
    {
        echo $info['code'] . ';' . $info['album'] . ';' . $info['deletedImage'];
    }
    else if($info['code'] == 'add')
    {
        echo $info['code'];
    }

    $info = array('code' => '0');

    file_put_contents('../albums/' . $album . '/temp.info', json_encode($info));
}
?>