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
          DAFTAR INVENTARIS BARANG
          <br>PENYELENGGARAAN SUBSIDI ANGKUTAN KERETA API PERINTIS
          <br>TAHUN ANGGARAN 2016
        </h3>

        <table border="1" style="width:100%">
          <thead>
            <tr>
              <th>No</th>
              <th>NAMA/ JENIS BARANG</th>
              <th>MERK / MODEL</th>
              <th>NO SERI BARANG</th>
              <th>TAHUN PEMBUATAN</th>
              <th>NO KODE BARANG</th>
              <th>JUMLAH BARANG</th>
              <th>SATUAN</th>
              <th>KEADAAN BARANG</th>
              <th>DOKUMENTASI BARANG NO LIVRET</th>
              <th>KETERANGAN MUTASI BARANG</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $no = 1;
            $sql = pg_query("SELECT jenis.nama_jenis, merk_modal.nama_merk, barang.no_seri, barang.th_pembuatan, barang.kode_barang, cabang_barang.jumlah_barang, cabang_barang.satuan, barang.kondisi, cabang_barang.no_livret, barang.keterangan from barang join merk_modal on merk_modal.kode_merk=barang.kode_merk join cabang_barang on cabang_barang.kode_barang=barang.kode_barang join persetujuan on barang.kode_persetujuan=persetujuan.kode_persetujuan join pengajuan on persetujuan.kode_pengajuan=pengajuan.kode_pengajuan join jenis on pengajuan.kode_jenis=jenis.kode_jenis");
            while($data = pg_fetch_array($sql)){
            ?>
            <tr>
              <td align="center"><?php echo $no++; ?></td>
              <td><?php echo $data['nama_jenis'];  ?></td>
              <td><?php echo $data['nama_merk'];  ?></td>
              <td><?php echo $data['no_seri'];  ?></td>
              <td><?php echo $data['th_pembuatan'];  ?></td>
              <td><?php echo $data['kode_barang'];  ?></td>
              <td><?php echo $data['jumlah_barang'];  ?></td>
              <td><?php echo $data['satuan'];  ?></td>
              <td><?php echo $data['kondisi'];  ?></td>
              <td><?php echo $data['no_livret'];  ?></td>
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