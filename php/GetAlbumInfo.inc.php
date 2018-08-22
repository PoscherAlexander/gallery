<?php
$info = json_decode(file_get_contents('../albums/temp.info'), true);

if($info['code'] != '0')
{
    if($info['code'] == 'del')
    {
        echo $info['code'] . ';' . $info['album'];
    }
    else if($info['code'] == 'add')
    {
        echo $info['code'] . ';' . $info['album'];
    }

    $info = array('code' => '0');

    file_put_contents('../albums/temp.info', json_encode($info));
}
?>