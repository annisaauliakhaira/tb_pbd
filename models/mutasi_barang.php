<?php
	class mutasi_barang {
		private $mysqli;

		function __construct($conn){
			$this->mysqli=$conn;
		}
		public function tampil(){
			$sql = "SELECT  barang.kode_barang, mutasi.kode_mutasi, mutasi_barang.kondisi_barang from mutasi_barang join mutasi on mutasi.kode_mutasi=mutasi_barang.kode_mutasi join barang on barang.kode_barang=mutasi_barang.kode_barang";
			$hasil = pg_query($sql);
			return $hasil;
		}

		function input($kode_mutasi,$kode_barang,$kondisi_barang){
			$sql="insert into mutasi_barang values('$kode_mutasi', '$kode_barang', '$kondisi_barang')";
			$hasil = pg_query($sql);
			header("location:/pbd?page=mutasi_barang");
		}

		function delete($kode_mutasi,$kode_barang){
			$sql="delete from mutasi_barang where kode_mutasi=$kode_mutasi AND kode_barang=$kode_barang";
			$hasil = pg_query($sql);
			header("location:/pbd?page=mutasi_barang");
		}

		function update($kode_mutasi,$kode_barang,$kondisi_barang){
			$sql="update mutasi_barang set kode_mutasi='$kode_mutasi', kode_barang='$kode_barang',  kondisi_barang='$kondisi_barang' where kode_mutasi='$kode_mutasi' AND kode_barang='$kode_barang' ";
			$hasil = pg_query($sql);
			header("location:/pbd?page=mutasi_barang");
		}
	}
?>