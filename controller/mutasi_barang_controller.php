<?php
	
	include "controller.php";
	include "../models/mutasi_barang.php";
 	$db = new mutasi_barang($connection);

	if(isset($_GET['aksi'])){
		$aksi = $_GET['aksi'];
		if ($aksi =="tambah") {
			$db->input( $_POST['kode_barang'], $_POST['kode_mutasi'], $_POST['kondisi_barang']);
		}
		elseif ($aksi == "delete") {
			$db->delete($_GET['kode_mutasi'], $_GET['kode_barang']);
		}
		elseif ($aksi == "update") {
			$db->update($_POST['kode_barang'], $_POST['kode_mutasi'],  $_POST['kondisi_barang']);
		}	
	}else{
		header("location:/pbd?page=mutasi_barang");
	}
	
	

?>