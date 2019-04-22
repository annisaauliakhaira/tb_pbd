
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
		<form action="/pbd/controller/pegawai_controller.php?aksi=tambah" method="post">
            <div class="row">

                    <div class="form-group">
                        <label class="control-label" for="kode_pegawai">NIPP</label>
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
                        <label class="control-label" for="kode_jabatan">Jabatan</label>
                         <select class="form-control" name="kode_jabatan">
				              <?php
				                $sql = "select kode_jabatan, nama_jabatan from jabatan";
				                $eksekusi = pg_query($sql);
				                while ($jabatan = pg_fetch_assoc($eksekusi)) {
				                echo '<option value="'.$jabatan['kode_jabatan'].'">'.$jabatan['nama_jabatan'].'</option>';
				                }
				              ?>
				          </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="kode_cabang">Cabang</label>
                         <select class="form-control" name="kode_cabang">
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
                        <label class="control-label" for="jenis_kelamin">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control" >
                    		<option value="1">laki-laki</option>
                    		<option value="2">perempuan</option>
                   		</select>

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