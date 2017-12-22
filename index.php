<?php
/*
copyright @ medantechno.com
2017

*/

require_once('./line_class.php');

$channelAccessToken = 'CEPQAHX3RsvAnRgOw3l/BUYzejwd+H4RoA2hFK6JU7aHr6NDlRX9IbvOJQOnf/hqNUxKtM6JdZfOEiBpG4zvMyKaj7e4YTG3RmmaoBIuMLQXAR/ZWenpMuCv3QJRcG7Xd62OfeIEOiftPphRAPF+8gdB04t89/1O/w1cDnyilFU='; //sesuaikan 
$channelSecret = 'd4969995eecb193b1fb6d725f4843dd4';//sesuaikan

$client = new LINEBotTiny($channelAccessToken, $channelSecret);
$userId 	= $client->parseEvents()[0]['source']['userId'];
$replyToken = $client->parseEvents()[0]['replyToken'];
$timestamp	= $client->parseEvents()[0]['timestamp'];
$message 	= $client->parseEvents()[0]['message'];
$messageid 	= $client->parseEvents()[0]['message']['id'];
$profil = $client->profil($userId);
$pesan_datang = $message['text'];

//pesan bergambar
if($message['type']=='text')
{
	if($pesan_datang=='Hi')
	{
		
		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => 'Halo'
									)
							)
						);
				
	}

}
 
$result =  json_encode($balas);
//$result = ob_get_clean();

file_put_contents('./balasan.json',$result);


$client->replyMessage($balas);

?>
