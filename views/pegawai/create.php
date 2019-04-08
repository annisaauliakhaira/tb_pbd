
 <div class="row">
  <div class="col-lg-12">
    <h1> Create pegawai <small>Data pegawai</small></h1>
    <ol class="breadcrumb">
      <li><a href="index.html"><i class="icon-dashboard"></i> Dashboard</a></li>
      <li><i class="icon-file-alt"></i> pegawai</li>
      <li class="active"><i class="icon-file-alt"></i> </li>
    </ol>
  </div>
</div><!-- /.row -->

<div class="row">
	<div class="col-lg-12">
		<form action="http://localhost/pbd/controller/pegawai_controller.php?aksi=tambah" method="post">
            <div class="row">

                    <div class="form-group">
                        <label class="control-label" for="kode_pegawai">Kode pegawai</label>
                        <input type="text" name="kode_pegawai" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="nama_pegawai">Nama pegawai</label>
                        <input type="text" name="nama_pegawai" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="alamat">Alamat</label>
                        <input type="text" name="alamat" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="keterangan">Keterangan</label>
                        <input type="text"  name="keterangan" class="form-control" required>
                    </div>
               

            </div>
            <div class="row">
                <input type="submit" class="btn btn-succes" name="tambah" value="Simpan">
            </div>
        </form>
	</div>
</div>