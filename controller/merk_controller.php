<?php
	
	include "controller.php";
	include "../models/merk.php";
 	$db = new merk($connection);

	if(isset($_GET['aksi'])){
		$aksi = $_GET['aksi'];
		if ($aksi =="tambah") {
			$db->input($_POST['kode_merk'], $_POST['nama_merk']);
			die("berhasil");
		}
		elseif ($aksi == "delete") {
			$db->delete($_GET['id']);
		}
		elseif ($aksi == "update") {
			$db->update($_POST['kode_merk'], $_POST['nama_merk']);
		}	
	}else{
		header("location:/pbd?page=merk");
	}
	
	


?>