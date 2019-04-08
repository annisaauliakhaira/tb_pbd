<?php
	class Barang {
		private $mysqli;

		function __construct($conn){
			$this->mysqli=$conn;
		}
		public function tampil($id = null){
			$db = $this->mysqli->conn;
			$sql = "SELECT DISTINCT barang_lea.kode_barang, barang_lea.keterangan, inventaris_lea.kode_inventaris, inventaris_lea.jenis from barang_lea join inventaris_lea on inventaris_lea.kode_inventaris=barang_lea.kode_inventaris";

			if ($id !=null) {
				$sql .= " WHERE kode_barang = $id";
			}
			$query = $db->query($sql) or die($db->error);
			return $query;
		}
	}
?>