
 <div class="row">
  <div class="col-lg-12">
    <h1> Create Pengajuan Persetujuan <small>Data Pengajuan Persetujuan</small></h1>
    <ol class="breadcrumb">
      <li><a href="index.html"><i class="icon-dashboard"></i> Dashboard</a></li>
      <li><i class="icon-file-alt"></i> Pengajuan Persetujuan</li>
      <li class="active"><i class="icon-file-alt"></i> </li>
    </ol>
  </div>
</div><!-- /.row -->

<div class="row">
	<div class="col-lg-12">
		<form action="/pbd/controller/pengajuan_controller.php?aksi=tambah" method="post">
            <div class="row">

                    <div class="form-group">
                        <label class="control-label" for="kode_pengajuan_persetujuan">Kode Pengajuan</label>
                        <input type="text" name="kode_pengajuan_persetujuan" class="form-control" required>
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
                        <label class="control-label" for="jumlah_barang">Jumlah Barang</label>
                        <input type="text" name="jumlah_barang" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="nama_satuan">Satuan</label>
                        <select class="form-control" name="kode_satuan">
                              <?php
                                $sql = "select kode_satuan, nama_satuan from satuan";
                                $eksekusi = pg_query($sql);
                                while ($satuan = pg_fetch_assoc($eksekusi)) {
                                echo '<option value="'.$satuan['kode_satuan'].'">'.$satuan['nama_satuan'].'</option>';
                                }
                              ?>
                          </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="tgl_pengajuan">Tanggal Pengajuan</label>
                        <input type="date" name="tgl_pengajuan" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="tgl_disetujui">Tanggal Persetujuan</label>
                        <input type="date" name="tgl_disetujui" class="form-control" required>
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