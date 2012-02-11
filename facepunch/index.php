<?php

require("theme.php");
require('fpapi.php');

$api = new FPApi();
$action = isset($_GET['action']) ? $_GET['action'] : "frontpage";

$actions = array(
	"login" => "login.php",
	"frontpage" => "frontpage.php",
	"forum" => "forum.php",
	"thread" => "thread.php",
	"read" => "readpopular.php",
	"popular" => "readpopular.php",
	"settings" => "settings.php");

if (!isset($actions[$action]))
	$action = "frontpage";

if (!$api->loggedin) {
	$action = "login";
}

require("actions/".$actions[$action]);

?>