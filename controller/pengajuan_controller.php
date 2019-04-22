<?php
	
	include "controller.php";
	include "../models/pengajuan.php";
 	$db = new pengajuan($connection);

	if(isset($_GET['aksi'])){
		$aksi = $_GET['aksi'];
		if ($aksi =="tambah") {
			$db->input($_POST['kode_pengajuan'], $_POST['kode_jenis'], $_POST['tgl_pengajuan'], $_POST['total'], $_POST['nipp'], $_POST['keterangan']);
		}
		elseif ($aksi == "delete") {
			$db->delete($_GET['id']);
		}
		elseif ($aksi == "update") {
			$db->update($_POST['kode_pengajuan'], $_POST['nama_jenis'], $_POST['tgl_pengajuan'], $_POST['total'], $_POST['nama_pegawai'], $_POST['keterangan']);
		}	
	}else{
		header("location:/pbd?page=pengajuan");
	}
	
	

?>