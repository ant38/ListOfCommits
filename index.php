<?php

require_once 'model/Curl.php';

$curl = null;
if(isset($_GET['repo']) && !empty($_GET['repo'])) {
	$curl = new Curl($_GET['repo']);
} else {
	$curl = new Curl();
}

$commits = $curl->getCommits();
if(is_null($commits[0]->getSha())) {
	echo 'error: incorrect repository';
	$curl = new Curl();
	$commits = $curl->getCommits();
}

$repo = $curl->getRepo();

include 'view/index.php';

?>