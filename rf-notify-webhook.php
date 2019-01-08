<?php
$content = file_get_contents('php://input');

$myfile = fopen("webhook.txt", "w") or die("Unable to open file!");
//$str=print_r($_POST,true);
//fwrite($myfile, $str);
//$str=print_r($_GET,true);
//fwrite($myfile, $str);
fwrite($myfile, $content);
fclose($myfile);
//$content = print_r($yourVar, true);
//file_put_contents('file.log', $content);

?>