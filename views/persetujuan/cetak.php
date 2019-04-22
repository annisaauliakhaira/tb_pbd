<?php

  include $_SERVER['DOCUMENT_ROOT'].'/pbd/config/koneksi.php';
  include $_SERVER['DOCUMENT_ROOT'].'/pbd/models/database.php';       

  $connection = new Database($host, $user, $pass, $database, $port) or die("Gagal");

  ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Cetak Persetujuan</title>
    <style type="text/css" media="print">
        @page {
            size: landscape;
        }
    </style>
  </head>
  <body>
      <center>
        <h3>
          DAFTAR PERSETUJUAN BARANG
          <br>PT KERETA API PERINTIS
          <br>TAHUN 2016
        </h3>

        <table border="1" style="width:100%">
          <thead>
            <tr>
              <th>No</th>
              <th>KODE PERSETUJUAN</th>
              <th>JENIS BARANG</th>
              <th>TANGGAL PERSETUJUAN</th>
              <th>KODE PENGAJUAN</th>
              <th>PEGAWAI PENANGGUNG JAWAB</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $no = 1;
            $sql = pg_query("SELECT persetujuan.kode_persetujuan, jenis.nama_jenis, persetujuan.tgl_persetujuan, pengajuan.kode_pengajuan, pegawai.nama_pegawai from persetujuan join pengajuan on persetujuan.kode_pengajuan=pengajuan.kode_pengajuan join jenis on pengajuan.kode_jenis=jenis.kode_jenis join pegawai on pegawai.nipp=persetujuan.nipp");
            while($data = pg_fetch_array($sql)){
            ?>
            <tr>
              <td align="center"><?php echo $no++; ?></td>
              <td><?php echo $data['kode_persetujuan'];  ?></td>
              <td><?php echo $data['nama_jenis'];  ?></td>
              <td><?php echo $data['tgl_persetujuan'];  ?></td>
              <td><?php echo $data['kode_pengajuan'];  ?></td>
              <td><?php echo $data['nama_pegawai'];  ?></td>
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