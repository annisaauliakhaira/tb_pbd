 <div class="row">
  <div class="col-lg-12">
    <h1> Edit Pengajuan <small>Data Pengajuan</small></h1>
    <ol class="breadcrumb">
      <li><a href="index.html"><i class="icon-dashboard"></i> Dashboard</a></li>
      <li><i class="icon-file-alt"></i> Pengajuan</li>
      <li class="active"><i class="icon-file-alt"></i> Edit</li>
    </ol>
  </div>
</div><!-- /.row -->

<div class="row">
	<div class="col-lg-12">
		<form action="http://localhost/pbd/controller/pengajuan_controller.php?aksi=update" method="post">
            <div class="row">

                <?php 
                    if(isset($_GET['kode_pengajuan'])){
                        $kode_pengajuan = $_GET['kode_pengajuan'];
                    }else{
                        $kode_pengajuan = 0;
                    }
                    $sql="select * from pengajuan where kode_pengajuan=$kode_pengajuan";
                    $hasil = pg_query($sql);
                    while($data = pg_fetch_assoc($hasil)){
                ?>
                    <div class="form-group">
                        <label class="control-label" for="kode_pengajuan">Kode pengajuan</label>
                        <input type="text" value="<?php echo $data['kode_pengajuan']; ?>" name="kode_pengajuan" class="form-control" required readonly>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="nama_jenis">Jenis Barang</label>
                        <input type="text" value="<?php echo $data['nama_jenis']; ?>" name="nama_jenis" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="tgl_pengajuan">Tanggal Pengajuan</label>
                        <input type="date" value="<?php echo $data['tgl_pengajuan']; ?>" name="tgl_pengajuan" class="form-control" required readonly>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="tgl_pengajuan">Tanggal Pengajuan</label>
                        <input type="date" value="<?php echo $data['tgl_pengajuan']; ?>" name="tgl_pengajuan" class="form-control" required readonly>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="nama_pegawai">Pegawai</label>
                        <input type="text" value="<?php echo $data['nama_pegawai']; ?>" name="nama_pegawai" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="keterangan">Keterangan</label>
                        <input type="text" value="<?php echo $data['keterangan']; ?>" name="keterangan" class="form-control" required>
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