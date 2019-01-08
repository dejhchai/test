<?php
$myfile = fopen("webhook.txt", "w") or die("Unable to open file!");
fwrite($myfile, $_POST);
fwrite($myfile, $_GET);
fclose($myfile);
print_r($_POST);
print_r($_GET);
?>