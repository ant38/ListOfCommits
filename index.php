<?php

require_once 'model/Curl.php';

$curl = new Curl();
$commits = $curl->getCommits();

include 'view/index.php';

?>