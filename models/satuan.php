<?php
	class satuan {
		private $mysqli;
 
		function __construct($conn){
			$this->mysqli=$conn;
		}
		public function tampil(){
			$sql = "SELECT * from satuan";
			$hasil = pg_query($sql);
			return $hasil;
		}

		function input($kode_satuan, $nama_satuan){
			// die(far_dump([$kode_satuan, $namasatuan]));
			$sql="insert into satuan values('$kode_satuan', '$nama_satuan')";
			$hasil = pg_query($sql);
			header("location:/pbd?page=satuan");
		}

		function delete($id){
			$sql="delete from satuan where kode_satuan=$id";
			$hasil = pg_query($sql);
			header("location:/pbd?page=satuan");
		}

		function update($kode_satuan, $nama_satuan){
			// die(far_dump([$kode_satuan, $nama_satuan]));
			$sql="update satuan set nama_satuan='$nama_satuan' where kode_satuan='$kode_satuan' ";
			$hasil = pg_query($sql);
			header("location:/pbd?page=satuan");
		}

		public function cari($cari){
			if((int)$cari==0){
				$sql = "SELECT * from satuan where  nama_satuan LIKE '%$cari%' ";
			}else{
				//ada integer
				$sql = "SELECT * from satuan where  kode_satuan lIKE '%$cari%' OR nama_satuan LIKE '%$cari%' ";
			}
			// die($sql);
			$hasil = pg_query($sql);
			return $hasil;
		}
	}
?>