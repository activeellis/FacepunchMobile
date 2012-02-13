<?php
if (!defined('fp'))
	return;

forumHeader();

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$index = $api->getForums();
$arrayforum = $api->getThreads($_GET['forumid'], $page);
$subforums = getSubForums($_GET['forumid'], $index);
$pages = $arrayforum['numpages'];

echo "<div id=\"forumWrapper\">";
$returnid = getParent($_GET["forumid"],$index,0);


if (!EMPTY($subforums) && $_GET['forumid'] != 345) { 
	if (!ISSET($_COOKIE[$_GET['forumid']])) {
		echo "<a href=\"javascript:;\" onmousedown=\"toggleCat('cat')\"><div id=\"minus\" class=\"rightButton\" style=\"display: block; \">Collapse</div></a><a href=\"javascript:;\" onmousedown=\"toggleCat('cat')\"><div id=\"plus\" class=\"rightButton\" style=\"display: none; \">Expand</div></a>";
	} else {
		echo "<a href=\"javascript:;\" onmousedown=\"toggleCat('cat')\"><div id=\"minus\" class=\"rightButton\" style=\"display: none; \">Collapse</div></a><a href=\"javascript:;\" onmousedown=\"toggleCat('cat')\"><div id=\"plus\" class=\"rightButton\" style=\"display: block; \">Expand</div></a>";
	}
}
topBar(getForumName($_GET['forumid'], $index), array(
	array("left", "?action=frontpage", "Home"),
	array("left", "?action=popular", "Popular"),
	array("left", "?action=read", "Read"),
	array("right", ($returnid == 0 ? "?action=frontpage" : "?action=forum&forumid=".$returnid), "Back")));


if (ISSET($subforums)) {
	if (!ISSET($_COOKIE[$_GET['forumid']])) {
		echo "<div id=\"cat\">";
	}
	else {
		echo "<div id=\"cat\" style=\"display: none; \">";
	}
	foreach ($subforums as $k) {
		echo linkStuff(tagStuff($k['name'],"h2"),"?action=forum&forumid=".$k['id']);
		echo "</a><div id=\"er\"></div>";
	}
	echo "</div>";
}

echo getForumPageCode($arrayforum['numpages']);
echo '<div style="display:block;height: 1px;width: 100%;background: #999;"></div>';

if (!EMPTY($arrayforum['threads'])) {
	echo "<div id=\"content\">";
	foreach ($arrayforum['threads'] as $a) {
		echo "<div id=\"thread\">
		<a href =\"?action=thread&threadid=".$a['id']."&forumid=".$_GET['forumid']."\">
		<div id=\"title\">";
		if ($a['status'] == 'new')
			echo '<h2>';
		echo ($a['locked']=='true'?'<font color="grey">':'').$a['title'].($a['locked']=='true'?'</font>':'');
		if ($a['status'] == 'new')
			echo '</h2>';
		echo "</div>
		</a>";
		if ($a['pages'] > 1) {
			echo '<div id="threadPagecode">( '.pageCode($a['id'],$a['pages']).' )</div>';
		}			
		echo "<div id=\"info\"><h3><b>".$a['author']."</b> ".$a['replies']." repl".(intval(str_replace(",","",$a['replies']))==1 ? "y" : "ies")."<span style=\"float:right;\">".$a['lastposttime']." by ".$a['lastpostauthorname']."</span></h3>
		</div>
		</div>";
		echo '<div style="display:block;height: 1px;width: 100%;background: #999;"></div>';
	}
}
echo "</div>";

	
forumFooter();

?>