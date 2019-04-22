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
          DAFTAR MUTASI BARANG
          <br>PT KERETA API PERINTIS
          <br>TAHUN 2016
        </h3>

        <table border="1" style="width:100%">
          <thead>
            <tr>
              <th>No</th>
              
              <th>KODE MUTASI</th>
              <th>KODE BARANG</th>
              <th>JENIS BARANG</th>
              <th>TANGGAL MUTASI</th>
              <th>PEGAWAI PENANGGUNG JAWAB</th>
              <th>CABANG SEBELUM</th>
              <th>CABANG SESUDAH</th>
              <th>KONDISI BARANG</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $no = 1;
            $sql = pg_query("SELECT mutasi.kode_mutasi, barang.kode_barang, jenis.nama_jenis, mutasi.tgl_mutasi, pegawai.nama_pegawai, sebelum.nama_cabang as cabang_sebelum, sesudah.nama_cabang as cabang_sesudah, mutasi_barang.kondisi_barang from mutasi join mutasi_barang on mutasi.kode_mutasi=mutasi_barang.kode_mutasi join barang on mutasi_barang.kode_barang=barang.kode_barang join persetujuan on barang.kode_persetujuan=persetujuan.kode_persetujuan join pengajuan on persetujuan.kode_pengajuan=pengajuan.kode_pengajuan join jenis on pengajuan.kode_jenis=jenis.kode_jenis join pegawai on pegawai.nipp=mutasi.nipp join cabang as sebelum on mutasi.kode_cabang_sebelum=sebelum.kode_cabang join cabang as sesudah on mutasi.kode_cabang_sesudah=sesudah.kode_cabang");
            while($data = pg_fetch_array($sql)){
            ?>
            <tr>
              <td align="center"><?php echo $no++; ?></td>
              <td><?php echo $data['kode_mutasi'];  ?></td>
              <td><?php echo $data['kode_barang'];  ?></td>
              <td><?php echo $data['nama_jenis'];  ?></td>
              <td><?php echo $data['tgl_mutasi'];  ?></td>
              <td><?php echo $data['nama_pegawai'];  ?></td>
              <td><?php echo $data['cabang_sebelum'];  ?></td>
              <td><?php echo $data['cabang_sesudah'];  ?></td>
              <td><?php if ($data['kondisi_barang'] ==1){
							echo "baik";
						}elseif ($data['kondisi_barang'] ==2) {
							echo "kurang baik";
						}elseif ($data['kondisi_barang'] ==3) {
							echo "rusak";
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