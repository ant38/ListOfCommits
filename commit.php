<?php

require_once 'model/Curl.php';

if(!isset($_GET['sha'])) {
	die('error: missing parameter');
}

$curl = new Curl();
$commit = $curl->getCommit($_GET['sha']);

if(is_null($commit->getSha())) {
	die('error: incorrect parameter');
}

include 'view/commit.php';

?>