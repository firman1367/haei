<?php

    $host   = "localhost";
    $user   = "haeiorid_anggota";
    $pw     = "P@ssw0rd.123";
    $db     = "haeiorid_anggota";

    $koneksi    = mysqli_connect($host,$user,$pw);
    $select     = mysqli_select_db($koneksi,$db);

    if (isset($_GET['rowid'])) {
        $no_anggota         = $_GET['rowid'];
        $query              = mysqli_query($koneksi,("SELECT * FROM tb_anggota WHERE no_anggota = '$no_anggota'"));
        $data               = mysqli_fetch_array($query);
    }
?>
<form role="form" action="function/edit.php?aksi=edit_anggota" class="form-horizontal" enctype="multipart/form-data" method="post">
    <input type="hidden" class="form-control" name="no_anggota" value="<?php echo $data['no_anggota'] ?>">
    <div class="form-group">
        <label class="col-sm-2 control-label label-detail">Nomer Anggota</label>
        <div class="col-md-4">
            : <?php echo $data['no_anggota'] ?>
        </div>
        <label class="col-sm-2 control-label label-detail">Nama Anggota</label>
        <div class="col-md-4">
            : <?php echo $data['nama'] ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label label-detail">Keanggotaan</label>
        <div class="col-md-4">
            <?php
                if ($data['keanggotaan'] == 1) {
                    echo ": Ya";
                }
                else if ($data['keanggotaan']== 0) {
                    echo ": Tidak";
                }
            ?>
            </select>
        </div>
        <label class="col-sm-2 control-label label-detail">Status</label>
        <div class="col-md-4">
            <?php
                if ($data['status'] == 1) {
                    echo ": Aktif";
                }
                else if ($data['status']== 0) {
                    echo ": Tidak";
                }
            ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label label-detail">Masa Berlaku</label>
        <div class="col-md-4">
            <?php
                if ($data['masa_berlaku'] == "0000-00-00") {
                    echo ": -";
                }
                else {
                    echo ": $data[masa_berlaku]";
                }
            ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-12 control-label label-detail" id="blog">Perusahaan</label>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label label-detail">Nama Perusahaan</label>
        <div class="col-md-4">
            <?php
                if ($data['nama_perusahaan'] == "") {
                    echo ": -";
                }else{
                    echo ": $data[nama_perusahaan]";
                }
            ?>
        </div>
        <label class="col-sm-2 control-label label-detail">Telepon</label>
        <div class="col-md-4">
            <?php
                if ($data['telpon_perusahaan'] == "") {
                    echo ": -";
                }else{
                    echo ": $data[telpon_perusahaan]";
                }
            ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label label-detail">Fax</label>
        <div class="col-md-4">
            <?php
                if ($data['fax'] == "") {
                    echo ": -";
                }else{
                    echo ": $data[fax]";
                }
            ?>
        </div>
        <label class="col-sm-2 control-label label-detail">Email</label>
        <div class="col-md-4">
            <?php
                if ($data['email_perusahaan'] == "") {
                    echo ": -";
                }else{
                    echo ": $data[email_perusahaan]";
                }
            ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label label-detail">Alamat</label>
        <div class="col-md-10">
            <?php
                if ($data['alamat_perusahaan'] == "") {
                    echo ": -";
                }else{
                    echo ": $data[alamat_perusahaan]";
                }
            ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-12 control-label label-detail" id="blog">Rumah</label>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label label-detail">Alamat</label>
        <div class="col-md-10">
            <?php
                if ($data['alamat_rumah'] == "") {
                    echo ": -";
                }else{
                    echo ": $data[alamat_rumah]";
                }
            ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label label-detail">Handphone</label>
        <div class="col-md-4">
            <?php
                if ($data['handphone'] == "") {
                    echo ": -";
                }else{
                    echo ": $data[handphone]";
                }
            ?>
        </div>
        <label class="col-sm-2 control-label label-detail">Email</label>
        <div class="col-md-4">
            <?php
                if ($data['email'] == "") {
                    echo ": -";
                }else{
                    echo ": $data[email]";
                }
            ?>
        </div>
    </div>
</form>

<script type="text/javascript" src="js/plugins.js"></script>
<script type="text/javascript" src="js/plugins/bootstrap/bootstrap-file-input.js"></script>
<script type="text/javascript" src="js/plugins/bootstrap/bootstrap-select.js"></script>
<script type="text/javascript" src="js/plugins/tagsinput/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="js/plugins/fileinput/fileinput.min.js"></script>
