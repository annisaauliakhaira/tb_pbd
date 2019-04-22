<?php
	class jabatan {
		private $mysqli;

		function __construct($conn){
			$this->mysqli=$conn;
		}
		public function tampil(){
			$sql = "SELECT * from jabatan";
			$hasil = pg_query($sql);
			return $hasil;
		}

		function input($kode_jabatan, $nama_jabatan){
			// die(far_dump([$kode_jabatan, $namajabatan]));
			$sql="insert into jabatan values('$kode_jabatan', '$nama_jabatan')";
			$hasil = pg_query($sql);
			header("location:/pbd?page=jabatan");
		}

		function delete($id){
			$sql="delete from jabatan where kode_jabatan=$id";
			$hasil = pg_query($sql);
			header("location:/pbd?page=jabatan");
		}

		function update($kode_jabatan, $nama_jabatan){
			// die(far_dump([$kode_jabatan, $nama_jabatan]));
			$sql="update jabatan set nama_jabatan='$nama_jabatan' where kode_jabatan='$kode_jabatan' ";
			$hasil = pg_query($sql);
			header("location:/pbd?page=jabatan");
		}

		public function cari($cari){
				$sql = "SELECT * from jabatan where  kode_jabatan LIKE'%$cari%' OR nama_jabatan LIKE '%$cari%' ";
			
			// die($sql);
			$hasil = pg_query($sql);
			return $hasil;
		}
	}
?>