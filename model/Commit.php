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
	
	public function getSha() {
		if(isset($this->info->sha)) {
			return $this->info->sha;
		} else {
			return '';
		}
	}
	
	public function getAdditions() {
		if(isset($this->info->stats->additions)) {
			return $this->info->stats->additions;
		} else {
			return 0;
		}
	}
	
	public function getDeletions() {
		if(isset($this->info->stats->deletions)) {
			return $this->info->stats->deletions;
		} else {
			return 0;
		}
	}
	
	public function getFilesNumber() {
		if(isset($this->info->files)) {
			return count($this->info->files);
		} else {
			return 0;
		}
	}
	
	public function getFiles() {
		if(isset($this->info->files)) {
			return array_map('getFileName', $this->info->files);
		} else {
			return [];
		}
	}
}

function getFileName($file) {
	if(isset($file->filename)) {
		return $file->filename;
	} else {
		return '';
	}
}

?>