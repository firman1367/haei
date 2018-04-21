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
	             ->setTitle("Data SKA")
	             ->setSubject("SKA")
	             ->setDescription("Laporan Data SKA")
	             ->setKeywords("Data SKA");

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

	 $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA SKA"); // Set kolom A1
	 $excel->getActiveSheet()->mergeCells('A1:R1'); // Set Merge Cell pada kolom
	 $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
	 $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(12); // Set font size 15 untuk kolom A1
	 $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom
	 $excel->getActiveSheet()->mergeCells('A3:A5'); // Set Merge Cell pada kolom NO
	 $excel->getActiveSheet()->mergeCells('B3:B5'); // Set Merge Cell pada kolom Nama
	 $excel->getActiveSheet()->mergeCells('C3:C5'); // Set Merge Cell pada kolom No. Anggota
	 $excel->getActiveSheet()->mergeCells('D3:D5'); // Set Merge Cell pada kolom Perusahaan
	 $excel->getActiveSheet()->mergeCells('E3:G4'); // tahun dikeluarkan
	 $excel->getActiveSheet()->mergeCells('H3:H5'); // pemegang SKA
	 $excel->getActiveSheet()->mergeCells('I3:Q3'); // SKA
	 $excel->getActiveSheet()->mergeCells('I4:K4'); // 401
     $excel->getActiveSheet()->mergeCells('L4:N4'); // 405
     $excel->getActiveSheet()->mergeCells('O4:Q4'); // 406
	 $excel->getActiveSheet()->mergeCells('R3:T4'); // berakhir
	 $excel->getActiveSheet()->getStyle('A3:R3')->getFont()->setBold(TRUE);
	 $excel->getActiveSheet()->getStyle('A3:R3')->getFont()->setSize(9);
	 $excel->getActiveSheet()->getStyle('A4:R4')->getFont()->setBold(TRUE);
	 $excel->getActiveSheet()->getStyle('A4:R4')->getFont()->setSize(9);
	 $excel->getActiveSheet()->getStyle('A5:T5')->getFont()->setBold(TRUE);
	 $excel->getActiveSheet()->getStyle('A5:T5')->getFont()->setSize(9);
	 $excel->getActiveSheet()->getStyle('A3:T3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom
     $excel->getActiveSheet()->getStyle('I4:Q4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom
     $excel->getActiveSheet()->getStyle('E5:T5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom
     $excel->getActiveSheet()->getStyle('A3:T3')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER); // Set text center untuk kolom
     $excel->getActiveSheet()->getStyle('E3:G4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom
	 $excel->getActiveSheet()->getStyle('E3:G4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER); // Set text center untuk kolom

	 // Buat header tabel nya pada baris ke 3
	 $excel->setActiveSheetIndex(0)->setCellValue('A3', "No.");
	 $excel->setActiveSheetIndex(0)->setCellValue('B3', "Nama");
	 $excel->setActiveSheetIndex(0)->setCellValue('C3', "No. Anggota");
	 $excel->setActiveSheetIndex(0)->setCellValue('D3', "Nama Perusahaan");
	 $excel->setActiveSheetIndex(0)->setCellValue('E3', "Tahun dikeluarkan SKA");
	 $excel->setActiveSheetIndex(0)->setCellValue('E5', "401");
	 $excel->setActiveSheetIndex(0)->setCellValue('F5', "405");
	 $excel->setActiveSheetIndex(0)->setCellValue('G5', "406");
	 $excel->setActiveSheetIndex(0)->setCellValue('H3', "Pemegang SKA");
	 $excel->setActiveSheetIndex(0)->setCellValue('I3', "SKA");
	 $excel->setActiveSheetIndex(0)->setCellValue('I4', "401");
	 $excel->setActiveSheetIndex(0)->setCellValue('L4', "405");
	 $excel->setActiveSheetIndex(0)->setCellValue('O4', "406");
     $excel->setActiveSheetIndex(0)->setCellValue('I5', "AMu");
     $excel->setActiveSheetIndex(0)->setCellValue('J5', "AMa");
     $excel->setActiveSheetIndex(0)->setCellValue('K5', "AUt");
     $excel->setActiveSheetIndex(0)->setCellValue('L5', "AMu");
     $excel->setActiveSheetIndex(0)->setCellValue('M5', "AMa");
     $excel->setActiveSheetIndex(0)->setCellValue('N5', "AUt");
     $excel->setActiveSheetIndex(0)->setCellValue('O5', "AMu");
     $excel->setActiveSheetIndex(0)->setCellValue('P5', "AMa");
     $excel->setActiveSheetIndex(0)->setCellValue('Q5', "AUt");
     $excel->setActiveSheetIndex(0)->setCellValue('R5', "401");
     $excel->setActiveSheetIndex(0)->setCellValue('S5', "405");
     $excel->setActiveSheetIndex(0)->setCellValue('T5', "406");
     $excel->setActiveSheetIndex(0)->setCellValue('R3', "Berakhir");

	 // Apply style header yang telah kita buat tadi ke masing-masing kolom header
	 $excel->getActiveSheet()->getStyle('A3:A5')->applyFromArray($style_col);
	 $excel->getActiveSheet()->getStyle('B3:B5')->applyFromArray($style_col);
	 $excel->getActiveSheet()->getStyle('C3:C5')->applyFromArray($style_col);
	 $excel->getActiveSheet()->getStyle('D3:D5')->applyFromArray($style_col);
	 $excel->getActiveSheet()->getStyle('E3:G4')->applyFromArray($style_col);
	 $excel->getActiveSheet()->getStyle('AB3:AC3')->applyFromArray($style_col);
	 $excel->getActiveSheet()->getStyle('E5')->applyFromArray($style_col);
	 $excel->getActiveSheet()->getStyle('F5')->applyFromArray($style_col);
	 $excel->getActiveSheet()->getStyle('G5')->applyFromArray($style_col);
	 $excel->getActiveSheet()->getStyle('H3:H5')->applyFromArray($style_col);
	 $excel->getActiveSheet()->getStyle('I3:Q3')->applyFromArray($style_col);
	 $excel->getActiveSheet()->getStyle('I4:K4')->applyFromArray($style_col);
	 $excel->getActiveSheet()->getStyle('L4:N4')->applyFromArray($style_col);
	 $excel->getActiveSheet()->getStyle('O4:Q4')->applyFromArray($style_col);
	 $excel->getActiveSheet()->getStyle('I5')->applyFromArray($style_col);
	 $excel->getActiveSheet()->getStyle('J5')->applyFromArray($style_col);
	 $excel->getActiveSheet()->getStyle('K5')->applyFromArray($style_col);
     $excel->getActiveSheet()->getStyle('L5')->applyFromArray($style_col);
	 $excel->getActiveSheet()->getStyle('M5')->applyFromArray($style_col);
	 $excel->getActiveSheet()->getStyle('N5')->applyFromArray($style_col);
     $excel->getActiveSheet()->getStyle('O5')->applyFromArray($style_col);
	 $excel->getActiveSheet()->getStyle('P5')->applyFromArray($style_col);
	 $excel->getActiveSheet()->getStyle('Q5')->applyFromArray($style_col);
	 $excel->getActiveSheet()->getStyle('R5')->applyFromArray($style_col);
	 $excel->getActiveSheet()->getStyle('S5')->applyFromArray($style_col);
	 $excel->getActiveSheet()->getStyle('T5')->applyFromArray($style_col);
     $excel->getActiveSheet()->getStyle('R3:T4')->applyFromArray($style_col);
     $excel->getActiveSheet()->getStyle('H3:H5'.$excel->getActiveSheet()->getHighestRow())->getAlignment()->setWrapText(true);

	 // Set height baris ke 1, 2 dan 3
	 $excel->getActiveSheet()->getRowDimension('1')->setRowHeight(16);
	 $excel->getActiveSheet()->getRowDimension('2')->setRowHeight(16);
	 $excel->getActiveSheet()->getRowDimension('3')->setRowHeight(16);
	 $excel->getActiveSheet()->getRowDimension('4')->setRowHeight(16);
	 $excel->getActiveSheet()->getRowDimension('5')->setRowHeight(16);

	 // Set width kolom
	 $excel->getActiveSheet()->getColumnDimension('A')->setWidth(4); // Set width kolom
	 $excel->getActiveSheet()->getColumnDimension('B')->setWidth(40); // Set width kolom
	 $excel->getActiveSheet()->getColumnDimension('C')->setWidth(16); // Set width kolom
	 $excel->getActiveSheet()->getColumnDimension('D')->setWidth(40); // Set width kolom
	 $excel->getActiveSheet()->getColumnDimension('E')->setWidth(10); // Set width kolom
	 $excel->getActiveSheet()->getColumnDimension('F')->setWidth(10); // Set width kolom
	 $excel->getActiveSheet()->getColumnDimension('G')->setWidth(10); // Set width kolom
     $excel->getActiveSheet()->getColumnDimension('R')->setWidth(10); // Set width kolom

	 // Freeze Pane
	 $excel->getActiveSheet()->freezePane('D6');

	 // Buat query untuk menampilkan semua data siswa
	 $no  		= 1;
	 $numrow 	= 6;
	 $sql 		= mysqli_query($koneksi,("SELECT a.nama, a.no_anggota, a.nama_perusahaan, b.* FROM tb_ska AS b INNER JOIN tb_anggota AS a USING(id_agt)"));
	 while($data = mysqli_fetch_array($sql)){
		 $excel->getActiveSheet()->setCellValue('A'.$numrow, $no)
		 						 ->setCellValue('B'.$numrow, $data['nama'])
		 						 ->setCellValue('C'.$numrow, $data['no_anggota'])
         						 ->setCellValue('D'.$numrow, $data['nama_perusahaan']);

		 $mb = $data['thk_ska_401'];
		 $timestamp = strtotime($mb);
		 $cv = date('d/m/Y', $timestamp);
		 if ($data['thk_ska_401'] == "0000-00-00"){
			 $excel->getActiveSheet()->setCellValue('E'.$numrow, '-');
		 }else{
			 $excel->getActiveSheet()->setCellValue('E'.$numrow, $cv);
		 }

		 $mb1 = $data['thk_ska_405'];
		 $timestamp = strtotime($mb1);
		 $cv1 = date('d/m/Y', $timestamp);
		 if ($data['thk_ska_405'] == "0000-00-00"){
			 $excel->getActiveSheet()->setCellValue('F'.$numrow, '-');
		 }else{
			 $excel->getActiveSheet()->setCellValue('F'.$numrow, $cv1);
		 }

		 $mb2 = $data['thk_ska_406'];
		 $timestamp = strtotime($mb2);
		 $cv2 = date('d/m/Y', $timestamp);
		 if ($data['thk_ska_406'] == "0000-00-00"){
			 $excel->getActiveSheet()->setCellValue('G'.$numrow, '-');
		 }else{
			 $excel->getActiveSheet()->setCellValue('G'.$numrow, $cv2);
		 }

         if ($data['pemegang_ska'] == 1) {
             $excel->getActiveSheet()->setCellValue('H'.$numrow, $data['pemegang_ska']);
         }else{
             $excel->getActiveSheet()->setCellValue('H'.$numrow, '-');
         }

         if ($data['ska_401'] == "amu") {
             $excel->getActiveSheet()->setCellValue('I'.$numrow, '1');
         }else{
             $excel->getActiveSheet()->setCellValue('I'.$numrow, '-');
         }

         if ($data['ska_401'] == "ama") {
             $excel->getActiveSheet()->setCellValue('J'.$numrow, '1');
         }else{
             $excel->getActiveSheet()->setCellValue('J'.$numrow, '-');
         }

         if ($data['ska_401'] == "aut") {
             $excel->getActiveSheet()->setCellValue('K'.$numrow, '1');
         }else{
             $excel->getActiveSheet()->setCellValue('K'.$numrow, '-');
         }

         if ($data['ska_405'] == "amu") {
             $excel->getActiveSheet()->setCellValue('L'.$numrow, '1');
         }else{
             $excel->getActiveSheet()->setCellValue('L'.$numrow, '-');
         }

         if ($data['ska_405'] == "ama") {
             $excel->getActiveSheet()->setCellValue('M'.$numrow, '1');
         }else{
             $excel->getActiveSheet()->setCellValue('M'.$numrow, '-');
         }

         if ($data['ska_405'] == "aut") {
             $excel->getActiveSheet()->setCellValue('N'.$numrow, '1');
         }else{
             $excel->getActiveSheet()->setCellValue('N'.$numrow, '-');
         }

         if ($data['ska_406'] == "amu") {
             $excel->getActiveSheet()->setCellValue('O'.$numrow, '1');
         }else{
             $excel->getActiveSheet()->setCellValue('O'.$numrow, '-');
         }

         if ($data['ska_406'] == "ama") {
             $excel->getActiveSheet()->setCellValue('P'.$numrow, '1');
         }else{
             $excel->getActiveSheet()->setCellValue('P'.$numrow, '-');
         }

         if ($data['ska_406'] == "aut") {
             $excel->getActiveSheet()->setCellValue('Q'.$numrow, '1');
         }else{
             $excel->getActiveSheet()->setCellValue('Q'.$numrow, '-');
         }

		 $mb3 = $data['berakhir_ska_401'];
		 $timestamp = strtotime($mb3);
		 $cv3 = date('d/m/Y', $timestamp);
		 if ($data['berakhir_ska_401'] == "0000-00-00"){
			 $excel->getActiveSheet()->setCellValue('R'.$numrow, '-');
		 }else{
			 $excel->getActiveSheet()->setCellValue('R'.$numrow, $cv3);
		 }
		 
		 $mb4 = $data['berakhir_ska_405'];
		 $timestamp = strtotime($mb4);
		 $cv4 = date('d/m/Y', $timestamp);
		 if ($data['berakhir_ska_405'] == "0000-00-00"){
			 $excel->getActiveSheet()->setCellValue('S'.$numrow, '-');
		 }else{
			 $excel->getActiveSheet()->setCellValue('S'.$numrow, $cv4);
		 }
		 
		 $mb5 = $data['berakhir_ska_406'];
		 $timestamp = strtotime($mb5);
		 $cv5 = date('d/m/Y', $timestamp);
		 if ($data['berakhir_ska_406'] == "0000-00-00"){
			 $excel->getActiveSheet()->setCellValue('T'.$numrow, '-');
		 }else{
			 $excel->getActiveSheet()->setCellValue('T'.$numrow, $cv5);
		 }

		 // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)

         $excel->getActiveSheet()->getStyle('A'.$numrow.':T'.$numrow)->applyFromArray($style_row);

		 // Height
		 $excel->getActiveSheet()->getRowDimension($numrow)->setRowHeight(18);

		 // Alignment
         $excel->getActiveSheet()->getStyle('A'.$numrow)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom
		 $excel->getActiveSheet()->getStyle('C'.$numrow)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom
         $excel->getActiveSheet()->getStyle('E'.$numrow.':T'.$numrow)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom

		 $no++; // Tambah 1 setiap kali looping
		 $numrow++; // Tambah 1 setiap kali looping

         // jumlah data pemegang ska
         $agt        = mysqli_query($koneksi,("SELECT COUNT(id_agt) AS agt FROM tb_ska"));
         $data_agt   = mysqli_fetch_array($agt);

         // jumlah data pemegang ska
         $a         = mysqli_query($koneksi,("SELECT COUNT(pemegang_ska) AS pg_ska FROM tb_ska WHERE pemegang_ska = 1"));
         $data_pg   = mysqli_fetch_array($a);

         // jumlah data ska
         $a1    = mysqli_query($koneksi,("SELECT COUNT(ska_401) AS ska401 FROM tb_ska WHERE ska_401 = 'amu'"));
         $b1    = mysqli_fetch_array($a1);

         $a2    = mysqli_query($koneksi,("SELECT COUNT(ska_401) AS ska401 FROM tb_ska WHERE ska_401 = 'ama'"));
         $b2    = mysqli_fetch_array($a2);

         $a3    = mysqli_query($koneksi,("SELECT COUNT(ska_401) AS ska401 FROM tb_ska WHERE ska_401 = 'aut'"));
         $b3    = mysqli_fetch_array($a3);

         $a4    = mysqli_query($koneksi,("SELECT COUNT(ska_405) AS ska405 FROM tb_ska WHERE ska_405 = 'amu'"));
         $b4    = mysqli_fetch_array($a4);

         $a5    = mysqli_query($koneksi,("SELECT COUNT(ska_405) AS ska405 FROM tb_ska WHERE ska_405 = 'ama'"));
         $b5    = mysqli_fetch_array($a5);

         $a6    = mysqli_query($koneksi,("SELECT COUNT(ska_405) AS ska405 FROM tb_ska WHERE ska_405 = 'aut'"));
         $b6    = mysqli_fetch_array($a6);

         $a7    = mysqli_query($koneksi,("SELECT COUNT(ska_406) AS ska406 FROM tb_ska WHERE ska_406 = 'amu'"));
         $b7    = mysqli_fetch_array($a7);

         $a8    = mysqli_query($koneksi,("SELECT COUNT(ska_406) AS ska406 FROM tb_ska WHERE ska_406 = 'ama'"));
         $b8    = mysqli_fetch_array($a8);

         $a9    = mysqli_query($koneksi,("SELECT COUNT(ska_406) AS ska406 FROM tb_ska WHERE ska_406 = 'aut'"));
         $b9    = mysqli_fetch_array($a9);

		 $excel->getActiveSheet()->setCellValue('H'.$numrow, $data_pg['pg_ska'])
								 ->setCellValue('I'.$numrow, $b1['ska401'])
								 ->setCellValue('J'.$numrow, $b2['ska401'])
								 ->setCellValue('K'.$numrow, $b3['ska401'])
								 ->setCellValue('L'.$numrow, $b4['ska405'])
								 ->setCellValue('M'.$numrow, $b5['ska405'])
								 ->setCellValue('N'.$numrow, $b6['ska405'])
								 ->setCellValue('O'.$numrow, $b7['ska406'])
							 	 ->setCellValue('P'.$numrow, $b8['ska406'])
								 ->setCellValue('Q'.$numrow, $b9['ska406']);

		 $excel->getActiveSheet()->getStyle('H'.$numrow.':Q'.$numrow)->applyFromArray($style_row);
		 $excel->getActiveSheet()->getStyle('H'.$numrow.':Q'.$numrow)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

	 }

	 // Set orientasi kertas jadi LANDSCAPE
	 $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
	 // Set judul file excel nya
	 $excel->getActiveSheet(0)->setTitle("SKA");
	 $excel->setActiveSheetIndex(0);
	 // Proses file excel
	 header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	 header('Content-Disposition: attachment; filename="Data SKA.xlsx"'); // Set nama file excel nya
	 header('Cache-Control: max-age=0');
	 $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
	 $write->save('php://output');

?>
