<?php 
$domain =substr($_SERVER['PHP_SELF'],0,-9);

if (!ISSET($_COOKIE['loggedin']) && (ISSET($_GET['module']) ? $_GET['module'] != "login" : true)) {
	die('<a href="./?module=login">Please login</a>');
}
else {
	if (ISSET($_COOKIE['logedin']) && !ISSET($_COOKIE['session'])) {
		relogin($_COOKIE['username'],$_COOKIE['password']);
	} 
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Facepunch</title>
<link rel="apple-touch-icon-precomposed" href="icon.png" />
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<META HTTP-EQUIV="Expires" CONTENT="Tue, 01 Jan 1980 1:00:00 GMT">
<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<script language="javascript">
function $_GET(q,s) {
	s = (s) ? s : window.location.search;
	var re = new RegExp('&'+q+'=([^&]*)','i');
	return (s=s.replace(/^\?/,'&').match(re)) ? s=s[1] : s='';
}
function createCookie(name,value,days) {
	if (days) {
		var date = new Date();
		date.setTime(date.getTime()+(days*24*60*60*1000));
		var expires = "; expires="+date.toGMTString();
	}
	else var expires = "";
	document.cookie = name+"="+value+expires+"; path=/";
}
function eraseCookie(name) {
	createCookie(name,"",-1);
}
function toggleCat(divid) {
if(document.getElementById('minus').style.display == 'block'){
	document.getElementById('minus').style.display = 'none';
	document.getElementById('plus').style.display = 'block';
	document.getElementById(divid).style.display = 'none';
	var forumid = $_GET('forumid');
	createCookie(forumid,"1",365);
}
else {
	document.getElementById('plus').style.display = 'none';
	document.getElementById('minus').style.display = 'block';
	document.getElementById(divid).style.display = 'block';
	var forumid = $_GET('forumid');
	eraseCookie(forumid);
}
}
</script>
<style>
HTML, BODY, H1, H2, H3, H4, H5, H6, DIV {
	display: block;
	margin: 0;
	padding: 0;
	font-family: HelveticaNeue, Tahoma;
	font-weight: normal;
-webkit-text-size-adjust:none;
}
a, a:link, a:visited, a:active, a:hover {
	text-decoration: none;
}
#indexHeader {
	background: #E80000;
	height: 25px;
	box-shadow: 0px 1px 4px #000;
	-webkit-box-shadow: 0px 1px 4px #000;
}
.rightButton {
	display: inline-block;
	color: #710000;
	float:right;
	font-weight: bold;
	padding: 2px;
	margin: 0 3px;
}
.leftButton {
	display: inline-block;
	color: #710000;
	float: left;
	font-weight: bold;
	padding: 2px;
	margin: 0 3px;
}
#indexWrapper h1 {
	background: #433;
	color: #eee;
	font-size: 20px;
	text-align: center;
	text-shadow: 0px 1px 1px rgba(0,0,0,0.5);
	margin: 0 5px;
	-webkit-box-shadow: 0 2px 2px #888;
	font-weight:bold;
}
#indexWrapper h2 {
	font-size: 20px;
	font-weight: bold;
	margin: 0 5px;
	min-height: 30px;
	line-height: 30px;
}
#indexWrapper h2 img {
	padding: 3px;
}
#indexWrapper a {
	color: #000;
}
#er {
	display:block;
	height: 1px;
	width: 100%;
	background: #aaa;

}
#forumHeader {
	background: #E80000;
	height: 25px;
	box-shadow: 0px 1px 4px #000;
	-webkit-box-shadow: 0px 1px 4px #000;
}
#forumWrapper h1 {
	white-space: nowrap;
	overflow: hidden;
	text-overflow: ellipsis;
	background: #433;
	color: #eee;
	font-size: 20px;
	text-align: center;
	text-shadow: 0px 1px 1px rgba(0,0,0,0.5);
	margin: 0 5px;
	-webkit-box-shadow: 0 2px 2px #888;
	font-weight:bold;
	padding: 0 3px;
}
#cat h2 {
	font-size: 20px;
	font-weight: bold;
	margin: 0 5px;
}
#cat a {
	color:#000;
}
#page {
	font-size: 20px;
	margin: 3px 0;
}
#page a {
	color: #417394;
}
#thread {
	margin: 3px 5px;
	background: #fff;
	border-radius: 2px 2px 2px 2px;
}
#thread #title {
	display:inline;
}
#thread #title h2 {
	display:inline;
	font-size: 15px;
	font-weight:bold;
	color: #036;
}
#thread #threadPagecode {
	display:inline;
	font-size:13px;
	color:#036;
	font-weight:normal;
	line-height:1.230;
}
#thread #threadPagecode a{
	color:#147!important;
}
#thread a {
	color: #000;
}
#thread #info h3 {
	font-size: 10px;
	color: black;
	font-weight: normal;
}
#threadHeader {
	background: #E80000;
	height: 25px;
	width: 100%;
	box-shadow: 0px 1px 4px #000;
	-webkit-box-shadow: 0px 1px 4px #000;
}
#threadWrapper h1 {
	white-space: nowrap;
	overflow: hidden;
	text-overflow: ellipsis;
	background: #433;
	color: #eee;
	font-size: 20px;
	text-align: center;
	text-shadow: 0px 1px 1px rgba(0,0,0,0.5);
	margin: 0 5px;
	box-shadow: 0 2px 2px #888;
	-webkit-box-shadow: 0 2px 2px #888;
	font-weight:bold;
	padding: 0 3px;
}
#forumContainer {
	min-height: 30px;
	display:inline-block;
	margin: 0 5px;
}
#forumIconContainer {
	height: 28px;
	width: 28px;
	display:inline-block;

}
#forumIconContainer img {
	margin: 2px;
}
#forumTitleContainer {
	display:inline-block;
	font-weight:bold;
	color: #036;
	line-height: 30px;
	font-size: 17px;
	padding-left: 35px;
}
.oddpost, .evenpost {
	position: relative;
	padding: 0 5px;
	min-height: 100px;
}
.oddpost a, .evenpost a {
	color: #147;
	word-wrap: break-word;
}
.oddpost h4, .evenpost h4 {
	font-size: 13px;
	font-weight:bold;
	padding: 5px 0 5px 0;
	min-height: 40px;
	padding-left: 45px;
}
.evenpost {
	background-color: #f9f9f9;
}
.oddpost h5, .evenpost h5 {
	word-wrap:break-word;
}
.oddpost img, .evenpost img {
	max-width: 100%;
}
.media_youtube .message {
	display:none;
}
.media_youtube .infobar a {

	text-indent: -1999px;
	background: transparent;
	background-image: url('play.jpg');
	display:block;
	overflow:hidden;
	height: 72px;
	width: 72px;
	box-shadow: 0 2px 3px #888;
	-webkit-box-shadow: 0 2px 3px #888;
	margin: 0 auto;
}
.bbcode_quote {
	background: #DFEAF2;
	padding: 2px;
	border: 1px solid #aaa;
	border-radius: 1px;
	margin: 2px 0;
}
.bbcode_quote_head {
	font-weight: bold;
	color: #147;
}
.bbcode_quote_body img {
	max-width: 25%;
}
.bbcode_code, .cpp, .csharp, .html, .php {
    word-wrap: break-word;
    width: 100%;
    background: #EEE;
    border: 1px solid #ddd;
}
.bbcode_container, .bbcode_description {
    background: transparent;
}
#notice {
    text-align: center;
    background: #FFC;
}
#ratings {
	margin: 0 0 2px 0;
	display: block;
	position: absolute;
	bottom: 0;
	font-size: 12px;
	color: #888;
}
#ratings img {
	margin: 0 2px 0 5px;
	max-width: 12px;
	max-height: 12px;
}
#ratingWrapper {
	display:block;
	height: 25px;
}
.highlight {
	color: red;
}
.h2 {
	font-weight:bold;
	font-size:123.1%;
	margin:0.5em 0;
	display: block;
}
.release {
	margin: 5px 10px;
	padding: 8px;
	border: 1px #FCFAF2 solid;
	background: -webkit-gradient(linear, left top, right bottom, from(#F9F7ED), to(#E9E7DD));
	color: #36393D;
	box-shadow: 2px 1px 4px #aaa !important;
	-webkit-box-shadow: 2px 1px 4px #aaa !important;
	-moz-border-radius: 8px;
	border-radius: 8px;
	display: table;
}
.release .h2 {
	margin-top: 0;
	padding-top: 0;
	font-size: 34px;
	letter-spacing: -3px;
	color: #555;
	text-shadow: 0px 0px 4px rgba( 255, 255, 255, 1) !important;
}
.bbcode_img_thumb {
	max-width: 25% !important;
}
#login label {
	margin-top: 5px;
	display:block;
	width: 90%;
	margin: 0 auto;
}
#login input {
	display:block;
	width: 90%;
	margin: 0 auto;
	-webkit-border-radius: 10px;
	-border-radius: 10px;
	-moz-border-radius: 10px;
	padding: 3px;
	background-color: #f9f9f9;
}
#login input[type=submit] {
	margin-top:5px;
	width: 100px;
}
#reply textarea {
	display: block;
	margin: 0 auto;
	width: 95%;
	min-height: 140px;
	-webkit-border-radius: 5px;
	-border-radius: 5px;
	-moz-border-radius: 5px;
	font-size: 15px;
}
#reply input[type=submit] {
	margin: 5px 0;
	position: right;
	width: 100px;
	min-height: 0px !important;
}
</style>
</head>
<body>
<?php
		$ratings = array(1=>"tick",2=>"cross",3=>"funny2",4=>"information",5=>"heart",6=>"wrench",7=>"rainbow",8=>"palette",9=>"clock",10=>"spellcheck",11=>"book_error",12=>"box",13=>"zing",14=>"programming_king",15=>"weed",16=>"lua_king",17=>"mapping_king",18=>"winner",19=>"lua_helper",20=>"nipple",21=>"moustache");
		function pageCode($threadid,$pages) {
			if($pages<=9){
				$threadpagecode = '';
				for($i=2;$i<=$pages;$i++) {
					$threadpagecode .= '<a href="?action=thread&threadid='.$threadid.'&page='.$i.(isset($_GET['forumid']) ? '&forumid='.$_GET['forumid'] : '').'">'.$i.($i==$pages?' Last':'').'</a>';
					if ($i != $pages) {
						$threadpagecode .= ' ';
					}
				}
			}
			if ($pages > 9) {
				$threadpagecode='<a href="?action=thread&threadid='.$threadid.'&page=2">2</a> <a href="?action=thread&threadid='.$threadid.'&page=3'.(isset($_GET['forumid']) ? '&forumid='.$_GET['forumid'] : '').'">3</a> <a href="?action=thread&threadid='.$threadid.'&page=4'.(isset($_GET['forumid']) ? '&forumid='.$_GET['forumid'] : '').'">4</a> <a href="?action=thread&threadid='.$threadid.'&page=5'.(isset($_GET['forumid']) ? '&forumid='.$_GET['forumid'] : '').'">5</a> .. ';
				for ($i=$pages-3;$i<=$pages;$i++) {
					$threadpagecode .= '<a href="?action=thread&threadid='.$threadid.'&page='.$i.(isset($_GET['forumid']) ? '&forumid='.$_GET['forumid'] : '').'">'.$i.($i==$pages?' Last':'').'</a>';
					if ($i != $pages) {
						$threadpagecode .= ' ';
					}
				}

			}
			return $threadpagecode;
		}
		function getTime($dateline) {
				$diff = time() - $dateline;
		switch ($diff) {
			case ($diff<60):
			$limit = 1;
			$case = "second";
			break;
			case ($diff<3600):
			$limit = 60;
			$case = "minute";
			break;
			case ($diff<86400):
			$limit = 3600;
			$case = "hour";
			break;
			case ($diff<604800):
			$limit = 86400;
			$case = "day";
			break;
			default:
			$case = "normal";
		}
		if ($case == "normal") {
			return date('jS F Y',$dateline);
		}
		else {
			return (round($diff/$limit) == 1 ? ($case == "hour" ? "an" : "a") : round($diff/$limit))." ".$case.(round($diff/$limit) == 1 ? "" : "s")." ago";
		}
		}
