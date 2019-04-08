<?php
	class merk {
		private $mysqli;

		function __construct($conn){
			$this->mysqli=$conn;
		}
		public function tampil(){
			$sql = "SELECT * from merk_modal";
			$hasil = pg_query($sql);
			return $hasil;
		}

		function input($kode_merk, $nama_merk){
			// die(far_dump([$kode_merk, $namamerk]));
			$sql="insert into merk_modal values('$kode_merk', '$nama_merk')";
			$hasil = pg_query($sql);
			header("location:/pbd?page=merk");
		}

		function delete($id){
			$sql="delete from merk_modal where kode_merk=$id";
			$hasil = pg_query($sql);
			header("location:/pbd?page=merk");
		}

		function update($kode_merk, $nama_merk){
			// die(far_dump([$kode_merk, $nama_merk]));
			$sql="update merk_modal set nama_merk='$nama_merk' where kode_merk='$kode_merk' ";
			$hasil = pg_query($sql);
			header("location:/pbd?page=merk");
		}
	}
?>