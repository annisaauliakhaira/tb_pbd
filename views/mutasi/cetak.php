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
              <th>TANGGAL MUTASI</th>
              <th>KODE BARANG</th>
              <th>JENIS BARANG</th>
              <th>CABANG</th>
              <th>PEGAWAI PENANGGUNG JAWAB</th>
              <th>KONDISI BARANG</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $no = 1;
            $sql = pg_query("SELECT mutasi.kode_mutasi, mutasi.tgl_mutasi, pegawai.nama_pegawai, cabang.nama_cabang, barang.kode_barang, jenis.nama_jenis, mutasi.kondisi from mutasi join cabang on mutasi.kode_cabang = cabang.kode_cabang join pegawai on mutasi.nipp = pegawai.nipp join barang on mutasi.kode_barang = barang.kode_barang join pengajuan_persetujuan on barang.kode_pengajuan_persetujuan = pengajuan_persetujuan.kode_pengajuan_persetujuan join jenis on pengajuan_persetujuan.kode_jenis = jenis.kode_jenis");
            while($data = pg_fetch_array($sql)){
            ?>
            <tr>
              <td align="center"><?php echo $no++; ?></td>
              <td><?php echo $data['kode_mutasi'];  ?></td>
              <td><?php echo $data['tgl_mutasi'];  ?></td>
              <td><?php echo $data['kode_barang'];  ?></td>
              <td><?php echo $data['nama_jenis'];  ?></td>
              <td><?php echo $data['nama_cabang'];  ?></td>
              <td><?php echo $data['nama_pegawai'];  ?></td>
              <td><?php if ($data['kondisi'] ==1){
							echo "baik";
						}elseif ($data['kondisi'] ==2) {
							echo "kurang baik";
						}elseif ($data['kondisi'] ==3) {
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