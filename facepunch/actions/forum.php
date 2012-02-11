<?php
if (!defined('fp'))
	return;

forumHeader();

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$index = $api->getForums();
$result = $api->getThreads($_GET['forumid'], $page);
$subforums = getSubForums($_GET['forumid'], $index);
$arrayforum = $result[0];
$pages = $result[1];

echo "<div id=\"forumWrapper\">";
echo "<div id=\"forumHeader\">".linkStuff("<div class=\"leftButton\">Home</div>","./?action=frontpage");
echo linkStuff("<div class=\"leftButton\">Popular</div>",'?action=popular');
echo getParent($_GET["forumid"],$index,0);
if (!EMPTY($subforums) && $_GET['forumid'] != 345) {
	if (!ISSET($_COOKIE[$_GET['forumid']])) {
		echo "<a href=\"javascript:;\" onmousedown=\"toggleCat('cat')\"><div id=\"minus\" class=\"rightButton\" style=\"display: block; \">Collapse</div></a><a href=\"javascript:;\" onmousedown=\"toggleCat('cat')\"><div id=\"plus\" class=\"rightButton\" style=\"display: none; \">Expand</div></a>";
	} else {
		echo "<a href=\"javascript:;\" onmousedown=\"toggleCat('cat')\"><div id=\"minus\" class=\"rightButton\" style=\"display: none; \">Collapse</div></a><a href=\"javascript:;\" onmousedown=\"toggleCat('cat')\"><div id=\"plus\" class=\"rightButton\" style=\"display: block; \">Expand</div></a>";
	}
}

echo linkStuff("<div class=\"leftButton\">Read</div>",'?action=read');
echo "</div>".tagStuff(tagStuff(getForumName($_GET['forumid'], $index),"center"),"h1");

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
		<div id=\"title\">
		<h2>".($a['locked']=='true'?'<font color="grey">':'').$a['title'].($a['locked']=='true'?'</font>':'')."</h2>";
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