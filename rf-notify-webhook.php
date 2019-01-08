<?php
$myfile = fopen("webhook.txt", "w") or die("Unable to open file!");
$str=print_r($_POST,true);
fwrite($myfile, $str);
$str=print_r($_GET,true);
fwrite($myfile, $str);
fclose($myfile);
//$content = print_r($yourVar, true);
//file_put_contents('file.log', $content);
print_r($_POST);
print_r($_GET);
?>