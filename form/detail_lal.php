<?php

    $host   = "localhost";
    $user   = "haeiorid_anggota";
    $pw     = "P@ssw0rd.123";
    $db     = "haeiorid_anggota";

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
<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
            <tr class="active">
                <th rowspan="3" class="text-center" style="vertical-align: middle !important;font-size:10px;">Nama</th>
    			<th rowspan="3" class="text-center" style="vertical-align: middle !important;font-size:10px;">No.Anggota</th>
                <th colspan="12" class="text-center" style="vertical-align: middle !important;font-size:10px;">IPTB - LAL</th>
            </tr>
            <tr class="active">
    			<!-- IPTB - LAK -->
    			<th colspan="3" class="text-center" style="vertical-align: middle !important;font-size:10px;">Perencana</th>
    			<th rowspan="2" class="text-center" style="vertical-align: middle !important;font-size:10px;">Masa Berlaku</th>
    			<th colspan="3" class="text-center" style="vertical-align: middle !important;font-size:10px;">Pengawas</th>
    			<th rowspan="2" class="text-center" style="vertical-align: middle !important;font-size:10px;">Masa Berlaku</th>
    			<th colspan="3" class="text-center" style="vertical-align: middle !important;font-size:10px;">Pengkaji</th>
    			<th rowspan="2" class="text-center" style="vertical-align: middle !important;font-size:10px;">Masa Berlaku</th>
            </tr>
            <tr class="active">
                <!-- LAK - PERENCEANA -->
                <th class="text-center" style="vertical-align: middle !important;font-size:10px;">C</th>
                <th class="text-center" style="vertical-align: middle !important;font-size:10px;">B</th>
                <th class="text-center" style="vertical-align: middle !important;font-size:10px;">A</th>
                <!-- LAK - PENGAWAS -->
                <th class="text-center" style="vertical-align: middle !important;font-size:10px;">C</th>
                <th class="text-center" style="vertical-align: middle !important;font-size:10px;">B</th>
                <th class="text-center" style="vertical-align: middle !important;font-size:10px;">A</th>
                <!-- LAK - PENGKAJI -->
                <th class="text-center" style="vertical-align: middle !important;font-size:10px;">C</th>
                <th class="text-center" style="vertical-align: middle !important;font-size:10px;">B</th>
                <th class="text-center" style="vertical-align: middle !important;font-size:10px;">A</th>
            </tr>
        </thead>
        <tbody>
            <tr class="text-center" style="font-size:10px;">
                <td><?php echo $data['nama'] ?></td>
                <td><?php echo $data['no_anggota'] ?></td>
                <td>
                    <?php
                        if ($data['perencana_lal'] == "c") {
                            echo "<span style='color:red;font-weight:bold;'>1</span>";
                        }else{
                            echo "-";
                        }
                    ?>
                </td>
                <td>
                    <?php
                        if ($data['perencana_lal'] == "b") {
                            echo "<span style='color:red;font-weight:bold;'>1</span>";
                        }else{
                            echo "-";
                        }
                    ?>
                </td>
                <td>
                    <?php
                        if ($data['perencana_lal'] == "a") {
                            echo "<span style='color:red;font-weight:bold;'>1</span>";
                        }else{
                            echo "-";
                        }
                    ?>
                </td>
                <td>
                    <?php
                        $mb3 = $data['masa_berlaku_perencana_lal'];
                        $timestamp = strtotime($mb3);
                        if ($data['masa_berlaku_perencana_lal'] == "0000-00-00"){
                            echo "-";
                        }else{
                            echo date('d/m/Y', $timestamp);
                        }
                    ?>
                </td>
                <td>
                    <?php
                        if ($data['pengawas_lal'] == "c") {
                            echo "<span style='color:red;font-weight:bold;'>1</span>";
                        }else{
                            echo "-";
                        }
                    ?>
                </td>
                <td>
                    <?php
                        if ($data['pengawas_lal'] == "b") {
                            echo "<span style='color:red;font-weight:bold;'>1</span>";
                        }else{
                            echo "-";
                        }
                    ?>
                </td>
                <td>
                    <?php
                        if ($data['pengawas_lal'] == "a") {
                            echo "<span style='color:red;font-weight:bold;'>1</span>";
                        }else{
                            echo "-";
                        }
                    ?>
                </td>
                <td>
                    <?php
                       $mb4 = $data['masa_berlaku_pengawas_lal'];
                       $timestamp = strtotime($mb4);
                       if ($data['masa_berlaku_pengawas_lal'] == "0000-00-00"){
                           echo "-";
                       }else{
                           echo date('d/m/Y', $timestamp);
                       }
                    ?>
                </td>
                <td>
                    <?php
                        if ($data['pengkaji_lal'] == "c") {
                            echo "<span style='color:red;font-weight:bold;'>1</span>";
                        }else{
                            echo "-";
                        }
                    ?>
                </td>
                <td>
                    <?php
                        if ($data['pengkaji_lal'] == "b") {
                            echo "<span style='color:red;font-weight:bold;'>1</span>";
                        }else{
                            echo "-";
                        }
                    ?>
                </td>
                <td>
                    <?php
                        if ($data['pengkaji_lal'] == "a") {
                            echo "<span style='color:red;font-weight:bold;'>1</span>";
                        }else{
                            echo "-";
                        }
                    ?>
                </td>
                <td>
                    <?php
                        $mb5 = $data['masa_berlaku_pengkaji_lal'];
                        $timestamp = strtotime($mb5);
                        if ($data['masa_berlaku_pengkaji_lal'] == "0000-00-00"){
                            echo "-";
                        }else{
                            echo date('d/m/Y', $timestamp);
                        }
                    ?>
                </td>
            </tr>
        </tbody>
    </table>
</div>
