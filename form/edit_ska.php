<?php

    $host   = "localhost";
    $user   = "root";
    $pw     = "";
    $db     = "db_haei";

    $koneksi    = mysqli_connect($host,$user,$pw);
    $select     = mysqli_select_db($koneksi,$db);

    if (isset($_GET['id_ska'])) {
        $id_ska             = $_GET['id_ska'];
        $query              = mysqli_query($koneksi,("SELECT a.nama , b.* FROM tb_ska AS b
                                                      INNER JOIN tb_anggota AS a USING(id_agt)
                                                      WHERE id_ska = '$id_ska'"));
        $data               = mysqli_fetch_array($query);
    }
?>
<form role="form" action="function/edit.php?aksi=edit_ska" class="form-horizontal" enctype="multipart/form-data" method="post">
    <input type="hidden" class="form-control" name="id_ska" value="<?php echo $data['id_ska'] ?>">
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
        <label class="col-sm-12 control-label" id="blog">Tahun dikeluarkan SKA</label>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">401</label>
        <div class="col-md-4">
            <div class="input-group">
                <?php
                    if ($data['thk_ska_401']=="0000-00-00") {
                        echo "<input type='date' name='thk_ska_401' class='form-control' placeholder='input..'>";
                    }else{
                        echo "<input type='date' name='thk_ska_401' class='form-control' value='$data[thk_ska_401]'>";
                    }
                ?>
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
        </div>
        <label class="col-sm-2 control-label">Berakhir SKA 401</label>
        <div class="col-md-4">
            <div class="input-group">
                <?php
                    if ($data['berakhir_ska_401']=="0000-00-00") {
                        echo "<input type='date' name='berakhir_ska_401' class='form-control' placeholder='input..'>";
                    }else{
                        echo "<input type='date' name='berakhir_ska_401' class='form-control' value='$data[berakhir_ska_401]'>";
                    }
                ?>
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">405</label>
        <div class="col-md-4">
            <div class="input-group">
                <?php
                    if ($data['thk_ska_405']=="0000-00-00") {
                        echo "<input type='date' name='thk_ska_405' class='form-control' placeholder='input..'>";
                    }else{
                        echo "<input type='date' name='thk_ska_405' class='form-control' value='$data[thk_ska_405]'>";
                    }
                ?>
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
        </div>
        <label class="col-sm-2 control-label">Berakhir SKA 405</label>
        <div class="col-md-4">
            <div class="input-group">
                <?php
                    if ($data['berakhir_ska_405']=="0000-00-00") {
                        echo "<input type='date' name='berakhir_ska_405' class='form-control' placeholder='input..'>";
                    }else{
                        echo "<input type='date' name='berakhir_ska_405' class='form-control' value='$data[berakhir_ska_405]'>";
                    }
                ?>
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">406</label>
        <div class="col-md-4">
            <div class="input-group">
                <?php
                    if ($data['thk_ska_406']=="0000-00-00") {
                        echo "<input type='date' name='thk_ska_406' class='form-control' placeholder='input..'>";
                    }else{
                        echo "<input type='date' name='thk_ska_406' class='form-control' value='$data[thk_ska_406]'>";
                    }
                ?>
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
        </div>
        <label class="col-sm-2 control-label">Berakhir SKA 406</label>
        <div class="col-md-4">
            <div class="input-group">
                <?php
                    if ($data['berakhir_ska_406']=="0000-00-00") {
                        echo "<input type='date' name='berakhir_ska_406' class='form-control' placeholder='input..'>";
                    }else{
                        echo "<input type='date' name='berakhir_ska_406' class='form-control' value='$data[berakhir_ska_406]'>";
                    }
                ?>
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Status</label>
        <div class="col-md-4">
            <select class="form-control select" name="status">
                <?php
                    error_reporting(0);
                    if ($data['status'] == 1) {
                        $y1 = "selected=selected";
                    }
                    else if ($data['status']== 0) {
                        $n1 = "selected=selected";
                    }
                ?>
                <option value="" selected disabled>--- Select ----</option>
				<option value="1" <?php echo $y1 ?>>Aktif</option>
				<option value="0" <?php echo $n1 ?>>Tidak</option>
            </select>
        </div>
        <label class="col-sm-2 control-label">Pemegang SKA</label>
        <div class="col-md-4">
            <select class="form-control select" name="pemegang_ska">
                <?php
                    error_reporting(0);
                    if ($data['pemegang_ska'] == 1) {
                        $y2 = "selected=selected";
                    }
                    else if ($data['pemegang_ska']== 0) {
                        $n2 = "selected=selected";
                    }
                ?>
                <option value="" selected disabled>--- Select ----</option>
				<option value="1" <?php echo $y2 ?>>Ya</option>
				<option value="0" <?php echo $n2 ?>>Tidak</option>
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
                <?php
                    error_reporting(0);
                    if ($data['ska_401'] == "0") {
                        $a = "selected=selected";
                    }
                    else if ($data['ska_401'] == "amu") {
                        $b = "selected=selected";
                    }
                    else if ($data['ska_401'] == "ama") {
                        $c = "selected=selected";
                    }
                    else if ($data['ska_401'] == "aut") {
                        $d = "selected=selected";
                    }
                ?>
				<option value="0" <?php echo $a ?>>Data Kosong</option>
				<option value="amu" <?php echo $b ?>>AMu</option>
                <option value="ama" <?php echo $c ?>>AMa</option>
				<option value="aut" <?php echo $d ?>>AUt</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">405</label>
        <div class="col-md-4">
            <select class="form-control select" name="ska_405">
                <?php
                    error_reporting(0);
                    if ($data['ska_405'] == "0") {
                        $a1 = "selected=selected";
                    }
                    else if ($data['ska_405'] == "amu") {
                        $b1 = "selected=selected";
                    }
                    else if ($data['ska_405'] == "ama") {
                        $c1 = "selected=selected";
                    }
                    else if ($data['ska_405'] == "aut") {
                        $d1 = "selected=selected";
                    }
                ?>
				<option value="0" <?php echo $a1 ?>>Data Kosong</option>
				<option value="amu" <?php echo $b1 ?>>AMu</option>
                <option value="ama" <?php echo $c1 ?>>AMa</option>
				<option value="aut" <?php echo $d1 ?>>AUt</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">406</label>
        <div class="col-md-4">
            <select class="form-control select" name="ska_406">
                <?php
                    error_reporting(0);
                    if ($data['ska_406'] == "0") {
                        $a2 = "selected=selected";
                    }
                    else if ($data['ska_406'] == "amu") {
                        $b2 = "selected=selected";
                    }
                    else if ($data['ska_406'] == "ama") {
                        $c2 = "selected=selected";
                    }
                    else if ($data['ska_406'] == "aut") {
                        $d2 = "selected=selected";
                    }
                ?>
				<option value="0" <?php echo $a2 ?>>Data Kosong</option>
				<option value="amu" <?php echo $b2 ?>>AMu</option>
                <option value="ama" <?php echo $c2 ?>>AMa</option>
				<option value="aut" <?php echo $d2 ?>>AUt</option>
            </select>
        </div>
    </div>
    <div class="update-footer" style="text-align:left">
        <button type="submit" class="btn btn-default btn-sm" style="margin-right:5px;">update</button>
    </div>
</form>
<script type="text/javascript" src="js/plugins.js"></script>
