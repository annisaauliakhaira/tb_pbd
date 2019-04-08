<?php
	
	include "controller.php";
	include "../models/m_inventaris.php";
 	$db = new Inventaris($connection);

			
	$aksi = $_GET['aksi'];
	if ($aksi =="tambah") {
		$db->input($_POST['kode_inventaris'], $_POST['jenis']);
		die("berhasil");
		header("location:/inventaris/?page=inventaris");
	}
	elseif ($aksi == "hapus") {
		$db->hapus($_GET['id']);
		header("location:/inventaris/?page=inventaris");
	}
	elseif ($aksi == "update") {
		$db->update($_POST['kode_inventaris'], $_POST['jenis']);
		header("location:../views/inventaris.php");
	}
	


?>