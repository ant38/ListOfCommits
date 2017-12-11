<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<br>
		<a href="." class="btn btn-default">Home</a>
		<hr>
		<div class="row">
			<div class="col-xs-3">
				<div>
<?php
	$committer = $commit->getCommitter();
	if(!is_null($committer)) {
		$url = $committer->getUrl();
		$avatar = $committer->getAvatar();
		if(!is_null($url) && !is_null($avatar)) {
?>
					<a href="<?= $url ?>"><img width="50px" src="<?= $avatar ?>"></a>
<?php
		}
?>
					<span><?= $committer->getLogin() ?></span>
<?php
	}
?>
				</div>
				<div>
					<div><?= $commit->getDate() ?></div>
				</div>
				<div>
					<div><?= $commit->getAdditions() ?> additions</div>
					<div><?= $commit->getDeletions() ?> deletions</div>
				</div>
				<div>
					<div><?= $commit->getFilesNumber() ?> changed files:</div>
					<ul>
<?php
	foreach($commit->getFiles() as $file) {
?>
						<li><?= $file ?></li>
<?php
	}
?>
					</ul>
				</div>
			</div>
			<div class="col-xs-9">
				<div><?= $commit->getCommitMessage() ?></div>
			</div>
		</div>
		<hr>
	</div>
</body>
</html>