function requestArray($field_strings) {
	if (ISSET($_COOKIE['loggedin'])) {
		$username = $_COOKIE['username'];
		$password = $_COOKIE['password'];
		$field_strings.='&username='.$username."&password=".$password;
	}
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,'http://api.facepun.ch/?'.$field_strings);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	$result = curl_exec($ch);
	curl_close($ch);
	return json_decode($result,true);
}
function fetchForum($type) {
	$fields = 1;
	$field_strings = 'action=';
	if ($type == 1) {
		$field_strings .="getforums";
	}
	elseif ($type == 2) {
		$field_strings .="getthreads";
		$fields++;
		$field_strings .= '&forum_id='.$_GET["forumid"];
	}
	$array = requestArray($field_strings);
	return $array;
}
function fetchThread($type) {
	$fields = 1;
	$field_strings = 'module=thread';
	if ($type == 1) {
		$fields++;
		$field_strings .= '&forumid='.$_GET["forumid"];
		if (ISSET($_GET["page"])) {
			$fields++;
			$field_strings .= '&page='.$_GET["page"];
		}
	}
	elseif ($type == 2) {
		$fields++;
		$field_strings .= '&threadid='.$_GET["threadid"];
	}
	$array = requestArray($field_strings);
	return $array;
}
function fetchPost() {
	$fields = 3;
	$field_strings = 'action=getposts&thread_id='.$_GET["threadid"];
	if (ISSET($_GET["page"])) {
		$fields++;
		$field_strings .= '&page='.$_GET["page"];
	}
	$array = requestArray($field_strings);
	return $array;
}
function fetchPopular() {
	$fields = 1;
	$field_strings = 'action=getpopularthreads';
	$array = requestArray($field_strings);
	return $array;
}
function fetchRead() {
	$fields = 1;
	$field_strings = 'action=getreadthreads';
	$array=requestArray($field_strings);
	return $array;
}
function getParent($forumid, $index, $returnid) {
	if (ISSET($index['forums'])) {
		foreach ($index['forums'] as $array) {
			if ($array['id'] == $forumid) {
				if (!in_array($returnid, array(0, 3, 398, 11, 197, 386, 348, 228, 392))) {
					echo "<a href=\"?module=thread&forumid=".$returnid."\"><div class=\"rightButton\">Back</div></a>";
				} else if ($returnid == 0) {
					echo "<a href=\"?module=forum\"><div class=\"rightButton\">Back</div></a>";
				}
			}
			elseif (ISSET($array['forums'])) {
				getParent($forumid, $array, $array['id']);
			}
		}
	} else {
		foreach ($index['categories'] as $array) {
			getParent($forumid, $array, 0);
		}
	}
}
function getForumName($forumid, $index) {
	if (ISSET($index['forums'])) {
		foreach ($index['forums'] as $array) {
			if ($array['id'] == $forumid) {
				return $array['name'];
			}
			elseif (ISSET($array['forums'])) {
				return getForumName($forumid, $array);
			}
		}
	} else {
		foreach ($index['categories'] as $array) {
			return getForumName($forumid, $array);
		}
	}
}
function tagStuff ($string, $tag) {
	return "<".$tag.">".$string."</".$tag.">";
}
function linkStuff ($string, $link) {
	return "<a href=\"".$link."\">".$string."</a>";
}
function getForumPageCode($pagenumber) {
	$currentpage = (ISSET($_GET['page']) ? $_GET['page'] : 1);
	if ($pagenumber == 1) {
		$pagecode = '';
	}
	elseif (($pagenumber <= 10) || ($currentpage <= 9)) {
		$limit = ($pagenumber < 10 ? $pagenumber : 10);
		$pagecode = '<div id="page"><center>';
		for ($i=1;$i<=$limit;$i++) {
			if ($i == $currentpage) {
				$pagecode .= '<b>'.$i.'</b>';
			}
			else {
				$pagecode .= linkStuff($i,"?module=thread&forumid=".$_GET['forumid']."&page=".$i);
			}
			if ($i < $limit) {
				$pagecode .= ' ';
			}
		}
		$pagecode .= '</center></div>';
	}
	elseif ($currentpage >= 999) {
		$pagecode = '<div id="page"><center>';
		$pagecode .= linkStuff(First,"?module=thread&forumid=".$_GET['forumid']."&page=1")." ";
		for ($i=$currentpage-2;$i<=$currentpage+1;$i++) {
			if ($i == $currentpage) {
				$pagecode .= '<b>'.$i.'</b>';
			}
			else {
				$pagecode .= linkStuff($i,"?module=thread&forumid=".$_GET['forumid']."&page=".$i);
			}
			if ($i < $currentpage+1) {
				$pagecode .= ' ';
			}
		}
		$pagecode .= '</center></div>';
	}
	elseif ($currentpage >= 99) {
		$pagecode = '<div id="page"><center>';
		$pagecode .= linkStuff(First,"?module=thread&forumid=".$_GET['forumid']."&page=1")." ";
		for ($i=$currentpage-3;$i<=$currentpage+1;$i++) {
			if ($i == $currentpage) {
				$pagecode .= '<b>'.$i.'</b>';
			}
			else {
				$pagecode .= linkStuff($i,"?module=thread&forumid=".$_GET['forumid']."&page=".$i);
			}
			if ($i < $currentpage+1) {
				$pagecode .= ' ';
			}
		}
		$pagecode .= '</center></div>';
	}
	else {
		$pagecode = '<div id="page"><center>';
		$pagecode .= linkStuff(First,"?module=thread&forumid=".$_GET['forumid']."&page=1")." ";
		for ($i=$currentpage-5;$i<=$currentpage+1;$i++) {
			if ($i == $currentpage) {
				$pagecode .= '<b>'.$i.'</b>';
			}
			else {
				$pagecode .= linkStuff($i,"?module=thread&forumid=".$_GET['forumid']."&page=".$i);
			}
			if ($i < $currentpage+1) {
				$pagecode .= ' ';
			}
		}
		$pagecode .= '</center></div>';
	}
	return $pagecode;
}
function getThreadPageCode($pagenumber) {
	$currentpage = (ISSET($_GET['page']) ? $_GET['page'] : 1);
	$currentthread = $_GET['threadid'];
	if ($pagenumber == 1) {
		$pagecode = '';
	}
	elseif ($pagenumber <= 10 || ($currentpage <= 9 && $currentpage >= 1)) {
		$limit = ($pagenumber < 10 ? $pagenumber : 10);
		$pagecode = '<div id="page"><center>';
		for ($i=1;$i<=$limit;$i++) {
			if ($i == $currentpage) {
				$pagecode .= '<b>'.$i.'</b>';
			}
			else {
				$pagecode .= linkStuff($i,"?module=post&threadid=".$currentthread."&page=".$i."&forumid=".$_GET['forumid']);
			}
			if ($i < $limit) {
				$pagecode .= ' ';
			}

		}
		if ($pagenumber > 10) {
			$pagecode .= ' '.linkStuff('Last',"?module=post&threadid=".$currentthread."&page=".$pagenumber."&forumid=".$_GET['forumid']);
		}
		$pagecode .= '</center></div>';
	}
	elseif ($currentpage >= 99) {
		$pagecode = '<div id="page"><center>';
		$pagecode .= linkStuff('First',"?module=post&threadid=".$currentthread."&page=1"."&forumid=".$_GET['forumid']).' ';
		for ($i=$currentpage-2;$i<=$currentpage+2;$i++) {
			if ($pagenumber == $i) {
				break;
			}
			if ($i == $currentpage) {
				$pagecode .= '<b>'.$i.'</b>';
			}
			else {
				$pagecode .= linkStuff($i,"?module=post&threadid=".$currentthread."&page=".$i."&forumid=".$_GET['forumid']);
			}
			if ($i < $currentpage+2) {
				$pagecode .= ' ';
			}
		}
		if ($currentpage != $pagenumber) {
			$pagecode .= ' '.linkStuff('Last',"?module=post&threadid=".$currentthread."&page=".$pagenumber."&forumid=".$_GET['forumid']);
		}
		elseif ($currentpage == $pagenumber) {
			$pagecode .= ' <b>'.$currentpage.'</b>';
		}
		$pagecode .= '</center></div>';
	}
	else {
		$pagecode = '<div id="page"><center>';
		$pagecode .= linkStuff('First',"?module=post&threadid=".$currentthread."&page=1"."&forumid=".$_GET['forumid']).' ';
		for ($i=$currentpage-3;$i<=$currentpage+3;$i++) {
			if ($pagenumber == $i) {
				break;
			}
			if ($i == $currentpage) {
				$pagecode .= '<b>'.$i.'</b>';
			}
			else {
				$pagecode .= linkStuff($i,"?module=post&threadid=".$currentthread."&page=".$i."&forumid=".$_GET['forumid']);
			}
			if ($i < $currentpage+3) {
				$pagecode .= ' ';
			}
		}
		if ($currentpage != $pagenumber) {
			$pagecode .= ' '.linkStuff('Last',"?module=post&threadid=".$currentthread."&page=".$pagenumber."&forumid=".$_GET['forumid']);
		}
		elseif ($currentpage == $pagenumber) {
			$pagecode .= ' <b>'.$currentpage.'</b>';
		}
		$pagecode .= '</center></div>';
	}
	return $pagecode;
}
/*
function removeStyleHeight($post) {
	$array = array('style="height:213.328px;"','style="height:413.323px;"','style="height:199.995px;"','style="height:173.329px;"','style="height:146.663px;"');
	return str_replace($array,'',$post);
}
*/
function removeStyleHeight($post) {
	$pattern = 'style="height:[1-9]+.[1-9]+px;"';
	$replacement = '';
	return preg_replace("/$pattern/siU",$replacement,$post);
}
function optimizeUserTitleSize($usertitle) {
	$pattern = 'size=\"??\+?[0-9]\"??';
	$replacement = 'style="font-size:12px;"';
	return preg_replace("/$pattern/iU",$replacement,$usertitle);
}


