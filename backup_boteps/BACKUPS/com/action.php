<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>action</title>
</head>
<body>
	<?php
		header('Content-Type: text/html; charset=utf-8');

		define('BOT_TOKEN', '459085857:AAH_7BTNQlFlfxEvWRlgm7jB-627liU2kUg');
		define('BASE_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/sendMessage?chat_id=');
		define('CHAT_ID', '-289386697');

		function GetCurl($url, $data=array())
		{
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_POST, false);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$result = curl_exec($ch);
			curl_close($ch);
         
			return json_decode($result, true);
		}
		function setData($msg='')
		{
			$returnBool = false;
			
			if( empty($msg) == false)
			{
				$urlSum = '';
				$urlSum .= BASE_URL;
				$urlSum .= CHAT_ID;
				$urlSum .= '&text='.urlencode($msg);

				$sendStatus = GetCurl($urlSum);
				$returnBool = $sendStatus['ok'];
			}
			return $returnBool;
		}

		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		$query = "CALL Add_Comment('$name', '$email', '$message')";

		$db = new mysqli('localhost', 'opclyde', 'altmxlr1001') or die('Unable connect to database.');

		if ($db)
		{
			$db->query("SET NAMES utf8");
			mysqli_select_db($db, 'opclyde');
			$db->query($query);
		}
		mysqli_close($db);

		$request = null;

		while(is_null($request))
		{
			$request = setData('[FLICK 실시간 알림]'.PHP_EOL.PHP_EOL.'이름 : '.$name.PHP_EOL.PHP_EOL.'이메일 : '.$email.PHP_EOL.PHP_EOL.'메시지 : '.$message);
		}

		echo("<script>location.href='http://opclyde.dothome.co.kr/com/';</script>");
	?>
</body>
</html>