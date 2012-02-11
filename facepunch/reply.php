<?php
function sendArray($field_strings) {
	$ch = curl_init();
	$username = $_COOKIE['username'];
	$password = $_COOKIE['password'];
	$field_strings.='&username='.$username."&password=".$password;
	curl_setopt($ch,CURLOPT_URL,'http://api.facepun.ch/?'.$field_strings);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	$result = curl_exec($ch);
	curl_close($ch);
	return json_decode($result,true);
}
/*function getPages($fields,$field_Strings) {
	$fields++;
	$field_strings.= '&apikey=3hdia83jcm03halieb92';
	$field_strings.= '&s='.$_COOKIE['session'];
	$fields++;
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,'http://www.facepunch.com/fp_api.php');
	curl_setopt($ch,CURLOPT_POST,$fields);
	curl_setopt($ch,CURLOPT_POSTFIELDS,$field_strings);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	$result = curl_exec($ch);
	curl_close($ch);
	return json_decode($result,true);
}*/
function Reply() {
	if (empty($_POST['threadid'])) {
		echo 'No thread id';
	}
	if (empty($_POST['message'])) {
		echo 'Message is empty';
	}
	if (!empty($_POST['threadid']) && !empty($_POST['message'])) {
		$message = stripslashes(trim($_POST['message']));
		$threadid = trim($_POST['threadid']);
		$field_strings = 'action=newreply&thread_id='.$threadid.'&message='.$message;
		$fields = 3;
		$array = sendArray($fields,$field_strings);
		$page = $_POST['page'];
		header('Location: ./?module=post&threadid='.$threadid.'&page='.$page);
	}
}
Reply();

?>