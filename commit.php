<?php

require_once 'model/Curl.php';

$curl = new Curl();
$commit = $curl->getCommit($_GET['sha']);

include 'view/commit.php';

?>