<?php
	class pegawai {
		private $mysqli;

		function __construct($conn){
			$this->mysqli=$conn;
		}
		public function tampil(){
			$sql = "SELECT pegawai.nipp, pegawai.nama_pegawai, pegawai.alamat, jabatan.nama_jabatan, cabang.nama_cabang, pegawai.keterangan from pegawai join jabatan on jabatan.kode_jabatan=pegawai.kode_jabatan join cabang on cabang.kode_cabang=pegawai.kode_cabang";
			$hasil = pg_query($sql);
			return $hasil;
		}

		function input($nipp, $nama_pegawai,$alamat,$kode_jabatan,$kode_cabang,$jenis_kelamin,$keterangan){
			// die(far_dump([$nipp, $nama_pegawai, $alamat, $keterangan]));
			$sql="insert into pegawai values('$nipp', '$nama_pegawai', '$alamat', '$kode_jabatan', '$kode_cabang', '$jenis_kelamin', '$keterangan')";
			$hasil = pg_query($sql);
			header("location:/pbd?page=pegawai");
		}

		function delete($id){
			$sql="delete from pegawai where nipp=$id";
			$hasil = pg_query($sql);
			header("location:/pbd?page=pegawai");
		}

		function update($nipp, $nama_pegawai, $alamat, $kode_jabatan,$kode_cabang,$jenis_kelamin,$keterangan){
			// die(far_dump([$nipp, $nama_pegawai, $alamat, $keterangan]));
			$sql="update pegawai set nama_pegawai='$nama_pegawai', alamat='$alamat', '$kode_jabatan', '$kode_cabang', '$jenis_kelamin', keterangan='$keterangan' where nipp='$nipp' ";
			$hasil = pg_query($sql);
			header("location:/pbd?page=pegawai");
		}
	}
?>