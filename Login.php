<?php
	require_once("Function.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Membuat Desain Form Login Dengan CSS - www.malasngoding.com</title>
	<link rel="stylesheet" type="text/css" href="Login.css">
</head>
<body>
	<h1>Halaman Login</h1>
	<div class="kotak_login">
		<p class="tulisan_login">Silahkan login</p> 
		<form>
			<label>Username</label>
			<input type="text" name="username" class="form_login" placeholder="Username atau email ..">
			<label>Password</label>
			<input type="text" name="password" class="form_login" placeholder="Password ..">
			<input type="submit" class="tombol_login" value="LOGIN">
			<br/>
			<br/>
			<center>
				<a class="link" href="#">kembali</a>
			</center>
		</form>
	</div>
</body>
</html>