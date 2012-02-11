<?php
if (!defined('fp'))
	die('');

forumHeader();

if ($action == "privatemessages") {
	$pms = $api->getPMs(isset($_GET['page']) ? $_GET['page'] : 1);
	foreach ($pms as $pm) {
		//todo
	}
} elseif (isset($_GET['pmid'])) {
	$pm = $api->getPM($_GET['pmid'])
	if ($pm != null) {
		//todo
	}
}

forumFooter();

?>