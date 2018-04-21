<?php

    $host   = "localhost";
    $user   = "haeiorid_anggota";
    $pw     = "P@ssw0rd.123";
    $db     = "haeiorid_anggota";

    $koneksi    = mysqli_connect($host,$user,$pw);
    $select     = mysqli_select_db($koneksi,$db);

    if (isset($_GET['id_acpe'])) {
        $id_acpe            = $_GET['id_acpe'];
        $query              = mysqli_query($koneksi,("SELECT a.nama, a.no_anggota , b.* FROM tb_acpe AS b
                                                      INNER JOIN tb_anggota AS a USING(id_agt)
                                                      WHERE id_acpe = '$id_acpe'"));
        $data               = mysqli_fetch_array($query);
    }
?>
<form role="form" action="function/edit.php?aksi=edit_acpe" class="form-horizontal" enctype="multipart/form-data" method="post">
    <input type="hidden" class="form-control" name="id_acpe" value="<?php echo $data['id_acpe'] ?>">
    <div class="form-group">
        <label class="col-sm-3 control-label">Nama Anggota</label>
        <div class="col-md-9">
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
            <!--<input style="color:black;" type="text" name="nama" class="form-control" value="<?php echo $data['nama'] ?>" readonly>-->
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">ACPE</label>
        <div class="col-md-9">
            <input type="text" name="acpe" class="form-control" value="<?php echo $data['acpe'] ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">ASESOR LPJK</label>
        <div class="col-md-9">
            <input type="text" name="asesor_lpjk" class="form-control" value="<?php echo $data['asesor_lpjk'] ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Keterangan</label>
        <div class="col-md-9">
            <textarea class="form-control" name="keterangan" rows="3"><?php echo $data['keterangan'] ?></textarea>
        </div>
    </div>
    <div class="update-footer" style="text-align:left">
        <button type="submit" class="btn btn-default btn-sm" style="margin-right:5px;">update</button>
    </div>
</form>
<script type="text/javascript" src="js/plugins.js"></script>