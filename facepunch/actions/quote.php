<?php
if (!defined('fp'))
	return;

forumHeader();

topBar($action == "quote" ? "Quote" : "Edit", array(
	array("left", "?action=frontpage", "Home"),
	array("left", "?action=read", "Read"),
	array("right", "?action=settings", "Settings"),
	array("right", "?action=popular", "Popular"),
	array("right", "?action=privatemessages", "<img src='pm.png'\>")));

if (isset($_GET['postid'])) {
	$content = "";

	if ($action == "quote") {
		$quote = $api->getQuote($_GET['postid']);
		$content = $quote['quote'];
	} else { //we're editing a post.
		$post = $api->getEdit($_GET['postid']);
		$content = $post['edit'];
	}
	
	echo '<br/><form id="reply" action="./?action='.$action.'" method="post" accept-charset="UTF-8">';
	if (isset($_GET['forumid']))
		echo '<input type="hidden" name="forumid" value="'.$_GET['forumid'].'"></input>';
	echo '<input type="hidden" name="threadid" value="'.$_GET['threadid'].'"></input>';
	echo '<input type="hidden" name="postid" value="'.$_GET['postid'].'"></input>';
	echo '<input type="hidden" name="page" value="'.(isset($_GET['page']) ? $_GET['page'] : '1').'"></input>';
	echo '<textarea type="text" name="message" size="10" required>'.$content.'</textarea>
	<input type="submit" value="'.($action == "quote" ? 'Quote' : 'Edit').'" name="reply" class="reply" />
	</form></div>';
} elseif (isset($_POST['message'])) {
	$message = $_POST['message'];
	$threadid = $_POST['threadid'];
	$page = $_POST['page'];
	$postid = $_POST['postid'];
	
	if ($action == "quote") {
		$api->postReply($threadid, $message);
		?>
		<center>
		Posted reply successfully!<br />
		Returning to thread in 3 seconds.
		<meta http-equiv="refresh" content="3; URL=./?action=thread&threadid=<?=$threadid?>&page=<?=$page?><?php echo isset($_POST['forumid']) ? "&forumid=".$_POST['forumid'] : ''; ?>">
		</center>
		<?php
	} else {
		$api->doEdit($postid, $message);
		?>
		<center>
		Edited post successfully!<br />
		Returning to thread in 3 seconds.
		<meta http-equiv="refresh" content="3; URL=./?action=thread&threadid=<?=$threadid?>&page=<?=$page?><?php echo isset($_POST['forumid']) ? "&forumid=".$_POST['forumid'] : ''; ?>">
		</center>
		<?php
	}
}

forumFooter();

?>