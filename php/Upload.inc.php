<?php
$album = $_GET['a'];
$target_dir = "../albums/" . $album . "/images/";

$files = reArrayFiles($_FILES['files']);

foreach($files as $file) {
    $target_file = $target_dir . basename($file["name"]);
    $uploadOk = 1;
    if ($uploadOk == 1) {
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            echo 'success';
        }
    }
}

function reArrayFiles(&$file_post) {

    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i=0; $i<$file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }

    return $file_ary;
}
?>