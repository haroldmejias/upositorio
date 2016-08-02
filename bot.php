<?php
header('Content-Type: text/html; charset=UTF-8');
require("telegram.php");
$bot_id = "230543208:AAER5HSXbFSIP9suiNn_r5xfM6uMubwjLn8";
$telegram = new Telegram($bot_id);
$result = $telegram->getData();
// $text = $result["message"] ["text"];
// $chat_id = $result["message"] ["chat"]["id"];
// $content = array('chat_id' => $chat_id, 'text' => "Test");
// $telegram->sendMessage($content);
$response = processMessage($result["message"]["text"]);
$content = array('chat_id' => $result["message"]["chat"]["id"], 'text' => $response, "parse_mode" => 'html');
$telegram->sendMessage($content);
function processMessage($msg) {
	$dinero=file_get_contents("http://www.hmejias.cf/BOT/dinero.txt");
	// $fmovimientos=file_get_contents("http://www.hmejias.cf/BOT/movimientos.txt");
	if($msg{0} == '/') {
		$c = explode(' ', $msg);
		switch(strtolower(trim($c[0]))) {
			case '/start':
				$text = "Now I am become Death, the destroyer of worlds.";
				return $text;
				break;
			case '/help':
				$text ="FUCK you, mortal";
				return $text;
				break;
			case "/s":
				if (isset($c[1])){
				$total = $dinero + $c[1];
				$text=$total;
				$m=$c[1];
				if (isset($c[2])){
					unset($c[0]);
					unset($c[1]);
					$cont=implode(" ", $c); 
					$cont=urlencode($cont);
				}
				else{ 
					$cont="Sin Concepto";
					$cont=urldecode($cont);
				}
				file_get_contents("http://www.hmejias.cf/BOT/script.php?t={$total}&c={$cont}&o=s&m={$m}&d=1");
				}
				else{
				$text="fuck you";	
				}
				return $text;
				break;
			case "/r":
				if (isset($c[1])){
				$total = $dinero - $c[1];
				$text=$total;
				$m=$c[1];
				if (isset($c[2])){
					unset($c[0]);
					unset($c[1]);
					$cont=implode(" ", $c); 
					$cont=urlencode($cont);
				}
				else{ 
					$cont="Sin Concepto";
					$cont=urldecode($cont);
				}
				file_get_contents("http://www.hmejias.cf/BOT/script.php?t={$total}&c={$cont}&o=r&m={$m}&d=2");
				}
				else{
				$text="fuck you";	
				}
				return $text;
				break;
			case "/d":
				$text=$dinero;
				return $text;
				break;
			default:
				$text = "You speak gibberish, the is no such command";
				return $text;
				break;
		}
	}
	else{
		$text = "The Demogorgon is tired of your silly human bickering!";
		return $text;
	}		
}
?>
