<?php
if (!defined('fp'))
	return;

forumHeader();

if (isset($_POST['message']) && isset($_POST['threadid'])) {
	$message = $_POST['message'];
	$threadid = $_POST['threadid'];
	
	$api->postReply($threadid, $message);
	?>
	<center>
	Posted reply successfully!<br />
	Returning to thread in 3 seconds.
	<meta http-equiv="refresh" content="3; URL=./?action=thread&threadid=<?=$threadid?>&page=<?=$_POST['page']?>">
	</center>
	<?php
} else {
	echo '<center>No thread id or message was specified!</center>';
}

forumFooter();

?>