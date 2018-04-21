<!DOCTYPE html>
<html>
	<head>
		<title>Tabel IPTB</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	    <meta name="viewport" content="width=device-width, initial-scale=1" />

	     <link rel="icon" href="../img/favicon.ico" type="image/x-icon" />
	    <!-- END META SECTION -->

	    <!-- CSS INCLUDE -->
	    <link rel="stylesheet" type="text/css" id="theme" href="../css/theme-blue.css"/>
	</head>
	<body>
		<div class="col-md-12" style="margin-top:20px;">
			<div class="panel panel-primary">
				<div class="panel-heading">
				    <h3 class="panel-title">DATA LENGKAP IPTB</h3>
					<div class="pull-right">
				        <a href="tabel_iptb_ex.php" class="btn btn-info btn-sm"><span class="fa fa-th-large"></span> Export Excel</a>
				    </div>
				</div>
				<div class="panel-body">
				    <div class="table-responsive">
						<table id="data" class="table table-bordered table-hover" style="font-size:11px;" width="100%" cellpadding="5px">
							<thead>
								<tr class="active">
									<th rowspan="3" class="text-center" style="vertical-align: middle !important;font-size:10px;">No.</th>
									<th rowspan="3" class="text-center" style="vertical-align: middle !important;font-size:10px;">Nama</th>
									<th rowspan="3" class="text-center" style="vertical-align: middle !important;font-size:10px;">No. Anggota</th>
									<th colspan="12" class="text-center" style="vertical-align: middle !important;font-size:10px;">IPTB - LAK</th>
									<th colspan="12" class="text-center" style="vertical-align: middle !important;font-size:10px;">IPTB - LAL</th>
									<!--<th colspan="2" class="text-center" style="vertical-align: middle !important;font-size:10px;">Anggota</th>
									<th rowspan="3" class="text-center" style="vertical-align: middle !important;font-size:10px;">ACPE</th>
									<th rowspan="3" class="text-center" style="vertical-align: middle !important;font-size:10px;">Asesor LPJK</th>-->
								</tr>
								<tr class="active">
									<!-- IPTB - LAK -->
									<th colspan="3" class="text-center" style="vertical-align: middle !important;font-size:10px;">Perencana</th>
									<th rowspan="2" class="text-center" style="vertical-align: middle !important;font-size:10px;">Masa Berlaku</th>
									<th colspan="3" class="text-center" style="vertical-align: middle !important;font-size:10px;">Pengawas</th>
									<th rowspan="2" class="text-center" style="vertical-align: middle !important;font-size:10px;">Masa Berlaku</th>
									<th colspan="3" class="text-center" style="vertical-align: middle !important;font-size:10px;">Pengkaji</th>
									<th rowspan="2" class="text-center" style="vertical-align: middle !important;font-size:10px;">Masa Berlaku</th>
									<!-- IPTB - LAL -->
									<th colspan="3" class="text-center" style="vertical-align: middle !important;font-size:10px;">Perencana</th>
									<th rowspan="2" class="text-center" style="vertical-align: middle !important;font-size:10px;">Masa Berlaku</th>
									<th colspan="3" class="text-center" style="vertical-align: middle !important;font-size:10px;">Pengawas</th>
									<th rowspan="2" class="text-center" style="vertical-align: middle !important;font-size:10px;">Masa Berlaku</th>
									<th colspan="3" class="text-center" style="vertical-align: middle !important;font-size:10px;">Pengkaji</th>
									<th rowspan="2" class="text-center" style="vertical-align: middle !important;font-size:10px;">Masa Berlaku</th>
									<!-- ANGGOTA -->
									<!--<th rowspan="2" class="text-center" style="vertical-align: middle !important;font-size:10px;">Aktif</th>-->
									<!--<th rowspan="2" class="text-center" style="vertical-align: middle !important;font-size:10px;">Non Aktif</th>-->
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
									<!-- LAL - PERENCEANA -->
									<th class="text-center" style="vertical-align: middle !important;font-size:10px;">C</th>
									<th class="text-center" style="vertical-align: middle !important;font-size:10px;">B</th>
									<th class="text-center" style="vertical-align: middle !important;font-size:10px;">A</th>
									<!-- LAL - PENGAWAS -->
									<th class="text-center" style="vertical-align: middle !important;font-size:10px;">C</th>
									<th class="text-center" style="vertical-align: middle !important;font-size:10px;">B</th>
									<th class="text-center" style="vertical-align: middle !important;font-size:10px;">A</th>
									<!-- LAL - PENGKAJI -->
									<th class="text-center" style="vertical-align: middle !important;font-size:10px;">C</th>
									<th class="text-center" style="vertical-align: middle !important;font-size:10px;">B</th>
									<th class="text-center" style="vertical-align: middle !important;font-size:10px;">A</th>
								</tr>
							</thead>
							<tbody>
								<?php

									$host   = "localhost";
									$user   = "haeiorid_anggota";
									$pw     = "P@ssw0rd.123";
									$db     = "haeiorid_anggota";

									$koneksi    = mysqli_connect($host,$user,$pw);
									$select     = mysqli_select_db($koneksi,$db);

				                    $no     = 1;
				                    $query  = mysqli_query($koneksi,("SELECT a.nama, a.no_anggota, b.* FROM tb_iptb AS b
				                                                      INNER JOIN tb_anggota AS a USING(id_agt)"));
				                    foreach($query as $data){

				                ?>
				                <tr style="font-size:10px;" class="text-center">
				                    <td><?php echo $no++ ?></td>
				        			<td class="text-left"><?php echo $data['nama'] ?></td>
				        			<td><?php echo $data['no_anggota'] ?></td>
									<td>
					                    <?php
					                        if ($data['perencana_lak'] == "c") {
					                            echo "<span style='color:red;font-weight:bold;'>1</span>";
					                        }else{
					                            echo "-";
					                        }
					                    ?>
					                </td>
					                <td>
					                    <?php
					                        if ($data['perencana_lak'] == "b") {
					                            echo "<span style='color:red;font-weight:bold;'>1</span>";
					                        }else{
					                            echo "-";
					                        }
					                    ?>
					                </td>
					                <td>
					                    <?php
					                        if ($data['perencana_lak'] == "a") {
					                            echo "<span style='color:red;font-weight:bold;'>1</span>";
					                        }else{
					                            echo "-";
					                        }
					                    ?>
					                </td>
					                <td>
										<?php
				                            $mb = $data['masa_berlaku_perencana_lak'];
				                            $timestamp = strtotime($mb);
				                            if ($data['masa_berlaku_perencana_lak'] == "0000-00-00"){
				                                echo "-";
				                            }else{
				                                echo date('d/m/Y', $timestamp);
				                            }
				                        ?>
					                </td>
					                <td>
					                    <?php
					                        if ($data['pengawas_lak'] == "c") {
					                            echo "<span style='color:red;font-weight:bold;'>1</span>";
					                        }else{
					                            echo "-";
					                        }
					                    ?>
					                </td>
					                <td>
					                    <?php
					                        if ($data['pengawas_lak'] == "b") {
					                            echo "<span style='color:red;font-weight:bold;'>1</span>";
					                        }else{
					                            echo "-";
					                        }
					                    ?>
					                </td>
					                <td>
					                    <?php
					                        if ($data['pengawas_lak'] == "a") {
					                            echo "<span style='color:red;font-weight:bold;'>1</span>";
					                        }else{
					                            echo "-";
					                        }
					                    ?>
					                </td>
					                <td>
										<?php
				                            $mb1 = $data['masa_berlaku_pengawas_lak'];
				                            $timestamp = strtotime($mb1);
				                            if ($data['masa_berlaku_pengawas_lak'] == "0000-00-00"){
				                                echo "-";
				                            }else{
				                                echo date('d/m/Y', $timestamp);
				                            }
				                        ?>
					                </td>
					                <td>
					                    <?php
					                        if ($data['pengkaji_lak'] == "c") {
					                            echo "<span style='color:red;font-weight:bold;'>1</span>";
					                        }else{
					                            echo "-";
					                        }
					                    ?>
					                </td>
					                <td>
					                    <?php
					                        if ($data['pengkaji_lak'] == "b") {
					                            echo "<span style='color:red;font-weight:bold;'>1</span>";
					                        }else{
					                            echo "-";
					                        }
					                    ?>
					                </td>
					                <td>
					                    <?php
					                        if ($data['pengkaji_lak'] == "a") {
					                            echo "<span style='color:red;font-weight:bold;'>1</span>";
					                        }else{
					                            echo "-";
					                        }
					                    ?>
					                </td>
					                <td>
										<?php
				                            $mb2 = $data['masa_berlaku_pengkaji_lak'];
				                            $timestamp = strtotime($mb2);
				                            if ($data['masa_berlaku_pengkaji_lak'] == "0000-00-00"){
				                                echo "-";
				                            }else{
				                                echo date('d/m/Y', $timestamp);
				                            }
				                        ?>
					                </td>
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
				                    <!--<td>
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
				                            if ($data['anggota'] == "-") {
				                                echo "-";
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
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<script type="text/javascript" src="../js/plugins/jquery/jquery.min.js"></script>
		<script type="text/javascript" src="../js/plugins/jquery/jquery-ui.min.js"></script>
		<script type="text/javascript" src="../js/plugins/bootstrap/bootstrap.min.js"></script>
		<script type="text/javascript" src="../js/plugins.js"></script>
		<script type="text/javascript" src="../js/actions.js"></script>
		<script type="text/javascript" src="../js/plugins/datatables/jquery.dataTables.min.js"></script>
		<script>
		$(function () {
		    $('#data').DataTable({
		        "paging": true,
		        "lengthChange": false,
		        "searching": true,
		        "ordering": false,
		        "info": false,
		        "autoWidth": false,
		        "iDisplayLength": 50,
		        'pagingType': 'full_numbers'
		    });
		});
		</script>
	</body>
</html>
