<?php
if (!defined('fp'))
	die('');

forumHeader();

topBar("Private Messages", array(
	array("left", "?action=frontpage", "Home"),
	array("left", "?action=read", "Read"),
	array("right", "?action=settings", "Settings"),
	array("right", "?action=popular", "Popular"),
	array("right", "?action=privatemessages", "<img src='pm.png'\>")));

if ($action == "privatemessages") {
	$pms = $api->getPMs(isset($_GET['page']) ? $_GET['page'] : 1);
	?>
	<div style="display:block;height: 1px;width: 100%;background: #999;"></div>
	<div id="content">
	<?php foreach ($pms['messages'] as $pm) { ?>
		<div id="thread">
			<a href ="?action=viewpm&pmid=<?=$pm['id']?>">
			<div id="title"><h2><?=$pm['title']?></h2></div>
			</a>
			<div id="info"><h3><b><?=$pm['sender']?></b></div>
		</div>
		<div style="display:block;height: 1px;width: 100%;background: #999;"></div> 
	<?php } ?>
	</div>
	<?php
} elseif (isset($_GET['pmid'])) {
	require_once("nbbc.php");
	/*{
    "userid": 111552,
    "username": "Hey0",
    "time": "1 week ago",
    "usertitle": "",
    "message": "derp",
    "avatar": "\/avatar\/111552.png?garryis=awesome",
    "status": "old"
	}*/
	$pm = $api->getPM($_GET['pmid']);
	if ($pm != null) {
		
		echo "<div class=\"oddpost\"><h4 ".(ISSET($_COOKIE['avatars'])?'style="padding-left:0px;"':"style=\"-webkit-background-size:40px auto;-o-background-size:40px auto;-moz-background-size:40px auto;background-size:40px auto;background-position:0px center;background-repeat:no-repeat;background-image:url(http://www.facepunch.com/avatar/".$pm["userid"].".png);\"").">".$pm['username']."<div style=\"float:right;\">".$datetext."</div><div id=\"userTitle\">".(!EMPTY($thread['usertitle'])?optimizeUserTitleSize($thread['usertitle']):'')."</div></h4><h5>";
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
		$input = $pm['message'];
		$output = $bbcode->Parse($input);
		echo html_entity_decode($output);
		echo "</h5>";
		echo "</div>";
	}
}

forumFooter();

?>