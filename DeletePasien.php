<?php
	require_once("Function.php");
	$nomer=$_GET['nomer'];
	if(HapusDataPasien($nomer)>0)
	{
		header("Location: MasterPasien.php");
	}
?>