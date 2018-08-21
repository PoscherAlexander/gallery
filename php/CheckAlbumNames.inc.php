<?php
$name = str_replace(' ', '', $_POST['n']);
$albums = json_decode(file_get_contents('../albums/albums.ini'));
if(in_array($name, $albums))
{
    echo 1;
}
else echo 0;
?>