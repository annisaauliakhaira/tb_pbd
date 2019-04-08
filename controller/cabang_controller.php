<?php
	
	include "controller.php";
	include "../models/cabang.php";
 	$db = new Cabang($connection);

	if(isset($_GET['aksi'])){
		$aksi = $_GET['aksi'];
		if ($aksi =="tambah") {
			$db->input($_POST['kode_cabang'], $_POST['nama_cabang'], $_POST['alamat'], $_POST['keterangan']);
			die("berhasil");
		}
		elseif ($aksi == "delete") {
			$db->delete($_GET['id']);
		}
		elseif ($aksi == "update") {
			$db->update($_POST['kode_cabang'], $_POST['nama_cabang'], $_POST['alamat'], $_POST['keterangan']);
		}	
	}else{
		header("location:/pbd?page=cabang");
	}
	
	


?>