<?php
	class jenis {
		private $mysqli;

		function __construct($conn){
			$this->mysqli=$conn;
		}
		public function tampil(){
			$sql = "SELECT * from jenis";
			$hasil = pg_query($sql);
			return $hasil;
		}

		function input($kode_jenis, $nama_jenis){
			// die(far_dump([$kode_jenis, $namajenis]));
			$sql="insert into jenis values('$kode_jenis', '$nama_jenis')";
			$hasil = pg_query($sql);
			header("location:/pbd?page=jenis");
		}

		function delete($id){
			$sql="delete from jenis where kode_jenis=$id";
			$hasil = pg_query($sql);
			header("location:/pbd?page=jenis");
		}

		function update($kode_jenis, $nama_jenis){
			// die(far_dump([$kode_jenis, $nama_jenis]));
			$sql="update jenis set nama_jenis='$nama_jenis' where kode_jenis='$kode_jenis' ";
			$hasil = pg_query($sql);
			header("location:/pbd?page=jenis");
		}
	}
?>