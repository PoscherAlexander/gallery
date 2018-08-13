<?php
ini_set('memory_limit', '-1');
function makeThumbnail($src, $dest, $desired_width) {
    set_error_handler('memoryErrorHandler');
    ini_set('memory_limit', '-1');
    try {
        set_time_limit(0);
        if (!file_exists($dest)) {
            $source_image = imagecreatefromjpeg($src);
            $width = imagesx($source_image);
            $height = imagesy($source_image);
            $desired_height = floor($height * ($desired_width / $width));
            $virtual_image = imagecreatetruecolor($desired_width, $desired_height);
            imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);
            imagejpeg($virtual_image, $dest);
        }
    }
    catch(Exception $exp) {
        header("Refresh:0");
    }
    finally {
        restore_error_handler();
    }
}

function memoryErrorHandler($errno, $errstr)
{
    echo "Wait for redirect... (Error: $errno, $errstr)";
    header('Location: .');
}
?>

