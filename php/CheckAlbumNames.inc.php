<?php
$name = str_replace(' ', '', $_POST['n']);
echo implode(';', scandir('../albums'));
?>