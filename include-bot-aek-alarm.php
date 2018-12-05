<?php
        switch(strtoupper(trim($reqtext)))
                        { case '?':
                          case 'HELP':
                          case 'CMD':
                          case 'COMMAND':
                          case 'คำสั่ง':
                          case 'สั่ง':
                          case 'สั่งงาน':
                          		$anstext = "พิมพ์:"."\n"."Temp ,อุณหภูมิ -เพื่อแสดงอุณหภูมิ"."\n\n"."setup -เพื่อแสดงวิธีตั้งโปรแกรม";
                                        $cmd="";
                          break;
                          case 'TEMP':
                          case 'อุณหภูมิ':
                                        $anstext = 'จัดไปลูกเพ่';$cmd="&TEMP";break;
                          case 'STATUS':$anstext = 'จัดไปลูกเพ่';$cmd="&DISP";break;
                          case 'CHKID' :$anstext = "Type: ".$event['source']['type']."\r\nGroupID: ".$event['source']['groupId']."\r\nUserID: ".$event['source']['userId'];$cmd="";break;
                          //case 'SETID':$anstext = "Type: ".$event['source']['type']."\r\nGroupID: ".$event['source']['groupId']."\r\nUserID: ".$event['source']['userId'];$cmd="";break;
                          default:
                            if(substr(strtoupper($reqtext),0,5)=="SETID")
                            {   $cmd="SETID";
                            }else
                            {   $cmd="";
                            }
                          break;
                        }
?>

