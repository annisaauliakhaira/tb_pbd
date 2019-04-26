<?php
	class barang {
		private $mysqli;

		function __construct($conn){
			$this->mysqli=$conn;
		}
		public function tampil(){
			$sql = "select barang.kode_barang, barang.no_seri, barang.kondisi, barang.kode_pengajuan_persetujuan as kode_pengajuan, jenis.nama_jenis, merk_modal.nama_merk from barang join pengajuan_persetujuan on barang.kode_pengajuan_persetujuan = pengajuan_persetujuan.kode_pengajuan_persetujuan join jenis on pengajuan_persetujuan.kode_jenis = jenis.kode_jenis join merk_modal on barang.kode_merk = merk_modal.kode_merk";
			$hasil = pg_query($sql);
			return $hasil;
		}

		function input($kode_barang, $kode_merk, $no_seri, $th_pembuatan, $kondisi, $no_livret, $kode_persetujuan,$kode_cabang){
			$sql="insert INTO public.barang(kode_barang, kode_merk, no_seri, th_pembuatan, kondisi, no_livret, kode_pengajuan_persetujuan, kode_cabang)	VALUES ('$kode_barang', '$kode_merk', '$no_seri', '$th_pembuatan', $kondisi, '$no_livret', '$kode_persetujuan','$kode_cabang');";
			$hasil = pg_query($sql);
			header("location:/pbd?page=barang");
		}

		function delete($id){
			$sql="delete from barang where kode_barang=$id";
			$hasil = pg_query($sql);
			header("location:/pbd?page=barang");
		}

		function update($kode_barang, $kode_merk, $no_seri, $th_pembuatan, $kondisi, $no_livret, $kode_persetujuan,$kode_cabang){
			// die(far_dump([nama_pegawai, $nama_barang, $alamat, $keterangan]));
			$sql="update barang set no_seri='$no_seri', kondisi='$kondisi', th_pembuatan='$th_pembuatan', kode_pengajuan_persetujuan='$kode_persetujuan', kode_merk='$kode_merk', kode_cabang='$kode_cabang', no_livret='$no_livret' where kode_barang='$kode_barang' ";
			$hasil = pg_query($sql);
			header("location:/pbd?page=barang");
		}

		public function cari($cari){
			$sql = "SELECT barang.kode_barang, barang.no_seri, barang.kode_persetujuan, barang.kondisi, jenis.nama_jenis, merk_modal.nama_merk from barang join merk_modal on merk_modal.kode_merk=barang.kode_merk join persetujuan on barang.kode_persetujuan=persetujuan.kode_persetujuan join pengajuan on persetujuan.kode_pengajuan=pengajuan.kode_pengajuan join jenis on pengajuan.kode_jenis=jenis.kode_jenis where barang.kode_barang LIKE '%$cari%' ";
			$hasil = pg_query($sql);
			return $hasil;
		}
	}
?>
