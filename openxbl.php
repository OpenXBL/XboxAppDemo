<?php

require __DIR__ . '/vendor/autoload.php';

session_start();

// Instantiate the Auth class.
$auth = new OpenXBL\Auth('PASTE YOUR PUBLIC KEY HERE');

// OpenXBL redirects to /openxbl.php in this example with a "code" URL query parameter.
if(isset($_GET['code']))
{
	try {
		// Request the claim by passing in the code.
		$_SESSION['xbox'] = $auth->claim($_GET['code']);
	} catch (Exception $e) {
		// @todo - handle the error.
	}

	// Refresh.
	header('Location: /');
}

// On logout we will wipe the session.
if($_POST && $_POST['logout'])
{
	unset($_SESSION['xbox']);
}
