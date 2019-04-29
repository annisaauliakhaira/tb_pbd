<?php
	class mutasi {
		private $mysqli;

		function __construct($conn){
			$this->mysqli=$conn;
		}
		public function tampil(){
			$sql = "SELECT mutasi.kode_mutasi, mutasi.tgl_mutasi, pegawai.nama_pegawai, cabang.nama_cabang, barang.kode_barang, jenis.nama_jenis, mutasi.kondisi from mutasi join cabang on mutasi.kode_cabang = cabang.kode_cabang join pegawai on mutasi.nipp = pegawai.nipp join barang on mutasi.kode_barang = barang.kode_barang join pengajuan_persetujuan on barang.kode_pengajuan_persetujuan = pengajuan_persetujuan.kode_pengajuan_persetujuan join jenis on pengajuan_persetujuan.kode_jenis = jenis.kode_jenis";
			$hasil = pg_query($sql);
			return $hasil;
		}

		function input($kode_mutasi, $tgl_mutasi,$nipp,$kode_cabang,$kode_barang,$kondisi){
			// die(far_dump([$kode_mutasi, $tgl_mutasi,$nipp,$kode_cabang,$kode_barang,$kondisi]));
			$sql="insert into mutasi(kode_mutasi,tgl_mutasi,nipp,kode_cabang,kode_barang,kondisi) values('$kode_mutasi', '$tgl_mutasi', '$nipp', '$kode_cabang', '$kode_barang','$kondisi')";
			$hasil = pg_query($sql);
			header("location:/pbd?page=mutasi");
		}

		function delete($id){
			$sql="delete from mutasi where kode_mutasi=$id";
			$hasil = pg_query($sql);
			header("location:/pbd?page=mutasi");
		}

		function update($kode_mutasi,$tgl_mutasi,$nipp,$kode_cabang,$kode_barang,$kondisi){
			// die(far_dump([nipp, $nama_mutasi, $alamat,$kode_cabang,$kode_barang,$kondisi]));
			$sql="update mutasi set tgl_mutasi='$tgl_mutasi', nipp='$nipp', kode_cabang='$kode_cabang', kode_barang='$kode_barang', kondisi='$kondisi' where kode_mutasi='$kode_mutasi' ";
			$hasil = pg_query($sql);
			header("location:/pbd?page=mutasi");
		}

		function pegawai($kode_cabang){
			$sql="select nipp ,nama_pegawai from pegawai where kode_cabang='$kode_cabang'";
			$hasil=pg_query($sql);
			$datas = [];
			while ($data = pg_fetch_object($hasil)) {
				array_push($datas, $data);
			}
			echo json_encode($datas); 
		}
	}
?>