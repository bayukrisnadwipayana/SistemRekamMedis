<?php
	require("Function.php");
	if(isset($_GET['nomerrm']))
	{
		$nomer=$_GET['nomerrm'];
		$editdatapasien=DisplayDataPasien("SELECT * FROM pasien WHERE nomerrm=$nomer");
	}
	else
	{
		header("Location: http://localhost:8080/RekamMedis/AdminRekamMedis.php");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<style type="text/css">
			body
			{
				background-image: url("img/pngtree-pure-original-hand-painted-simple-atmosphere-background-material-of-modern-medical-image_929912.jpg");
			}
		</style>
	</head>
	<body>
		<h1 class="h1 text-center">Edit Data Pasien</h1>
		<form method="post" action="">
		<?php foreach($editdatapasien as $editpasien): ?>
			<div class="row">
			   <div class="col">
			   	  <b><label for="labelnomerrm">Nomer RM</label></b>
			      <input type="text" class="form-control" placeholder="nomerrm" value="<?php echo $editpasien['nomerrm']; ?>" name="editnomerrm">
			   </div>
			   <div class="col">
			   	<b><label for="labelnama">Nama Pasien</label></b>
			      <input type="text" class="form-control" placeholder="namapasien" value="<?php echo $editpasien['nama']; ?>" name="editnamapasien">
			   </div>
			 </div>
			<div class="row">
			   <div class="col">
			   	  <b><label for="labelnomerrm">Alamat</label></b>
			      <textarea class="form-control" name="editalamat" rows="3"><?php echo $editpasien["alamat"]; ?></textarea>
			   </div>
			   <div class="col">
			   	<b><label for="labelnama">NIK</label></b>
			      <input type="text" class="form-control" placeholder="First name" value="<?php echo $editpasien['nik']; ?>" name="editnik">
			   </div>
			</div>
			<div class="row">
			   <div class="col">
			   	  <b><label for="labelnomerrm">Nomer BPJS</label></b>
			      <textarea class="form-control" name="editbpjs" rows="3"><?php echo $editpasien["bpjs"]; ?></textarea>
			   </div>
			   <div class="col">
			   	<b><label for="labelnama">Provinsi</label></b>
			      <select name="edit_provinsi" class="form-control">
			      	<option value="<?php echo $editpasien['provinsi']; ?>"><?php echo $editpasien['provinsi']; ?></option>
			      </select>
			   </div>
			</div>
			<div class="row">
			   <div class="col">
			   	  <b><label for="labelnomerrm">Kabupaten</label></b>
			      <textarea class="form-control" name="editkabupaten" rows="3"><?php echo $editpasien["kabupaten"]; ?></textarea>
			   </div>
			   <div class="col">
			   	<b><label for="labelnama">Kecamatan</label></b>
			      <textarea class="form-control" name="editkecamatan" rows="3"><?php echo $editpasien['kecamatan']; ?></textarea>
			   </div>
			   <div class="col">
			   	  <b><label for="labelnomerrm">Kelurahan</label></b>
			      <textarea class="form-control" name="editkelurahan" rows="3"><?php echo $editpasien["kelurahan"]; ?></textarea>
			   </div>
			</div>
			<br>
		<?php endforeach; ?>
			<button class="btn btn-warning" type="submit">Update</button>
		</form>
	</body>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>