
 <div class="row">
  <div class="col-lg-12">
    <h1> Create Pengajuan <small>Data Pengajuan</small></h1>
    <ol class="breadcrumb">
      <li><a href="index.html"><i class="icon-dashboard"></i> Dashboard</a></li>
      <li><i class="icon-file-alt"></i> Pengajuan</li>
      <li class="active"><i class="icon-file-alt"></i> </li>
    </ol>
  </div>
</div><!-- /.row -->

<div class="row">
	<div class="col-lg-12">
		<form action="/pbd/controller/pengajuan_controller.php?aksi=tambah" method="post">
            <div class="row">

                    <div class="form-group">
                        <label class="control-label" for="kode_pengajuan">Kode Pengajuan</label>
                        <input type="text" name="kode_pengajuan" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="nama_jenis">Jenis Barang</label>
                        <select class="form-control" name="kode_jenis">
                              <?php
                                $sql = "select kode_jenis, nama_jenis from jenis";
                                $eksekusi = pg_query($sql);
                                while ($jenis = pg_fetch_assoc($eksekusi)) {
                                echo '<option value="'.$jenis['kode_jenis'].'">'.$jenis['nama_jenis'].'</option>';
                                }
                              ?>
                          </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="tgl_pengajuan">Tanggal Pengajuan</label>
                        <input type="date" name="tgl_pengajuan" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="total">Jumlah Barang</label>
                        <input type="text" name="total" class="form-control" required>
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