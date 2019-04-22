<?php
	
	include "controller.php";
	include "../models/pegawai.php";
 	$db = new Pegawai($connection);

	if(isset($_GET['aksi'])){
		$aksi = $_GET['aksi'];
		if ($aksi =="tambah") {
			$db->input($_POST['kode_pegawai'], $_POST['nama_pegawai'], $_POST['alamat'], $_POST['kode_jabatan'], $_POST['kode_cabang'], $_POST['jenis_kelamin'], $_POST['keterangan']);
			die("berhasil");
		}
		elseif ($aksi == "delete") {
			$db->delete($_GET['id']);
		}
		elseif ($aksi == "update") {
			$db->update($_POST['nipp'], $_POST['nama_pegawai'], $_POST['alamat'], $_POST['kode_jabatan'], $_POST['kode_cabang'], $_POST['jenis_kelamin'], $_POST['keterangan']);
		}	
	}else{
		header("location:/pbd?page=pegawai");
	}
	
	


?>