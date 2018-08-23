<?php
$isSetup = file_get_contents('../setup/setup.bin');

if($isSetup == 1) echo 1;
else if($isSetup == 0) echo 0;
?>