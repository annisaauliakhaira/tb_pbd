<?php
	class cabang_barang {
		private $mysqli;

		function __construct($conn){
			$this->mysqli=$conn;
		}
		public function tampil(){
			$sql = "SELECT cabang.kode_cabang, cabang.nama_cabang, barang.kode_barang, cabang_barang.status, cabang_barang.kondisi_barang, cabang_barang.no_livret from cabang_barang join cabang on cabang.kode_cabang=cabang_barang.kode_cabang join barang on barang.kode_barang=cabang_barang.kode_barang";
			$hasil = pg_query($sql);
			return $hasil;
		}

		function input($kode_cabang,$kode_barang,$status,$kondisi_barang, $no_livret){
			$sql="insert into cabang_barang (kode_cabang,kode_barang,status,kondisi_barang,no_livret) values('$kode_cabang', '$kode_barang', '$status', '$kondisi_barang', '$no_livret')";
			$hasil = pg_query($sql);
			header("location:/pbd?page=cabang_barang");
		}

		function delete($kode_cabang,$kode_barang){
			$sql="delete from cabang_barang  where kode_cabang=$kode_cabang AND kode_barang=$kode_barang ";
			$hasil = pg_query($sql);
			header("location:/pbd?page=cabang_barang"); 
		}

		function update($kode_cabang,$kode_barang,$status,$kondisi_barang,$no_livret){
			$sql="update cabang_barang set kode_cabang='$kode_cabang', kode_barang='$kode_barang', status='$status', kondisi_barang='$kondisi_barang', no_livret='$no_livret' where kode_cabang='$kode_cabang' AND kode_barang='$kode_barang' ";
			$hasil = pg_query($sql);
			header("location:/pbd?page=cabang_barang");
		}
	}
?>