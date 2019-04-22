<?php
	class barang {
		private $mysqli;

		function __construct($conn){
			$this->mysqli=$conn;
		}
		public function tampil(){
			$sql = "SELECT barang.kode_barang, barang.no_seri, barang.kode_persetujuan, barang.kondisi, jenis.nama_jenis, merk_modal.nama_merk from barang join merk_modal on merk_modal.kode_merk=barang.kode_merk join persetujuan on barang.kode_persetujuan=persetujuan.kode_persetujuan join pengajuan on persetujuan.kode_pengajuan=pengajuan.kode_pengajuan join jenis on pengajuan.kode_jenis=jenis.kode_jenis ";
			$hasil = pg_query($sql);
			return $hasil;
		}

		function input($kode_barang, $no_seri,$kondisi,$tgl_pembelian,$th_pembuatan,$kode_persetujuan,$kode_merk,$keterangan){
			// die(far_dump([nama_pegawai, $nama_barang, $alamat, $keterangan]));
			$sql="insert into barang values('$kode_barang', '$no_seri', '$kondisi', '$tgl_pembelian', '$th_pembuatan', '$kode_persetujuan', '$kode_merk', '$keterangan')";
			$hasil = pg_query($sql);
			header("location:/pbd?page=barang");
		}

		function delete($id){
			$sql="delete from barang where kode_barang=$id";
			$hasil = pg_query($sql);
			header("location:/pbd?page=barang");
		}

		function update($kode_barang, $no_seri,$kondisi,$tgl_pembelian,$th_pembuatan,$kode_persetujuan,$kode_merk,$keterangan){
			// die(far_dump([nama_pegawai, $nama_barang, $alamat, $keterangan]));
			$sql="update barang set no_seri='$no_seri', kondisi='$kondisi', tgl_pembelian='$tgl_pembelian', th_pembuatan='$th_pembuatan', kode_persetujuan='$kode_persetujuan', kode_merk='$kode_merk', keterangan='$keterangan' where kode_barang='$kode_barang' ";
			$hasil = pg_query($sql);
			header("location:/pbd?page=barang");
		}
	}
?>