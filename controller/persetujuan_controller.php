<?php
	
	include "controller.php";
	include "../models/persetujuan.php";
 	$db = new persetujuan($connection);

	if(isset($_GET['aksi'])){
		$aksi = $_GET['aksi'];
		if ($aksi =="tambah") {
			$db->input($_POST['kode_persetujuan'], $_POST['tgl_persetujuan'], $_POST['kode_pengajuan'], $_POST['nipp']);
		}
		elseif ($aksi == "delete") {
			$db->delete($_GET['id']);
		}
		elseif ($aksi == "update") {
			$db->update($_POST['kode_persetujuan'], $_POST['tgl_persetujuan'], $_POST['kode_pengajuan'], $_POST['nipp']);
		}	
	}else{
		header("location:/pbd?page=persetujuan");
	}
	
	

?>