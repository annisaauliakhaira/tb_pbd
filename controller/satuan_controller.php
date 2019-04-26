<?php
	
	include "controller.php";
	include "../models/satuan.php";
 	$db = new satuan($connection);

	if(isset($_GET['aksi'])){
		$aksi = $_GET['aksi'];
		if ($aksi =="tambah") {
			$db->input($_POST['kode_satuan'], $_POST['nama_satuan']);
			die("berhasil");
		}
		elseif ($aksi == "delete") {
			$db->delete($_GET['id']);
		}
		elseif ($aksi == "update") {
			$db->update($_POST['kode_satuan'], $_POST['nama_satuan']);
		}	
	}else{
		header("location:/pbd?page=satuan");
	}
	
	


?>