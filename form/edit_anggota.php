<?php

    $host   = "localhost";
    $user   = "root";
    $pw     = "";
    $db     = "db_haei";

    $koneksi    = mysqli_connect($host,$user,$pw);
    $select     = mysqli_select_db($koneksi,$db);

    if (isset($_GET['rowid'])) {
        $id_agt             = $_GET['rowid'];
        $query              = mysqli_query($koneksi,("SELECT * FROM tb_anggota WHERE id_agt = '$id_agt'"));
        $data               = mysqli_fetch_array($query);
    }
?>
<form role="form" action="function/edit.php?aksi=edit_anggota" class="form-horizontal" enctype="multipart/form-data" method="post">
    <input type="hidden" class="form-control" name="id_agt" value="<?php echo $data['id_agt'] ?>">
    <div class="form-group">
        <label class="col-sm-2 control-label">Nomer Anggota</label>
        <div class="col-md-4">
            <input type="text" class="form-control" name="no_anggota" value="<?php echo $data['no_anggota'] ?>" required="required">
        </div>
        <label class="col-sm-2 control-label">Nama Anggota</label>
        <div class="col-md-4">
            <input type="text" class="form-control" name="nama" value="<?php echo $data['nama'] ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Keanggotaan</label>
        <div class="col-md-4">
            <select class="form-control select" name="keanggotaan">
                <?php
                    error_reporting(0);
                    if ($data['keanggotaan'] == 1) {
                        $y = "selected=selected";
                    }
                    else if ($data['keanggotaan']== 0) {
                        $n = "selected=selected";
                    }
                ?>
                <option value="" selected disabled>--- Select ----</option>
				<option value="1" <?php echo $y ?>>Ya</option>
				<option value="0" <?php echo $n ?>>Tidak</option>
            </select>
        </div>
        <label class="col-sm-2 control-label">Status</label>
        <div class="col-md-4">
            <select class="form-control select" name="status">
                <?php
                    error_reporting(0);
                    if ($data['status'] == 1) {
                        $aktif = "selected=selected";
                    }
                    else if ($data['status']== 0) {
                        $tidak = "selected=selected";
                    }
                ?>
                <option value="" selected disabled>--- Select ----</option>
				<option value="1" <?php echo $aktif ?>>Aktif</option>
				<option value="0" <?php echo $tidak ?>>Tidak</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Masa Berlaku</label>
        <div class="col-md-4">
            <div class="input-group">
                <?php
                    if ($data['masa_berlaku']=="0000-00-00") {
                        echo "<input type='date' name='masa_berlaku' class='form-control' placeholder='input..'>";
                    }else{
                        echo "<input type='date' name='masa_berlaku' class='form-control' value='$data[masa_berlaku]'>";
                    }
                ?>
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
            <input type="text" class="form-control" name="nama_perusahaan" value="<?php echo $data['nama_perusahaan'] ?>">
        </div>
        <label class="col-sm-2 control-label">Telepon</label>
        <div class="col-md-4">
            <input type="text" class="form-control" name="telpon_perusahaan" value="<?php echo $data['telpon_perusahaan'] ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Fax</label>
        <div class="col-md-4">
            <input type="text" class="form-control" name="fax_perusahaan" value="<?php echo $data['fax'] ?>">
        </div>
        <label class="col-sm-2 control-label">Email</label>
        <div class="col-md-4">
            <input type="text" class="form-control" name="email_perusahaan" value="<?php echo $data['email_perusahaan'] ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Alamat</label>
        <div class="col-md-10">
            <textarea class="form-control" name="alamat_perusahaan" rows="3"><?php echo $data['alamat_perusahaan'] ?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-12 control-label" id="blog">Rumah</label>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Alamat</label>
        <div class="col-md-10">
            <textarea class="form-control" name="alamat_rumah" rows="3"><?php echo $data['alamat_rumah'] ?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Handphone</label>
        <div class="col-md-4">
            <input type="text" class="form-control" name="handphone" value="<?php echo $data['handphone'] ?>">
        </div>
        <label class="col-sm-2 control-label">Email</label>
        <div class="col-md-4">
            <input type="text" class="form-control" name="email" value="<?php echo $data['email'] ?>">
        </div>
    </div>
    <!--<div class="form-group">
        <label class="col-sm-2 control-label">405</label>
        <div class="col-md-4">
            <div class="input-group">
                <input type="text" name="thk_ska_405" class="form-control datepicker1" placeholder="input..">
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
        </div>
    </div>-->
    <div class="update-footer" style="text-align:left">
        <button type="submit" class="btn btn-default btn-sm" style="margin-right:5px;">update</button>
    </div>
</form>
<script type="text/javascript" src="js/plugins.js"></script>
