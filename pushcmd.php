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

if(isset($_POST["d"]) === true && empty($_POST["d"]) === false)
{	$vA=$_POST["d"];
}else if(isset($_GET["d"]) === true && empty($_GET["d"]) === false)
{       $vA=$_GET["d"];
}else
{    	$vA="";
}

if(isset($_POST["c"]) === true && empty($_POST["c"]) === false)
{	$vA_change=$_POST["c"];
}else if(isset($_GET["c"]) === true && empty($_GET["c"]) === false)
{       $vA_change=$_GET["c"];
}else
{    	$vA_change="";
}


function bc_hexdec($input)
{
    $output = '0';

    if (preg_match('/^(0x)?(?P<hex>[a-f0-9]+)$/i', $input, $matches))
        foreach (str_split(strrev($matches['hex'])) as $index => $hex)
            $output = bcadd($output, bcmul(strval(hexdec($hex)), bcpow('16', strval($index))));

    return $output;
}

if($hid!="")
{
$strAccessToken = 'NwAEkDtBFMnHVXW6SaPFQTAQOsfINOOnsn/fKorN4CW5A8eSkZp3x6QNPsGZXFh3bo32pa1NEOmcvSgH2ez1ZKUZ3ZKdql9kQK/0ec16ztyR6MZxH3s3KwLpYDdBV2MWQD6W0OPFF4zXyys6305zRgdB04t89/1O/w1cDnyilFU=';

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

$response = file_get_contents("http://www.csb-tech.com/line/push/?hid=".$hid);
$res = json_decode($response , true);
if($res[0]==0)
{
        $arrPostData['to']=$res[2];
        switch(intval($res[9]))
	{ case 1: //home
		include('include-push-home.php');
 	  break;
  	  case 2: //rf alarm
		include('include-push-aek-alarm.php');
  	  break;
  	  default :
        	include('include-push-base-all.php');
  	  break;
	}

        $msg = "";
$msg.= get_msg(0,0x1,$vA,$vA_change,'BJ 7902 STATUS','OPEN','CLOSE');
$msg.= get_msg(0,0x2,$vA,$vA_change,'BJ 7902 DIFF BUS A','NORMAL','TRIP');
$msg.= get_msg(0,0x4,$vA,$vA_change,'BJ 7902 DIFF BUS B ','NORMAL','TRIP');
$msg.= get_msg(0,0x8,$vA,$vA_change,'BJ 7902 DIFFA RELAY','NORMAL','FAIL');
$msg.= get_msg(0,0x10,$vA,$vA_change,'BJ 7902 DIFFB RELAY ','NORMAL','FAIL');
$msg.= get_msg(0,0x20,$vA,$vA_change,'BJ 7012 STATUS','OPEN','CLOSE');
$msg.= get_msg(0,0x40,$vA,$vA_change,'BJ 7012 DT PHASE R','NORMAL','TRIP');
$msg.= get_msg(0,0x80,$vA,$vA_change,'BJ 7012 DT PHASE Y','NORMAL','TRIP');
$msg.= get_msg(2,0x1,$vA,$vA_change,'BJ 7012 DT PHASE B','NORMAL','TRIP');
$msg.= get_msg(2,0x2,$vA,$vA_change,'BJ 7012 DT ZONE 1','NORMAL','TRIP');
$msg.= get_msg(2,0x4,$vA,$vA_change,'BJ 7012 DT ZONE 2','NORMAL','TRIP');
$msg.= get_msg(2,0x8,$vA,$vA_change,'BJ 7012 DT ZONE 3','NORMAL','TRIP');
$msg.= get_msg(2,0x10,$vA,$vA_change,'BJ 7012 RELAY','NORMAL','FAIL');
$msg.= get_msg(2,0x20,$vA,$vA_change,'BJ 7022 STATUS','OPEN','CLOSE');
$msg.= get_msg(2,0x40,$vA,$vA_change,'BJ 7022 DT PHASE R','NORMAL','TRIP');
$msg.= get_msg(2,0x80,$vA,$vA_change,'BJ 7022 DT PHASE Y','NORMAL','TRIP');
$msg.= get_msg(4,0x1,$vA,$vA_change,'BJ 7022 DT PHASE B','NORMAL','TRIP');
$msg.= get_msg(4,0x2,$vA,$vA_change,'BJ 7022 DT ZONE 1','NORMAL','TRIP');
$msg.= get_msg(4,0x4,$vA,$vA_change,'BJ 7022 DT ZONE 2','NORMAL','TRIP');
$msg.= get_msg(4,0x8,$vA,$vA_change,'BJ 7022 DT ZONE 3','NORMAL','TRIP');
$msg.= get_msg(4,0x10,$vA,$vA_change,'BJ 7022 RELAY FAIL','NORMAL','FAIL');
$msg.= get_msg(4,0x20,$vA,$vA_change,'BJ 7912 STATUS','OPEN','CLOSE');
$msg.= get_msg(4,0x40,$vA,$vA_change,'BJ 7912 Diff Relay Ph-R','NORMAL','TRIP');
$msg.= get_msg(4,0x80,$vA,$vA_change,'BJ 7912 Diff Relay Ph-Y','NORMAL','TRIP');
$msg.= get_msg(6,0x1,$vA,$vA_change,'BJ 7912 Diff Relay Ph-B','NORMAL','TRIP');
$msg.= get_msg(6,0x2,$vA,$vA_change,'BJ 7912 Trip and Lockout','NORMAL','LOCKOUT');
$msg.= get_msg(6,0x4,$vA,$vA_change,'BJ 7912 OC Trip','NORMAL','TRIP');
$msg.= get_msg(6,0x8,$vA,$vA_change,'BJ 7912 Relay Fail','NORMAL','FAIL');
$msg.= get_msg(6,0x10,$vA,$vA_change,'BJ RCC1 63BA','NORMAL','ALARM');
$msg.= get_msg(6,0x20,$vA,$vA_change,'BJ RCC1 63BT','NORMAL','ALARM');
$msg.= get_msg(6,0x40,$vA,$vA_change,'BJ RCC1 63Q','NORMAL','ALARM');
$msg.= get_msg(6,0x80,$vA,$vA_change,'BJ RCC1 63G','NORMAL','ALARM');
$msg.= get_msg(8,0x1,$vA,$vA_change,'BJ RCC1 49','NORMAL','ALARM');
$msg.= get_msg(8,0x2,$vA,$vA_change,'BJ 7922 STATUS','OPEN','CLOSE');
$msg.= get_msg(8,0x4,$vA,$vA_change,'BJ 7922 Diff Relay Ph-R','NORMAL','TRIP');
$msg.= get_msg(8,0x8,$vA,$vA_change,'BJ 7922 Diff Relay Ph-Y','NORMAL','TRIP');
$msg.= get_msg(8,0x10,$vA,$vA_change,'BJ 7922 Diff Relay Ph-B','NORMAL','TRIP');
$msg.= get_msg(8,0x20,$vA,$vA_change,'BJ 7922 Trip and Lockout','NORMAL','LOCKOUT');
$msg.= get_msg(8,0x40,$vA,$vA_change,'BJ 7922 OC Trip','NORMAL','TRIP');
$msg.= get_msg(8,0x80,$vA,$vA_change,'BJ 7922 Relay Fail','NORMAL','FAIL');
$msg.= get_msg(10,0x1,$vA,$vA_change,'BJ RCC2 63BA','NORMAL','ALARM');
$msg.= get_msg(10,0x2,$vA,$vA_change,'BJ RCC2 63BT','NORMAL','ALARM');
$msg.= get_msg(10,0x4,$vA,$vA_change,'BJ RCC2 63Q','NORMAL','ALARM');
$msg.= get_msg(10,0x8,$vA,$vA_change,'BJ RCC2 63G','NORMAL','ALARM');
$msg.= get_msg(10,0x10,$vA,$vA_change,'BJ RCC2 49','NORMAL','ALARM');
$msg.= get_msg(10,0x20,$vA,$vA_change,'BJ 7942 Status Cl.','OPEN','CLOSE');
$msg.= get_msg(10,0x40,$vA,$vA_change,'BJ 7942 Diff Relay Ph-R','NORMAL','TRIP');
$msg.= get_msg(10,0x80,$vA,$vA_change,'BJ 7942 Diff Relay Ph-Y','NORMAL','TRIP');
$msg.= get_msg(12,0x1,$vA,$vA_change,'BJ 7942 Diff Relay Ph-B','NORMAL','TRIP');
$msg.= get_msg(12,0x2,$vA,$vA_change,'BJ 7942 Trip and Lockout','NORMAL','LOCKOUT');
$msg.= get_msg(12,0x4,$vA,$vA_change,'BJ 7942 OC Trip','NORMAL','TRIP');
$msg.= get_msg(12,0x8,$vA,$vA_change,'BJ 79242 Relay Fail','NORMAL','FAIL');
$msg.= get_msg(12,0x10,$vA,$vA_change,'BJ RCC4 63BA','NORMAL','ALARM');
$msg.= get_msg(12,0x20,$vA,$vA_change,'BJ RCC4 63BT','NORMAL','ALARM');
$msg.= get_msg(12,0x40,$vA,$vA_change,'BJ RCC4 63Q','NORMAL','ALARM');
$msg.= get_msg(12,0x80,$vA,$vA_change,'BJ RCC4 63G','NORMAL','ALARM');
$msg.= get_msg(14,0x1,$vA,$vA_change,'BJ RCC4 49','NORMAL','ALARM');
$msg.= get_msg(14,0x2,$vA,$vA_change,'BJ RTU STATUS','LOCAL','REMOTE');
$msg.= get_msg(14,0x4,$vA,$vA_change,'BJ SPARE1','NORMAL','ALARM');
$msg.= get_msg(14,0x8,$vA,$vA_change,'BJ SPARE2','NORMAL','ALARM');
$msg.= get_msg(14,0x10,$vA,$vA_change,'BJ SPARE3','NORMAL','ALARM');
$msg.= get_msg(14,0x20,$vA,$vA_change,'BJ SPARE4','NORMAL','ALARM');
$msg.= get_msg(14,0x40,$vA,$vA_change,'BJ SPARE5','NORMAL','ALARM');
$msg.= get_msg(14,0x80,$vA,$vA_change,'BJ SPARE6','NORMAL','ALARM');


}else
{     	$msg=$hid." ".res[1];
        $arrPostData['to'] = "Uc34277b1fd1b5ce81022efdee2d6f559";
}

//$msg=$cmd;

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

