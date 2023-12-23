<?php
  require_once("Function.php");
  $array_provinsi=AksesAPIPublikWilayahIndonesia("https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json");
  $array_kabupaten=AksesAPIPublikWilayahIndonesia("https://www.emsifa.com/api-wilayah-indonesia/api/regencies/51.json");
  $display_data=DisplayDataPasien("SELECT * FROM pasien");
  if(isset($_POST["submit"]))
    {
      if(TambahDataPasien($_POST)>0)
      {
        header("location: http://localhost:8080/rekammedis/MasterPasien.php");
      }
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <style type="text/css">
    body
    {
      background-image: url('img/pngtree-pure-original-hand-painted-simple-atmosphere-background-material-of-modern-medical-image_929912.jpg');
    }
  </style>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  
	<title>Data Master Pasien</title>
</head>
<body>
  <h1 class="h1 text-center">Data Pasien</h1>
  <br>
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Tambah Data Master Pasien
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Pasien</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
        <div class="form-group">
          <label for="exampleFormControlInput1">Nomer RM</label>
          <input type="text" class="form-control" name="nomerrm" placeholder="Nomer RM">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Nama</label>
          <input type="text" class="form-control" name="namapasien" placeholder="Nama Pasien">
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Alamat</label>
          <textarea class="form-control" name="alamat" rows="3"></textarea>
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Provinsi</label>          
          <select class="form-control" name="provinsi">
            <?php foreach ($array_provinsi as $provinsi):?>
              <option value="<?php echo $provinsi->name?>"><?php echo $provinsi->name; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Kabupaten</label>
          <select class="form-control" name="kabupaten">
            <?php foreach($array_kabupaten as $kabupaten): ?>
              <option><?php echo $kabupaten->name; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Kecamatan</label>
          <select class="form-control" name="kecamatan">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Kelurahan</label>
          <select class="form-control" name="kelurahan">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">NIK</label>
          <input type="text" class="form-control" name="nik" placeholder="NIK">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Nomer BPJS</label>
          <input type="text" class="form-control" name="bpjs" placeholder="Nomer BPJS">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Nomer Telepon</label>
          <input type="text" class="form-control" name="nomerhp" placeholder="Nomer Telepon/HP">
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
      </div>     
    </div>
  </div>
</div>
<br><br>
<table class="table table-striped table-dark"> 
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nomer RM</th>
      <th scope="col">Nama Pasien</th>
      <th scope="col">Alamat</th>
      <th scope="col">NIK</th>
      <th scope="col">BPJS</th>
      <th scope="col">Nomer HP</th>
      <th ssope="col">Konfirmasi</th>
    </tr>
  </thead>
  <tbody>
    <?php $no=1; ?>
    <?php foreach($display_data as $data): ?>
    <tr>
      <th scope="row"><?php echo $no++; ?></th>
      <td id="nomerrmpasien"><?php echo $data["nomerrm"]; ?></td>
      <td><?php echo $data["nama"]; ?></td>
      <td><?php echo $data["alamat"]; ?></td>
      <td><?php echo $data["nik"]; ?></td>
      <td><?php echo $data["bpjs"]; ?></td>
      <td><?php echo $data["nomerhp"]; ?></td>
      <td> 
        <a href="DeletePasien.php" class="btn btn-danger" onclick="return confirm('Yakin Akan Menghapus');">Hapus</a> | <a href="RegistrasiRajal.php"class="btn btn-info">Registrasi</a> |
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal<?php echo $data['nomerrm']; ?>">Edit</button>
        <!-- Modal -->
      <div class="modal fade" id="editModal<?php echo $data['nomerrm']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Data Pasien</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="post" action="MasterPasien.php">
            <div class="row">
               <div class="col">
                  <b><label for="labelnomerrm">Nomer RM</label></b>
                  <input type="text" class="form-control" placeholder="nomerrm" id="editnomerrm" value="<?php echo $data['nomerrm']; ?>" name="editnomerrm">
               </div>
               <div class="col">
                <b><label for="labelnama">Nama Pasien</label></b>
                  <input type="text" class="form-control" placeholder="namapasien" value="<?php echo $data['nama']; ?>" name="editnamapasien">
               </div>
             </div>
            <div class="row">
               <div class="col">
                  <b><label for="labelnomerrm">Alamat</label></b>
                  <textarea class="form-control" name="editalamat" rows="3"><?php echo $data["alamat"]; ?></textarea>
               </div>
               <div class="col">
                <b><label for="labelnama">NIK</label></b>
                  <input type="text" class="form-control" placeholder="First name" value="<?php echo $data['nik']; ?>" name="editnik">
               </div>
            </div>
            <div class="row">
               <div class="col">
                  <b><label for="labelnomerrm">Nomer BPJS</label></b>
                  <textarea class="form-control" name="editbpjs" rows="3"><?php echo $data["bpjs"]; ?></textarea>
               </div>
               <div class="col">
                <b><label for="labelnama">Provinsi</label></b>
                  <select name="edit_provinsi" class="form-control">
                    <option value="<?php echo $editpasien['provinsi']; ?>"><?php echo $data['provinsi']; ?></option>
                  </select>
               </div>
            </div>
            <div class="row">
               <div class="col">
                  <b><label for="labelnomerrm">Kabupaten</label></b>
                  <textarea class="form-control" name="editkabupaten" rows="3"><?php echo $data["kabupaten"]; ?></textarea>
               </div>
               <div class="col">
                <b><label for="labelnama">Kecamatan</label></b>
                  <textarea class="form-control" name="editkecamatan" rows="3"><?php echo $data['kecamatan']; ?></textarea>
               </div>
               <div class="col">
                  <b><label for="labelnomerrm">Kelurahan</label></b>
                  <textarea class="form-control" name="editkelurahan" rows="3"><?php echo $data["kelurahan"]; ?></textarea>
               </div>
            </div>
            <br>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </form>
            </div>           
          </div>
        </div>
      </div>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>  
</table>
<a href="AdminRekamMedis.php" class="badge badge-info">Kembali Ke Home</a>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>