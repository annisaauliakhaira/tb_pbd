
 <div class="row">
  <div class="col-lg-12">
    <h1> Create Persetujuan <small>Data Persetujuan</small></h1>
    <ol class="breadcrumb">
      <li><a href="index.html"><i class="icon-dashboard"></i> Dashboard</a></li>
      <li><i class="icon-file-alt"></i> Persetujuan</li>
      <li class="active"><i class="icon-file-alt"></i> </li>
    </ol>
  </div>
</div><!-- /.row -->

<div class="row">
	<div class="col-lg-12">
		<form action="/pbd/controller/persetujuan_controller.php?aksi=tambah" method="post">
            <div class="row">

                    <div class="form-group">
                        <label class="control-label" for="kode_persetujuan">Kode Persetujuan</label>
                        <input type="text" name="kode_persetujuan" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="tgl_persetujuan">Tanggal persetujuan</label>
                        <input type="date" name="tgl_persetujuan" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="kode_pengajuan">Kode Pengajuan</label>
                        <select class="form-control" name="kode_pengajuan">
                              <?php
                                $sql = "select kode_pengajuan from pengajuan where kode_pengajuan not in (select kode_pengajuan from persetujuan)";
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

            </div>
            <div class="row">
                <input type="submit" class="btn btn-succes" name="tambah" value="Simpan">
            </div>
        </form>
	</div>
</div>