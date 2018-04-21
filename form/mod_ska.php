<div class="panel panel-primary">
<div class="panel-heading">
    <h3 class="panel-title">Tabel SKA</h3>
    <?php if ($_SESSION['level'] == 'superadmin' OR 'admin') { ?>
    <div class="pull-right">
        <a href="ex_table/tabel_ska_ex.php" class="btn btn-info btn-sm"><span class="fa fa-th-large"></span> Export Excel</a>
        <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#create_ska"><span class="fa fa-pencil"></span> Input Data</a>
    </div>
    <?php } ?>
</div>
<div class="panel-body" style="overflow-x: auto;">
    <div class="table-responsive" style="width:1200px;padding-right: 20px;">
        <table id="data" class="table table-bordered table-hover">
            <thead>
                <tr class="active">
        			<th rowspan="3" class="text-center" style="vertical-align: middle !important;font-size:10px;" >No.</th>
        			<th rowspan="3" class="text-center" style="vertical-align: middle !important;font-size:10px;">Nama</th>
        			<th rowspan="3" class="text-center" style="vertical-align: middle !important;font-size:10px;">No.Anggota</th>
        			<th rowspan="3" class="text-center" style="vertical-align: middle !important;font-size:10px;">Nama Perusahaan</th>
        			<th colspan="3" rowspan="2" style="vertical-align: middle !important;font-size:10px;" class="text-center">Tahun keluar SKA</th>
        			<th rowspan="3" class="text-center" style="vertical-align: middle !important;font-size:10px;" class="text-center">Pemegang SKA</th>
        			<th colspan="9" class="text-center">SKA</th>
        			<th colspan="3" rowspan="2" class="text-center" style="vertical-align: middle !important;font-size:10px;">Berakhir</th>
        			<th rowspan="3" class="text-center" style="vertical-align: middle !important;font-size:10px;" width="10%">Action</th>
        		</tr>
        		<tr class="active">
        			<!-- SKA -->
        			<th colspan="3" class="text-center" style="font-size:10px;">401</th>
        			<th colspan="3" class="text-center" style="font-size:10px;">405</th>
        			<th colspan="3" class="text-center" style="font-size:10px;">406</th>
        		</tr>
        		<tr class="active">
        			<!-- Tahun Keluar SKA -->
        			<th class="text-center" style="font-size:10px;" width="7%">401</th>
        			<th class="text-center" style="font-size:10px;" width="7%">405</th>
        			<th class="text-center" style="font-size:10px;" width="7%">406</th>
        			<!-- SKA 401 -->
        			<th class="text-center" style="font-size:10px;">AMu</th>
        			<th class="text-center" style="font-size:10px;">AMa</th>
        			<th class="text-center" style="font-size:10px;">AUt</th>
        			<!-- SKA 405 -->
        			<th class="text-center" style="font-size:10px;">AMu</th>
        			<th class="text-center" style="font-size:10px;">AMa</th>
        			<th class="text-center" style="font-size:10px;">AUt</th>
        			<!-- SKA 406 -->
        			<th class="text-center" style="font-size:10px;">AMu</th>
        			<th class="text-center" style="font-size:10px;">AMa</th>
        			<th class="text-center" style="font-size:10px;">AUt</th>
        			<!-- Masa Berlaku -->
        			<th class="text-center" style="font-size:10px;">401</th>
        			<th class="text-center" style="font-size:10px;">405</th>
        			<th class="text-center" style="font-size:10px;">406</th>
        		</tr>
            </thead>
            <tbody>
                <?php

                    $no     = 1;
                    $query  = mysqli_query($koneksi,("SELECT a.nama, a.no_anggota, a.nama_perusahaan, b.* FROM tb_ska AS b
                                                      INNER JOIN tb_anggota AS a USING(id_agt)"));
                    foreach($query as $data){

                ?>
                <tr style="font-size:9px;" class="text-center">
                    <td><?php echo $no++ ?></td>
        			<td><?php echo $data['nama'] ?></td>
        			<td><?php echo $data['no_anggota'] ?></td>
        			<td>
                        <?php
                            if ($data['nama_perusahaan'] == "") {
                                echo "-";
                            }else{
                                echo $data['nama_perusahaan'];
                            }
                        ?>
                    </td>
                    <td>
                        <?php
                            $ska_401 = $data['thk_ska_401'];
                            $timestamp = strtotime($ska_401);
                            if ($data['thk_ska_401'] == "0000-00-00"){
                                echo "-";
                            }else{
                                echo date('d/m/Y', $timestamp);
                            }
                        ?>
                    </td>
                    <td>
                        <?php
                            $ska_405 = $data['thk_ska_405'];
                            $timestamp = strtotime($ska_405);
                            if ($data['thk_ska_405'] == "0000-00-00"){
                                echo "-";
                            }else{
                                echo date('d/m/Y', $timestamp);
                            }
                        ?>
                    </td>
                    <td>
                        <?php
                            $ska_406 = $data['thk_ska_406'];
                            $timestamp = strtotime($ska_406);
                            if ($data['thk_ska_406'] == "0000-00-00"){
                                echo "-";
                            }else{
                                echo date('d/m/Y', $timestamp);
                            }
                        ?>
                    </td>
        			<td style='color:red;font-weight:bold;'><?php echo $data['pemegang_ska'] ?></td>
        			<td>
                        <?php
                            if ($data['ska_401'] == "amu") {
                                echo "<span style='color:red;font-weight:bold;'>1</span>";
                            }else{
                                echo "-";
                            }
                        ?>
                    </td>
                    <td>
                        <?php
                            if ($data['ska_401'] == "ama") {
                                echo "<span style='color:red;font-weight:bold;'>1</span>";
                            }else{
                                echo "-";
                            }
                        ?>
                    </td>
                    <td>
                        <?php
                            if ($data['ska_401'] == "aut") {
                                echo "<span style='color:red;font-weight:bold;'>1</span>";
                            }else{
                                echo "-";
                            }
                        ?>
                    </td>
                    <td>
                        <?php
                            if ($data['ska_405'] == "amu") {
                                echo "<span style='color:red;font-weight:bold;'>1</span>";
                            }else{
                                echo "-";
                            }
                        ?>
                    </td>
                    <td>
                        <?php
                            if ($data['ska_405'] == "ama") {
                                echo "<span style='color:red;font-weight:bold;'>1</span>";
                            }else{
                                echo "-";
                            }
                        ?>
                    </td>
                    <td>
                        <?php
                            if ($data['ska_405'] == "aut") {
                                echo "<span style='color:red;font-weight:bold;'>1</span>";
                            }else{
                                echo "-";
                            }
                        ?>
                    </td>
                    <td>
                        <?php
                            if ($data['ska_406'] == "amu") {
                                echo "<span style='color:red;font-weight:bold;'>1</span>";
                            }else{
                                echo "-";
                            }
                        ?>
                    </td>
                    <td>
                        <?php
                            if ($data['ska_406'] == "ama") {
                                echo "<span style='color:red;font-weight:bold;'>1</span>";
                            }else{
                                echo "-";
                            }
                        ?>
                    </td>
                    <td>
                        <?php
                            if ($data['ska_406'] == "aut") {
                                echo "<span style='color:red;font-weight:bold;'>1</span>";
                            }else{
                                echo "-";
                            }
                        ?>
                    </td>
        			<td>
                        <?php
                            $br = $data['berakhir_ska_401'];
                            $timestamp = strtotime($br);
                            if ($data['berakhir_ska_401'] == "0000-00-00"){
                                echo "-";
                            }else{
                                echo date('d/m/Y', $timestamp);
                            }
                        ?>
                    </td>
                    <td>
                        <?php
                            $br1 = $data['berakhir_ska_405'];
                            $timestamp = strtotime($br1);
                            if ($data['berakhir_ska_405'] == "0000-00-00"){
                                echo "-";
                            }else{
                                echo date('d/m/Y', $timestamp);
                            }
                        ?>
                    </td>
                    <td>
                        <?php
                            $br2 = $data['berakhir_ska_406'];
                            $timestamp = strtotime($br2);
                            if ($data['berakhir_ska_406'] == "0000-00-00"){
                                echo "-";
                            }else{
                                echo date('d/m/Y', $timestamp);
                            }
                        ?>
                    </td>
                    <?php if ($_SESSION['level'] == 'superadmin' OR 'admin') { ?>
                    <td>
                        <center>
                            <a href="#edit_ska" data-toggle="modal" data-id="<?php echo $data['id_ska']; ?>" style="font-size:12px;text-decoration:none;"><span class="label label-warning">Edit</span></a>
                            <a href="function/delete.php?aksi=del_ska&id_ska=<?php echo $data['id_ska'] ?>" onClick="return confirm('are you sure for delete it?')" style="font-size:12px;text-decoration:none;"><span class="label label-warning">Delete</span></a>
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

<div class="modal fade" id="edit_ska" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Data SKA</h4>
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
    $('#edit_ska').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
        //menggunakan fungsi ajax untuk pengambilan data
        $.ajax({
            type : 'get',
            url : 'form/edit_ska.php',
            data :  'id_ska='+ rowid,
            success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
            }
        });
    });
});
</script>

