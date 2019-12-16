<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $page_title; ?></title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link href="css/sticky-footer-navbar.css" rel="stylesheet">
</head>
<body>
<?php
 $actual = explode("/", $_SERVER[SCRIPT_NAME]);
 $n = count($actual);
 $actual = $actual[$n-1];
 $actual = explode(".", $actual);
 $actual = $actual[0];
?>
<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header"><a class="navbar-brand" href="#">Your Website</a></div>
		<div id="navbar" class="collapse navbar-collapse">
		<ul class="nav navbar-nav">
			<li <?php if ($actual == "index") echo "class=\"active\""; ?>><a href="index.php">Premieres</a></li>
			<li <?php if ($actual == "cinema_listings") echo "class=\"active\""; ?>><a href="cinema_listings.php">Cinema listings</a></li>
			<li <?php if ($actual == "armchairs") echo "class=\"active\""; ?>><a href="armchairs.php">Armchairs</a></li>
			<li <?php if ($actual == "purchase") echo "class=\"active\""; ?>><a href="purchase.php">Purchase</a></li>
		</ul>
		</div>
	</div>
</nav>
<div class="container">
<!-- Script 9.1 - header.php -->
