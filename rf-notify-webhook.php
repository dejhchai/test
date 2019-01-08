<?php
$content = file_get_contents('php://input');

$events = json_decode($content, true);
// Validate parsed JSON data
/*
if (!is_null($events['evalMatches'])) 
{
	// Loop through each event
	
	
	
	
	foreach ($events['evalMatches'] as $event) 
	{	
		$title=$event['title'];
		//$value=$event['value'];
	
		$token = "wxTVZE2k6DLTzwjwYnqFXx1MvcefwAD6LIt9gPfEDZT"; //ใส่Token ที่copy เอาไว้
$message = "\r\n".$title."\r\n[".$value."]"; //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร
 
//$res = notify_message($str,$token);
//print_r($res);
$queryData = array('message' => $message);
 $queryData = http_build_query($queryData,'','&');
 $headerOptions = array( 
         'http'=>array(
            'method'=>'POST',
            'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
                      ."Authorization: Bearer ".$token."\r\n"
                      ."Content-Length: ".strlen($queryData)."\r\n",
            'content' => $queryData
         ),
 );
 $context = stream_context_create($headerOptions);
 $result = file_get_contents("https://notify-api.line.me/api/notify",FALSE,$context);
 $res = json_decode($result);
 print_r($res);
 
	}
}*/
$myfile = fopen("webhook.txt", "w") or die("Unable to open file!");
//$str=print_r($_POST,true);
//fwrite($myfile, $str);
//$str=print_r($_GET,true);
//fwrite($myfile, $str);
fwrite($myfile, $content);
fwrite($myfile, $events['evalMatches']['title']);
//fwrite($myfile, $value."\r\n");
fclose($myfile);
//$content = print_r($yourVar, true);
//file_put_contents('file.log', $content);

?>