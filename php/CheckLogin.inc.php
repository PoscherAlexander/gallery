<?php
session_start();
$username = $_POST['user'];
$password = $_POST['passwd'];

$userdata = json_decode(file_get_contents('login/data.json'));

if($username == $userdata[0] && password_verify($password, $userdata[1]))
{
    $_SESSION['id'] = 0;
    $_SESSION['username'] = $userdata[0];
    echo 0;
}
else echo 1;
?>