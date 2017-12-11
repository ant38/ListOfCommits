<!DOCTYPE html>
<html>
<body>
<?php
foreach($commits as $commit) {
?>
	<div>
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
			<div><?= $commit->getCommitMessage() ?></div>
		</div><br><br>
	</div>
<?php
}
?>
</body>
</html>