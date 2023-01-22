<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Профиль</title>
		<link href="second.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Галерея</h1>
                <a href="home.php"><i class="fas fa-home-alt"></i>Главная</a>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Профиль</a>
                <a href="index.html"><i class="fa-solid fa-circle-info"></i>Информация</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Выйти</a>
			</div>
		</nav>
		<div class="content">
			<h2>Профиль</h2>
			<div>
				<p>Детали аккаунта:</p>
				<table>
					<tr>
						<td>Username:</td>
						<td><?=$_SESSION['name']?></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><?=$_SESSION['pass']?></td>
					</tr>
				</table>
			</div>
		</div>
	</body>
</html>