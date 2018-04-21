<?php
    $query1 = mysqli_query($koneksi,("SELECT * FROM tb_anggota ORDER BY id_agt DESC LIMIT 1"));
    $data1  = mysqli_fetch_array($query1);
?>
<div class="alert alert-info" role="alert">
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <span style="font-size:18px;"><strong>INFORMASI :</strong> Nomer Anggota terakhir adalah <strong><?php echo $data1['no_anggota'] ?></strong></span>
</div>
<div class="panel panel-primary">
<div class="panel-heading">
    <h3 class="panel-title">Tabel Anggota HAEI</h3>
    <?php if ($_SESSION['level'] == 'superadmin' OR 'admin') { ?>
    <div class="pull-right">
        <a href="ex_table/tabel_anggota_ex.php" class="btn btn-info btn-sm"><span class="fa fa-th-large"></span> Export Excel</a>
        <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#create_anggota"><span class="fa fa-pencil"></span> Input Data</a>
    </div>
    <?php } ?>
</div>
<div class="panel-body">
    <div class="table-responsive">
        <table id="data" class="table table-bordered table-hover">
            <thead>
                <tr class="active">
                    <th width="2%" class="text-center">No</th>
                    <th width="10%" class="text-center">No. Anggota</th>
                    <th width="15%" class="text-center">Nama Anggota</th>
                    <th class="text-center">Nama Perusahaan</th>
                    <th class="text-center" style="font-size:11px">Alamat Perusahaan</th>
                    <?php if ($_SESSION['level'] == 'superadmin' OR 'admin') { ?>
                    <th class="text-center" width="13%" style="font-size:11px">Action</th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php

                    $no     = 1;
                    $query  = mysqli_query($koneksi,("SELECT * FROM tb_anggota"));
                    foreach($query as $data){

                ?>
                <tr>
                    <td class="text-center"><?php echo $no++; ?></td>
                    <td class="link_anggota"><a href="#detail_anggota" data-toggle="modal" data-id="<?php echo $data['no_anggota']; ?>"><?php echo $data['no_anggota'] ?></a></td>
                    <td><?php echo $data['nama'] ?></td>
                    <?php
                        if ($data['nama_perusahaan'] == "") {
                            echo "<td class='text-center'>-</td>";
                        }else{
                            echo "<td>$data[nama_perusahaan]</td>";
                        }
                    ?>
                    <?php
                        if ($data['alamat_perusahaan'] == "") {
                            echo "<td class='text-center'>-</td>";
                        }else{
                            echo "<td>$data[alamat_perusahaan]</td>";
                        }
                    ?>
                    <?php if ($_SESSION['level'] == 'superadmin' OR 'admin') { ?>
                    <td>
                        <center>
                            <a href="#edit_anggota" data-toggle="modal" data-id="<?php echo $data['id_agt']; ?>" style="font-size:12px;text-decoration:none;"><span class="label label-warning">Edit data</span></a>
                            <a href="function/delete.php?aksi=del_anggota&id_agt=<?php echo $data['id_agt'] ?>" onClick="return confirm('are you sure for delete No. Anggota <?php echo $data['no_anggota'] ?>?')" style="font-size:12px;text-decoration:none;"><span class="label label-warning">Delete data</span></a>
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

<div class="modal fade" id="edit_anggota" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Data Anggota</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="fetched-data"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="detail_anggota" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Detail Data Anggota</h4>
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
    $('#edit_anggota').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
        //menggunakan fungsi ajax untuk pengambilan data
        $.ajax({
            type : 'get',
            url : 'form/edit_anggota.php',
            data :  'rowid='+ rowid,
            success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
            }
        });
    });
    $('#detail_anggota').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
        //menggunakan fungsi ajax untuk pengambilan data
        $.ajax({
            type : 'get',
            url : 'form/detail_anggota.php',
            data :  'rowid='+ rowid,
            success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
            }
        });
    });
});
</script>

<!-- end modal -->

<!-- modal -->
<div class="modal fade" id="create_anggota" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-user-plus"></i> Input Data</h3>
            </div>
            <div class="modal-body">
                <form role="form" action="function/create.php?aksi=add_anggota" class="form-horizontal" enctype="multipart/form-data" method="post">
                    <div class="form-group">
						<label class="col-sm-2 control-label">Nomer Anggota</label>
						<div class="col-md-4">
							<input type="text" class="form-control" name="no_anggota" placeholder="input.." required="required">
						</div>
                        <label class="col-sm-2 control-label">Nama</label>
						<div class="col-md-4">
							<input type="text" class="form-control" name="nama" placeholder="input.." required="required">
						</div>
					</div>
					<div class="form-group">
					    <label class="col-sm-2 control-label">Keanggotaan</label>
                        <div class="col-md-4">
							<select class="form-control select" name="keanggotaan">
                                <option value="" selected disabled>--- Select ----</option>
                                <option value="1">Ya</option>
                                <option value="0">Tidak</option>
                            </select>
						</div>
						<label class="col-sm-2 control-label">Status</label>
                        <div class="col-md-4">
							<select class="form-control select" name="status">
                                <option value="" selected disabled>--- Select ----</option>
                                <option value="1">Aktif</option>
                                <option value="0">Tidak</option>
                            </select>
						</div>
					</div>
					<div class="form-group">
					    <label class="col-sm-2 control-label">Masa Berlaku</label>
						<div class="col-md-4">
                            <div class="input-group">
                                <input type="text" name="masa_berlaku" class="form-control datepicker" placeholder="input..">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
						</div>
					</div>
                    <div class="form-group">
						<label class="col-sm-12 control-label" id="blog">Perusahaan</label>
					</div>
                    <div class="form-group">
						<label class="col-sm-2 control-label">Nama Perusahaan</label>
						<div class="col-md-4">
							<input type="text" class="form-control" name="nama_perusahaan" placeholder="input..">
						</div>
                        <label class="col-sm-2 control-label">Telepon</label>
						<div class="col-md-4">
							<input type="text" class="form-control" name="telpon_perusahaan" placeholder="input..">
						</div>
					</div>
                    <div class="form-group">
						<label class="col-sm-2 control-label">Fax</label>
						<div class="col-md-4">
							<input type="text" class="form-control" name="fax_perusahaan" placeholder="input..">
						</div>
                        <label class="col-sm-2 control-label">Email</label>
						<div class="col-md-4">
							<input type="text" class="form-control" name="email_perusahaan" placeholder="input..">
						</div>
					</div>
                    <div class="form-group">
						<label class="col-sm-2 control-label">Alamat</label>
						<div class="col-md-10">
                            <textarea class="form-control" name="alamat_perusahaan" rows="3" placeholder="input.."></textarea>
						</div>
					</div>
                    <div class="form-group">
						<label class="col-sm-12 control-label" id="blog">Rumah</label>
					</div>
                    <div class="form-group">
						<label class="col-sm-2 control-label">Alamat</label>
						<div class="col-md-10">
							<textarea class="form-control" name="alamat_rumah" rows="3" cols="80" placeholder="input.."></textarea>
						</div>
					</div>
                    <div class="form-group">
						<label class="col-sm-2 control-label">Handphone</label>
						<div class="col-md-4">
							<input type="text" class="form-control" name="handphone" placeholder="input..">
						</div>
                        <label class="col-sm-2 control-label">Email</label>
						<div class="col-md-4">
							<input type="text" class="form-control" name="email" placeholder="input email pribadi">
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
