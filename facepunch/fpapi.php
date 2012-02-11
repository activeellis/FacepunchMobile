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
		$result = $this->requestArray("action=getthreads&forum_id=".$forumid."&page=".$page);
		return array($result, $result['numpages']);
	}
	
	function getReadThreads() {
		return $this->requestArray("action=getreadthreads");
	}
	
	function getPopularThreads() {
		return $this->requestArray("action=getpopularthreads");
	}
	
	function getPosts($threadid, $page) {
		return $this->requestArray("action=getposts&thread_id=".$threadid."&page=".$page);
	}
	
	function getPMs($page) {
		return $this->requestArray("action=getpms&page=".$page);
	}
	
	function getPM($pmid) {
		return $this->requestArray("action=getpm&pm_id=".$pmid);
	}
	
	function postReply($threadid, $message) {
		return $this->requestArray("action=newreply&thread_id=".$threadid."&message=".$message);
	}
}

?>