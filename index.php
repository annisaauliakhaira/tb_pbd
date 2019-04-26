<?php

  include $_SERVER['DOCUMENT_ROOT'].'/pbd/config/koneksi.php';
  include $_SERVER['DOCUMENT_ROOT'].'/pbd/models/database.php';       

  $connection = new Database($host, $user, $pass, $database, $port) or die("Gagal");

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Inventaris LEA</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="assets/css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
  </head>

  <body>

    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href=""> TB PBD </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            <li><a href="?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
           
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-shopping-chart"></i> Pegawai <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="?page=pegawai">Pegawai</a></li>
                <li><a href="?page=jabatan">Jabatan</a></li>
                <li><a href="?page=cabang">Cabang</a></li>

              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-shopping-chart"></i> Barang <b class="caret"></b></a>
              <ul class="dropdown-menu">
                
                <li><a href="?page=pengajuan">Pengajuan</a></li>
                <li><a href="?page=persetujuan">Persetujuan</a></li>
                <li><a href="?page=barang">Barang</a></li>
                <li><a href="?page=jenis">Jenis</a></li>
                <li><a href="?page=merk">Merek/Model</a></li>
                <li><a href="?page=cabang_barang">Cabang Barang</a></li>
                
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-shopping-chart"></i> Mutasi <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="?page=mutasi">Mutasi</a></li>
                <li><a href="?page=mutasi_barang">Mutasi Barang</a></li>
                
              </ul>
            </li>


          </ul>

          <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Khaira <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                <li><a href="#"><i class="fa fa-envelope"></i> Inbox <span class="badge">7</span></a></li>
                <li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
                <li class="divider"></li>
                <li><a href="#"><i class="fa fa-power-off"></i> Log Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>

      <div id="page-wrapper">
          <?php 

            if(isset($_GET['page'])){
              $page = $_GET['page'];
              if($page=='dashboard'){

              }elseif($page=='cabang'){  
                if(isset($_GET['aksi'])){
                  $aksi = $_GET['aksi'];
                  if ($aksi=='tambah') {
                    include $_SERVER['DOCUMENT_ROOT'].'/pbd/views/cabang/create.php';
                  }
                  elseif($aksi=='edit'){
                    include $_SERVER['DOCUMENT_ROOT'].'/pbd/views/cabang/edit.php';
                  }
                }else{
                  include $_SERVER['DOCUMENT_ROOT'].'/pbd/views/cabang/index.php';
                }
              }elseif($page=='barang'){  
                if(isset($_GET['aksi'])){
                  $aksi = $_GET['aksi'];
                  if ($aksi=='tambah') {
                    include $_SERVER['DOCUMENT_ROOT'].'/pbd/views/barang/create.php';
                  }elseif($aksi=='edit'){
                    include $_SERVER['DOCUMENT_ROOT'].'/pbd/views/barang/edit.php';
                  }
                }else{
                  include $_SERVER['DOCUMENT_ROOT'].'/pbd/views/barang/index.php';
                }
              }elseif($page=='cabang_barang'){  
                if(isset($_GET['aksi'])){
                  $aksi = $_GET['aksi'];
                  if ($aksi=='tambah') {
                    include $_SERVER['DOCUMENT_ROOT'].'/pbd/views/cabang_barang/create.php';
                  }elseif($aksi=='edit'){
                    include $_SERVER['DOCUMENT_ROOT'].'/pbd/views/cabang_barang/edit.php';
                  }
                }else{
                  include $_SERVER['DOCUMENT_ROOT'].'/pbd/views/cabang_barang/index.php';
                }
              }elseif($page=='mutasi_barang'){  
                if(isset($_GET['aksi'])){
                  $aksi = $_GET['aksi'];
                  if ($aksi=='tambah') {
                    include $_SERVER['DOCUMENT_ROOT'].'/pbd/views/mutasi_barang/create.php';
                  }elseif($aksi=='edit'){
                    include $_SERVER['DOCUMENT_ROOT'].'/pbd/views/mutasi_barang/edit.php';
                  }
                }else{
                  include $_SERVER['DOCUMENT_ROOT'].'/pbd/views/mutasi_barang/index.php';
                }
              }elseif($page=='jabatan'){  
                if(isset($_GET['aksi'])){
                  $aksi = $_GET['aksi'];
                  if ($aksi=='tambah') {
                    include $_SERVER['DOCUMENT_ROOT'].'/pbd/views/management/jabatan/create.php';
                  }
                  elseif($aksi=='edit'){
                    include $_SERVER['DOCUMENT_ROOT'].'/pbd/views/management/jabatan/edit.php';
                  }
                  }else{
                  include $_SERVER['DOCUMENT_ROOT'].'/pbd/views/management/jabatan/index.php';
                  }
              }elseif($page=='jenis'){  
                if(isset($_GET['aksi'])){
                  $aksi = $_GET['aksi'];
                  if ($aksi=='tambah') {
                    include $_SERVER['DOCUMENT_ROOT'].'/pbd/views/management/jenis/create.php';
                  }elseif($aksi=='edit'){
                    include $_SERVER['DOCUMENT_ROOT'].'/pbd/views/management/jenis/edit.php';
                  }
                }else{
                  include $_SERVER['DOCUMENT_ROOT'].'/pbd/views/management/jenis/index.php';
                }
              }elseif($page=='merk'){  
                if(isset($_GET['aksi'])){
                  $aksi = $_GET['aksi'];
                  if ($aksi=='tambah') {
                    include $_SERVER['DOCUMENT_ROOT'].'/pbd/views/management/merk/create.php';
                  }elseif($aksi=='edit'){
                    include $_SERVER['DOCUMENT_ROOT'].'/pbd/views/management/merk/edit.php';
                  }
                }else{
                  include $_SERVER['DOCUMENT_ROOT'].'/pbd/views/management/merk/index.php';
                }
              }elseif($page=='pegawai'){  
                if(isset($_GET['aksi'])){
                  $aksi = $_GET['aksi'];
                  if ($aksi=='tambah') {
                    include $_SERVER['DOCUMENT_ROOT'].'/pbd/views/pegawai/create.php';
                  }elseif($aksi=='edit'){
                    include $_SERVER['DOCUMENT_ROOT'].'/pbd/views/pegawai/edit.php';
                  }
                }else{
                  include $_SERVER['DOCUMENT_ROOT'].'/pbd/views/pegawai/index.php';
                }
              }elseif($page=='pengajuan'){  
                if(isset($_GET['aksi'])){
                  $aksi = $_GET['aksi'];
                  if ($aksi=='tambah') {
                    include $_SERVER['DOCUMENT_ROOT'].'/pbd/views/pengajuan/create.php';
                  }elseif($aksi=='edit'){
                    include $_SERVER['DOCUMENT_ROOT'].'/pbd/views/pengajuan/edit.php';
                  }
                }else{
                  include $_SERVER['DOCUMENT_ROOT'].'/pbd/views/pengajuan/index.php';
                }
              }elseif($page=='persetujuan'){  
                if(isset($_GET['aksi'])){
                  $aksi = $_GET['aksi'];
                  if ($aksi=='tambah') {
                    include $_SERVER['DOCUMENT_ROOT'].'/pbd/views/persetujuan/create.php';
                  }elseif($aksi=='edit'){
                    include $_SERVER['DOCUMENT_ROOT'].'/pbd/views/persetujuan/edit.php';
                  }
                }else{
                  include $_SERVER['DOCUMENT_ROOT'].'/pbd/views/persetujuan/index.php';
                }
              }elseif($page=='mutasi'){  
                if(isset($_GET['aksi'])){
                  $aksi = $_GET['aksi'];
                  if ($aksi=='tambah') {
                    include $_SERVER['DOCUMENT_ROOT'].'/pbd/views/mutasi/create.php';
                  }elseif($aksi=='edit'){
                    include $_SERVER['DOCUMENT_ROOT'].'/pbd/views/mutasi/edit.php';
                  }
                }else{
                  include $_SERVER['DOCUMENT_ROOT'].'/pbd/views/mutasi/index.php';
                }
              }
            }

           ?>
      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.js"></script>

  </body>
</html>