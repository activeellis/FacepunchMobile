<?php

forumHeader();

$categories = $api->getForums();

echo "<div id=\"indexWrapper\">";
echo "<div id=\"indexHeader\">".linkStuff("<div class=\"rightButton\">Settings</div>",'?action=settings');
echo linkStuff("<div class=\"rightButton\">Popular</div>",'?action=popular');
if (!ISSET($_COOKIE['loggedin'])) {
	echo linkStuff("<div class=\"leftButton\">Login</div>",'?action=login');
}
elseif (ISSET($_COOKIE['loggedin'])) {
	echo linkStuff("<div class=\"leftButton\">Read</div>",'?action=read');
	echo linkStuff("<div class=\"leftButton\">Re-login</div>",'?action=login');
}
echo "</div>";
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