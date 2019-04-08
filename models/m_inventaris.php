<?php
	class Inventaris {
		private $mysqli;

		function __construct($conn){
			$this->mysqli=$conn;
		}
		public function tampil($id = null){
			$db = $this->mysqli->conn;
			$sql = "SELECT * from inventaris_lea";

			if ($id !=null) {
				$sql .= " WHERE kode_inventaris = $id";
			}
			$query = $db->query($sql) or die($db->error);
			return $query;
		}

		function input($kode_inventaris, $jenis){
			// die(far_dump([$kode_inventaris, $jenis]));
			mysqli_query($db, "insert into inventaris_lea values('', $kode_inventaris', '$jenis')");
		}
	}
?>