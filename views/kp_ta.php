 <?php
 include "models/m_kp_ta.php";

 $kp_ta = new kp_ta($connection);
 ?>

 <div class="row">
          <div class="col-lg-12">
            <h1>TA / KP <small>Data Kerja Praktek dan Tugas Akhir</small></h1>
            <ol class="breadcrumb">
              <li><a href="index.html"><i class="icon-dashboard"></i> Dashboard</a></li>
              <li class="active"><i class="icon-file-alt"></i> Blank Page</li>
            </ol>
          </div>
        </div><!-- /.row -->

        <div class="row">
        	<div class="col-lg-12">
        		<div class="table-responsive">
        			<table class="table table-bordered table-hover table-striped">
        				<tr>
        					<th>No</th>
                            <th>Kode KP / TA</th>
                            <th>Judul TA / KP</th>
        					<th>Nama Mahasiswa</th>
        					<th>Dosen Pembimbing</th>
                            <th>Tahun</th>
                            <th>Option</th>
        				</tr>

                        <?php
                            $no = 1;
                            $tampil = $kp_ta->tampil();
                            while ($data = $tampil->fetch_object()) {
                                
                        ?>

        				<tr>
        					<td align="center"><?php echo $no++; ?></td>
        					<td><?php echo $data->kode_inventaris.'.'.$data->kode_ta_kp; ?></td>
        					<td><?php echo $data->judul; ?></td>
                            <td><?php echo $data->mahasiswa; ?></td>
                            <td><?php echo $data->pembimbing; ?></td>
                            <td><?php echo $data->tahun; ?></td>
        					<td align="center">
        						<button class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit </button>
        						<button class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </button>
        					</td>
        				</tr>
                        <?php
                        } ?>
        			</table>
        		</div>
                <button type="button" class="btn btn-succes" data-toggle="modal" data-target="#tambah">Tambah Data</button>
                <div id="tambah" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Tambah Data Laporan</h4>
                            </div>
                            <form method="post">
                                <div class="modal-body">        
                                     <div class="form-group">
                                        <label class="control-label" for="kode_ta_kp">Kode TA / KP</label>
                                        <input type="text" name="kode_ta_kp" class="form-control" id="kode_ta_kp" required>
                                    </div>

                                     <div class="form-group">
                                        <label class="control-label" for="judul">Judul TA / KP</label>
                                        <input type="text" name="judul" class="form-control" id="judul" required>
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label" for="mahasiswa">Nama Mahasiswa</label>
                                        <input type="text" name="mahasiswa" class="form-control" id="mahasiswa" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="pembimbing">Nama Pembimbing</label>
                                        <input type="text" name="pembimbing" class="form-control" id="pembimbing" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="tahun">Tahun</label>
                                        <input type="text" name="tahun" class="form-control" id="tahun" required>
                                    </div>
                                    </div>
                                <div class="modal-footer">
                                    <button type="reset" class="btn btn-danger">Reset</button>
                                    <input type="submit" class="btn btn-succes" name="tambah" value="Simpan">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        	</div>
        </div>