<!-- end modal -->

<!-- modal -->
<div class="modal fade" id="create_ska" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-user-plus"></i> Input Data</h3>
            </div>
            <div class="modal-body">
                <form role="form" action="function/create.php?aksi=add_ska" class="form-horizontal" enctype="multipart/form-data" method="post">
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
						<label class="col-sm-12 control-label" id="blog">Tahun dikeluarkan SKA</label>
					</div>
                    <div class="form-group">
						<label class="col-sm-2 control-label">401</label>
						<div class="col-md-4">
                            <div class="input-group">
                                <input type="text" name="thk_ska_401" class="form-control datepicker" placeholder="input..">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
						</div>
                        <label class="col-sm-2 control-label">Berakhir SKA 401</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="text" name="berakhir_ska_401" id="dp-1" class="form-control datepicker" placeholder="input..">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                        </div>
					</div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">405</label>
						<div class="col-md-4">
                            <div class="input-group">
                                <input type="text" name="thk_ska_405" id="dp-1" class="form-control datepicker" placeholder="input..">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
						</div>
						<label class="col-sm-2 control-label">Berakhir SKA 405</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="text" name="berakhir_ska_405" id="dp-1" class="form-control datepicker" placeholder="input..">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                        </div>
					</div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">406</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="text" name="thk_ska_406" id="dp-1" class="form-control datepicker" placeholder="input..">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                        </div>
                        <label class="col-sm-2 control-label">Berakhir SKA 406</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="text" name="berakhir_ska_406" id="dp-1" class="form-control datepicker" placeholder="input..">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                        </div>
                        <!--<label class="col-sm-2 control-label">Keanggotaan</label>
                        <div class="col-md-4">
							<select class="form-control select" name="keanggotaan">
                                <option value="" selected disabled>--- Select ----</option>
                                <option value="1">Ya</option>
                                <option value="0">Tidak</option>
                            </select>
						</div>-->
					</div>
					<div class="form-group">
                        <label class="col-sm-2 control-label">Status</label>
                        <div class="col-md-4">
							<select class="form-control select" name="status">
                                <option value="" selected disabled>--- Select ----</option>
                                <option value="1">Aktif</option>
                                <option value="0">Tidak</option>
                            </select>
						</div>
                        <label class="col-sm-2 control-label">Pemegang SKA</label>
						<div class="col-md-4">
							<select class="form-control select" name="pemegang_ska">
                                <option value="" selected disabled>--- Select ----</option>
                                <option value="1">Ya</option>
                                <option value="0">Tidak</option>
                            </select>
						</div>
					</div>
                    <div class="form-group">
						<label class="col-sm-12 control-label" id="blog">SKA</label>
					</div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">401</label>
						<div class="col-md-4">
							<select class="form-control select" name="ska_401">
                                <option value="0" selected disabled>--- Select ----</option>
                                <option value="0">Data Kosong</option>
                                <option value="amu">AMu</option>
                                <option value="ama">AMa</option>
                                <option value="aut">AUt</option>
                            </select>
						</div>
					</div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">405</label>
						<div class="col-md-4">
							<select class="form-control select" name="ska_405">
                                <option value="0" selected disabled>--- Select ----</option>
                                <option value="0">Data Kosong</option>
                                <option value="amu">AMu</option>
                                <option value="ama">AMa</option>
                                <option value="aut">AUt</option>
                            </select>
						</div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">406</label>
                        <div class="col-md-4">
                            <select class="form-control select" name="ska_406">
                                <option value="0" selected disabled>--- Select ----</option>
                                <option value="0">Data Kosong</option>
                                <option value="amu">AMu</option>
                                <option value="ama">AMa</option>
                                <option value="aut">AUt</option>
                            </select>
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
