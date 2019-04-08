 <?php
 include "models/m_inventaris.php";


 $inv = new Inventaris($connection);
 ?>

 <div class="row">
          <div class="col-lg-12">
            <h1>Inventaris <small>Data Inventaris</small></h1>
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
        					<th>Kode Inventaris</th>
        					<th>Jenis Inventaris</th>
                            <th>Option</th>
        				</tr>

                        <?php
                            $no = 1;
                            $tampil = $inv->tampil();
                            while ($data = $tampil->fetch_object()) {
                                
                        ?>

        				<tr>
        					<td align="center"><?php echo $no++; ?></td>
        					<td><?php echo $data->kode_inventaris; ?></td>
        					<td><?php echo $data->jenis; ?></td>
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
                                <h4 class="modal-title">Tambah Data Inventaris</h4>
                            </div>
                            <form action="http://localhost/inventaris/controller/inventaris_controller.php?aksi=tambah" method="post">
                                <div class="modal-body">        
                                     <div class="form-group">
                                        <label class="control-label" for="kode_inventaris">Kode Inventaris</label>
                                        <input type="text" name="kode_inventaris" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label" for="jenis">Jenis Inventaris</label>
                                        <input type="text" name="jenis" class="form-control" required>
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