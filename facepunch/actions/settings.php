<?php
if (!defined('fp'))
	return;

forumHeader();

echo "<div id=\"threadWrapper\"><div id=\"threadHeader\">".linkStuff("<div class=\"leftButton\">Home</div>","./?action=frontpage");
echo linkStuff("<div class=\"leftButton\">Popular</div>",'?action=popular');
echo "</div><center>";

function createOption($cookiename,$optionname) {
	echo 'Display '.$optionname;
	if (!ISSET($_COOKIE[$cookiename])) {
		echo "<div id=\"yes".$cookiename."\"><a href=\"javascript:;\" onmousedown=\"createCookie('".$cookiename."','1',365); document.getElementById('yes".$cookiename."').style.display = 'none'; document.getElementById('no".$cookiename."').style.display = 'block'; \">Turn off</a></div><div id=\"no".$cookiename."\" style=\"display:none;\"><a href=\"javascript:;\" onmousedown=\"eraseCookie('".$cookiename."'); document.getElementById('no".$cookiename."').style.display = 'none'; document.getElementById('yes".$cookiename."').style.display = 'block';\">Turn on</a></div>";
	}
	else {
		echo "<div id=\"yes".$cookiename."\" style=\"display:none;\"><a href=\"javascript:;\" onmousedown=\"createCookie('".$cookiename."','1',365); document.getElementById('yes".$cookiename."').style.display = 'none'; document.getElementById('no".$cookiename."').style.display = 'block'; \">Turn off</a></div><div id=\"no".$cookiename."\"><a href=\"javascript:;\" onmousedown=\"eraseCookie('".$cookiename."'); document.getElementById('no".$cookiename."').style.display = 'none'; document.getElementById('yes".$cookiename."').style.display = 'block';\">Turn on</a></div>";
	}
}
createOption('images','images');
createOption('forumicons','forum icons');
createOption('avatars','avatars');
createOption('ratings','ratings');
//createOption('threadicons','thread icons');
echo linkStuff('Done',"./?action=frontpage");
echo "</center>";

forumFooter();

?>