<?php
	$host="localhost";
	$username="root";
	$password="";
	$database="RekamMedis";
	$koneksi=mysqli_connect($host,$username,$password,$database);

	function AksesAPIPublikWilayahIndonesia($url)
	{
		$curl=curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
		$response=curl_exec($curl);
		$data_provinsi=json_decode($response);
		curl_close($curl);
		return $data_provinsi;
	}

	function TambahDataPasien($post)
	{
		global $koneksi;
		$nomerrm=$post["nomerrm"];
		$namapasien=$post["namapasien"];
		$alamat=$post["alamat"];
		$nik=$post["nik"];
		$bpjs=$post["bpjs"];
		$nomerhp=$post["nomerhp"];
		$query="INSERT INTO pasien VALUES('$nomerrm','$namapasien','$alamat','$nik','$bpjs','$nomerhp')";
		$insert=mysqli_query($koneksi,$query);
		return mysqli_affected_rows($koneksi);
		mysqli_close($koneksi);
	}

	function DisplayDataPasien($query)
	{
		global $koneksi;
		$rows=[];
		$hasil=mysqli_query($koneksi,$query);
		while($row=mysqli_fetch_assoc($hasil))
		{
			$rows[]=$row;
		}
		return $rows;
	}

	function GetApiPasien($nomerbpjs)
	{
		$url="https://registrasi.simrsudtabanan.id/registrasi/api/get-peserta-kartu-bpjs?nopeserta=".$nomerbpjs;
		$curl=curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$response=curl_exec($curl);
		$data=json_decode($response);
		return $data;
	}

	function UpdateDataPasien($post)
	{
		global $koneksi;
		$nomer=$post['editnomerrm'];
		$nama=$post['editnama'];
		$alamat=$post['editalamat'];
		$nik=$post['editnik'];
		$bpjs=$post['editbpjs'];
		$nomerhp=$post['editnomerhp'];
		$query="UPDATE pasien SET nama='$nama',alamat='$alamat',nik='$nik',bpjs='$bpjs',nomerhp='$nomerhp' WHERE nomerrm='$nomer'";
		mysqli_query($koneksi,$query);
		return mysqli_affected_rows($koneksi);
	}

	function HapusDataPasien($nomerrm)
	{
		global $koneksi;
		$query="DELETE FROM pasien WHERE nomerrm=$nomerrm";
		$row=mysqli_query($koneksi,$query);
		return mysqli_affected_rows($koneksi);
	}
?>