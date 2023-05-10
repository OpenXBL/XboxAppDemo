<?php require 'openxbl.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="A demo of how to authenticate with Xbox Live">
	<meta name="author" content="OpenXBL">
	<title>Xbox App Demo</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Custom styles for this template -->
	<link href="assets/signin.css" rel="stylesheet">
</head>
<body>
<div class="container">
	<form class="form-signin" method="POST">
		<h2>Xbox App Demo</h2>
		<?php if(!isset($_SESSION['xbox'])){ ?>
			<p><small>Nothing in this demo gets saved. Everything is stored in your session.</small></p>
			<a href="<?= $auth->getLoginUrl(); ?>" class="btn btn-lg btn-success btn-block">Sign in with Xbox Live</a>
		<?php } else { ?>
			<img src="<?php echo $_SESSION['xbox']->avatar.'&w=100&h=100'; ?>" class="gamerpic" />
			<p>Welcome back, <?php echo $_SESSION['xbox']->gamertag; ?>!</p>
			<p><small>User ID: <?php echo $_SESSION['xbox']->xuid; ?>, Email: <?php echo $_SESSION['xbox']->email; ?></small></p>
			<input type="hidden" name="logout" value="logout" />
			<button class="btn btn-lg btn-danger btn-block">Logout</button>
		<?php } ?>
	</form>
</div>
</body>
<p style="position: absolute; bottom: 0; left: 0; border: 0; padding: 4px; font-size: 7pt;">We are in no way endorsed or affiliated with the Microsoft Corporation, Xbox, Xbox LIVE or any Microsoft subsidiary. Images are registered trademarks of their respected owners.</p>
<a href="https://github.com/OpenXBL/Demo"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://camo.githubusercontent.com/e7bbb0521b397edbd5fe43e7f760759336b5e05f/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f677265656e5f3030373230302e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_green_007200.png"></a>
</html>
