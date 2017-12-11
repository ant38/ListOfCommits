<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<br>
		<header>
			<a href=".?repo=<?= $repo ?>" class="btn btn-default">Home</a>
			<br>
			<br>
			<form class="form-inline" action="." method="get">
				<input class="form-control" type="text" name="repo" placeholder="repository" value="<?= $repo ?>">
				<button class="btn btn-default" type="submit">Submit</button>
			</form>
		</header>
<?php
foreach($commits as $commit) {
?>
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
			</div>
			<div class="col-xs-9">
				<a href="commit.php?sha=<?= $commit->getSha() ?>&repo=<?= $repo ?>"><div><?= $commit->getCommitMessage() ?></div></a>
			</div>
		</div>
<?php
}
?>
		<hr>
	</div>
</body>
</html>