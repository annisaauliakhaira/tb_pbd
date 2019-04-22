<?php
	
	include "controller.php";
	include "../models/barang.php";
 	$db = new barang($connection);

	if(isset($_GET['aksi'])){
		$aksi = $_GET['aksi'];
		if ($aksi =="tambah") {
			$db->input($_POST['kode_barang'], $_POST['no_seri'], $_POST['kondisi'], $_POST['tgl_pembelian'], $_POST['th_pembuatan'], $_POST['kode_persetujuan'], $_POST['kode_merk'], $_POST['keterangan'], $_POST['no_livret']);
		}
		elseif ($aksi == "delete") {
			$db->delete($_GET['id']);
		}
		elseif ($aksi == "update") {
			$db->update($_POST['kode_barang'], $_POST['no_seri'], $_POST['kondisi'], $_POST['tgl_pembelian'], $_POST['th_pembuatan'], $_POST['kode_persetujuan'], $_POST['kode_merk'], $_POST['keterangan'], $_POST['no_livret']);
		}	
	}else{
		header("location:/pbd?page=barang");
	}
	
	
 

?>