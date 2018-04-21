<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Tabel ACPE</h3>
        <?php if ($_SESSION['level'] == 'superadmin' OR 'admin') { ?>
        <div class="pull-right">
            <a href="ex_table/tabel_acpe_ex.php" class="btn btn-info btn-sm"><span class="fa fa-th-large"></span> Export Excel</a>
            <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#create_acpe"><span class="fa fa-pencil"></span> Input Data</a>
        </div>
        <?php } ?>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table id="data" class="table table-bordered table-hover">
                <thead>
                    <tr class="active">
                        <th class="text-center">No.</th>
            			<th class="text-center">Nama</th>
            			<th class="text-center">No.Anggota</th>
            			<th class="text-center">ACPE</th>
            			<th class="text-center">Asesor LPJK</th>
            			<th class="text-center">Keterangan</th>
            			<th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
    
                        $no     = 1;
                        $query  = mysqli_query($koneksi,("SELECT a.nama, a.no_anggota, b.* FROM tb_acpe AS b
                                                          INNER JOIN tb_anggota AS a USING(id_agt)"));
                        foreach($query as $data){
    
                    ?>
                    <tr class="text-center">
                        <td><?php echo $no++ ?></td>
                        <td class="text-left"><?php echo $data['nama'] ?></td>
                        <td><?php echo $data['no_anggota'] ?></td>
                        <td>
                            <?php
                                if ($data['acpe'] == "") {
                                    echo "-";
                                }else{
                                    echo $data['acpe'];
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                                if ($data['asesor_lpjk'] == "") {
                                    echo "-";
                                }else{
                                    echo $data['asesor_lpjk'];
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                                if ($data['keterangan'] == "") {
                                    echo "-";
                                }else{
                                    echo $data['keterangan'];
                                }
                            ?>
                        </td>
                        <?php if ($_SESSION['level'] == 'superadmin' OR 'admin') { ?>
                        <td>
                            <center>
                                <a href="#edit_acpe" data-toggle="modal" data-id="<?php echo $data['id_acpe']; ?>" style="font-size:12px;text-decoration:none;"><span class="label label-warning">Edit data</span></a>
                                <a href="function/delete.php?aksi=del_acpe&id_acpe=<?php echo $data['id_acpe'] ?>" onClick="return confirm('are you sure for delete it?')" style="font-size:12px;text-decoration:none;"><span class="label label-warning">Delete data</span></a>
                            </center>
                        </td>
                        <?php } ?>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    
    <!-- modal edit acpe-->

    <div class="modal fade" id="edit_acpe" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Data ACPE</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="fetched-data"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- modal  -->
    <script src="js/plugins/jquery/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        $('#edit_acpe').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'get',
                url : 'form/edit_acpe.php',
                data :  'id_acpe='+ rowid,
                success : function(data){
                    $('.fetched-data').html(data);//menampilkan data ke dalam modal
                }
            });
        });
    });
    </script>

    <!-- end modal -->
    
    <!-- modal -->
    <div class="modal fade" id="create_acpe" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button>
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-user-plus"></i> Input Data</h3>
                </div>
                <div class="modal-body">
                    <form role="form" action="function/create.php?aksi=add_acpe" class="form-horizontal" enctype="multipart/form-data" method="post">
                        <div class="form-group">
    						<label class="col-sm-3 control-label">Nama Anggota</label>
    						<div class="col-md-9">
    							<select class="form-control select" name="id_agt" data-live-search="true" data-size="5">
                                    <?php
                                        $query_agt  = mysqli_query($koneksi,("SELECT id_agt, nama FROM tb_anggota ORDER BY nama ASC"));
                                        foreach ($query_agt as $data_agt) {
                                    ?>
                                    <option value="<?php echo $data_agt['id_agt'] ?>"><?php echo $data_agt['nama'] ?></option>
                                    <?php } ?>
                                </select>
    						</div>
    					</div>
    					<div class="form-group">
                            <label class="col-sm-3 control-label">ACPE</label>
                            <div class="col-md-9">
                                <input type="text" name="acpe" class="form-control" placeholder="input..">
    						</div>
    					</div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">ASESOR LPJK</label>
                            <div class="col-md-9">
                                <input type="text" name="asesor_lpjk" class="form-control" placeholder="input..">
    						</div>
    					</div>
    					<div class="form-group">
                            <label class="col-sm-3 control-label">Keterangan</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="keterangan" rows="3" placeholder="input.."></textarea>
    						</div>
    					</div>
                </div>
                <div class="modal-footer" style="text-align:left">
                    <button type="submit" class="btn btn-default btn-sm" style="margin-right:5px;">Submit</button>
                    <button type="reset" class="btn btn-default btn-sm">Reset</button>
                </div>
                    </form>
            </div>
        </div>
    </div>
    
</div>