<?php
switch($cmd)
{ case "BOOT":
	$msg = "ระบบพร้อมทำงานแล้ว";
  break;
  case "OUT0off":
	$msg = "ปิดไฟครัวแล้ว";
  break;
  case "OUT0on":
	$msg = "เปิดไฟครัวแล้ว";
  break;
  case "OUT1off":
	$msg = "ปิดไฟห้องปู่แล้ว";
  break;
  case "OUT1on":
	$msg = "เปิดไฟห้องปู่แล้ว";
  break;
  case "IN0off":
	$msg = "";
  break;
  case "IN0on":
	$msg = "";
  break;
  case "IN1off":
        $msg ="";
  break;
  case "IN1on":
        $msg = "";
  break;

  default :
       switch(substr($cmd,0,1))
       { case "S":
	        $msg = "ไฟ "."\n"."ไฟครัว ".(substr($cmd,2,1)=="0"?"ปิด":"เปิด"). "\n"."ไฟห้อง ".(substr($cmd,4,1)=="0"?"ปิด":"เปิด");
         break;
         case "T":
                $ftmp=array();
		$ftmp= explode(";",$cmd);
	        //$msg = "อุณหภูมิขณะนี้ ".substr($cmd,2,strlen($cmd)-2). " องศาเซลเซียส";
                $msg = "อุณหภูมิขณะนี้ ".$ftmp[1]. " องศาเซลเซียส";
                $tmp=(intval($ftmp[3])+50)/100;
                $msg .= "\n"."Temp=".$ftmp[3]."/".$tmp."\n"."Hum=".$ftmp[2]."\n"."Heat=".$ftmp[4];
         break;
         default:
         	$msg=$cmd;
         break;
       }
  break;
}
?>

