<?php

  include $_SERVER['DOCUMENT_ROOT'].'/pbd/config/koneksi.php';
  include $_SERVER['DOCUMENT_ROOT'].'/pbd/models/database.php';       

  $connection = new Database($host, $user, $pass, $database, $port) or die("Gagal");

  $nama = null;
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

      <?php  
        function bulan($data='')
        {
            if($data==1){
              return "Januari";
            }elseif($data==2){
              return "Februari";
            }elseif($data==3){
              return "Maret";
            }elseif($data==4){
              return "April";
            }elseif($data==5){
              return "Mei";
            }elseif($data==6){
              return "Juni";
            }elseif($data==7){
              return "Juli";
            }elseif($data==8){
              return "Agustus";
            }elseif($data==9){
              return "September";
            }elseif($data==10){
              return "Oktober";
            }elseif($data==11){
              return "November";
            }elseif($data==12){
              return "Desember";
            }
        }

        $cabang = "SELECT cabang.* FROM public.cabang join barang on cabang.kode_cabang = barang.kode_cabang";
        if(isset($_GET['kode_cabang'])){
          $kodes = $_GET['kode_cabang'];
          $cabang = "SELECT cabang.* FROM public.cabang join barang on cabang.kode_cabang = barang.kode_cabang where cabang.kode_cabang = '$kodes'";
        }
        $resault = pg_query($cabang);
        while($datas = pg_fetch_array($resault)){
      ?>

      <center>
        <h3>
          DAFTAR INVENTARIS BARANG
          <br>PENYELENGGARAAN SUBSIDI ANGKUTAN KERETA API PERINTIS
          <br>TAHUN ANGGARAN 2016
        </h3>
      </center>

      Lokasi / Atau Ruang : <?php echo $datas['nama_cabang']; ?>  
      <center>
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
              <th>KEADAAN BARANG</th>
              <th>DOKUMENTASI BARANG NO LIVRET</th>
              <th>KETERANGAN MUTASI BARANG</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $h1 = $datas['kode_cabang'];
            $no = 1;
            $sql = "select jenis.nama_jenis, merk_modal.nama_merk, barang.no_seri, barang.th_pembuatan, barang.kode_barang, concat(pengajuan_persetujuan.jumlah_barang,' ',satuan.nama_satuan) as total, barang.kondisi, barang.no_livret, mutasi.kode_mutasi from barang join mutasi on barang.kode_barang = mutasi.kode_barang join merk_modal on barang.kode_merk = merk_modal.kode_merk join pengajuan_persetujuan on barang.kode_pengajuan_persetujuan = pengajuan_persetujuan.kode_pengajuan_persetujuan join jenis on pengajuan_persetujuan.kode_jenis = jenis.kode_jenis join satuan on pengajuan_persetujuan.kode_satuan = satuan.kode_satuan where barang.kode_cabang = '$h1'";
            $hasil = pg_query($sql);
            while($data = pg_fetch_array($hasil)){
            ?>
            <tr>
              <td align="center"><?php echo $no++; ?></td>
              <td><?php echo $data['nama_jenis'];  ?></td>
              <td><?php echo $data['nama_merk'];  ?></td>
              <td><?php echo $data['no_seri'];  ?></td>
              <td><?php echo $data['th_pembuatan'];  ?></td>
              <td><?php echo $data['kode_barang'];  ?></td>
              <td><?php echo $data['total'];  ?></td>
              <td><?php echo $data['kondisi'];  ?></td>
              <td><?php echo $data['no_livret'];  ?></td>
              <td><?php echo $data['kode_mutasi'];  ?></td>
            </tr>
            <?php 
              }
              ?>
          </tbody>
        </table>
        <br><br><br><br>
        <div align="right" style="margin-right: 20px">
          <table>
            <tr>
              <td>
                <center>
                  Padang, <?php echo date('d').' '.bulan(date('m')).' '.date('Y'); ?><br>
                  Mengetahui / Setuju <br>
                  <b>Manager Keuangan & SDM</b>
                  <br><br><br><br>
                  <?php 

                    $kode_cabang = $datas['kode_cabang'];
                    $ss = "select nama_pegawai, nipp from pegawai where kode_cabang = '$kode_cabang' AND kode_jabatan = 'J3' limit 1";
                    $pp = pg_query($ss);
                    $nama = null;
                    $nipp = null;
                    while($mms = pg_fetch_array($pp)){
                      $nama = $mms['nama_pegawai'];
                      $nipp = $mms['nipp'];
                    }
                  ?>
                  <b><u><?php if($nama==null){echo "INDARTI OCTARIA";}else{echo $nama;} ?></u></b><br>
                  <b>NIPP. <?php if($nipp==null){echo "46581";}else{echo $nipp;} ?></b>
                </center>
              </td>
            </tr>
          </table>
        </div>
        <br><br><br><br>
      </center>
        <?php } ?>
  </body>
</html>

<script>
    window.print();
  </script>