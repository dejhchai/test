<?php

$access_token = 'VdbdfGuRlphc9Mv1d5BuPD2fyLJKmtERpniwwIWwfjUoruNPM5FcI2K1uwjZf/XsBri/DKagEanTcl15m+3uDkwCtpjaWS6ZVi91J/BAiYCxbaMGO9JGrllxrr17YX+fo8ADkUGspCmPOoEDpDoSDAdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$arrayJson = json_decode($content, true);
// Validate parsed JSON data

			// Get text sent
			$reqtext = $arrayJson['events'][0]['message']['text'];
                        $reqtext = str_replace(chr(10),"%0A",$reqtext);
                        /*
                        $a="";
			for($i=0;$i<strlen($reqtext);$i++)
                        {
				$a.=$reqtext[$i].",".dechex(ord($reqtext[$i]))." ";
			}
                        */


                        $anstext = "";
                        $cmd="NONE";
                        $ena_response=0;
                        $mqtt_group_name="debugtest";

if(isset($arrayJson['events'][0]['source']['userId']){
      $id = $arrayJson['events'][0]['source']['userId'];
   }
   else if(isset($arrayJson['events'][0]['source']['groupId'])){
      $id = $arrayJson['events'][0]['source']['groupId'];
   }
   else if(isset($arrayJson['events'][0]['source']['room'])){
      $id = $arrayJson['events'][0]['source']['room'];
   }

    				
	   
/*                        if($event['source']['groupId']!="")
	                {     $tid=1;
	                }else if($event['source']['userId']!="")
        	        {     $lid=$event['source']['userId'];
                              $tid=2;
                        }else
                        {     $lid="";
                              $uid="";
                              $tid=0;
                        }
                        $hid="";
*/
//                        $response = file_get_contents("http://www.csb-tech.com/line/bot/?lid=".$lid."&tid=".$tid."&uid=".$uid."&req=".$reqtext);
//			$res = json_decode($response , true);
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
                    
				$strSQL = "http://122.155.13.16/cmddb.php?cmd=";
                $strSQL .="INSERT%20INTO%20debugline%20(tgroupid,tuserid)";
        	$strSQL .="%20VALUES%20(%27";
        	$strSQL .=$id."%27,%27".$reqtext."%27) ";
		$result = file_get_contents($strSQL);
		
		
					  //  pubMqtt("debugtest",$response);
					
					
  /*                  for($i=0;$i<count($res);$i++)
                    {
			switch($res[$i][0])
                        {case 0:
                        	$ena_response   =intval($res[$i][5]);
                                $anstext	=$res[$i][6];
                                $cmd            =$res[$i][7];
                                $mqtt_group_name=$res[$i][8];
                         break;
                         case 1:
                               $anstext ="Please register your hardware before use."."\n"."\n";
                        	$anstext.="\n"."type SETID + press return.";
                        	$anstext.="\n"."type <HARDWARE ID> + press return.";
                                $anstext.="\n"."type <SERIAL ID> + press send.";
                                $cmd="";
                                $ena_response=1;
                         break;
                         case 2:
                                $ena_response=0;
                         break;
                         default:
                         	$ena_response=255;
                         break;
                        }
*/
                        // Get replyToken
                        $replyToken = $arrayJson['events'][0]['replyToken'];
/*
                        switch($ena_response)
                        {       //case 255: pubMqtt($mqtt_group_name,json_encode($res[$i])); break;
                        	case 2:
	                        case 3: pubMqtt($mqtt_group_name,$cmd);
                        	break;
                                case 0:
                                break;
                                default:
                                	//pubMqtt($mqtt_group_name,"[".$event['source']['type']."]".$event['source']['groupId']."[".$event['source']['userId']."]:". $event['message']['text'].":".$anstext );
                                        //pubMqtt("debugtest","[".$event['source']['type']."]".$event['source']['groupId']."[".$event['source']['userId']."]:". $event['message']['text'].":".$anstext );
                                break;
                        }
*/                        //pubMqtt("debugtest","[".$event['source']['type']."]".$event['source']['groupId']."[".$event['source']['userId']."]:". $event['message']['text'].":".$anstext );
                        //pubMqtt("debugtest",json_encode($res));
                        //pubMqtt("debugtest",$lid." : ".$hid);
                        //pubMqtt("debugtest","[".$res[$i][0].",".$res[$i][1].",".$res[$i][2].",".$res[$i][3].",".$res[$i][4].",".$res[$i][5].",".$res[$i][6].",".$res[$i][7].",".$res[$i][8].",".$res[$i][9]."]");

                        /*pubMqtt("linetest",$reqtext);
                        $anstext=$reqtext;
                        $ena_response=1;
                        */

/*
                    }
                        if($anstext=="")
                        {   $ena_response=0;
                        }

                        if(($ena_response==1)||($ena_response==3))
                        {
	*/
		$anstext ="test";
			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $anstext
			];


	  $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = "สวัสดีจ้าาา";
     
			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			//$post = json_encode($data);
			$post = json_encode($arrayPostData);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);
                        //pubMqtt("debugtest",$result);
                        
                        echo $result . "\r\n";
	
echo "OK";
