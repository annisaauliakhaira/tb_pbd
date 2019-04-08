<?php
	
	include "controller.php";
	include "../models/jenis.php";
 	$db = new jenis($connection);

	if(isset($_GET['aksi'])){
		$aksi = $_GET['aksi'];
		if ($aksi =="tambah") {
			$db->input($_POST['kode_jenis'], $_POST['nama_jenis']);
			die("berhasil");
		}
		elseif ($aksi == "delete") {
			$db->delete($_GET['id']);
		}
		elseif ($aksi == "update") {
			$db->update($_POST['kode_jenis'], $_POST['nama_jenis']);
		}	
	}else{
		header("location:/pbd?page=jenis");
	}
	
	


?>