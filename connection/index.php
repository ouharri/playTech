<!DOCTYPE html>
<html>

<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style.css?v=<?php echo time(); ?>">
</head>

<body>
	<form action="login.php" method="post">
		<h2>LOGIN</h2>
		<?php if (isset($_GET['error'])) { ?>
			<p class="error"><?php echo $_GET['error']; ?></p>
		<?php } ?>
		<label>User Name</label>
		<input type="text" name="uname" placeholder="User Name"><br>
		<label>User Name</label>
		<input type="password" name="password" placeholder="Password"><br>
		<button type="submit">Login</button>
		<a href="../index.php">mode invité</a
	</form>
</body>

</html>