if (isset($_GET["module"])) {
	$module = $_GET["module"];
	if ($module == 'forum') {
		$array = fetchForum(1);
	}
	elseif ($module == 'thread') {
		if (isset($_GET["forumid"])) {
			$array = fetchThread(1);
		}
	}
	elseif ($module == 'post') {
		if (isset($_GET["threadid"])) {
			$array = fetchPost();
		}
	}
	elseif ($module == 'popular') {
		$array = fetchPopular();
	}
	elseif ($module == 'read') {
		$array = fetchRead();
	}
}
else {
	$module = "forum";
	$array = fetchForum(1);
}
switch ($module) {
	case "forum":
	if (ISSET($array)) {
		echo "<div id=\"indexWrapper\">";
		echo "<div id=\"indexHeader\">".linkStuff("<div class=\"rightButton\">Settings</div>",'?module=settings');
		echo linkStuff("<div class=\"rightButton\">Popular</div>",'?module=popular');
		if (!ISSET($_COOKIE['loggedin'])) {
			echo linkStuff("<div class=\"leftButton\">Login</div>",'?module=login');
		}
		elseif (ISSET($_COOKIE['loggedin'])) {
			echo linkStuff("<div class=\"leftButton\">Read</div>",'?module=read');
			echo linkStuff("<div class=\"leftButton\">Re-login</div>",'?module=login');
		}
		echo "</div>";
		foreach ($array['categories'] as $a) {
			echo "<h1>".$a['name']."</h1>";
			$n = count($a['forums'])-1;
			for ($i=0;$i<=$n;$i++) {
				echo '<a href="?module=thread&forumid='.$a['forums'][$i]['id'].'"><div '.(ISSET($_COOKIE['forumicons'])?'':'style="background-position:6px center;background-repeat: no-repeat;background-image:url('.$domain.'forumicons/'.$a['forums'][$i]['id'].'.png)"').' id="forumContainer"><div '.(ISSET($_COOKIE['forumicons'])?'style="padding-left:0px!important;"':'').' id="forumTitleContainer">'.$a['forums'][$i]['name'].'</div></div></a>';
				if ($i<$n) {
					echo "<div id=\"er\"></div>";
				}
			}
		}
		echo "</div>";
	}
	break;
	case "thread":
	if ($_GET['forumid'] == 56) {
		echo "what are you doing is highly illegal";
		break;
	}
	$index = fetchForum(1);
	$arrayforum = fetchForum(2);
	echo "<div id=\"forumWrapper\">";
	echo "<div id=\"forumHeader\">".linkStuff("<div class=\"leftButton\">Home</div>",$domain);
	echo linkStuff("<div class=\"leftButton\">Popular</div>",'?module=popular');
	echo getParent($_GET["forumid"],$index,0);
	if ((!EMPTY($arrayforum['forums'][0]['forums'])) && $arrayforum['forums'][0]['forumid'] != 345) {
		if (!ISSET($_COOKIE[$arrayforum['forums'][0]['forumid']])) {
			echo "<a href=\"javascript:;\" onmousedown=\"toggleCat('cat')\"><div id=\"minus\" class=\"rightButton\" style=\"display: block; \">Collapse</div></a><a href=\"javascript:;\" onmousedown=\"toggleCat('cat')\"><div id=\"plus\" class=\"rightButton\" style=\"display: none; \">Expand</div></a>";
		}
		else {
			echo "<a href=\"javascript:;\" onmousedown=\"toggleCat('cat')\"><div id=\"minus\" class=\"rightButton\" style=\"display: none; \">Collapse</div></a><a href=\"javascript:;\" onmousedown=\"toggleCat('cat')\"><div id=\"plus\" class=\"rightButton\" style=\"display: block; \">Expand</div></a>";
		}
	}
	if (ISSET($_COOKIE['loggedin'])) {
		echo linkStuff("<div class=\"leftButton\">Read</div>",'?module=read');
	}
	echo "</div>".tagStuff(tagStuff(getForumName($_GET['forumid'], $index),"center"),"h1");
	if (ISSET($arrayforum['forums'][0]['forums'])) {
		if (!ISSET($_COOKIE[$arrayforum['forums'][0]['forumid']])) {
			echo "<div id=\"cat\">";
		}
		else {
			echo "<div id=\"cat\" style=\"display: none; \">";
		}
		foreach ($arrayforum['forums'][0]['forums'] as $k) {
			echo linkStuff(tagStuff($k['title'],"h2"),"?module=thread&forumid=".$k['forumid']);
			echo "</a><div id=\"er\"></div>";
		}
		echo "</div>";
	}
	$pagecode = getForumPageCode($arrayforum['numpages']);
	echo $pagecode;
	echo '<div style="display:block;height: 1px;width: 100%;background: #999;"></div>';
	
	if (!EMPTY($arrayforum['threads'])) {
		echo "<div id=\"content\">";
		foreach ($arrayforum['threads'] as $a) {
			/*echo "<div id=\"thread\"><div id=\"normal\"><a href =\"?module=post&threadid=".$a['threadid']."\"><span id=\"hover\"><h2>".($a['locked']=='true'?'<font color="grey">':'').$a['title'].($a['locked']=='true'?'</font>':'')."</h2><h3><b>".$a['username']."</b> ".$a['replycount']." repl".($a['replycount']==1 ? "y" : "ies")."</h3></span></a></div><a href=\"?module=post&threadid=".$a['threadid']."&page=".$a['pages']."\"><div id=\"last\">>></div></a></div><div id=\"er\"></div>";
			*/
			echo "<div id=\"thread\">
			<a href =\"?module=post&threadid=".$a['id']."&forumid=".$_GET['forumid']."\">
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
			echo "<div id=\"info\"><h3><b>".$a['author']."</b> ".$a['replies']." repl".(intval(str_replace(",","",$a['replies']))==1 ? "y" : "ies")."<span style=\"float:right;\">".$a['lastposttime']." by ".$a['lastpostauthorname']."</span></h3>
			</div>
			</div>";
			echo '<div style="display:block;height: 1px;width: 100%;background: #999;"></div>';
		}
	echo "</div>";
	echo $pagecode;
	echo "</div>";
	}
	break;
	case "post":
	require_once('nbbc.php');
	$returnid = $_GET['forumid']; //todo: add this to GET request so.
	if ($returnid == 56) {
		echo 'what you are doing is highly illegal';
		break;
	}
	echo "<div id=\"threadWrapper\"><div id=\"threadHeader\">".linkStuff("<div class=\"leftButton\">Home</div>",$domain);
	echo linkStuff("<div class=\"leftButton\">Popular</div>",'?module=popular');
	echo "<a href=\"?module=thread&forumid=".$returnid."\"><div class=\"rightButton\">Back</div></a></div>";
	echo tagStuff(tagStuff($array['title'],"center"),"h1");
	$pagecode = getThreadPageCode($array['numpages']);
	echo $pagecode;
	$oddeven = 1;
	$wut= 0;
	foreach ($array['posts'] as $thread) {
		if(!EMPTY($pagecode) || $wut == 1) {
			echo '<div id="er"></div>';
		}
		$wut = 1;
		$datetext = $thread["time"];
		echo "<div class=\"";
		if ($oddeven == 1) {
			echo "oddpost";
			$oddeven = 2;
		}
		elseif ($oddeven == 2) {
			echo "evenpost";
			$oddeven = 1;
		}
		echo "\"><h4 ".(ISSET($_COOKIE['avatars'])?'style="padding-left:0px;"':"style=\"-webkit-background-size:40px auto;-o-background-size:40px auto;-moz-background-size:40px auto;background-size:40px auto;background-position:0px center;background-repeat:no-repeat;background-image:url(http://www.facepunch.com/avatar/".$thread["userid"].".png);\"").">".$thread['username']."<div style=\"float:right;\">".$datetext."</div><div id=\"userTitle\">".(!EMPTY($thread['usertitle'])?optimizeUserTitleSize($thread['usertitle']):'')."</div></h4><h5>";
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
			if(!EMPTY($pagecode)) {
			echo '<div id="er"></div>';
		}
	echo $pagecode;
	if (ISSET($_COOKIE['loggedin'])) {
		echo '<form id="reply" action="reply.php" method="post" accept-charset="UTF-8">
		<input type="hidden" name="threadid" value="'.$_GET['threadid'].'"></input>
		<input type="hidden" name="page" value="'.(ISSET($_GET['page']) ? $_GET['page'] : 1).'"></input>
		<textarea type="text" name="message" size="10" required></textarea>
		<input type="submit" value="Reply" name="reply" class="reply" />
		</form>';
	}
	echo "</div>";
	break;
	case "settings":
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
	/*
	echo "Display thread icons?";
	if (!ISSET($_COOKIE['threadicons'])) { 
		echo "<div id=\"yesthreadicons\"><a href=\"javascript:;\" onmousedown=\"createCookie('threadicons','1',365); document.getElementById('yesthreadicons').style.display = 'none'; document.getElementById('nothreadicons').style.display = 'block'; \">Turn off</a></div><div id=\"nothreadicons\" style=\"display:none;\"><a href=\"javascript:;\" onmousedown=\"eraseCookie('threadicons'); document.getElementById('nothreadicons').style.display = 'none'; document.getElementById('yesthreadicons').style.display = 'block';\">Turn on</a></div>";
	}
	else {
		echo "<div id=\"yesthreadicons\" style=\"display:none;\"><a href=\"javascript:;\" onmousedown=\"createCookie('threadicons','1',365); document.getElementById('yesthreadicons').style.display = 'none'; document.getElementById('nothreadicons').style.display = 'block'; \">Turn off</a></div><div id=\"nothreadicons\"><a href=\"javascript:;\" onmousedown=\"eraseCookie('threadicons'); document.getElementById('nothreadicons').style.display = 'none'; document.getElementById('yesthreadicons').style.display = 'block';\">Turn on</a></div>";
	}
	*/
	echo linkStuff('Done',$domain);
	break;
	case "popular":
	echo "<div id=\"forumWrapper\"><div id=\"forumHeader\">".linkStuff("<div class=\"leftButton\">Home</div></div>",$domain).tagStuff(tagStuff('Popular',"center"),"h1")."</div>";
	if (!EMPTY($array['threads'])) {
		echo "<div id=\"content\">";
		foreach ($array['threads'] as $a) {
			echo "<div id=\"thread\">
			<a href =\"?module=post&threadid=".$a['id']."\">
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
	break;
	case "read":
	echo "<div id=\"forumWrapper\"><div id=\"forumHeader\">".linkStuff("<div class=\"leftButton\">Home</div></div>",$domain).tagStuff(tagStuff('Read',"center"),"h1")."</div>";
	if (!EMPTY($array['threads'])) {
		echo "<div id=\"content\">";
		foreach ($array['threads'] as $a) {
			echo "<div id=\"thread\">
			<a href =\"?module=post&threadid=".$a['id']."\">
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
	break;
	case "login":
	echo "<div id=\"indexWrapper\">";
		echo "<div id=\"indexHeader\">".linkStuff("<div class=\"rightButton\">Settings</div>",'?module=settings').(ISSET($_COOKIES['loggedin']) ? linkStuff("<div class=\"rightButton\">Logout</div>",'logout.php') : "");

		echo linkStuff("<div class=\"rightButton\">Popular</div>",'?module=popular');
		echo linkStuff("<div class=\"leftButton\">Home</div></div>",$domain);
		echo "</div>";
		echo '<form id="login" action="login.php" method="post" accept-charset="UTF-8">
		<label>Username:</label>
		<input type="text" name="username" />
		<label>Password:</label>
		<input type="password" name="password"  />
		<input type="submit" value="Login" name="submit" class="submit" />
		</form>';
		break;
} 

?>
</body>
</html>