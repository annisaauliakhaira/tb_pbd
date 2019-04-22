 <div class="row">
  <div class="col-lg-12">
    <h1> Edit Mutasi <small>Data Mutasi</small></h1>
    <ol class="breadcrumb">
      <li><a href="index.html"><i class="icon-dashboard"></i> Dashboard</a></li>
      <li><i class="icon-file-alt"></i> Mutasi</li>
      <li class="active"><i class="icon-file-alt"></i> Edit</li>
    </ol>
  </div>
</div><!-- /.row -->

<div class="row">
	<div class="col-lg-12">
		<form action="http://localhost/pbd/controller/mutasi_controller.php?aksi=update" method="post">
            <div class="row">

                <?php 
                    if(isset($_GET['kode_mutasi'])){
                        $kode_mutasi = $_GET['kode_mutasi'];
                    }else{
                        $kode_mutasi = 0;
                    }
                    $sql="select * from mutasi where kode_mutasi=$kode_mutasi";
                    $hasil = pg_query($sql);
                    while($data = pg_fetch_assoc($hasil)){
                ?>
                    <div class="form-group">
                        <label class="control-label" for="kode_mutasi">Kode mutasi</label>
                        <input type="text" value="<?php echo $data['kode_mutasi']; ?>" name="kode_mutasi" class="form-control" required readonly>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="tgl_mutasi">Tanggal mutasi</label>
                        <input type="date" value="<?php echo $data['tgl_mutasi']; ?>" name="tgl_mutasi" class="form-control" required >
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="nipp">Pegawai</label>
                         <select class="form-control" name="nipp">
				              <?php
				                $sql = "select nipp, nama_pegawai from pegawai";
				                $eksekusi = pg_query($sql);
				                while ($jabatan = pg_fetch_assoc($eksekusi)) {
				                echo '<option value="'.$jabatan['nipp'].'">'.$jabatan['nama_pegawai'].'</option>';
				                }
				              ?>
				          </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="nama_cabang">Cabang Sebelum</label>
                        <select class="form-control" name="kode_cabang_sebelum">
                              <?php
                                $sql = "select kode_cabang, nama_cabang from cabang";
                                $eksekusi = pg_query($sql);
                                while ($cabang = pg_fetch_assoc($eksekusi)) {
                                echo '<option value="'.$cabang['kode_cabang'].'">'.$cabang['nama_cabang'].'</option>';
                                }
                              ?>
                          </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="nama_cabang">Cabang Sesudah</label>
                        <select class="form-control" name="kode_cabang_sesudah">
                              <?php
                                $sql = "select kode_cabang, nama_cabang from cabang";
                                $eksekusi = pg_query($sql);
                                while ($cabang = pg_fetch_assoc($eksekusi)) {
                                echo '<option value="'.$cabang['kode_cabang'].'">'.$cabang['nama_cabang'].'</option>';
                                }
                              ?>
                          </select>
                    </div>

                <?php 
                    }
                ?>

            </div>
            <div class="row">
                <input type="submit" class="btn btn-succes" name="tambah" value="Simpan">
            </div>
        </form>
	</div>
</div>