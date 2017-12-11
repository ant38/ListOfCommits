<?php

require_once 'User.php';

class Commit {
	private $info;
	
	public function __construct($obj) {
		$this->info = $obj;
	}
	
	public function getCommitMessage() {
		if(isset($this->info->commit->message)) {
			return $this->info->commit->message;
		} else {
			return '';
		}
	}
	
	public function getCommitter() {
		if(!is_null($this->info->committer)) {
			return new User($this->info->committer);
		} else {
			return null;
		}
	}
	
	public function getDate() {
		if(isset($this->info->commit->committer->date)) {
			$timestamp = strtotime($this->info->commit->committer->date);
			return date('Y/m/d H:i:s', $timestamp);
		} else {
			return '';
		}
	}
}

?>