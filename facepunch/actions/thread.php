<?php
if (!defined('fp'))
	return;

require_once('nbbc.php');
forumHeader();

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$array = $api->getPosts($_GET['threadid'], $page);
$returnid = isset($_GET['forumid']) ? $_GET['forumid'] : 0;

topBar($array['title'], array(
		array("left", "?action=frontpage", "Home"),
		array("left", "?action=popular", "Popular"),
		array("right", $returnid != 0 ? "?action=forum&forumid=".$returnid : "?action=frontpage", "Back")));

$pagecode = getThreadPageCode($array['numpages']);
echo $pagecode;
$oddeven = false;
$wut= 0;
foreach ($array['posts'] as $post) {
	if(!EMPTY($pagecode) || $wut == 1) {
		echo '<div id="er"></div>';
	}
	$wut = 1;
	$datetext = $post["time"];
	echo "<div class=\"".(!$oddeven ? "oddpost" : "evenpost")."\"><h4 ".(ISSET($_COOKIE['avatars'])?'style="padding-left:0px;"':"style=\"-webkit-background-size:40px auto;-o-background-size:40px auto;-moz-background-size:40px auto;background-size:40px auto;background-position:0px center;background-repeat:no-repeat;background-image:url(http://www.facepunch.com/avatar/".$post["userid"].".png);\"").">".$post['username_html']."<div style=\"float:right;\">".$datetext."</div><div id=\"userTitle\">".(!EMPTY($post['usertitle'])?optimizeUserTitleSize($post['usertitle']):'')."</div></h4><h5>";
	$oddeven = !$oddeven;
	$bbcode = new BBCode;
	if (ISSET($_COOKIE['images'])) {
		$bbcode->RemoveRule('img');
		$bbcode->RemoveRule('thumb');
		$bbcode->RemoveRule('div');
		$bbcode->RemoveRule('quote');
		$newrule= Array(
			'mode' => BBCODE_MODE_LIBRARY,
			'method' => 'DoImageURL',
			'class' => 'link',
			'allow_in' => Array('listitem', 'block', 'columns', 'inline'),
			'content' => BBCODE_REQUIRED,
			'plain_start' => "<a href=\"{\$link}\">",
			'plain_end' => "</a>",
			'plain_content' => Array('_content', '_default'),
			'plain_link' => Array('_default', '_content'),
		);
		$bbcode->AddRule('img', $newrule);
		$bbcode->AddRule('thumb', $newrule);
	}
	$input = $post['message'];
	$output = $bbcode->Parse($input);
	echo html_entity_decode($output);
	echo '<div align="right" style="font-weight: bold"><a href="?action=quote&postid='.$post['id'].'&threadid='.$_GET['threadid'].'&page='.$page.(isset($_GET['forumid']) ? '&forumid='.$_GET['forumid'] : '').'">Quote</a>';
	if (strcasecmp($post['username'], $api->username) == 0) {
		//we can edit this post.
		echo ' | <a href="?action=edit&postid='.$post['id'].'&threadid='.$_GET['threadid'].'&page='.$page.(isset($_GET['forumid']) ? '&forumid='.$_GET['forumid'] : '').'">Edit</a>';
	}
	echo "</div><br /></h5>";
	if (ISSET($post['ratings']) && !ISSET($_COOKIE['ratings'])) {
		echo "<div id=\"ratingWrapper\"><div id=\"ratings\">";
		foreach ($post['ratings'] as $r => $b) {
			echo "<img src=\"./ratings/".$r.".png\" />x".$b;
		}
		echo "</div></div>";
	}
	echo "</div>";
}
if (!EMPTY($pagecode)) {
	echo '<div id="er"></div>';
}
echo $pagecode;
echo '<br /><form id="reply" action="./?action=reply" method="post" accept-charset="UTF-8">
<input type="hidden" name="threadid" value="'.$_GET['threadid'].'"></input>';
if (isset($_GET['forumid']))
	echo '<input type="hidden" name="forumid" value="'.$_GET['forumid'].'"></input>';
echo '<input type="hidden" name="page" value="'.(ISSET($_GET['page']) ? $_GET['page'] : 1).'"></input>
<textarea type="text" name="message" size="10" required></textarea>
<input type="submit" value="Reply" name="reply" class="reply" />
</form></div>';

forumFooter();

?>