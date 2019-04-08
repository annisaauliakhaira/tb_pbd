<?php
	
	include "controller.php";
	include "../models/jabatan.php";
 	$db = new Jabatan($connection);

	if(isset($_GET['aksi'])){
		$aksi = $_GET['aksi'];
		if ($aksi =="tambah") {
			$db->input($_POST['kode_jabatan'], $_POST['nama_jabatan']);
			die("berhasil");
		}
		elseif ($aksi == "delete") {
			$db->delete($_GET['id']);
		}
		elseif ($aksi == "update") {
			$db->update($_POST['kode_jabatan'], $_POST['nama_jabatan']);
		}	
	}else{
		header("location:/pbd?page=jabatan");
	}
	
	


?>