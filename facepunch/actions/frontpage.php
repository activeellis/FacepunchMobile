<?php
if (!defined('fp'))
	return;

forumHeader();

$categories = $api->getForums();

topBar(null, array(
	array("left", "?action=read", "Read"),
	array("left", "?action=login", "Re-login"),
	array("right", "?action=settings", "Settings"),
	array("right", "?action=popular", "Popular"),
	array("right", "?action=privatemessages", "<img src='pm.png'\>")));

foreach ($categories['categories'] as $a) {
	echo "<h1>".$a['name']."</h1>";
	$n = count($a['forums'])-1;
	for ($i=0;$i<=$n;$i++) {
		echo '<a href="?action=forum&forumid='.$a['forums'][$i]['id'].'"><div '.(ISSET($_COOKIE['forumicons'])?'':'style="background-position:6px center;background-repeat: no-repeat;background-image:url(forumicons/'.$a['forums'][$i]['id'].'.png)"').' id="forumContainer"><div '.(ISSET($_COOKIE['forumicons'])?'style="padding-left:0px!important;"':'').' id="forumTitleContainer">'.$a['forums'][$i]['name'].'</div></div></a>';
		if ($i<$n) {
			echo "<div id=\"er\"></div>";
		}
	}
}
echo "</div>";

forumFooter();

?>