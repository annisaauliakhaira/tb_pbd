 <div class="row">
  <div class="col-lg-12">
    <h1> Edit Persetujuan <small>Data Persetujuan</small></h1>
    <ol class="breadcrumb">
      <li><a href="index.html"><i class="icon-dashboard"></i> Dashboard</a></li>
      <li><i class="icon-file-alt"></i> Persetujuan</li>
      <li class="active"><i class="icon-file-alt"></i> Edit</li>
    </ol>
  </div>
</div><!-- /.row -->

<div class="row">
	<div class="col-lg-12">
		<form action="http://localhost/pbd/controller/persetujuan_controller.php?aksi=update" method="post">
            <div class="row">

                <?php 
                    if(isset($_GET['kode_persetujuan'])){
                        $kode_persetujuan = $_GET['kode_persetujuan'];
                    }else{
                        $kode_persetujuan = 0;
                    }
                    $sql="select * from persetujuan where kode_persetujuan=$kode_persetujuan";
                    $hasil = pg_query($sql);
                    while($data = pg_fetch_assoc($hasil)){
                ?>
                    <div class="form-group">
                        <label class="control-label" for="kode_persetujuan">Kode Persetujuan</label>
                        <input type="text" value="<?php echo $data['kode_persetujuan']; ?>" name="kode_persetujuan" class="form-control" required readonly>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="tgl_persetujuan">Tanggal Persetujuan</label>
                        <input type="date" value="<?php echo $data['tgl_persetujuan']; ?>" name="tgl_persetujuan" class="form-control" required>
                    </div>

                     <div class="form-group">
                        <label class="control-label" for="kode_pengajuan">Kode Pengajuan</label>
                        <select class="form-control" name="kode_pengajuan">
                              <?php
                                $sql = "select kode_pengajuan from pengajuan";
                                $eksekusi = pg_query($sql);
                                while ($pengajuan = pg_fetch_assoc($eksekusi)) {
                                echo '<option value="'.$pengajuan['kode_pengajuan'].'">'.$pengajuan['kode_pengajuan'].'</option>';
                                }
                              ?>
                          </select>
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