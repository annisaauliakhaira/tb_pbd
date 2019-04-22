<?php
	class pengajuan {
		private $mysqli;

		function __construct($conn){
			$this->mysqli=$conn;
		}
		public function tampil(){
			$sql = "SELECT pengajuan.kode_pengajuan, jenis.nama_jenis, pengajuan.tgl_pengajuan, pengajuan.total, pegawai.nama_pegawai, pengajuan.keterangan from pengajuan join jenis on jenis.kode_jenis=pengajuan.kode_jenis join pegawai on pegawai.nipp=pengajuan.nipp";
			$hasil = pg_query($sql);
			return $hasil;
		}

		function input($kode_pengajuan, $nama_jenis,$tgl_pengajuan,$total,$nama_pegawai,$keterangan){
			// die(far_dump([nama_pegawai, $nama_pengajuan, $alamat, $keterangan]));
			$sql="insert into pengajuan values('$kode_pengajuan', '$nama_jenis', '$tgl_pengajuan', '$total', '$nama_pegawai', '$keterangan')";
			$hasil = pg_query($sql);
			header("location:/pbd?page=pengajuan");
		}

		function delete($id){
			$sql="delete from pengajuan where kode_pengajuan=$id";
			$hasil = pg_query($sql);
			header("location:/pbd?page=pengajuan");
		}

		function update($kode_pengajuan, $nama_jenis,$tgl_pengajuan,$total,$nama_pegawai,$keterangan){
			// die(far_dump([nama_pegawai, $nama_pengajuan, $alamat, $keterangan]));
			$sql="update pengajuan set nama_jenis='$nama_jenis', tgl_pengajuan='$tgl_pengajuan', total='$total', nama_pegawai='$nama_pegawai', keterangan='$keterangan' where kode_pengajuan='$kode_pengajuan' ";
			$hasil = pg_query($sql);
			header("location:/pbd?page=pengajuan");
		}
	}
?>