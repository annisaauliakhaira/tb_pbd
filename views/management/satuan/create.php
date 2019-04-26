
 <div class="row">
  <div class="col-lg-12">
    <h1> Create Satuan <small>Data Satuan</small></h1>
    <ol class="breadcrumb">
      <li><a href="index.html"><i class="icon-dashboard"></i> Dashboard</a></li>
      <li><i class="icon-file-alt"></i> Satuan</li>
      <li class="active"><i class="icon-file-alt"></i> </li>
    </ol>
  </div>
</div><!-- /.row -->

<div class="row">
	<div class="col-lg-12">
		<form action="/pbd/controller/satuan_controller.php?aksi=tambah" method="post">
            <div class="row">

                    <div class="form-group">
                        <label class="control-label" for="kode_satuan">Kode Satuan</label>
                        <input type="text" name="kode_satuan" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="nama_satuan">Nama Satuan</label>
                        <input type="text" name="nama_satuan" class="form-control" required>
                    </div>
               

            </div>
            <div class="row">
                <input type="submit" class="btn btn-succes" name="tambah" value="Simpan">
            </div>
        </form>
	</div>
</div>