<?php
function requestArray($fields,$field_strings) {
	$fields++;
	$field_strings.= '&apikey=3hdia83jcm03halieb92';
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,'http://www.facepunch.com/fp_api.php');
	curl_setopt($ch,CURLOPT_POST,$fields);
	curl_setopt($ch,CURLOPT_POSTFIELDS,$field_strings);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	$result = curl_exec($ch);
	curl_close($ch);
	return json_decode($result,true);
}
function Login() {
	if (empty($_POST['username'])) {
		echo 'Username is empty';
	}
	if (empty($_POST['password'])) {
		echo 'Password is empty';
	}
	if (!empty($_POST['username']) && !empty($_POST['password'])) {
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		$field_strings = 'module=login&username='.$username.'&password='.$password;
		$fields = 3;
		$array = requestArray($fields,$field_strings);
	}
	if (ISSET($array['sessionid'])) {
		ob_start();
		$s = $array['sessionid']['s'];
		
		echo '<html><head><meta http-equiv="refresh" content="5; URL=/facepunch"></head><body>';
		echo 'Welcome '.$array['userinfo']['username'];
		echo '<br />You will be redirected in 5 seconds or <a href="http://eewai.com/facepunch">click here</a>';
		echo '</body></html>';
		setcookie('loggedin',1,time()+60*60*24*365);
		setcookie('username',$username,time()+60*60*24*365);
		setcookie('password',$password,time()+60*60*24*365);
		setcookie('session',$s,time()+60*30);
		ob_end_flush();
	}
	elseif (ISSET($array['error'])) {
		echo $array['error']['message'];
		echo '<br /><a href="http://eewai.com/facepunch/?module=login">Try again?</a>';
	}
}
Login();


?>