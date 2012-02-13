<?php

function forumHeader() {
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
.quote{	-moz-border-radius: 2px;
	border-radius: 2px;margin:10px;border:1px solid #888;display:table;}.quote .message,.quote .information{background-color:#bdf;padding:10px;font-size:11px;}
.quote .information{padding:4px;font-size:10px;background-color:#ace;}
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
}

function forumFooter() {
?>
</body>
</html>
<?php
}

function tagStuff ($string, $tag) {
	return "<".$tag.">".$string."</".$tag.">";
}

function linkStuff ($string, $link) {
	return "<a href=\"".$link."\">".$string."</a>";
}

function getParent($forumid, $index, $returnid) {
	if (ISSET($index['forums'])) {
		foreach ($index['forums'] as $array) {
			if ($array['id'] == $forumid) {
				if (!in_array($returnid, array(0, 3, 398, 11, 197, 386, 348, 228, 392))) {
					return $returnid;
				} else if ($returnid == 0) {
					return 0;
				}
			}
			elseif (ISSET($array['forums'])) {
				$toret = getParent($forumid, $array, $array['id']);
				if ($toret != 0)
					return $toret;
			}
		}
	} else {
		foreach ($index['categories'] as $array) {
			$toret = getParent($forumid, $array, 0);
			if ($toret != 0)
				return $toret;
		}
	}
	return 0;
}

function getForumName($forumid, $index) {
	if (ISSET($index['forums'])) {
		foreach ($index['forums'] as $array) {
			if ($array['id'] == $forumid) {
				return $array['name'];
			}
			elseif (ISSET($array['forums'])) {
				$name = getForumName($forumid, $array);
				if ($name != "")
					return $name;
			}
		}
	} else {
		foreach ($index['categories'] as $array) {
			$name = getForumName($forumid, $array);
			if ($name != "")
				return $name;
		}
	}
}

function getSubForums($forumid, $index) {
	if (ISSET($index['forums'])) {
		foreach ($index['forums'] as $array) {
			if ($array['id'] == $forumid) {
				if (!empty($array['forums']))
					return $array['forums'];
				else
					return;
			}
			elseif (ISSET($array['forums'])) {
				$forums = getSubForums($forumid, $array);
				if ($forums != null)
					return $forums;
			}
		}
	} else {
		foreach ($index['categories'] as $array) {
			$forums = getSubForums($forumid, $array);
			if ($forums != null)
				return $forums;
		}
	}
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
				$pagecode .= linkStuff($i,"?action=forum&forumid=".$_GET['forumid']."&page=".$i);
			}
			if ($i < $limit) {
				$pagecode .= ' ';
			}
		}
		$pagecode .= '</center></div>';
	}
	elseif ($currentpage >= 999) {
		$pagecode = '<div id="page"><center>';
		$pagecode .= linkStuff(First,"?action=forum&forumid=".$_GET['forumid']."&page=1")." ";
		for ($i=$currentpage-2;$i<=$currentpage+1;$i++) {
			if ($i == $currentpage) {
				$pagecode .= '<b>'.$i.'</b>';
			}
			else {
				$pagecode .= linkStuff($i,"?action=forum&forumid=".$_GET['forumid']."&page=".$i);
			}
			if ($i < $currentpage+1) {
				$pagecode .= ' ';
			}
		}
		$pagecode .= '</center></div>';
	}
	elseif ($currentpage >= 99) {
		$pagecode = '<div id="page"><center>';
		$pagecode .= linkStuff(First,"?action=forum&forumid=".$_GET['forumid']."&page=1")." ";
		for ($i=$currentpage-3;$i<=$currentpage+1;$i++) {
			if ($i == $currentpage) {
				$pagecode .= '<b>'.$i.'</b>';
			}
			else {
				$pagecode .= linkStuff($i,"?action=forum&forumid=".$_GET['forumid']."&page=".$i);
			}
			if ($i < $currentpage+1) {
				$pagecode .= ' ';
			}
		}
		$pagecode .= '</center></div>';
	}
	else {
		$pagecode = '<div id="page"><center>';
		$pagecode .= linkStuff(First,"?action=forum&forumid=".$_GET['forumid']."&page=1")." ";
		for ($i=$currentpage-5;$i<=$currentpage+1;$i++) {
			if ($i == $currentpage) {
				$pagecode .= '<b>'.$i.'</b>';
			}
			else {
				$pagecode .= linkStuff($i,"?action=forum&forumid=".$_GET['forumid']."&page=".$i);
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
				$pagecode .= linkStuff($i,"?action=thread&threadid=".$currentthread."&page=".$i.(isset($_GET['forumid']) ? "&forumid=".$_GET['forumid'] : ""));
			}
			if ($i < $limit) {
				$pagecode .= ' ';
			}

		}
		if ($pagenumber > 10) {
			$pagecode .= ' '.linkStuff('Last',"?action=thread&threadid=".$currentthread."&page=".$pagenumber.(isset($_GET['forumid']) ? "&forumid=".$_GET['forumid'] : ""));
		}
		$pagecode .= '</center></div>';
	}
	elseif ($currentpage >= 99) {
		$pagecode = '<div id="page"><center>';
		$pagecode .= linkStuff('First',"?action=thread&threadid=".$currentthread."&page=1".(isset($_GET['forumid']) ? "&forumid=".$_GET['forumid'] : "")).' ';
		for ($i=$currentpage-2;$i<=$currentpage+2;$i++) {
			if ($pagenumber == $i) {
				break;
			}
			if ($i == $currentpage) {
				$pagecode .= '<b>'.$i.'</b>';
			}
			else {
				$pagecode .= linkStuff($i,"?action=thread&threadid=".$currentthread."&page=".$i.(isset($_GET['forumid']) ? "&forumid=".$_GET['forumid'] : ""));
			}
			if ($i < $currentpage+2) {
				$pagecode .= ' ';
			}
		}
		if ($currentpage != $pagenumber) {
			$pagecode .= ' '.linkStuff('Last',"?action=thread&threadid=".$currentthread."&page=".$pagenumber.(isset($_GET['forumid']) ? "&forumid=".$_GET['forumid'] : ""));
		}
		elseif ($currentpage == $pagenumber) {
			$pagecode .= ' <b>'.$currentpage.'</b>';
		}
		$pagecode .= '</center></div>';
	}
	else {
		$pagecode = '<div id="page"><center>';
		$pagecode .= linkStuff('First',"?action=thread&threadid=".$currentthread."&page=1".(isset($_GET['forumid']) ? "&forumid=".$_GET['forumid'] : "")).' ';
		for ($i=$currentpage-3;$i<=$currentpage+3;$i++) {
			if ($pagenumber == $i) {
				break;
			}
			if ($i == $currentpage) {
				$pagecode .= '<b>'.$i.'</b>';
			}
			else {
				$pagecode .= linkStuff($i,"?action=thread&threadid=".$currentthread."&page=".$i.(isset($_GET['forumid']) ? "&forumid=".$_GET['forumid'] : ""));
			}
			if ($i < $currentpage+3) {
				$pagecode .= ' ';
			}
		}
		if ($currentpage != $pagenumber) {
			$pagecode .= ' '.linkStuff('Last',"?action=thread&threadid=".$currentthread."&page=".$pagenumber.(isset($_GET['forumid']) ? "&forumid=".$_GET['forumid'] : ""));
		}
		elseif ($currentpage == $pagenumber) {
			$pagecode .= ' <b>'.$currentpage.'</b>';
		}
		$pagecode .= '</center></div>';
	}
	return $pagecode;
}

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

function topBar($title, $actions) {
	?>
<div id="indexWrapper">
<div id="indexHeader">
<?php
	foreach ($actions as $action) {
		if ($action[0] == "left")
			echo '<a href="'.$action[1].'"><div class="leftButton">'.$action[2].'</div></a>';
		else
			echo '<a href="'.$action[1].'"><div class="rightButton">'.$action[2].'</div></a>';
	}
?>
</div>
	<?php if ($title != null) { ?>
<center><h1><?=$title?></h1></center>
	<?php
	}
}

?>