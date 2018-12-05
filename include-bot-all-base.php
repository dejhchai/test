<?php
    if($cmd=="NONE")
    {
        switch(strtoupper(trim($reqtext)))
                        { case 'สวัสดี':
	                  case 'ว่าไง':
                          case 'HI':
                          case 'HELLO':$anstext = 'ว่าไงลูกเพ่';$cmd="";break;
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
                          case 'MY NAME':
                                        $response = file_get_contents("http://www.csb-tech.com/line/name/?&uid=".$event['source']['userId']);
					$res = json_decode($response , true);
					if($res[0]==1)
                                	{      $anstext="Your name : ".$res[2];
                                	}else
                                	{      $anstext=$res[1];
                                	}
                          		$cmd="";break;
                          case 'SETUP':
                          		$anstext = "พิมพ์"."\n"."setid + 'return'"."\n"."<hardware id>+ 'return'"."\n"."<hardware serial> + 'send'"."\n\n";
                                        $anstext.= "ตัวอย่าง"."\n"."setid"."\n"."MIO_xxxxxx"."\n"."xxxxxxxx"."\n"."กด send";
                                        $cmd="";
                          break;
                          case 'CHKID':$anstext = "Type: ".$event['source']['type']."\r\nGroupID: ".$event['source']['groupId']."\r\nUserID: ".$event['source']['userId'];$cmd="";break;
                          default:
                            if(substr(strtoupper($reqtext),0,5)=="SETID")
                            {   $cmd="SETID";
                            }else if(substr(strtoupper($reqtext),0,7)=="SETNAME")
                            {   $cmd="SETNAME";
                            }else
                            {   $cmd="";
                            }
                          break;
                        }
    }
?>

