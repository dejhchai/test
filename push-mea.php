<?php
if(isset($_POST["hid"]) === true && empty($_POST["hid"]) === false)
{	$hid=$_POST["hid"];
}else if(isset($_GET["hid"]) === true && empty($_GET["hid"]) === false)
{       $hid=$_GET["hid"];
}else
{    	$hid="";
}

if(isset($_POST["cmd"]) === true && empty($_POST["cmd"]) === false)
{	$cmd=$_POST["cmd"];
}else if(isset($_GET["cmd"]) === true && empty($_GET["cmd"]) === false)
{       $cmd=$_GET["cmd"];
}else
{    	$cmd="";
}


if($hid!="")
{
//csb
//$strAccessToken = 'NwAEkDtBFMnHVXW6SaPFQTAQOsfINOOnsn/fKorN4CW5A8eSkZp3x6QNPsGZXFh3bo32pa1NEOmcvSgH2ez1ZKUZ3ZKdql9kQK/0ec16ztyR6MZxH3s3KwLpYDdBV2MWQD6W0OPFF4zXyys6305zRgdB04t89/1O/w1cDnyilFU=';
//saha
$strAccessToken = 'VdbdfGuRlphc9Mv1d5BuPD2fyLJKmtERpniwwIWwfjUoruNPM5FcI2K1uwjZf/XsBri/DKagEanTcl15m+3uDkwCtpjaWS6ZVi91J/BAiYCxbaMGO9JGrllxrr17YX+fo8ADkUGspCmPOoEDpDoSDAdB04t89/1O/w1cDnyilFU=';
$strUrl = "https://api.line.me/v2/bot/message/push";

$arrHeader = array();
$arrHeader[] = "Content-Type: application/json; charset=utf-8";
$arrHeader[] = "Authorization: Bearer " . $strAccessToken;

$arrPostData = array();
//$res[0]=query completed
//$res[1]=response Message
//$res[2]=hid , hardware ID
//$res[3]=id type [0=user,1=group]
//$res[4]=uname , user name
//$res[5]=response type [0=msg,1=msg+response ,2=cmd,3=cmd+response]
//$res[6]=response text
//$res[7]=response command
//$res[8]=MQTT group name
//$res[9]=hardware type

//$arrPostData['to']="C25de1030256b15cbfe3f8b9e96e44c4a";
$arrPostData['to']="Udeadbeefdeadbeefdeadbeefdeadbeef";

$msg=$cmd;

$arrPostData['messages'][0]['type'] = "text";
$arrPostData['messages'][0]['text'] = $msg;
if($msg!="")
{

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$strUrl);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close ($ch);
}
echo   $result;
}
?>

