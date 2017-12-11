<?php

class User {
	private $info;
	
	public function __construct($obj) {
		$this->info = $obj;
	}
	
	public function getLogin() {
		if(isset($this->info->login)) {
			return $this->info->login;
		} else {
			return '';
		}
	}
	
	public function getAvatar() {
		if(isset($this->info->avatar_url)) {
			return $this->info->avatar_url;
		} else {
			return '';
		}
	}
	
	public function getUrl() {
		if(isset($this->info->html_url)) {
			return $this->info->html_url;
		} else {
			return '';
		}
	}
}

?>