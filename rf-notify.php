<?php

define('LINE_API',"https://notify-api.line.me/api/notify");

if(isset($_POST["msg"]) === true && empty($_POST["msg"]) === false)
{	$msg=$_POST["msg"];
}else if(isset($_GET["msg"]) === true && empty($_GET["msg"]) === false)
{       $msg=$_GET["msg"];
}else
{    	$msg="";
}

 if($msg!="")
 {
$token = "wmuZn7ixkOkAp2V3WWLxr0xBJwFxKItscY5iuFLfdo7"; //ใส่Token ที่copy เอาไว้
$str = $msg; //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร
 
$res = notify_message($str,$token);
print_r($res);

}

function notify_message($message,$token){
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
 $result = file_get_contents(LINE_API,FALSE,$context);
 $res = json_decode($result);
 return $res;
}
?>