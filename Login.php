
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
		<form method="post" action="">
			<label>Username</label>
			<input type="text" name="username" class="form_login" placeholder="Username atau email .." onclick="nomer()" >
			<label>Password</label>
			<input type="text" name="password" class="form_login" placeholder="Password ..">
			<input type="submit" class="tombol_login" value="LOGIN" name="login">
			<br/>
			<br/>
			<center>
				<a class="link" href="#">kembali</a>
			</center>
		</form>
	</div>
	<?php
		require_once("Function.php");
		if(!isset($_POST['username']))
		{
			echo "masukan data awal";
			
		}
		else
		{
			$json=GetApiPasien(trim($_POST['username']));
			echo "<!DOCTYPE html>";
			echo "<html>";
			echo "<head></head>";
			echo "<style>";
			echo "table,th,tr,td{border:2px solid black;}";
			echo "</style>";
			echo "<body>";
			echo "<table style='border:1px solid black'>";
			echo "<tr style='border:1px solid black'>";
			echo "<th>Nama</th>";
			echo "<th>NIK</th>";
			echo "<th>No Rujukan</th>";
			echo "<th>Tanggal Kunjungan</th>";
			echo "<th>Nama PPK</th>";
			echo "<th>Poli Rujukan</th>";
			echo "</tr>";
			echo "<tr style='border:1px solid black'>";
			echo "<td>".$json->data->peserta->nama."</td>";
			echo "<td>".$json->data->peserta->nik."</td>";
			echo "<td>".$json->list_rujukan[0]->noKunjungan."</td>";
			echo "<td>".$json->list_rujukan[0]->tglKunjungan."</td>";
			echo "<td>".$json->list_rujukan[0]->provPerujuk->nama."</td>";
			echo "<td>".$json->list_rujukan[0]->poliRujukan->nama."</td>";
			echo "<tr>";
			echo "</table>";
		}
	?>
</body>
</html>