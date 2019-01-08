<?php
$myfile = fopen("php.txt", "w") or die("Unable to open file!");
fwrite($myfile, $_POST);
fwrite($myfile, $_GET);
fclose($myfile);
echo $_POST;
echo $_GET;
?>