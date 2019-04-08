
 <div class="row">
  <div class="col-lg-12">
    <h1> Create Jabatan <small>Data Jabatan</small></h1>
    <ol class="breadcrumb">
      <li><a href="index.html"><i class="icon-dashboard"></i> Dashboard</a></li>
      <li><i class="icon-file-alt"></i> Jabatan</li>
      <li class="active"><i class="icon-file-alt"></i> </li>
    </ol>
  </div>
</div><!-- /.row -->

<div class="row">
	<div class="col-lg-12">
		<form action="http://localhost/pbd/controller/jabatan_controller.php?aksi=tambah" method="post">
            <div class="row">

                    <div class="form-group">
                        <label class="control-label" for="kode_jabatan">Kode jabatan</label>
                        <input type="text" name="kode_jabatan" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="nama_jabatan">Nama jabatan</label>
                        <input type="text" name="nama_jabatan" class="form-control" required>
                    </div>
               

            </div>
            <div class="row">
                <input type="submit" class="btn btn-succes" name="tambah" value="Simpan">
            </div>
        </form>
	</div>
</div>