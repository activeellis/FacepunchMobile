<?php
function requestArray($field_strings) {
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,'http://api.facepun.ch/'.$field_strings);
	curl_setopt($ch,CURLOPT_POSTFIELDS,$field_strings);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	$result = curl_exec($ch);
	curl_close($ch);
	return json_decode($result,true);
}
function Login() {
	if (empty($_POST['username'])) {
		echo 'Username is empty<br />';
	}
	if (empty($_POST['password'])) {
		echo 'Password is empty';
	}
	if (!empty($_POST['username']) && !empty($_POST['password'])) {
		$username = trim($_POST['username']);
		$password = md5(trim($_POST['password']));
		$field_strings = '?action=authenticate&username='.$username.'&password='.$password;
		$array = requestArray($field_strings);
	}
	if (ISSET($array['login'])) {
		ob_start();
		
		echo '<html><head><meta http-equiv="refresh" content="5; URL=./index.php"></head><body>';
		echo 'Welcome '.$username;
		echo '<br />You will be redirected in 5 seconds or <a href="http://eewai.com/facepunch">click here</a>';
		echo '</body></html>';
		setcookie('loggedin',1,time()+60*60*24*365);
		setcookie('username',$username,time()+60*60*24*365);
		setcookie('password',$password,time()+60*60*24*365);
		ob_end_flush();
	}
	else {
		echo '<br /><a href="http://eewai.com/facepunch/?module=login">Try again?</a>';
	}
}
Login();


?>