<?php
	class persetujuan {
		private $mysqli;

		function __construct($conn){
			$this->mysqli=$conn;
		}
		public function tampil(){
			$sql = "SELECT persetujuan.kode_persetujuan, persetujuan.tgl_persetujuan, pengajuan.kode_pengajuan, pegawai.nama_pegawai from persetujuan join pengajuan on pengajuan.kode_pengajuan=persetujuan.kode_pengajuan join pegawai on pegawai.nipp=persetujuan.nipp";
			$hasil = pg_query($sql);
			return $hasil;
		}

		function input($kode_persetujuan,$tgl_persetujuan,$kode_pengajuan,$nama_pegawai){
			// die(far_dump([nama_pegawai, $nama_persetujuan, $alamat, $keterangan]));
			$sql="insert into persetujuan values('$kode_persetujuan', '$tgl_persetujuan', '$kode_pengajuan', '$nama_pegawai')";
			$hasil = pg_query($sql);
			header("location:/pbd?page=persetujuan");
		}

		function delete($id){
			$sql="delete from persetujuan where kode_persetujuan=$id";
			$hasil = pg_query($sql);
			header("location:/pbd?page=persetujuan");
		}

		function update($kode_persetujuan,$tgl_persetujuan,$kode_pengajuan,$nama_pegawai){
			// die(far_dump([nama_pegawai, $nama_persetujuan, $alamat, $keterangan]));
			$sql="update persetujuan set tgl_persetujuan='$tgl_persetujuan', kode_pengajuan='$kode_pengajuan', nipp='$nama_pegawai' where kode_persetujuan='$kode_persetujuan' ";
			$hasil = pg_query($sql);
			header("location:/pbd?page=persetujuan");
		}
	}
?>