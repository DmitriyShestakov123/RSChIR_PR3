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
		<title>Главная</title>
		<link href="styles.css" rel="stylesheet" type="text/css">
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
			<h2>Главная</h2>
            <?php
		   	$con = mysqli_connect("db", "user", "password", "appDB");
		   	$result=$con->query("SELECT * FROM mesto"); 
		   	while ($row = mysqli_fetch_assoc($result)) 
		   	{	
				$image_src= $row['mesto_img'];
				$image = "<img width='700' src='$image_src'>";
		   		echo "<p>" ,"<a>" ,"Работа пользователя: ","<b>",$row['mesto_user'],"</b>" ,"</a>","<br>", "<br>", $image , "</p>";
		   	}
			?>
        </div>
	</body>
	<!--INSERT INTO mesto (mesto_user, mesto_img) VALUES ('admin', 'src/images/papapishu_Basset_hound.svg');
	/*INSERT INTO mesto (mesto_user, mesto_img) VALUES ('test_user1', 'src/images/4.png');

	INSERT INTO mesto (mesto_user, mesto_img) VALUES ('admin', 'src/images/fd7e63e5.svg');
	*/-->
	
</html>
