<?php

require_once 'model/Commit.php';

class Curl {
	private $url = 'https://api.github.com/repos/torvalds/linux/commits';
	private $curl;
	
	public function __construct() {
		$this->curl = curl_init();
		
		//set params
		curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false);
		$this->setUrl($this->url);
		curl_setopt($this->curl, CURLOPT_USERAGENT, 'request');
	}
	
	private function request() {
		return curl_exec($this->curl);
	}
	
	private function setUrl($url) {
		curl_setopt($this->curl, CURLOPT_URL, $url);
	}
	
	public function getCommits() {
		$json = $this->request();
		$obj = json_decode($json);
		$commits = [];
		foreach($obj as $l) {
			$commits[] = new Commit($l);
		}
		return $commits;
	}
	
	public function getCommit($sha) {
		$this->setUrl("https://api.github.com/repos/torvalds/linux/commits/$sha");
		$json = $this->request();
		$obj = json_decode($json);
		return new Commit($obj);
	}
}

?>