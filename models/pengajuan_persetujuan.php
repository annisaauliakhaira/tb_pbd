<?php
	class pengajuan_persetujuan {
		private $mysqli;

		function __construct($conn){
			$this->mysqli=$conn;
		}
		public function tampil(){
			$sql = "SELECT pengajuan_persetujuan.kode_pengajuan_persetujuan, jenis.nama_jenis, pengajuan_persetujuan.tgl_pengajuan, pengajuan_persetujuan.tgl_disetujui, pengajuan_persetujuan.jumlah_barang, satuan.nama_satuan, pegawai.nama_pegawai,  pengajuan_persetujuan.keterangan from pengajuan_persetujuan join jenis on jenis.kode_jenis=pengajuan_persetujuan.kode_jenis join pegawai on pegawai.nipp=pengajuan_persetujuan.nipp join satuan on satuan.kode_satuan=pengajuan_persetujuan.kode_satuan";
			$hasil = pg_query($sql);
			return $hasil;
		}

		function input($kode_pengajuan_persetujuan,$tgl_pengajuan,$tgl_disetujui,$kode_jenis,$nipp,$jumlah_barang,$kode_satuan,$keterangan){
			// die(far_dump([nama_pegawai, $nama_pengajuan_persetujuan, $alamat, $keterangan]));
			$sql="insert INTO public.pengajuan_persetujuan(kode_pengajuan_persetujuan, tgl_pengajuan, tgl_disetujui, kode_jenis, nipp, jumlah_barang, kode_satuan, keterangan)	VALUES ('$kode_pengajuan_persetujuan','$tgl_pengajuan','$tgl_disetujui','$kode_jenis','$nipp',$jumlah_barang,'$kode_satuan','$keterangan')";
			// die($sql);
			$hasil = pg_query($sql);
			header("location:/pbd?page=pengajuan_persetujuan");
		}

		function delete($id){
			$sql="delete from pengajuan_persetujuan where kode_pengajuan_persetujuan=$id";
			$hasil = pg_query($sql);
			header("location:/pbd?page=pengajuan_persetujuan");
		}

		function update($kode_pengajuan_persetujuan,$tgl_pengajuan,$tgl_disetujui,$kode_jenis,$nipp,$jumlah_barang,$kode_satuan,$keterangan){
			// die(far_dump([nama_pegawai, $nama_pengajuan_persetujuan, $alamat, $keterangan]));
			$sql="update pengajuan_persetujuan set kode_jenis='$kode_jenis', jumlah_barang='$jumlah_barang', kode_satuan='$kode_satuan', tgl_pengajuan='$tgl_pengajuan', tgl_disetujui='$tgl_disetujui', nipp='$nipp', keterangan='$keterangan' where kode_pengajuan_persetujuan='$kode_pengajuan_persetujuan' ";
			$hasil = pg_query($sql);
			header("location:/pbd?page=pengajuan_persetujuan");
		}

		public function cari($cari){
			if((int)$cari==0){
				$sql = "SELECT pengajuan_persetujuan.kode_pengajuan_persetujuan, jenis.nama_jenis, pengajuan_persetujuan.tgl_pengajuan, pengajuan_persetujuan.tgl_disetujui, pengajuan_persetujuan.jumlah_barang, satuan.nama_satuan, pegawai.nama_pegawai,  pengajuan_persetujuan.keterangan from pengajuan_persetujuan join jenis on jenis.kode_jenis=pengajuan_persetujuan.kode_jenis join pegawai on pegawai.nipp=pengajuan_persetujuan.nipp join satuan on satuan.kode_satuan=pengajuan_persetujuan.kode_satuan where  pengajuan_persetujuan.kode_pengajuan_persetujuan LIKE '%$cari%' OR jenis.nama_jenis LIKE '%$cari%' OR pengajuan_persetujuan.jumlah_barang LIKE '%$cari%' OR satuan.nama_satuan LIKE '%$cari%'  OR pegawai.nama_pegawai LIKE '%$cari%' OR pengajuan_persetujuan.keterangan LIKE '%$cari%' ";
			}else{
				//ada integer
				$sql = "SELECT pengajuan_persetujuan.kode_pengajuan_persetujuan, jenis.nama_jenis, pengajuan_persetujuan.tgl_pengajuan, pengajuan_persetujuan.tgl_disetujui, pengajuan_persetujuan.jumlah_barang, satuan.nama_satuan, pegawai.nama_pegawai,  pengajuan_persetujuan.keterangan  from pengajuan_persetujuan join jenis on jenis.kode_jenis=pengajuan_persetujuan.kode_jenis join pegawai on pegawai.nipp=pengajuan_persetujuan.nipp join satuan on satuan.kode_satuan=pengajuan_persetujuan.kode_satuan where  pengajuan_persetujuan.kode_pengajuan_persetujuan LIKE '%$cari%' OR jenis.nama_jenis LIKE '%$cari%' OR EXTRACT('day' FROM pengajuan_persetujuan.tgl_pengajuan)='$cari' OR EXTRACT('month' FROM pengajuan_persetujuan.tgl_pengajuan)='$cari' OR EXTRACT('year' FROM pengajuan_persetujuan.tgl_pengajuan)='$cari' OR EXTRACT('day' FROM pengajuan_persetujuan.tgl_disetujui)='$cari' OR EXTRACT('month' FROM pengajuan_persetujuan.tgl_disetujui)='$cari' OR EXTRACT('year' FROM pengajuan_persetujuan.tgl_disetujui)='$cari' OR pengajuan_persetujuan.jumlah_barang LIKE '%$cari%' OR satuan.nama_satuan LIKE '%$cari%' OR pegawai.nama_pegawai LIKE '%$cari%' OR pengajuan_persetujuan.keterangan LIKE '%$cari%' ";
			}
			// die($sql);
			$hasil = pg_query($sql);
			return $hasil;
		}
	}
?>
