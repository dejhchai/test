<?php
switch($cmd)
{ case "BOOT":
	$msg = "ระบบพร้อมทำงานแล้ว";
  break;
  case "OUT0off":
	$msg = "";
  break;
  case "OUT0on":
	$msg = "";
  break;
  case "OUT1off":
	$msg = "เปิดระบบตรวจจับความเคลื่อนไหวแล้วค่ะ";
  break;
  case "OUT1on":
	$msg = "ปิดระบบตรวจจับความเคลื่อนไหวแล้วค่ะ";
  break;
  case "IN0off":
	$msg = "";
  break;
  case "IN0on":
	$msg = "";
  break;
  case "IN1off":
	//$msg = "ผู้บุกรุกไปแล้วลูกเพ่";
        $msg ="ในขณะนี้ผู้บุกรุกผ่านเครื่องตรวจจับความเคลื่อนไหวเข้ามายังพื้นที่หวงห้ามแล้วค่ะ";
  break;
  case "IN1on":
	//$msg = "มีผู้บุกรุกแล้วลูกเพ่";
        //$msg = "ในขณะนี้มีผู้บุกรุกบ้านของท่าน";
        $msg = "ในขณะนี้มีผู้บุกรุกบ้านของท่านแล้วค่ะ";

  break;

  default :
       switch(substr($cmd,0,1))
       { case "S":
	        $msg = "ระบบตรวจจับความเคลื่อนไหว".(substr($cmd,4,1)=="1"?"ปิด":"เปิด")."อยู่ค่ะ";
                //."\n".(substr($cmd,2,1)=="0"?"ปิด":"เปิด"). "\n".(substr($cmd,4,1)=="0"?"ปิด":"เปิด");
         break;
         case "T":
                $ftmp=array();
		$ftmp= explode(";",$cmd);
	        $msg = "อุณหภูมิขณะนี้ ".substr($cmd,2,strlen($cmd)-2). " องศาเซลเซียส";
                //$msg = "อุณหภูมิขณะนี้ ".$ftmp[1]. " องศาเซลเซียส";
                //$msg .= "Hum=".$ftmp[2].",Temp=".$ftmp[3].",Heat=".$ftmp[4];
         break;
         default:
         	$msg=$cmd;
         break;
       }
  break;
}
?>

