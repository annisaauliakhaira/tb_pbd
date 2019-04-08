<?php
	class kp_ta {
		private $mysqli;

		function __construct($conn){
			$this->mysqli=$conn;
		}
		public function tampil($id = null){
			$db = $this->mysqli->conn;
			$sql = "SELECT DISTINCT kp_ta.kode_ta_kp, kp_ta.judul, inventaris_lea.kode_inventaris, kp_ta.mahasiswa, kp_ta.pembimbing, kp_ta.tahun from kp_ta join inventaris_lea on inventaris_lea.kode_inventaris=kp_ta.kode_inventaris";

			if ($id !=null) {
				$sql .= " WHERE kode_kp_ta = $id";
			}
			$query = $db->query($sql) or die($db->error);
			return $query;
		}
	}
?>