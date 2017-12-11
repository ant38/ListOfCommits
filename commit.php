<?php

require_once 'model/Curl.php';

if(!isset($_GET['sha'])) {
	die('error: missing parameter');
}

$curl = null;
if(isset($_GET['repo'])) {
	$curl = new Curl($_GET['repo']);
} else {
	$curl = new Curl();
}

$commit = $curl->getCommit($_GET['sha']);

if(is_null($commit->getSha())) {
	die('error: incorrect parameters');
}

$repo = $curl->getRepo();

include 'view/commit.php';

?>