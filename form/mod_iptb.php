<div class="panel panel-primary">
<div class="panel-heading">
    <h3 class="panel-title">Tabel IPTB</h3>
    <?php if ($_SESSION['level'] == 'superadmin' OR 'admin') { ?>
    <div class="pull-right">
        <a href="ex_table/tabel_iptb_ex.php" class="btn btn-info btn-sm"><span class="fa fa-th-large"></span> Export Excel</a>
        <a href="ex_table/tabel_iptb.php" target="_blank" class="btn btn-info btn-sm"><span class="fa fa-table"></span> Full Tabel</a>
        <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#create_iptb"><span class="fa fa-pencil"></span> Input Data</a>
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
        			<th class="text-center">Perusahaan</th>
        			<!--
        			<th class="text-center">IPTB - LAK</th>
        			<th class="text-center">IPTB - LAL</th>
        			<th class="text-center">Anggota</th>
        			<th class="text-center">ACPE</th>
        			<th class="text-center">Asesor LPJK</th>
        			-->
        			<th class="text-center">Action</th>
        		</tr>
        	</thead>
            <tbody>
                <?php

                    $no     = 1;
                    $query  = mysqli_query($koneksi,("SELECT a.nama, a.no_anggota, a.nama_perusahaan, b.* FROM tb_iptb AS b
                                                      INNER JOIN tb_anggota AS a USING(id_agt)"));
                    foreach($query as $data){

                ?>
                <tr style="font-size:11px;" class="text-center">
                    <td><?php echo $no++ ?></td>
        			<td class="text-left"><?php echo $data['nama'] ?></td>
        			<td><?php echo $data['no_anggota'] ?></td>
        			<td class="text-left">
                        <?php
                            if ($data['nama_perusahaan'] == "") {
                                echo "-";
                            }else{
                                echo $data['nama_perusahaan'];
                            }
                        ?>
                    </td>
        			<!--<td class="link_iptb">
                        <a href="#detail_lak" data-toggle="modal" data-id="<?php echo $data['id_iptb']; ?>">Lihat Data</a>
                    </td>
                    <td class="link_iptb">
                        <a href="#detail_lal" data-toggle="modal" data-id="<?php echo $data['id_iptb']; ?>">Lihat Data</a>
                    </td>
                    <td>
                        <?php
                            if ($data['anggota'] == 1) {
                                echo "<span style='color:red;font-weight:bold;'>1</span>";
                            }else{
                                echo "-";
                            }
                        ?>
                    </td>
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
                    </td>-->
                    <?php if ($_SESSION['level'] == 'superadmin' OR 'admin') { ?>
                    <td>
                        <center>
                            <a href="#edit_iptb" data-toggle="modal" data-id="<?php echo $data['id_iptb']; ?>" style="font-size:12px;text-decoration:none;"><span class="label label-warning">Edit data</span></a>
                            <a href="function/delete.php?aksi=del_iptb&id_iptb=<?php echo $data['id_iptb'] ?>" onClick="return confirm('are you sure for delete it?')" style="font-size:12px;text-decoration:none;"><span class="label label-warning">Delete data</span></a>
                        </center>
                    </td>
                    <?php } ?>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<!-- modal edit anggota-->

<div class="modal fade" id="edit_iptb" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Data IPTB</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="fetched-data"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="detail_lak" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Detail Data IPTB - LAK</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="fetched-data"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="detail_lal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Detail Data IPTB - LAL</h4>
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
    $('#edit_iptb').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
        //menggunakan fungsi ajax untuk pengambilan data
        $.ajax({
            type : 'get',
            url : 'form/edit_iptb.php',
            data :  'id_iptb='+ rowid,
            success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
            }
        });
    });
    $('#detail_lak').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
        //menggunakan fungsi ajax untuk pengambilan data
        $.ajax({
            type : 'get',
            url : 'form/detail_lak.php',
            data :  'id_iptb='+ rowid,
            success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
            }
        });
    });
    $('#detail_lal').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
        //menggunakan fungsi ajax untuk pengambilan data
        $.ajax({
            type : 'get',
            url : 'form/detail_lal.php',
            data :  'id_iptb='+ rowid,
            success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
            }
        });
    });
});
</script>

<!-- end modal -->

