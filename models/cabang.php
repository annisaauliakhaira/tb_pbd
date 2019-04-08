<?php
	class cabang {
		private $mysqli;

		function __construct($conn){
			$this->mysqli=$conn;
		}
		public function tampil(){
			$sql = "SELECT * from cabang";
			$hasil = pg_query($sql);
			return $hasil;
		}

		function input($kode_cabang, $nama_cabang, $alamat, $keterangan){
			// die(far_dump([$kode_cabang, $nama_cabang, $alamat, $keterangan]));
			$sql="insert into cabang values('$kode_cabang', '$nama_cabang', '$alamat', '$keterangan')";
			$hasil = pg_query($sql);
			header("location:/pbd?page=cabang");
		}

		function delete($id){
			$sql="delete from cabang where kode_cabang=$id";
			$hasil = pg_query($sql);
			header("location:/pbd?page=cabang");
		}

		function update($kode_cabang, $nama_cabang, $alamat, $keterangan){
			// die(far_dump([$kode_cabang, $nama_cabang, $alamat, $keterangan]));
			$sql="update cabang set nama_cabang='$nama_cabang', alamat='$alamat', keterangan='$keterangan' where kode_cabang='$kode_cabang' ";
			$hasil = pg_query($sql);
			header("location:/pbd?page=cabang");
		}
	}
?>