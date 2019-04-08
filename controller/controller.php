<?php
	require_once('../config/koneksi.php');
  	require_once('../models/database.php');

	$connection = new Database($host, $user, $pass, $database, $port) or die("Gagal");

?>