<!-- modal -->
<div class="modal fade" id="create_iptb" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-user-plus"></i> Input Data</h3>
            </div>
            <div class="modal-body">
                <form role="form" action="function/create.php?aksi=add_iptb" class="form-horizontal" enctype="multipart/form-data" method="post">
                    <div class="form-group">
						<label class="col-sm-2 control-label">Nama Anggota</label>
						<div class="col-md-10">
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
						<label class="col-sm-12 control-label" id="blog">IPTB - LAK</label>
					</div>
                    <div class="form-group">
						<label class="col-sm-2 control-label">Perencana - LAK</label>
						<div class="col-md-4">
                            <select class="form-control select" name="perencana_lak">
                                <option value="-" selected>--- Select ----</option>
                                <option value="-">Data Kosong</option>
                                <option value="c">C</option>
                                <option value="b">B</option>
                                <option value="a">A</option>
                            </select>
						</div>
                        <label class="col-sm-2 control-label">Masa Berlaku</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="text" name="masa_berlaku_perencana_lak" class="form-control datepicker" placeholder="input..">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
						</div>
					</div>
                    <div class="form-group">
						<label class="col-sm-2 control-label">Pengawas - LAK</label>
						<div class="col-md-4">
                            <select class="form-control select" name="pengawas_lak">
                                <option value="-" selected>--- Select ----</option>
                                <option value="-">Data Kosong</option>
                                <option value="c">C</option>
                                <option value="b">B</option>
                                <option value="a">A</option>
                            </select>
						</div>
                        <label class="col-sm-2 control-label">Masa Berlaku</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="text" name="masa_berlaku_pengawas_lak" class="form-control datepicker" placeholder="input..">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
						</div>
					</div>
                    <div class="form-group">
						<label class="col-sm-2 control-label">Pengkaji - LAK</label>
						<div class="col-md-4">
                            <select class="form-control select" name="pengkaji_lak">
                                <option value="-" selected>--- Select ----</option>
                                <option value="-">Data Kosong</option>
                                <option value="c">C</option>
                                <option value="b">B</option>
                                <option value="a">A</option>
                            </select>
						</div>
                        <label class="col-sm-2 control-label">Masa Berlaku</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="text" name="masa_berlaku_pengkaji_lak" class="form-control datepicker" placeholder="input..">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
						</div>
					</div>
                    <div class="form-group">
						<label class="col-sm-12 control-label" id="blog">IPTB - LAL</label>
					</div>
                    <div class="form-group">
						<label class="col-sm-2 control-label">Perencana - LAL</label>
						<div class="col-md-4">
                            <select class="form-control select" name="perencana_lal">
                                <option value="-" selected>--- Select ----</option>
                                <option value="-">Data Kosong</option>
                                <option value="c">C</option>
                                <option value="b">B</option>
                                <option value="a">A</option>
                            </select>
						</div>
                        <label class="col-sm-2 control-label">Masa Berlaku</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="text" name="masa_berlaku_perencana_lal" class="form-control datepicker" placeholder="input..">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
						</div>
					</div>
                    <div class="form-group">
						<label class="col-sm-2 control-label">Pengawas - LAL</label>
						<div class="col-md-4">
                            <select class="form-control select" name="pengawas_lal">
                                <option value="-" selected>--- Select ----</option>
                                <option value="-">Data Kosong</option>
                                <option value="c">C</option>
                                <option value="b">B</option>
                                <option value="a">A</option>
                            </select>
						</div>
                        <label class="col-sm-2 control-label">Masa Berlaku</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="text" name="masa_berlaku_pengawas_lal" class="form-control datepicker" placeholder="input..">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
						</div>
					</div>
                    <div class="form-group">
						<label class="col-sm-2 control-label">Pengkaji - LAL</label>
						<div class="col-md-4">
                            <select class="form-control select" name="pengkaji_lal">
                                <option value="-" selected>--- Select ----</option>
                                <option value="-">Data Kosong</option>
                                <option value="c">C</option>
                                <option value="b">B</option>
                                <option value="a">A</option>
                            </select>
						</div>
                        <label class="col-sm-2 control-label">Masa Berlaku</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="text" name="masa_berlaku_pengkaji_lal" class="form-control datepicker" placeholder="input..">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
						</div>
					</div>
                    <!--<div class="form-group">
						<label class="col-sm-12 control-label" id="blog">#</label>
					</div>
                    <div class="form-group">
						<label class="col-sm-2 control-label">Anggota</label>
						<div class="col-md-4">
                            <select class="form-control select" name="anggota">
                                <option value="-" selected>--- Select ----</option>
                                <option value="-">Data Kosong</option>
                                <option value="1">Aktif</option>
                                <option value="0">Non Aktif</option>
                            </select>
						</div>
                        <label class="col-sm-2 control-label">ACPE</label>
                        <div class="col-md-4">
                            <input type="text" name="acpe" class="form-control" placeholder="input..">
						</div>
					</div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">ASESOR LPJK</label>
                        <div class="col-md-4">
                            <input type="text" name="asesor_lpjk" class="form-control" placeholder="input..">
						</div>
					</div>-->
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
