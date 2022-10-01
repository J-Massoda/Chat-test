<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Chat Test</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
    <script src="js/jqueryv3.3.1.min.js"></script>
	<script src="js/bootstrap.bundle.js"></script>
	<script src="js/all.js"></script>
	<script src="js/form-validation.js"></script>
</head>
<body>
	<!-- start of navbar -->
<nav class="navbar navbar-light navbar-expand-md bg-white nav-acc">
		<div class="container font-weight-bold">
		<a href="index.php" class="navbar-brand">
			Test
			
		</a>
		<button
			class="navbar-toggler"
			type="button"
			data-toggle="collapse"
			data-target="#nav-links"
		>
			<span class="navbar-toggler-icon"></span>
		</button>
		<div
			class="collapse navbar-collapse text-uppercase"
			id="nav-links"
		>
			<ul class="navbar-nav ml-auto blue">
			   <li class="nav-item mr-3">
				   <a href="index.php" class="nav-link">
					Home
				   </a>
			   </li>
			   <?php if (!isset($_SESSION['username'])): ?>
					<li class="nav-item mr-3">
						<a href="login.php" class="nav-link">
							Login
						</a>
					</li>
					<li class="nav-item mr-3">
						<a href="register.php" class="nav-link">
							Register
						</a>
					</li>
				<?php else: ?>
					<li class="nav-item mr-3">
						<a href="chats.php" class="nav-link">
							Chats
						</a>
					</li>
					<li class="nav-item dropdown mr-3">
						<a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<?= $_SESSION['username'] ?>
						</a>
						<div class="dropdown-menu" aria-labelledby="dropdown01">
						<a class="dropdown-item" href="logout.php">Logout</a>
						</div>
					</li>
			   <?php endif ?>
			</ul>
	</nav>
	<!-- end of navbar -->