<?php
session_start();
include "../admin/connection.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);
	// echo $uname . $pass ;
	// die();

	if (empty($uname)) {
		header("Location: index.php?error=User Name is required");
		exit();
	} else if (empty($pass)) {
		header("Location: index.php?error=Password is required");
		exit();
	} else {
		$sql = "SELECT * FROM `users` WHERE mail_client ='$uname' AND pasword_client ='$pass'";
		// echo $sql;
		// die();
		$result = mysqli_query($con, $sql);
		// echo $result;
		// die();
		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
			if ($row['mail_client'] === $uname && $row['pasword_client'] === $pass) {
				$_SESSION['mail_client'] = $row['mail_client'];
				$_SESSION['name'] = $row['nom_client'];
				$_SESSION['id'] = $row['id_user'];
				header("Location: ../index.php");
				exit();
			} else {
				header("Location: index.php?error=Incorect User name or password");
				exit();
			}
		} else {
			header("Location: index.php?error=Incorect User name or password");
			exit();
		}
	}
} else {
	header("Location: index.php");
	exit();
}
