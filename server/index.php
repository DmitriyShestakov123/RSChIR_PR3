<?php
session_start();
$con = mysqli_connect("db", "user", "password", "appDB");
if ( mysqli_connect_errno() ) 
{
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
$result=$con->query("SELECT * FROM accounts"); 

if(isset($_POST["login-btn"])) {
	// Could not get the data that should have been sent.
    if (empty($_POST['usname']) || empty($_POST['paswd'])) {
        // Could not get the data that should have been sent.
        echo '<script>alert("Please fill both the username and password fields!")</script>';
    } else {
        if ($stmt = $con->prepare('SELECT username, passwords FROM accounts WHERE username = ?')) {
            $stmt->bind_param('s', $_POST['usname']);
            $stmt->execute();
            // Store the result so we can check if the account exists in the database.
            $stmt->store_result();
            if ($stmt->num_rows > 0) {
                $stmt->bind_result($id, $password);
                $stmt->fetch();
                // Account exists, now we verify the password
                if ($_POST['paswd'] === $password) {
                    // Verification success! User has logged-in!
                    // Create sessions, so we know the user is logged in
                    session_regenerate_id();
                    $_SESSION['loggedin'] = TRUE;
                    $_SESSION['name'] = $_POST['usname'];
                    $_SESSION['id'] = $id;
                    $_SESSION['pass'] = $password;
                    header('Location: home.php');
                } else {
                    echo '<script>alert("incorrect password")</script>';
                }
            } else {
                echo '<script>alert("incorrect username")</script>';
            }
            $stmt->close();
        }
    }                     
}
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="styles.css">
        <title>Login Form in PHP With Session</title>
    </head>
    <body>
        <div class="container">
            <div class="container2">
                <div class="login">
                    <form method = "post">
                        <div class="form-input">
                            <input type="text" name="usname" placeholder="Username"/>	
                        </div>
                        <div class="form-input">
                            <input type="password" name="paswd" placeholder="password"/>
                        </div>
                        <input type="submit" value="LOGIN" class="btn-login" name ="login-btn"/>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>