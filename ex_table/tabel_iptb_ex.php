<?php

	//koneksi
	include "../config/koneksi.php";
	// Load plugin PHPExcel nya
	require_once '../phpexcel/PHPExcel.php';

	// Panggil class PHPExcel nya
	$excel = new PHPExcel();
	// Settingan awal file excel
	$excel->getProperties()->setCreator('HAEI')
	             ->setLastModifiedBy('HAEI')
	             ->setTitle("Data IPTB")
	             ->setSubject("IPTB")
	             ->setDescription("Laporan Data IPTB")
	             ->setKeywords("Data IPTB");

	 // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
	 $style_col = array(
         'font' => array('bold' => true), // Set font nya jadi bold
         'alignment' => array(
             'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
             'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
         ),
         'borders' => array(
             'outline' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN
            ),
        ),
     );

     // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
     $style_row = array(
         'alignment' => array(
             'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
         ),
         'borders' => array(
             'outline' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN
            ),
             'inside' => array(
               'style' => PHPExcel_Style_Border::BORDER_THIN
           ),
         ),
         'font' => array(
             'size' => 9 // Set text jadi di tengah secara vertical (middle)
         )
     );

	 $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA IPTB"); // Set kolom A1 dengan tulisan "DATA SISWA"
	 $excel->getActiveSheet()->mergeCells('A1:AA1'); // Set Merge Cell pada kolom
	 $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
	 $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(12); // Set font size 15 untuk kolom A1
	 $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom
	 $excel->getActiveSheet()->mergeCells('A3:A5'); // Set Merge Cell pada kolom NO
	 $excel->getActiveSheet()->mergeCells('B3:B5'); // Set Merge Cell pada kolom Nama
	 $excel->getActiveSheet()->mergeCells('C3:C5'); // Set Merge Cell pada kolom No. Anggota
	 $excel->getActiveSheet()->mergeCells('D3:O3'); // Set Merge Cell pada kolom IPTB LAK
	 $excel->getActiveSheet()->mergeCells('D4:F4'); // perencana
	 $excel->getActiveSheet()->mergeCells('G4:G5'); // masa berlaku
	 $excel->getActiveSheet()->mergeCells('H4:J4'); // pengawas
	 $excel->getActiveSheet()->mergeCells('K4:K5'); // masa berlaku
	 $excel->getActiveSheet()->mergeCells('L4:N4'); // pengkaji
	 $excel->getActiveSheet()->mergeCells('O4:O5'); // masa berlaku
	 $excel->getActiveSheet()->mergeCells('P3:AA3'); // Set Merge Cell pada kolom IPTB LAL
	 $excel->getActiveSheet()->mergeCells('P4:R4'); // perencana
	 $excel->getActiveSheet()->mergeCells('S4:S5'); // masa berlaku
	 $excel->getActiveSheet()->mergeCells('T4:V4'); // pengawas
	 $excel->getActiveSheet()->mergeCells('W4:W5'); // masa berlaku
	 $excel->getActiveSheet()->mergeCells('X4:Z4'); // pengkaji
	 $excel->getActiveSheet()->mergeCells('AA4:AA5'); // masa berlaku
	 /*$excel->getActiveSheet()->mergeCells('AB3:AC3'); // anggota
	 $excel->getActiveSheet()->mergeCells('AB4:AB5'); // Aktif
	 $excel->getActiveSheet()->mergeCells('AC4:AC5'); // Non Aktif
	 $excel->getActiveSheet()->mergeCells('AD3:AD5'); // Acpe
	 $excel->getActiveSheet()->mergeCells('AE3:AE5'); // Asesor */
	 $excel->getActiveSheet()->getStyle('A3:AE3')->getFont()->setBold(TRUE); // Set bold kolom A1
	 $excel->getActiveSheet()->getStyle('A3:AE3')->getFont()->setSize(9); // Set font size 15 untuk kolom A1
	 $excel->getActiveSheet()->getStyle('A4:AE4')->getFont()->setBold(TRUE); // Set bold kolom A1
	 $excel->getActiveSheet()->getStyle('A4:AE4')->getFont()->setSize(9); // Set font size 15 untuk kolom A1
	 $excel->getActiveSheet()->getStyle('A5:AE5')->getFont()->setBold(TRUE); // Set bold kolom A1
	 $excel->getActiveSheet()->getStyle('A5:AE5')->getFont()->setSize(9); // Set font size 15 untuk kolom A1
	 $excel->getActiveSheet()->getStyle('A3:P3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom
	 $excel->getActiveSheet()->getStyle('A3:C3')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER); // Set text center untuk kolom

	 // Buat header tabel nya pada baris ke 3
	 $excel->setActiveSheetIndex(0)->setCellValue('A3', "No.");
	 $excel->setActiveSheetIndex(0)->setCellValue('B3', "Nama");
	 $excel->setActiveSheetIndex(0)->setCellValue('C3', "No. Anggota");
	 $excel->setActiveSheetIndex(0)->setCellValue('D3', "IPTB - LAK");
	 $excel->setActiveSheetIndex(0)->setCellValue('D4', "Perencana");
	 $excel->setActiveSheetIndex(0)->setCellValue('D5', "C");
	 $excel->setActiveSheetIndex(0)->setCellValue('E5', "B");
	 $excel->setActiveSheetIndex(0)->setCellValue('F5', "A");
	 $excel->setActiveSheetIndex(0)->setCellValue('G4', "Masa Berlaku");
	 $excel->setActiveSheetIndex(0)->setCellValue('H4', "Pengawas");
	 $excel->setActiveSheetIndex(0)->setCellValue('H5', "C");
	 $excel->setActiveSheetIndex(0)->setCellValue('I5', "B");
	 $excel->setActiveSheetIndex(0)->setCellValue('J5', "A");
	 $excel->setActiveSheetIndex(0)->setCellValue('K4', "Masa Berlaku");
	 $excel->setActiveSheetIndex(0)->setCellValue('L4', "Pengkaji");
	 $excel->setActiveSheetIndex(0)->setCellValue('L5', "C");
	 $excel->setActiveSheetIndex(0)->setCellValue('M5', "B");
	 $excel->setActiveSheetIndex(0)->setCellValue('N5', "A");
	 $excel->setActiveSheetIndex(0)->setCellValue('O4', "Masa Berlaku");
	 $excel->setActiveSheetIndex(0)->setCellValue('P3', "IPTB - LAL");
	 $excel->setActiveSheetIndex(0)->setCellValue('P4', "Perencana");
	 $excel->setActiveSheetIndex(0)->setCellValue('P5', "C");
	 $excel->setActiveSheetIndex(0)->setCellValue('Q5', "B");
	 $excel->setActiveSheetIndex(0)->setCellValue('R5', "A");
	 $excel->setActiveSheetIndex(0)->setCellValue('S4', "Masa Berlaku");
	 $excel->setActiveSheetIndex(0)->setCellValue('T4', "Pengawas");
	 $excel->setActiveSheetIndex(0)->setCellValue('T5', "C");
	 $excel->setActiveSheetIndex(0)->setCellValue('U5', "B");
	 $excel->setActiveSheetIndex(0)->setCellValue('V5', "A");
	 $excel->setActiveSheetIndex(0)->setCellValue('W4', "Masa Berlaku");
	 $excel->setActiveSheetIndex(0)->setCellValue('X4', "Pengkaji");
	 $excel->setActiveSheetIndex(0)->setCellValue('X5', "C");
	 $excel->setActiveSheetIndex(0)->setCellValue('Y5', "B");
	 $excel->setActiveSheetIndex(0)->setCellValue('Z5', "A");
	 $excel->setActiveSheetIndex(0)->setCellValue('AA4', "Masa Berlaku");
	 /*$excel->setActiveSheetIndex(0)->setCellValue('AB3', "Anggota");
	 $excel->setActiveSheetIndex(0)->setCellValue('AB4', "Aktif");
	 $excel->setActiveSheetIndex(0)->setCellValue('AC4', "Non Aktif");
	 $excel->setActiveSheetIndex(0)->setCellValue('AD3', "ACPE");
	 $excel->setActiveSheetIndex(0)->setCellValue('AE3', "Asesor LPJK");*/

	 // Apply style header yang telah kita buat tadi ke masing-masing kolom header
	 $excel->getActiveSheet()->getStyle('A3:A5')->applyFromArray($style_col);
	 $excel->getActiveSheet()->getStyle('B3:B5')->applyFromArray($style_col);
	 $excel->getActiveSheet()->getStyle('C3:C5')->applyFromArray($style_col);
	 $excel->getActiveSheet()->getStyle('D3:AA3')->applyFromArray($style_col);
	 /*$excel->getActiveSheet()->getStyle('AB3:AC3')->applyFromArray($style_col);
	 $excel->getActiveSheet()->getStyle('AD3:AD5')->applyFromArray($style_col);
	 $excel->getActiveSheet()->getStyle('AE3:AE5')->applyFromArray($style_col);*/
	 $excel->getActiveSheet()->getStyle('D4:F4')->applyFromArray($style_col);
	 $excel->getActiveSheet()->getStyle('D5')->applyFromArray($style_col);
	 $excel->getActiveSheet()->getStyle('E5')->applyFromArray($style_col);
	 $excel->getActiveSheet()->getStyle('F5')->applyFromArray($style_col);
	 $excel->getActiveSheet()->getStyle('G4:G5')->applyFromArray($style_col);
	 $excel->getActiveSheet()->getStyle('H4:J4')->applyFromArray($style_col);
	 $excel->getActiveSheet()->getStyle('H5')->applyFromArray($style_col);
	 $excel->getActiveSheet()->getStyle('I5')->applyFromArray($style_col);
	 $excel->getActiveSheet()->getStyle('J5')->applyFromArray($style_col);
	 $excel->getActiveSheet()->getStyle('K4:K5')->applyFromArray($style_col);
	 $excel->getActiveSheet()->getStyle('L4:N4')->applyFromArray($style_col);
	 $excel->getActiveSheet()->getStyle('L5')->applyFromArray($style_col);
	 $excel->getActiveSheet()->getStyle('M5')->applyFromArray($style_col);
	 $excel->getActiveSheet()->getStyle('N5')->applyFromArray($style_col);
	 $excel->getActiveSheet()->getStyle('O4:O5')->applyFromArray($style_col);
	 $excel->getActiveSheet()->getStyle('P4:R4')->applyFromArray($style_col);
	 $excel->getActiveSheet()->getStyle('P5')->applyFromArray($style_col);
	 $excel->getActiveSheet()->getStyle('Q5')->applyFromArray($style_col);
	 $excel->getActiveSheet()->getStyle('R5')->applyFromArray($style_col);
	 $excel->getActiveSheet()->getStyle('S4:S5')->applyFromArray($style_col);
	 $excel->getActiveSheet()->getStyle('T4:V4')->applyFromArray($style_col);
	 $excel->getActiveSheet()->getStyle('T5')->applyFromArray($style_col);
	 $excel->getActiveSheet()->getStyle('U5')->applyFromArray($style_col);
	 $excel->getActiveSheet()->getStyle('V5')->applyFromArray($style_col);
	 $excel->getActiveSheet()->getStyle('W4:W5')->applyFromArray($style_col);
	 $excel->getActiveSheet()->getStyle('X4:Z4')->applyFromArray($style_col);
	 $excel->getActiveSheet()->getStyle('X5')->applyFromArray($style_col);
	 $excel->getActiveSheet()->getStyle('Y5')->applyFromArray($style_col);
	 $excel->getActiveSheet()->getStyle('Z5')->applyFromArray($style_col);
	 $excel->getActiveSheet()->getStyle('AA4:AA5')->applyFromArray($style_col);
	 /*$excel->getActiveSheet()->getStyle('AB4:AB5')->applyFromArray($style_col);
	 $excel->getActiveSheet()->getStyle('AC4:AC5')->applyFromArray($style_col);*/

	 // Set height baris ke 1, 2 dan 3
	 $excel->getActiveSheet()->getRowDimension('1')->setRowHeight(20);
	 $excel->getActiveSheet()->getRowDimension('2')->setRowHeight(20);
	 $excel->getActiveSheet()->getRowDimension('3')->setRowHeight(20);
	 $excel->getActiveSheet()->getRowDimension('4')->setRowHeight(20);
	 $excel->getActiveSheet()->getRowDimension('5')->setRowHeight(20);

	 // Set width kolom
	 $excel->getActiveSheet()->getColumnDimension('A')->setWidth(4); // Set width kolom
	 $excel->getActiveSheet()->getColumnDimension('B')->setWidth(45); // Set width kolom
	 $excel->getActiveSheet()->getColumnDimension('C')->setWidth(16); // Set width kolom
	 $excel->getActiveSheet()->getColumnDimension('G')->setWidth(15); // Set width kolom
	 $excel->getActiveSheet()->getColumnDimension('K')->setWidth(15); // Set width kolom
	 $excel->getActiveSheet()->getColumnDimension('O')->setWidth(15); // Set width kolom
	 $excel->getActiveSheet()->getColumnDimension('S')->setWidth(15); // Set width kolom
	 $excel->getActiveSheet()->getColumnDimension('W')->setWidth(15); // Set width kolom
	 $excel->getActiveSheet()->getColumnDimension('AA')->setWidth(15); // Set width kolom
	 /*$excel->getActiveSheet()->getColumnDimension('AB')->setWidth(8); // Set width kolom
	 $excel->getActiveSheet()->getColumnDimension('AC')->setWidth(8); // Set width kolom
	 $excel->getActiveSheet()->getColumnDimension('AD')->setWidth(16); // Set width kolom
	 $excel->getActiveSheet()->getColumnDimension('AE')->setWidth(16); // Set width kolom */

	 // Freeze Pane
	 $excel->getActiveSheet()->freezePane('D6');

	 // Buat query untuk menampilkan semua data siswa
	 $no  		= 1;
	 $numrow 	= 6;
	 $sql 		= mysqli_query($koneksi,("SELECT a.nama, a.no_anggota, b.* FROM tb_iptb AS b INNER JOIN tb_anggota AS a USING(id_agt)"));
	 while($data = mysqli_fetch_array($sql)){
		 $excel->getActiveSheet()->setCellValue('A'.$numrow, $no)
		 						 ->setCellValue('B'.$numrow, $data['nama'])
		 						 ->setCellValue('C'.$numrow, $data['no_anggota']);

		 if ($data['perencana_lak'] == "c") {
			 $excel->getActiveSheet()->setCellValue('D'.$numrow, '1');
		 }else{
			 $excel->getActiveSheet()->setCellValue('D'.$numrow, '-');
		 }

		 if ($data['perencana_lak'] == "b") {
			 $excel->getActiveSheet()->setCellValue('E'.$numrow, '1');
		 }else{
			 $excel->getActiveSheet()->setCellValue('E'.$numrow, '-');
		 }

		 if ($data['perencana_lak'] == "a") {
			 $excel->getActiveSheet()->setCellValue('F'.$numrow, '1');
		 }else{
			 $excel->getActiveSheet()->setCellValue('F'.$numrow, '-');
		 }

		 $mb = $data['masa_berlaku_perencana_lak'];
		 $timestamp = strtotime($mb);
		 $cv = date('d/m/Y', $timestamp);
		 if ($data['masa_berlaku_perencana_lak'] == "0000-00-00"){
			 $excel->getActiveSheet()->setCellValue('G'.$numrow, '-');
		 }else{
			 $excel->getActiveSheet()->setCellValue('G'.$numrow, $cv);
		 }

		 if ($data['pengawas_lak'] == "c") {
			 $excel->getActiveSheet()->setCellValue('H'.$numrow, '1');
		 }else{
			 $excel->getActiveSheet()->setCellValue('H'.$numrow, '-');
		 }

		 if ($data['pengawas_lak'] == "b") {
			 $excel->getActiveSheet()->setCellValue('I'.$numrow, '1');
		 }else{
			 $excel->getActiveSheet()->setCellValue('I'.$numrow, '-');
		 }

		 if ($data['pengawas_lak'] == "a") {
			 $excel->getActiveSheet()->setCellValue('J'.$numrow, '1');
		 }else{
			 $excel->getActiveSheet()->setCellValue('J'.$numrow, '-');
		 }

		 $mb1 = $data['masa_berlaku_pengawas_lak'];
		 $timestamp = strtotime($mb1);
		 $cv1 = date('d/m/Y', $timestamp);
		 if ($data['masa_berlaku_pengawas_lak'] == "0000-00-00"){
			 $excel->getActiveSheet()->setCellValue('K'.$numrow, '-');
		 }else{
			 $excel->getActiveSheet()->setCellValue('K'.$numrow, $cv1);
		 }

		 if ($data['pengkaji_lak'] == "c") {
			 $excel->getActiveSheet()->setCellValue('L'.$numrow, '1');
		 }else{
			 $excel->getActiveSheet()->setCellValue('L'.$numrow, '-');
		 }

		 if ($data['pengkaji_lak'] == "b") {
			 $excel->getActiveSheet()->setCellValue('M'.$numrow, '1');
		 }else{
			 $excel->getActiveSheet()->setCellValue('M'.$numrow, '-');
		 }

		 if ($data['pengkaji_lak'] == "a") {
			 $excel->getActiveSheet()->setCellValue('N'.$numrow, '1');
		 }else{
			 $excel->getActiveSheet()->setCellValue('N'.$numrow, '-');
		 }

		 $mb2 = $data['masa_berlaku_pengkaji_lak'];
		 $timestamp = strtotime($mb2);
		 $cv2 = date('d/m/Y', $timestamp);
		 if ($data['masa_berlaku_pengkaji_lak'] == "0000-00-00"){
			 $excel->getActiveSheet()->setCellValue('O'.$numrow, '-');
		 }else{
			 $excel->getActiveSheet()->setCellValue('O'.$numrow, $cv2);
		 }

		 if ($data['perencana_lal'] == "c") {
			 $excel->getActiveSheet()->setCellValue('P'.$numrow, '1');
		 }else{
			 $excel->getActiveSheet()->setCellValue('P'.$numrow, '-');
		 }

		 if ($data['perencana_lal'] == "b") {
			 $excel->getActiveSheet()->setCellValue('Q'.$numrow, '1');
		 }else{
			 $excel->getActiveSheet()->setCellValue('Q'.$numrow, '-');
		 }

		 if ($data['perencana_lal'] == "a") {
			 $excel->getActiveSheet()->setCellValue('R'.$numrow, '1');
		 }else{
			 $excel->getActiveSheet()->setCellValue('R'.$numrow, '-');
		 }

		 $mb3 = $data['masa_berlaku_perencana_lal'];
		 $timestamp = strtotime($mb3);
		 $cv3 = date('d/m/Y', $timestamp);
		 if ($data['masa_berlaku_perencana_lal'] == "0000-00-00"){
			 $excel->getActiveSheet()->setCellValue('S'.$numrow, '-');
		 }else{
			 $excel->getActiveSheet()->setCellValue('S'.$numrow, $cv3);
		 }

		 if ($data['pengawas_lal'] == "c") {
			 $excel->getActiveSheet()->setCellValue('T'.$numrow, '1');
		 }else{
			 $excel->getActiveSheet()->setCellValue('T'.$numrow, '-');
		 }

		 if ($data['pengawas_lal'] == "b") {
			 $excel->getActiveSheet()->setCellValue('U'.$numrow, '1');
		 }else{
			 $excel->getActiveSheet()->setCellValue('U'.$numrow, '-');
		 }

		 if ($data['pengawas_lal'] == "a") {
			 $excel->getActiveSheet()->setCellValue('V'.$numrow, '1');
		 }else{
			 $excel->getActiveSheet()->setCellValue('V'.$numrow, '-');
		 }

		 $mb4 = $data['masa_berlaku_pengawas_lal'];
		 $timestamp = strtotime($mb4);
		 $cv4 = date('d/m/Y', $timestamp);
		 if ($data['masa_berlaku_pengawas_lal'] == "0000-00-00"){
			 $excel->getActiveSheet()->setCellValue('W'.$numrow, '-');
		 }else{
			 $excel->getActiveSheet()->setCellValue('W'.$numrow, $cv4);
		 }

		 if ($data['pengkaji_lal'] == "c") {
			 $excel->getActiveSheet()->setCellValue('X'.$numrow, '1');
		 }else{
			 $excel->getActiveSheet()->setCellValue('X'.$numrow, '-');
		 }

		 if ($data['pengkaji_lal'] == "b") {
			 $excel->getActiveSheet()->setCellValue('Y'.$numrow, '1');
		 }else{
			 $excel->getActiveSheet()->setCellValue('Y'.$numrow, '-');
		 }

		 if ($data['pengkaji_lal'] == "a") {
			 $excel->getActiveSheet()->setCellValue('Z'.$numrow, '1');
		 }else{
			 $excel->getActiveSheet()->setCellValue('Z'.$numrow, '-');
		 }

		 $mb5 = $data['masa_berlaku_pengkaji_lal'];
		 $timestamp = strtotime($mb5);
		 $cv5 = date('d/m/Y', $timestamp);
		 if ($data['masa_berlaku_pengkaji_lal'] == "0000-00-00"){
			 $excel->getActiveSheet()->setCellValue('AA'.$numrow, '-');
		 }else{
			 $excel->getActiveSheet()->setCellValue('AA'.$numrow, $cv5);
		 }

		 /*if ($data['anggota'] == 1) {
			 $excel->getActiveSheet()->setCellValue('AB'.$numrow, '1');
		 }else{
			 $excel->getActiveSheet()->setCellValue('AB'.$numrow, '-');
		 }

		 if ($data['anggota'] == "-") {
			 $excel->getActiveSheet()->setCellValue('AC'.$numrow, '-');
		 }else{
			 $excel->getActiveSheet()->setCellValue('AC'.$numrow, '-');
		 }

		 if ($data['acpe'] == "") {
			 $excel->getActiveSheet()->setCellValue('AD'.$numrow, '-');
		 }else{
			 $excel->getActiveSheet()->setCellValue('AD'.$numrow, $data['acpe']);
		 }

		 if ($data['asesor_lpjk'] == "") {
			 $excel->getActiveSheet()->setCellValue('AE'.$numrow, '-');
		 }else{
			 $excel->getActiveSheet()->setCellValue('AE'.$numrow, $data['asesor_lpjk']);
		 }*/

		 // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
		 $excel->getActiveSheet()->getStyle('A'.$numrow.':AA'.$numrow)->applyFromArray($style_row);


		 // Height
		 $excel->getActiveSheet()->getRowDimension($numrow)->setRowHeight(18);

		 // Alignment
		 $excel->getActiveSheet()->getStyle('A'.$numrow)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom
		 $excel->getActiveSheet()->getStyle('C'.$numrow.':AA'.$numrow)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom


		 $no++; // Tambah 1 setiap kali looping
		 $numrow++; // Tambah 1 setiap kali looping
	 }

	 // Set orientasi kertas jadi LANDSCAPE
	 $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
	 // Set judul file excel nya
	 $excel->getActiveSheet(0)->setTitle("IPTB");
	 $excel->setActiveSheetIndex(0);
	 // Proses file excel
	 header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	 header('Content-Disposition: attachment; filename="Data IPTB.xlsx"'); // Set nama file excel nya
	 header('Cache-Control: max-age=0');
	 $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
	 $write->save('php://output');

?>
