<?php
if (!defined('fp'))
	return;

require_once('nbbc.php');
forumHeader();

$array = $api->getPosts($_GET['threadid'], isset($_GET['page']) ? $_GET['page'] : 1);
$returnid = isset($_GET['forumid']) ? $_GET['forumid'] : 0;

topBar($array['title'], array(
		array("left", "?action=frontpage", "Home"),
		array("left", "?action=popular", "Popular"),
		array("right", $returnid != 0 ? "?action=forum&forumid=".$returnid : "?action=frontpage", "Back")));

$pagecode = getThreadPageCode($array['numpages']);
echo $pagecode;
$oddeven = false;
$wut= 0;
foreach ($array['posts'] as $thread) {
	if(!EMPTY($pagecode) || $wut == 1) {
		echo '<div id="er"></div>';
	}
	$wut = 1;
	$datetext = $thread["time"];
	echo "<div class=\"".(!$oddeven ? "oddpost" : "evenpost")."\"><h4 ".(ISSET($_COOKIE['avatars'])?'style="padding-left:0px;"':"style=\"-webkit-background-size:40px auto;-o-background-size:40px auto;-moz-background-size:40px auto;background-size:40px auto;background-position:0px center;background-repeat:no-repeat;background-image:url(http://www.facepunch.com/avatar/".$thread["userid"].".png);\"").">".$thread['username_html']."<div style=\"float:right;\">".$datetext."</div><div id=\"userTitle\">".(!EMPTY($thread['usertitle'])?optimizeUserTitleSize($thread['usertitle']):'')."</div></h4><h5>";
	$oddeven = !$oddeven;
	$bbcode = new BBCode;
	if (ISSET($_COOKIE['images'])) {
		$bbcode->RemoveRule('img');
		$bbcode->RemoveRule('thumb');
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
	$input = $thread['message'];
	$output = $bbcode->Parse($input);
	echo html_entity_decode($output);
	echo "</h5>";
	if (ISSET($thread['ratings']) && !ISSET($_COOKIE['ratings'])) {
		echo "<div id=\"ratingWrapper\"><div id=\"ratings\">";
		foreach ($thread['ratings'] as $r => $b) {
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
	echo '<input type="hidden" name="threadid" value="'.$_GET['forumid'].'"></input>';
echo '<input type="hidden" name="page" value="'.(ISSET($_GET['page']) ? $_GET['page'] : 1).'"></input>
<textarea type="text" name="message" size="10" required></textarea>
<input type="submit" value="Reply" name="reply" class="reply" />
</form></div>';

forumFooter();

?>