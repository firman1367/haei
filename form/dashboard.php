<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Data Statistik</h3>
    </div>
    <div class="panel-body">

        <!-- <meta http-equiv="refresh" content="30" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">-->
        <!-- WIDGETS -->
        <div class="row">
            <div class="col-md-6 col-sm-3 col-xs-6">
                <a href="administrator">
                    <div class="widget widget-primary widget-no-subtitle">
                        <?php
                            $a      = mysqli_query($koneksi,("SELECT COUNT(id_admin) AS total_admin FROM tb_admin"));
                            $data   = mysqli_fetch_array($a);
                        ?>
                        <div class="informer informer-default" style="margin-bottom:15px;">Data</div>
                        <div class="widget-big-int"><span class="num-count"><?php echo $data['total_admin']; ?></span></div>
                        <div class="widget-subtitle" style="margin-top:20px;">Total Administrator</div>
                        <div><span class="fa fa-tags" style="float:right;"></span></div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-sm-3 col-xs-6">
                <a href="anggota">
                    <div class="widget widget-primary widget-no-subtitle">
                        <?php
                            $a      = mysqli_query($koneksi,("SELECT COUNT(no_anggota) AS total_anggota FROM tb_anggota"));
                            $data   = mysqli_fetch_array($a);
                        ?>
                        <div class="informer informer-default" style="margin-bottom:15px;">Data</div>
                        <div class="widget-big-int"><span class="num-count"><?php echo $data['total_anggota']; ?></span></div>
                        <div class="widget-subtitle" style="margin-top:20px;">Total Anggota</div>
                        <div><span class="fa fa-tags" style="float:right;"></span></div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-sm-3 col-xs-6">
                <a href="iptb">
                    <div class="widget widget-primary widget-no-subtitle">
                        <?php
                            $a      = mysqli_query($koneksi,("SELECT COUNT(id_iptb) AS total_iptb FROM tb_iptb"));
                            $data   = mysqli_fetch_array($a);
                        ?>
                        <div class="informer informer-default" style="margin-bottom:15px;">Data</div>
                        <div class="widget-big-int"><span class="num-count"><?php echo $data['total_iptb']; ?></span></div>
                        <div class="widget-subtitle" style="margin-top:20px;">Total IPTB</div>
                        <div><span class="fa fa-tags" style="float:right;"></span></div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-sm-3 col-xs-6">
                <a href="ska">
                    <div class="widget widget-primary widget-no-subtitle">
                        <?php
                            $a      = mysqli_query($koneksi,("SELECT COUNT(id_ska) AS total_ska FROM tb_ska"));
                            $data   = mysqli_fetch_array($a);
                        ?>
                        <div class="informer informer-default" style="margin-bottom:15px;">Data</div>
                        <div class="widget-big-int"><span class="num-count"><?php echo $data['total_ska']; ?></span></div>
                        <div class="widget-subtitle" style="margin-top:20px;">Total SKA</div>
                        <div><span class="fa fa-tags" style="float:right;"></span></div>
                    </div>
                </a>
            </div>
        </div>
        <!-- END OF WIDGET -->
    </div>
</div>
