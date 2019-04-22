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

		function input($kode_pengajuan,$kode_jenis,$tgl_pengajuan,$total,$nipp,$keterangan){
			// die(far_dump([nama_pegawai, $nama_pengajuan, $alamat, $keterangan]));
			$sql="insert into pengajuan values('$kode_pengajuan', '$kode_jenis', '$tgl_pengajuan', '$total', '$nipp', '$keterangan')";
			$hasil = pg_query($sql);
			header("location:/pbd?page=pengajuan");
		}

		function delete($id){
			$sql="delete from pengajuan where kode_pengajuan=$id";
			$hasil = pg_query($sql);
			header("location:/pbd?page=pengajuan");
		}

		function update($kode_pengajuan,$kode_jenis,$tgl_pengajuan,$total,$nipp,$keterangan){
			// die(far_dump([nama_pegawai, $nama_pengajuan, $alamat, $keterangan]));
			$sql="update pengajuan set kode_jenis='$kode_jenis', tgl_pengajuan='$tgl_pengajuan', total='$total', nipp='$nipp', keterangan='$keterangan' where kode_pengajuan='$kode_pengajuan' ";
			$hasil = pg_query($sql);
			header("location:/pbd?page=pengajuan");
		}

		public function cari($cari){
			if((int)$cari==0){
				$sql = "SELECT pengajuan.kode_pengajuan, jenis.nama_jenis, pengajuan.tgl_pengajuan, pengajuan.total, pegawai.nama_pegawai, pengajuan.keterangan from pengajuan join jenis on jenis.kode_jenis=pengajuan.kode_jenis join pegawai on pegawai.nipp=pengajuan.nipp where  pengajuan.kode_pengajuan LIKE '%$cari%' OR jenis.nama_jenis LIKE '%$cari%'  OR pengajuan.total=$cari OR pegawai.nama_pegawai LIKE '%$cari%' OR pengajuan.keterangan LIKE '%$cari%' ";
			}else{
				//ada integer
				$sql = "SELECT pengajuan.kode_pengajuan, jenis.nama_jenis, pengajuan.tgl_pengajuan, pengajuan.total, pegawai.nama_pegawai, pengajuan.keterangan from pengajuan join jenis on jenis.kode_jenis=pengajuan.kode_jenis join pegawai on pegawai.nipp=pengajuan.nipp where  pengajuan.kode_pengajuan LIKE '%$cari%' OR jenis.nama_jenis LIKE '%$cari%' OR EXTRACT('day' FROM pengajuan.tgl_pengajuan)='$cari' OR EXTRACT('month' FROM pengajuan.tgl_pengajuan)='$cari' OR EXTRACT('year' FROM pengajuan.tgl_pengajuan)='$cari' OR pengajuan.total=$cari OR pegawai.nama_pegawai LIKE '%$cari%' OR pengajuan.keterangan LIKE '%$cari%' ";
			}
			// die($sql);
			$hasil = pg_query($sql);
			return $hasil;
		}
	}
?>