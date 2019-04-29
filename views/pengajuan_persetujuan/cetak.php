<?php

  include $_SERVER['DOCUMENT_ROOT'].'/pbd/config/koneksi.php';
  include $_SERVER['DOCUMENT_ROOT'].'/pbd/models/database.php';       

  $connection = new Database($host, $user, $pass, $database, $port) or die("Gagal");

  ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Cetak Pengajuan</title>
    <style type="text/css" media="print">
        @page {
            size: landscape;
        }
    </style>
  </head>
  <body>
      <center>
        <h3>
          DAFTAR PENGAJUAN BARANG
          <br>PT KERETA API PERINTIS
          <br>TAHUN 2016
        </h3>

        <table border="1" style="width:100%">
          <thead>
            <tr>
              <th>No</th>
              <th>KODE PENGAJUAN</th>
              <th>JENIS BARANG</th>
              <th>TANGGAL PENGAJUAN</th>
              <th>TANGGAL DISETUJUI</th>
              <th>JUMLAH PENGAJUAN</th>
              <th>PEGAWAI PENANGGUNG JAWAB</th>
              <th>KETERANGAN</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $no = 1;
            $sql = pg_query("SELECT pengajuan_persetujuan.kode_pengajuan_persetujuan, jenis.nama_jenis, pengajuan_persetujuan.tgl_pengajuan, pengajuan_persetujuan.tgl_disetujui, concat(pengajuan_persetujuan.jumlah_barang,' ',satuan.nama_satuan) as total, pegawai.nama_pegawai,  pengajuan_persetujuan.keterangan from pengajuan_persetujuan join jenis on jenis.kode_jenis=pengajuan_persetujuan.kode_jenis join pegawai on pegawai.nipp=pengajuan_persetujuan.nipp join satuan on satuan.kode_satuan=pengajuan_persetujuan.kode_satuan");
            while($data = pg_fetch_array($sql)){
            ?>
            <tr>
              <td align="center"><?php echo $no++; ?></td>
              <td><?php echo $data['kode_pengajuan_persetujuan'];  ?></td>
              <td><?php echo $data['nama_jenis'];  ?></td>
              <td><?php echo $data['tgl_pengajuan'];  ?></td>
              <td><?php echo $data['tgl_disetujui'];  ?></td>
              <td><?php echo $data['total'];  ?></td>
              <td><?php echo $data['nama_pegawai'];  ?></td>
              <td><?php echo $data['keterangan'];  ?></td>
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