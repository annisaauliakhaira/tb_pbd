<?php
	class mutasi {
		private $mysqli;

		function __construct($conn){
			$this->mysqli=$conn;
		}
		public function tampil(){
			$sql = "SELECT mutasi.kode_mutasi, mutasi.tgl_mutasi, pegawai.nama_pegawai, sebelum.nama_cabang as cabang_sebelum, sesudah.nama_cabang as cabang_sesudah from mutasi join cabang as sebelum on mutasi.kode_cabang_sebelum=sebelum.kode_cabang join cabang as sesudah on mutasi.kode_cabang_sesudah=sesudah.kode_cabang join pegawai on pegawai.nipp=mutasi.nipp";
			$hasil = pg_query($sql);
			return $hasil;
		}

		function input($kode_mutasi, $tgl_mutasi,$nipp,$kode_cabang_sebelum,$kode_cabang_sesudah){
			// die(far_dump([nipp, $nama_mutasi, $alamat, $kode_cabang_sebelum]));
			$sql="insert into mutasi values('$kode_mutasi', '$tgl_mutasi', '$nipp',  '$kode_cabang_sebelum', '$kode_cabang_sesudah')";
			$hasil = pg_query($sql);
			header("location:/pbd?page=mutasi");
		}

		function delete($id){
			$sql="delete from mutasi where kode_mutasi=$id";
			$hasil = pg_query($sql);
			header("location:/pbd?page=mutasi");
		}

		function update($kode_mutasi,$tgl_mutasi,$nipp,$kode_cabang_sebelum,$kode_cabang_sesudah){
			// die(far_dump([nipp, $nama_mutasi, $alamat, $kode_cabang_sebelum, $kode_cabang_sesudah]));
			$sql="update mutasi set tgl_mutasi='$tgl_mutasi', nipp='$nipp', kode_cabang_sebelum='$kode_cabang_sebelum', kode_cabang_sesudah='$kode_cabang_sesudah' where kode_mutasi='$kode_mutasi' ";
			$hasil = pg_query($sql);
			header("location:/pbd?page=mutasi");
		}
	}
?>