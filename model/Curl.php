<?php

require_once 'model/Commit.php';

class Curl {
	private $url;
	private $curl;
	private $repo;
	
	public function __construct($repo = 'torvalds/linux') {
		$this->repo = $repo;
		
		$this->curl = curl_init();
		
		//set params
		curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($this->curl, CURLOPT_USERAGENT, 'request');
	}
	
	private function request() {
		return curl_exec($this->curl);
	}
	
	private function setUrl($url) {
		curl_setopt($this->curl, CURLOPT_URL, $url);
	}
	
	public function getCommits() {
		$this->setUrl('https://api.github.com/repos/'.$this->repo.'/commits');
		$json = $this->request();
		$obj = json_decode($json);
		$commits = [];
		foreach($obj as $l) {
			$commits[] = new Commit($l);
		}
		return $commits;
	}
	
	public function getCommit($sha) {
		$this->setUrl("https://api.github.com/repos/".$this->repo."/commits/$sha");
		$json = $this->request();
		$obj = json_decode($json);
		return new Commit($obj);
	}
	
	public function getRepo() {
		return $this->repo;
	}
}

?>