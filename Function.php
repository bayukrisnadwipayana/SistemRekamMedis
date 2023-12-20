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
		$provinsi=$post["provinsi"];
		$kabupaten=$post["kabupaten"];
		$kecamatan=$post["kecamatan"];
		$kelurahan=$post["kelurahan"];
		$nik=$post["nik"];
		$bpjs=$post["bpjs"];
		$nomerhp=$post["nomerhp"];
		$query="INSERT INTO pasien VALUES('$nomerrm','$namapasien','$alamat','$provinsi','$kabupaten','$kecamatan','$kelurahan','$nik','$bpjs','$nomerhp')";
		$insert=mysqli_query($koneksi,$query);
		return mysqli_affected_rows($koneksi);
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

	function EditDataMasterPasien($post)
	{
		global $koneksi;
		$nomerrm=$post[""];
	}
?>