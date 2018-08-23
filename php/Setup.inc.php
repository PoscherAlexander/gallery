<?php
$username = $_POST['username'];
$password = $_POST['password'];

$data = array($username, $password);

if(file_get_contents('../setup/setup.bin') == 1) {
    file_put_contents('login/data.json', json_encode($data));
    file_put_contents('../setup/setup.bin', '0');
}
?>