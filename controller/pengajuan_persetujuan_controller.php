<?php

	include "controller.php";
	include "../models/pengajuan_persetujuan.php";
 	$db = new pengajuan_persetujuan($connection);

	if(isset($_GET['aksi'])){
		$aksi = $_GET['aksi'];
		if ($aksi =="tambah") {
			$db->input($_POST['kode_pengajuan_persetujuan'], $_POST['tgl_pengajuan'], $_POST['tgl_disetujui'], $_POST['kode_jenis'], $_POST['nipp'], $_POST['jumlah_barang'], $_POST['kode_satuan'], $_POST['keterangan']);
		}
		elseif ($aksi == "delete") {
			$db->delete($_GET['id']);
		}
		elseif ($aksi == "update") {
			$db->update($_POST['kode_pengajuan_persetujuan'], $_POST['tgl_pengajuan'], $_POST['tgl_disetujui'], $_POST['kode_jenis'], $_POST['nipp'], $_POST['jumlah_barang'], $_POST['kode_satuan'], $_POST['keterangan']);
		}
	}else{
		header("location:/pbd?page=pengajuan_persetujuan");
	}



?>
