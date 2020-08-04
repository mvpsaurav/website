<?php
if (isset($_POST['submit'])){
	require 'config.php';

	$username = $_POST['user-name-signup'];
	$email = $_POST['user-email-signup'];
	$password = $_POST['user-password-signup'];

	if(empty($username)||empty($email)||empty($password)){
		header("Location: signup.php?error=emptyfields&user-name-signup=".$username."&user-email-signup".$email);
		exit();
	}
	else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
		header("Location: signup.php?error=invaliduser-email-signup&user-name-signup=".$username);
		exit();
	}
	else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)){
		header("Location: signup.php?error=invaliduser-name-signup&user-email-signup=".$email);
		exit();
	}
	else {
		$sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)){
			header("Location: signup.php?error=sqlerror");
			exit();
		}
		else{
			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultcheck = mysqli_stmt_num_rows($stmt);
			if ($resultcheck > 0){
				header("Location: signup.php?error=usertaken");
				exit();
			}
			else{
				$sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?,?,?)";
				$stmt = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt, $sql)){
					header("Location: signup.php?error=sqlerror");
					exit();
				}
				else{
					$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
					mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_store_result($stmt);
					header("Location: panel.php?signup=success");
					exit();
				}
			}
		}
	}
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}
else{
	header("Location: signup.php");
	exit();
}
?>