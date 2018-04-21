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
                 ->setTitle("Data Anggota")
                 ->setSubject("Anggota")
                 ->setDescription("Laporan Data Anggota")
                 ->setKeywords("Data Anggota");

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

     $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA ANGGOTA"); // Set kolom A1
	 $excel->getActiveSheet()->mergeCells('A1:K1'); // Set Merge Cell pada kolom
	 $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
	 $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(12); // Set font size 15 untuk kolom A1
     $excel->getActiveSheet()->mergeCells('A3:A5'); // Set Merge Cell pada kolom NO
	 $excel->getActiveSheet()->mergeCells('B3:B5'); // Set Merge Cell pada kolom Nama
	 $excel->getActiveSheet()->mergeCells('C3:C5'); // Set Merge Cell pada kolom No. Anggota
	 $excel->getActiveSheet()->mergeCells('D3:D5'); // Set Merge Cell pada kolom Nama Perusahaan
     $excel->getActiveSheet()->mergeCells('E3:H4'); // Set Merge Cell pada kolom Perusahaan
     $excel->getActiveSheet()->mergeCells('I3:K4'); // Set Merge Cell pada kolom Perusahaan
     $excel->getActiveSheet()->mergeCells('L3:L5'); // Set Merge Cell pada kolom Masa Berlaku
     $excel->getActiveSheet()->mergeCells('M3:N4'); // Set Merge Cell pada kolom Status
     $excel->getActiveSheet()->mergeCells('O3:O5'); // Set Merge Cell pada kolom Keanggotaan
     $excel->getActiveSheet()->getStyle('A3:O3')->getFont()->setBold(TRUE);
	 $excel->getActiveSheet()->getStyle('A3:O3')->getFont()->setSize(9);
	 $excel->getActiveSheet()->getStyle('A5:N5')->getFont()->setBold(TRUE);
	 $excel->getActiveSheet()->getStyle('A5:N5')->getFont()->setSize(9);
	 $excel->getActiveSheet()->getStyle('M5:N5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom

     // Buat header tabel nya pada baris ke 3
	 $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO.");
	 $excel->setActiveSheetIndex(0)->setCellValue('B3', "NO. ANGGOTA");
	 $excel->setActiveSheetIndex(0)->setCellValue('C3', "NAMA");
	 $excel->setActiveSheetIndex(0)->setCellValue('D3', "NAMA PERUSAHAAN");
	 $excel->setActiveSheetIndex(0)->setCellValue('E3', "PERUSAHAAN");
	 $excel->setActiveSheetIndex(0)->setCellValue('I3', "RUMAH");
     $excel->setActiveSheetIndex(0)->setCellValue('E5', "ALAMAT");
	 $excel->setActiveSheetIndex(0)->setCellValue('F5', "TELP");
	 $excel->setActiveSheetIndex(0)->setCellValue('G5', "FAX");
	 $excel->setActiveSheetIndex(0)->setCellValue('H5', "EMAIL");
     $excel->setActiveSheetIndex(0)->setCellValue('I5', "ALAMAT");
	 $excel->setActiveSheetIndex(0)->setCellValue('J5', "HANDPHONE");
	 $excel->setActiveSheetIndex(0)->setCellValue('K5', "EMAIL");
	 $excel->setActiveSheetIndex(0)->setCellValue('L3', "MASA BERLAKU");
	 $excel->setActiveSheetIndex(0)->setCellValue('M3', "STATUS");
	 $excel->setActiveSheetIndex(0)->setCellValue('M5', "Aktif");
	 $excel->setActiveSheetIndex(0)->setCellValue('N5', "Tidak");
	 $excel->setActiveSheetIndex(0)->setCellValue('O3', "KEANGGOTAAN");

     // Apply style header yang telah kita buat tadi ke masing-masing kolom header
	 $excel->getActiveSheet()->getStyle('A3:A5')->applyFromArray($style_col);
	 $excel->getActiveSheet()->getStyle('B3:B5')->applyFromArray($style_col);
	 $excel->getActiveSheet()->getStyle('C3:C5')->applyFromArray($style_col);
	 $excel->getActiveSheet()->getStyle('D3:D5')->applyFromArray($style_col);
     $excel->getActiveSheet()->getStyle('E3:H4')->applyFromArray($style_col);
     $excel->getActiveSheet()->getStyle('I3:K4')->applyFromArray($style_col);
     $excel->getActiveSheet()->getStyle('L3:L5')->applyFromArray($style_col);
     $excel->getActiveSheet()->getStyle('M3:N4')->applyFromArray($style_col);
     $excel->getActiveSheet()->getStyle('O3:O5')->applyFromArray($style_col);
     $excel->getActiveSheet()->getStyle('E5')->applyFromArray($style_col);
     $excel->getActiveSheet()->getStyle('F5')->applyFromArray($style_col);
     $excel->getActiveSheet()->getStyle('G5')->applyFromArray($style_col);
     $excel->getActiveSheet()->getStyle('H5')->applyFromArray($style_col);
     $excel->getActiveSheet()->getStyle('I5')->applyFromArray($style_col);
     $excel->getActiveSheet()->getStyle('J5')->applyFromArray($style_col);
     $excel->getActiveSheet()->getStyle('K5')->applyFromArray($style_col);
     $excel->getActiveSheet()->getStyle('L5')->applyFromArray($style_col);
     $excel->getActiveSheet()->getStyle('N5')->applyFromArray($style_col);

     // Set height baris ke 1, 2 dan 3
	 $excel->getActiveSheet()->getRowDimension('1')->setRowHeight(16);
	 $excel->getActiveSheet()->getRowDimension('2')->setRowHeight(16);
	 $excel->getActiveSheet()->getRowDimension('3')->setRowHeight(16);
	 $excel->getActiveSheet()->getRowDimension('4')->setRowHeight(16);
	 $excel->getActiveSheet()->getRowDimension('5')->setRowHeight(16);

	 // Set width kolom
	 $excel->getActiveSheet()->getColumnDimension('A')->setWidth(4); // Set width kolom
	 $excel->getActiveSheet()->getColumnDimension('L')->setWidth(15); // Set width kolom
	 $excel->getActiveSheet()->getColumnDimension('O')->setWidth(15); // Set width kolom

	 // Freeze Pane
	 $excel->getActiveSheet()->freezePane('D6');

     // Buat query untuk menampilkan semua data siswa
	 $no  		= 1;
	 $numrow 	= 6;
	 $sql 		= mysqli_query($koneksi,("SELECT * FROM tb_anggota"));
	 while($data = mysqli_fetch_array($sql)){

         $excel->getActiveSheet()->setCellValue('A'.$numrow, $no)
		                         ->setCellValue('B'.$numrow, $data['no_anggota'])
		                         ->setCellValue('C'.$numrow, $data['nama']);

         if ($data['nama_perusahaan'] == ""){
             $excel->getActiveSheet()->setCellValue('D'.$numrow, '');
         }else{
             $excel->getActiveSheet()->setCellValue('D'.$numrow, $data['nama_perusahaan']);
         }

         if ($data['telpon_perusahaan'] == ""){
			 $excel->getActiveSheet()->setCellValue('F'.$numrow, '');
		 }else{
			 $excel->getActiveSheet()->setCellValue('F'.$numrow, $data['telpon_perusahaan']);
		 }

         if ($data['fax'] == ""){
			 $excel->getActiveSheet()->setCellValue('G'.$numrow, '');
		 }else{
			 $excel->getActiveSheet()->setCellValue('G'.$numrow, $data['fax']);
		 }

         if ($data['email_perusahaan'] == ""){
			 $excel->getActiveSheet()->setCellValue('H'.$numrow, '');
		 }else{
			 $excel->getActiveSheet()->setCellValue('H'.$numrow, $data['email_perusahaan']);
		 }

         if ($data['alamat_perusahaan'] == ""){
			 $excel->getActiveSheet()->setCellValue('E'.$numrow, '');
		 }else{
			 $excel->getActiveSheet()->setCellValue('E'.$numrow, $data['alamat_perusahaan']);
		 }

         if ($data['alamat_rumah'] == ""){
			 $excel->getActiveSheet()->setCellValue('I'.$numrow, '');
		 }else{
			 $excel->getActiveSheet()->setCellValue('I'.$numrow, $data['alamat_rumah']);
		 }

         if ($data['handphone'] == ""){
			 $excel->getActiveSheet()->setCellValue('J'.$numrow, '');
		 }else{
			 $excel->getActiveSheet()->setCellValue('J'.$numrow, $data['handphone']);
		 }

         if ($data['email'] == ""){
			 $excel->getActiveSheet()->setCellValue('K'.$numrow, '');
		 }else{
			 $excel->getActiveSheet()->setCellValue('K'.$numrow, $data['email']);
		 }
		 
		 $mb2 = $data['masa_berlaku'];
		 $timestamp = strtotime($mb2);
		 $cv2 = date('d/m/Y', $timestamp);
		 if ($data['masa_berlaku'] == "0000-00-00"){
			 $excel->getActiveSheet()->setCellValue('L'.$numrow, '');
		 }else{
			 $excel->getActiveSheet()->setCellValue('L'.$numrow, $cv2);
		 }
		 
		 if ($data['status'] == 1) {
             $excel->getActiveSheet()->setCellValue('M'.$numrow, $data['status']);
         }else{
             $excel->getActiveSheet()->setCellValue('M'.$numrow, '');
         }
         
         if ($data['status'] == 0) {
             $excel->getActiveSheet()->setCellValue('N'.$numrow, '');
         }else{
             $excel->getActiveSheet()->setCellValue('N'.$numrow, '');
         }
         
         if ($data['keanggotaan'] == 1) {
             $excel->getActiveSheet()->setCellValue('O'.$numrow, $data['keanggotaan']);
         }else{
             $excel->getActiveSheet()->setCellValue('O'.$numrow, '');
         }

         // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
         $excel->getActiveSheet()->getStyle('A'.$numrow.':O'.$numrow)->applyFromArray($style_row);

         // Height
		 $excel->getActiveSheet()->getRowDimension($numrow)->setRowHeight(18);

         // style
         $excel->getActiveSheet()->getStyle('A'.$numrow)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom
		 $excel->getActiveSheet()->getStyle('B'.$numrow)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom
		 $excel->getActiveSheet()->getStyle('L'.$numrow)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom
		 $excel->getActiveSheet()->getStyle('M'.$numrow)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom
		 $excel->getActiveSheet()->getStyle('N'.$numrow)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom
		 $excel->getActiveSheet()->getStyle('O'.$numrow)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom

         // Auto width
         foreach(range('B'.$numrow,'K'.$numrow) as $columnID) {
             $excel->getActiveSheet()->getColumnDimension($columnID)
             ->setAutoSize(true);
         }
        
         $no++; // Tambah 1 setiap kali looping
         $numrow++; // Tambah 1 setiap kali looping
     }

     // Set orientasi kertas jadi LANDSCAPE
	 $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
	 // Set judul file excel nya
	 $excel->getActiveSheet(0)->setTitle("Data Anggota");
	 $excel->setActiveSheetIndex(0);
	 // Proses file excel
	 header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	 header('Content-Disposition: attachment; filename="Data Anggota.xlsx"'); // Set nama file excel nya
	 header('Cache-Control: max-age=0');
	 $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
	 $write->save('php://output');

?>
