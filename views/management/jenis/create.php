
 <div class="row">
  <div class="col-lg-12">
    <h1> Create Jenis <small>Data Jenis</small></h1>
    <ol class="breadcrumb">
      <li><a href="index.html"><i class="icon-dashboard"></i> Dashboard</a></li>
      <li><i class="icon-file-alt"></i> Jenis</li>
      <li class="active"><i class="icon-file-alt"></i> </li>
    </ol>
  </div>
</div><!-- /.row -->

<div class="row">
	<div class="col-lg-12">
		<form action="/pbd/controller/jenis_controller.php?aksi=tambah" method="post">
            <div class="row">

                    <div class="form-group">
                        <label class="control-label" for="kode_jenis">Kode jenis</label>
                        <input type="text" name="kode_jenis" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="nama_jenis">Nama jenis</label>
                        <input type="text" name="nama_jenis" class="form-control" required>
                    </div>
               

            </div>
            <div class="row">
                <input type="submit" class="btn btn-succes" name="tambah" value="Simpan">
            </div>
        </form>
	</div>
</div>