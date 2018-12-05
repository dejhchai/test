<?php
        switch(strtoupper(trim($reqtext)))
                        { case 'เปิด':
	                  case 'ON':$anstext = 'ต้องการจะเปิดอะไร';$cmd="";break;
                          case 'ปิด':
                          case 'OFF':$anstext = 'ต้องการจะปิดอะไร';$cmd="";break;
                          case 'เปิดไฟครัว':
                          case 'เปิดไฟคัว':
                          case 'ครัวเปิด':
                          case '1':
	                  case 'ON0':$anstext = '';$cmd="&ON0";break;
                          case 'ปิดไฟครัว':
                          case 'ปิดไฟคัว':
                          case 'ครัวปิด':
                          case '0':
                          case 'OFF0':$anstext = '';$cmd="&OFF0";break;
                          case 'ห้องเปิด':
                          case 'เปิดไฟห้อง':
	                  case 'ON1':$anstext = '';$cmd="&ON1";break;
                          case 'ห้องปิด':
                          case 'ปิดไฟห้อง':
                          case 'OFF1':$anstext = '';$cmd="&OFF1";break;
                          case '?':
                          case 'HELP':
                          case 'CMD':
                          case 'COMMAND':
                          case 'คำสั่ง':
                          case 'สั่ง':
                          case 'สั่งงาน':
                          		$anstext = "พิมพ์:"."\n"."Temp ,อุณหภูมิ -เพื่อแสดงอุณหภูมิ"."\n\n"."on,เปิด -เพื่อเปิดไฟ"."\n\n"."off,ปิด -เพื่อปิดไฟ"."\n"."setup -เพื่อแสดงวิธีตั้งโปรแกรม";
                                        $cmd="";
                          break;
                          case 'TEMP':
                          case 'อุณหภูมิ':
                                        $anstext = '';$cmd="&TEMP";break;
                          case 'STATUS':$anstext = '';$cmd="&DISP";break;
                          case 'CHKID':$anstext = "Type: ".$event['source']['type']."\r\nGroupID: ".$event['source']['groupId']."\r\nUserID: ".$event['source']['userId'];$cmd="";break;
                          //case 'SETID':$anstext = "Type: ".$event['source']['type']."\r\nGroupID: ".$event['source']['groupId']."\r\nUserID: ".$event['source']['userId'];$cmd="";break;
                          default:
                              $cmd="NONE";
                          break;
                        }
?>

