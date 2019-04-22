<?php
	
	include "controller.php";
	include "../models/mutasi.php";
 	$db = new mutasi($connection);

	if(isset($_GET['aksi'])){
		$aksi = $_GET['aksi'];
		if ($aksi =="tambah") {
			$db->input($_POST['kode_mutasi'], $_POST['tgl_mutasi'], $_POST['nipp'], $_POST['kode_cabang_sebelum'], $_POST['kode_cabang_sesudah']);
		}
		elseif ($aksi == "delete") {
			$db->delete($_GET['id']);
		}
		elseif ($aksi == "update") {
			$db->update($_POST['kode_mutasi'], $_POST['tgl_mutasi'], $_POST['nipp'], $_POST['kode_cabang_sebelum'], $_POST['kode_cabang_sesudah']);
		}	
	}else{
		header("location:/pbd?page=mutasi");
	}
	
	

?>