<?php
session_start();

if(isset($_SESSION['id'])) echo 0;
else echo 1;
?>