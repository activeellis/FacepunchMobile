<?php

class FPApi {
	public $loggedin = false;
	public $username = "";
	private $password = "";

	function __construct() {
		if (ISSET($_COOKIE['loggedin'])) {
			$this->loggedin = true;
			$this->username = $_COOKIE['username'];
			$this->password = $_COOKIE['password'];
		}
	}

	function requestArrayNoAuth($arguments) {
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL,'http://api.facepun.ch/?'.$arguments);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		$result = curl_exec($ch);
		curl_close($ch);
		return json_decode($result,true);
	}

	function requestArray($arguments) {
		$arguments .= "&username=".$this->username."&password=".$this->password;
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL,'http://api.facepun.ch/?'.$arguments);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		$result = curl_exec($ch);
		curl_close($ch);
		return json_decode($result,true);
	}
	
	function sendArrayPost($arguments, $postarguments, $num) {
		$arguments .= "&username=".$this->username."&password=".$this->password;
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL,'http://api.facepun.ch/?'.$arguments);
		curl_setopt($ch,CURLOPT_POST,$num);
		curl_setopt($ch,CURLOPT_POSTFIELDS,$postarguments);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		$result = curl_exec($ch);
		curl_close($ch);
		return json_decode($result,true);
	}

	function authenticate($username, $password) {
		$result = $this->requestArrayNoAuth("action=authenticate&username=".$username."&password=".$password);
		if (ISSET($result['login'])) {
			return "ok";
		} elseif (ISSET($result['error'])) {
			return $result['error'];
		} else {
			return "error";
		}
	}

	function getForums() {
		return $this->requestArray("action=getforums");
	}
	
	function getThreads($forumid, $page) {
		return $this->requestArray("action=getthreads&forum_id=".$forumid."&page=".$page);
	}
	
	function getReadThreads() {
		return $this->requestArray("action=getreadthreads");
	}
	
	function getPopularThreads() {
		return $this->requestArray("action=getpopularthreads");
	}
	
	function getPosts($threadid, $page) {
		if ($page == -1) //get new posts
			return $this->requestArray("action=getnewposts&thread_id=".$threadid);
		else
			return $this->requestArray("action=getposts&thread_id=".$threadid."&page=".$page);
	}
	
	function getPMs($page) {
		return $this->requestArray("action=getpms&page=".$page);
	}
	
	function getPM($pmid) {
		return $this->requestArray("action=getpm&pm_id=".$pmid);
	}
	
	function sendPM($recipients, $subject, $body, $icon) {
		return $this->sendArrayPost("action=newreply", "recipients=".$recipients."&subject=".$subject."&body=".$body."&icon=".$icon, 4);
	}
	
	function newThread($forumid, $subject, $body, $icon) {
		return $this->sendArrayPost("action=newreply", "forum_id=".$forumid."&subject=".$subject."&body=".$body."&icon=".$icon, 4);
	}
	
	function getQuote($postid) {
		return $this->requestArray("action=getquote&post_id=".$postid);
	}
	
	function postReply($threadid, $message) {
		return $this->sendArrayPost("action=newreply", "thread_id=".$threadid."&message=".$message, 2);
	}
	
	function getEdit($postid) {
		return $this->requestArray("action=getedit&post_id=".$postid);
	}
	
	function doEdit($postid, $message) {
		return $this->sendArrayPost("action=doedit", "post_id=".$postid."&message=".$message, 2);
	}
	
	function rate($postid, $rating, $key) {
		return $this->requestArray("action=rate&post_id=".$postid."&rating=".$rating."&key=".$key);
	}
	
	function getThreadIcons($forumid) {
		return $this->requestArray("action=getthreadicons&forum_id=".$forumid);
	}
	
	function getPMIcons() {
		return $this->requestArray("action=getpmicons");
	}
}

?>