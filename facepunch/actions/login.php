<?php

if (!isset($_POST['username'])) {
	forumHeader();
?>
<div id="indexWrapper">
<div id="indexHeader">
<a href="?action=settings"><div class="rightButton">Settings</div></a>
<?php
echo (ISSET($_COOKIES['loggedin']) ? linkStuff("<div class=\"rightButton\">Logout</div>",'?action=logout') : "");
?>
<a href="?action=popular"><div class="rightButton">Popular</div></a>
<a href="?action=frontpage"><div class="leftButton">Home</div></div></a>
</div>
<form id="login" action="?action=login" method="post" accept-charset="UTF-8">
<label>Username:</label>
<input type="text" name="username" />
<label>Password:</label>
<input type="password" name="password"  />
<input type="submit" value="Login" name="submit" class="submit" />
</form>
<?php
	forumFooter();
} else {
	$username = $_POST["username"];
	$password = md5($_POST["password"]);
	$result = $api->authenticate($username, $password);
	if ($result == "ok") {
		ob_start();
		setcookie('loggedin',1,time()+60*60*24*365);
		setcookie('username',$username,time()+60*60*24*365);
		setcookie('password',$password,time()+60*60*24*365);
		
		forumHeader();
		?>
<div id="indexWrapper">
<div id="indexHeader">
<a href="?action=settings"><div class="rightButton">Settings</div></a>
<a href="?action=popular"><div class="rightButton">Popular</div></a>
<a href="?action=frontpage"><div class="leftButton">Home</div></div></a>
</div>
<meta http-equiv="refresh" content="5; URL=./?action=frontpage">
<center>
Welcome <?=$username?><br />
You will be redirected in 5 seconds or <a href="./?action=frontpage">click here</a>
</center>
		<?php
		forumFooter();
		
		ob_end_flush();
	} else if ($result == "error") {
		echo 'An unknown error has occured. <a href="?action=login">Try again?</a>';
	} else {
		echo $result;
	}
}

forumFooter();

?>