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
	$total=get_file_contents("http://www.hmejias.cf/BOT/dinero.txt");
	$fmovimientos=get_file_contents("http://www.hmejias.cf/BOT/movimientos.txt");
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
				$cont = $c[2];
				file_get_contents("http://www.hmejias.cf/BOT/script.php?m={$m}&c={$cont}");
				}
				else{
				$text="fuck you";	
				}
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
