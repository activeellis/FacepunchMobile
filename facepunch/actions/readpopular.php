<?php
if (!defined('fp'))
	return;

forumHeader();

$threads = ($action == "read" ? $api->getReadThreads() : $api->getPopularThreads());

topBar($action == "read" ? 'Read' : 'Popular', array(
		array("left", "?action=frontpage", "Home"),
		array("right", "?action=settings", "Settings")));

if (!EMPTY($threads['threads'])) {
	echo "<div id=\"content\">";
	foreach ($threads['threads'] as $a) {
		echo "<div id=\"thread\">
		<a href =\"?action=thread&threadid=".$a['id']."\">
		<div id=\"title\">
		<h2>".($a['locked']=='true'?'<font color="grey">':'').$a['title'].($a['locked']=='true'?'</font>':'')."</h2>";
		echo "</div>
		</a>";
		if($a['pages']>1){
			$threadpagecode = pageCode($a['id'],$a['pages']);
			echo '<div id="threadPagecode">( ';
			echo $threadpagecode;
			echo ' )</div>';
		}			
		echo "<div id=\"info\"><h3><b>".$a['author']."</b> ".$a['replies']." repl".(intval(str_replace(",","",$a['replies']))==1 ? "y" : "ies").' '.$a['reading']." viewing</h3>
		</div>
		</div>";
		echo '<div style="display:block;height: 1px;width: 100%;background: #999;"></div>';
	}
	echo "</div>";
}


forumFooter();

?>