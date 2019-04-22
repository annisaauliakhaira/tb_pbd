<?php
	
	include "controller.php";
	include "../models/cabang_barang.php";
 	$db = new cabang_barang($connection);

	if(isset($_GET['aksi'])){
		$aksi = $_GET['aksi'];
		if ($aksi =="tambah") {
			$db->input($_POST['kode_cabang'], $_POST['kode_barang'], $_POST['status'], $_POST['kondisi_barang'], $_POST['no_livret'], $_POST['jumlah_barang'], $_POST['satuan']);
		}
		elseif ($aksi == "delete") {
			$db->delete($_GET['kode_cabang'], $_GET['kode_barang']);
		}
		elseif ($aksi == "update") {
			$db->update($_POST['kode_cabang'], $_POST['kode_barang'], $_POST['status'], $_POST['kondisi_barang'], $_POST['no_livret'], $_POST['jumlah_barang'], $_POST['satuan']);
		}	
	}else{
		header("location:/pbd?page=cabang_barang");
	}
	
	

?>