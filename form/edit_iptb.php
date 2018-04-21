<?php

    $host   = "localhost";
    $user   = "root";
    $pw     = "";
    $db     = "db_haei";

    $koneksi    = mysqli_connect($host,$user,$pw);
    $select     = mysqli_select_db($koneksi,$db);

    if (isset($_GET['id_iptb'])) {
        $id_iptb            = $_GET['id_iptb'];
        $query              = mysqli_query($koneksi,("SELECT a.nama, a.no_anggota , b.* FROM tb_iptb AS b
                                                      INNER JOIN tb_anggota AS a USING(id_agt)
                                                      WHERE id_iptb = '$id_iptb'"));
        $data               = mysqli_fetch_array($query);
    }
?>
<form role="form" action="function/edit.php?aksi=edit_iptb" class="form-horizontal" enctype="multipart/form-data" method="post">
    <input type="hidden" class="form-control" name="id_iptb" value="<?php echo $data['id_iptb'] ?>">
    <div class="form-group">
        <label class="col-sm-2 control-label">Nama Anggota</label>
        <div class="col-md-10">
            <select class="form-control select" name="id_agt" data-live-search="true" data-size="5">
                <?php
                    $query  = mysqli_query($koneksi,("SELECT id_agt, nama FROM tb_anggota ORDER BY nama ASC"));
                    foreach($query as $data_agt){
                        if ($data['id_agt'] == $data_agt['id_agt']) {
                            echo "<option value = $data_agt[id_agt] selected>$data_agt[nama]</option>";
                        }else{
                            echo "<option value= $data_agt[id_agt]>$data_agt[nama]</option>";
                        }
                    }
                ?>
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
                <?php
                    error_reporting(0);
                    if ($data['perencana_lak'] == "-") {
                        $a = "selected=selected";
                    }
                    else if ($data['perencana_lak']== "c") {
                        $b = "selected=selected";
                    }
                    else if ($data['perencana_lak']== "b") {
                        $c = "selected=selected";
                    }
                    else if ($data['perencana_lak']== "a") {
                        $d = "selected=selected";
                    }
                ?>
                <option value="-" selected disabled>--- Select ----</option>
                <option value="-" <?php echo $a ?>>Data Kosong</option>
				<option value="c" <?php echo $b ?>>C</option>
				<option value="b" <?php echo $c ?>>B</option>
                <option value="a" <?php echo $d ?>>A</option>
            </select>
        </div>
        <label class="col-sm-2 control-label">Masa Berlaku</label>
        <div class="col-md-4">
            <div class="input-group">
                <?php
                    if ($data['masa_berlaku_perencana_lak']=="0000-00-00") {
                        echo "<input type='date' name='masa_berlaku_perencana_lak' class='form-control' placeholder='input..'>";
                    }else{
                        echo "<input type='date' name='masa_berlaku_perencana_lak' class='form-control' value='$data[masa_berlaku_perencana_lak]'>";
                    }
                ?>
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Pengawas - LAK</label>
        <div class="col-md-4">
            <select class="form-control select" name="pengawas_lak">
                <?php
                    error_reporting(0);
                    if ($data['pengawas_lak'] == "-") {
                        $a1 = "selected=selected";
                    }
                    else if ($data['pengawas_lak']== "c") {
                        $b1 = "selected=selected";
                    }
                    else if ($data['pengawas_lak']== "b") {
                        $c1 = "selected=selected";
                    }
                    else if ($data['pengawas_lak']== "a") {
                        $d1 = "selected=selected";
                    }
                ?>
                <option value="-" selected disabled>--- Select ----</option>
                <option value="-" <?php echo $a1 ?>>Data Kosong</option>
				<option value="c" <?php echo $b1 ?>>C</option>
				<option value="b" <?php echo $c1 ?>>B</option>
                <option value="a" <?php echo $d1 ?>>A</option>
            </select>
        </div>
        <label class="col-sm-2 control-label">Masa Berlaku</label>
        <div class="col-md-4">
            <div class="input-group">
                <?php
                    if ($data['masa_berlaku_pengawas_lak']=="0000-00-00") {
                        echo "<input type='date' name='masa_berlaku_pengawas_lak' class='form-control' placeholder='input..'>";
                    }else{
                        echo "<input type='date' name='masa_berlaku_pengawas_lak' class='form-control' value='$data[masa_berlaku_pengawas_lak]'>";
                    }
                ?>
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Pengkaji - LAK</label>
        <div class="col-md-4">
            <select class="form-control select" name="pengkaji_lak">
                <?php
                    error_reporting(0);
                    if ($data['pengkaji_lak'] == "-") {
                        $a2 = "selected=selected";
                    }
                    else if ($data['pengkaji_lak']== "c") {
                        $b2 = "selected=selected";
                    }
                    else if ($data['pengkaji_lak']== "b") {
                        $c2 = "selected=selected";
                    }
                    else if ($data['pengkaji_lak']== "a") {
                        $d2 = "selected=selected";
                    }
                ?>
                <option value="-" selected disabled>--- Select ----</option>
                <option value="-" <?php echo $a2 ?>>Data Kosong</option>
				<option value="c" <?php echo $b2 ?>>C</option>
				<option value="b" <?php echo $c2 ?>>B</option>
                <option value="a" <?php echo $d2 ?>>A</option>
            </select>
        </div>
        <label class="col-sm-2 control-label">Masa Berlaku</label>
        <div class="col-md-4">
            <div class="input-group">
                <?php
                    if ($data['masa_berlaku_pengkaji_lak']=="0000-00-00") {
                        echo "<input type='date' name='masa_berlaku_pengkaji_lak' class='form-control' placeholder='input..'>";
                    }else{
                        echo "<input type='date' name='masa_berlaku_pengkaji_lak' class='form-control' value='$data[masa_berlaku_pengkaji_lak]'>";
                    }
                ?>
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
                <?php
                    error_reporting(0);
                    if ($data['perencana_lal'] == "-") {
                        $a3 = "selected=selected";
                    }
                    else if ($data['perencana_lal']== "c") {
                        $b3 = "selected=selected";
                    }
                    else if ($data['perencana_lal']== "b") {
                        $c3 = "selected=selected";
                    }
                    else if ($data['perencana_lal']== "a") {
                        $d3 = "selected=selected";
                    }
                ?>
                <option value="-" selected disabled>--- Select ----</option>
                <option value="-" <?php echo $a3 ?>>Data Kosong</option>
				<option value="c" <?php echo $b3 ?>>C</option>
				<option value="b" <?php echo $c3 ?>>B</option>
                <option value="a" <?php echo $d3 ?>>A</option>
            </select>
        </div>
        <label class="col-sm-2 control-label">Masa Berlaku</label>
        <div class="col-md-4">
            <div class="input-group">
                <?php
                    if ($data['masa_berlaku_perencana_lal']=="0000-00-00") {
                        echo "<input type='date' name='masa_berlaku_perencana_lal' class='form-control' placeholder='input..'>";
                    }else{
                        echo "<input type='date' name='masa_berlaku_perencana_lal' class='form-control' value='$data[masa_berlaku_perencana_lal]'>";
                    }
                ?>
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Pengawas - LAL</label>
        <div class="col-md-4">
            <select class="form-control select" name="pengawas_lal">
                <?php
                    error_reporting(0);
                    if ($data['pengawas_lal'] == "-") {
                        $a4 = "selected=selected";
                    }
                    else if ($data['pengawas_lal']== "c") {
                        $b4 = "selected=selected";
                    }
                    else if ($data['pengawas_lal']== "b") {
                        $c4 = "selected=selected";
                    }
                    else if ($data['pengawas_lal']== "a") {
                        $d4 = "selected=selected";
                    }
                ?>
                <option value="-" selected disabled>--- Select ----</option>
                <option value="-" <?php echo $a4 ?>>Data Kosong</option>
				<option value="c" <?php echo $b4 ?>>C</option>
				<option value="b" <?php echo $c4 ?>>B</option>
                <option value="a" <?php echo $d4 ?>>A</option>
            </select>
        </div>
        <label class="col-sm-2 control-label">Masa Berlaku</label>
        <div class="col-md-4">
            <div class="input-group">
                <?php
                    if ($data['masa_berlaku_pengawas_lal']=="0000-00-00") {
                        echo "<input type='date' name='masa_berlaku_pengawas_lal' class='form-control' placeholder='input..'>";
                    }else{
                        echo "<input type='date' name='masa_berlaku_pengawas_lal' class='form-control' value='$data[masa_berlaku_pengawas_lal]'>";
                    }
                ?>
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Pengkaji - LAL</label>
        <div class="col-md-4">
            <select class="form-control select" name="pengkaji_lal">
                <<?php
                    error_reporting(0);
                    if ($data['pengkaji_lal'] == "-") {
                        $a5 = "selected=selected";
                    }
                    else if ($data['pengkaji_lal']== "c") {
                        $b5 = "selected=selected";
                    }
                    else if ($data['pengkaji_lal']== "b") {
                        $c5 = "selected=selected";
                    }
                    else if ($data['pengkaji_lal']== "a") {
                        $d5 = "selected=selected";
                    }
                ?>
                <option value="-" selected disabled>--- Select ----</option>
                <option value="-" <?php echo $a5 ?>>Data Kosong</option>
				<option value="c" <?php echo $b5 ?>>C</option>
				<option value="b" <?php echo $c5 ?>>B</option>
                <option value="a" <?php echo $d5 ?>>A</option>
            </select>
            </select>
        </div>
        <label class="col-sm-2 control-label">Masa Berlaku</label>
        <div class="col-md-4">
            <div class="input-group">
                <?php
                    if ($data['masa_berlaku_pengkaji_lal']=="0000-00-00") {
                        echo "<input type='date' name='masa_berlaku_pengkaji_lal' class='form-control' placeholder='input..'>";
                    }else{
                        echo "<input type='date' name='masa_berlaku_pengkaji_lal' class='form-control' value='$data[masa_berlaku_pengkaji_lal]'>";
                    }
                ?>
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
                <?php
                    error_reporting(0);
                    if ($data['anggota'] == "-") {
                        $a6 = "selected=selected";
                    }
                    else if ($data['anggota']== 1) {
                        $b6 = "selected=selected";
                    }
                    else if ($data['anggota']== 0) {
                        $c6 = "selected=selected";
                    }
                ?>
                <option value="-" select disabled>--- Select ----</option>
                <option value="-" <?php echo $a6 ?>>Data Kosong</option>
				<option value="1" <?php echo $b6 ?>>Aktif</option>
				<option value="0" <?php echo $c6 ?>>Non Aktif</option>
            </select>
        </div>
        <label class="col-sm-2 control-label">ACPE</label>
        <div class="col-md-4">
            <input type="text" name="acpe" class="form-control" value="<?php echo $data['acpe'] ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">ASESOR LPJK</label>
        <div class="col-md-4">
            <input type="text" name="asesor_lpjk" class="form-control" value="<?php echo $data['asesor_lpjk'] ?>">
        </div>
    </div>-->
    <div class="update-footer" style="text-align:left">
        <button type="submit" class="btn btn-default btn-sm" style="margin-right:5px;">update</button>
    </div>
</form>
<script type="text/javascript" src="js/plugins.js"></script>
