<?php

  include $_SERVER['DOCUMENT_ROOT'].'/pbd/config/koneksi.php';
  include $_SERVER['DOCUMENT_ROOT'].'/pbd/models/database.php';       

  $connection = new Database($host, $user, $pass, $database, $port) or die("Gagal");

  ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Cetak Barang</title>
    <style type="text/css" media="print">
        @page {
            size: landscape;
        }
    </style>
  </head>
  <body>
      <center>
        <h3>
          DAFTAR PEGAWAI
          <br>PENYELENGGARAAN SUBSIDI ANGKUTAN KERETA API PERINTIS
          <br>TAHUN ANGGARAN 2016
        </h3>

        <table border="1" style="width:100%">
          <thead>
            <tr>
              <th>No</th>
              
              <th>CABANG</th>
              <th>NIPP</th>
              <th>NAMA KARYAWAN</th>
              <th>ALAMAT</th>
              <th>JENIS KELAMIN</th>
              <th>JABATAN</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $no = 1;
            $sql = pg_query("SELECT cabang.nama_cabang, pegawai.nipp, pegawai.nama_pegawai, pegawai.alamat, pegawai.jenis_kelamin, jabatan.nama_jabatan from pegawai join jabatan on jabatan.kode_jabatan=pegawai.kode_jabatan join cabang on pegawai.kode_cabang=cabang.kode_cabang");
            while($data = pg_fetch_array($sql)){
            ?>
            <tr>
              <td align="center"><?php echo $no++; ?></td>
              <td><?php echo $data['nama_cabang'];  ?></td>
              <td><?php echo $data['nipp'];  ?></td>
              <td><?php echo $data['nama_pegawai'];  ?></td>
              <td><?php echo $data['alamat'];  ?></td>
              <td><?php echo $data['jenis_kelamin'];  ?></td>
              <td><?php if ($data['jenis_kelamin'] ==1){
							echo "laki-laki";
						}elseif ($data['jenis_kelamin'] ==2) {
							echo "perempuan";
						}  ?></td>
            </tr>
            <?php 
              }
              ?>
          </tbody>
        </table>

      </center>
  </body>
</html>

<script>
    window.print();
  </script>