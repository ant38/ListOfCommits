<?php

require_once 'Commit.php';

class Curl {
	private $url = 'https://api.github.com/repos/torvalds/linux/commits';
	private $curl;
	
	public function __construct() {
		$this->curl = curl_init();
		
		//set params
		curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($this->curl, CURLOPT_URL, $this->url);
		curl_setopt($this->curl, CURLOPT_USERAGENT, 'request');
	}
	
	private function request() {
		return curl_exec($this->curl);
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
}

?>