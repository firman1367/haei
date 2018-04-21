<?php

    //koneksi
    include "../config/koneksi.php";
    // Load plugin PHPExcel nya
    require_once '../phpexcel/PHPExcel.php';

    // Panggil class PHPExcel nya
    $excel = new PHPExcel();
    // Settingan awal file excel
    $excel->getProperties()->setCreator('Author')
                 ->setLastModifiedBy('Author')
                 ->setTitle("DAFTAR ANGGOTA")
                 ->setSubject("DAFTAR ANGGOTA")
                 ->setDescription("DAFTAR ANGGOTA")
                 ->setKeywords("DAFTAR ANGGOTA");

     $objWorkSheet      = $excel->createSheet();
     $work_sheet_count  = 3;//number of sheets you want to create
     $work_sheet        = 0;

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

     while($work_sheet<=$work_sheet_count){
         if($work_sheet==0){
             $excel->getActiveSheet($work_sheet)->setTitle("DATA ANGGOTA");
             $excel->setActiveSheetIndex($work_sheet);
             $excel->setActiveSheetIndex($work_sheet)->setCellValue('A1', "DATA ANGGOTA"); // Set kolom A1
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
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('A3', "NO.");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('B3', "NO. ANGGOTA");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('C3', "NAMA");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('D3', "NAMA PERUSAHAAN");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('E3', "PERUSAHAAN");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('I3', "RUMAH");
             $excel->setActiveSheetIndex($work_sheet)->setCellValue('E5', "ALAMAT");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('F5', "TELP");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('G5', "FAX");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('H5', "EMAIL");
             $excel->setActiveSheetIndex($work_sheet)->setCellValue('I5', "ALAMAT");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('J5', "HANDPHONE");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('K5', "EMAIL");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('L3', "MASA BERLAKU");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('M3', "STATUS");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('M5', "Aktif");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('N5', "Tidak");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('O3', "KEANGGOTAAN");
        
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
         }
         if($work_sheet==1){
             $objWorkSheet->setTitle("DATA SKA");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('A1', "DATA SKA"); // Set kolom A1
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
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('A3', "No.");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('B3', "Nama");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('C3', "No. Anggota");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('D3', "Nama Perusahaan");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('E3', "Tahun dikeluarkan SKA");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('E5', "401");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('F5', "405");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('G5', "406");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('H3', "Pemegang SKA");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('I3', "SKA");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('I4', "401");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('L4', "405");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('O4', "406");
             $excel->setActiveSheetIndex($work_sheet)->setCellValue('I5', "AMu");
             $excel->setActiveSheetIndex($work_sheet)->setCellValue('J5', "AMa");
             $excel->setActiveSheetIndex($work_sheet)->setCellValue('K5', "AUt");
             $excel->setActiveSheetIndex($work_sheet)->setCellValue('L5', "AMu");
             $excel->setActiveSheetIndex($work_sheet)->setCellValue('M5', "AMa");
             $excel->setActiveSheetIndex($work_sheet)->setCellValue('N5', "AUt");
             $excel->setActiveSheetIndex($work_sheet)->setCellValue('O5', "AMu");
             $excel->setActiveSheetIndex($work_sheet)->setCellValue('P5', "AMa");
             $excel->setActiveSheetIndex($work_sheet)->setCellValue('Q5', "AUt");
             $excel->setActiveSheetIndex($work_sheet)->setCellValue('R5', "401");
             $excel->setActiveSheetIndex($work_sheet)->setCellValue('S5', "405");
             $excel->setActiveSheetIndex($work_sheet)->setCellValue('T5', "406");
             $excel->setActiveSheetIndex($work_sheet)->setCellValue('R3', "Berakhir");
        
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
         }
         if($work_sheet==2){
             $objWorkSheet = $excel->createSheet($work_sheet_count);
             $objWorkSheet->setTitle("DATA IPTB");
             $excel->setActiveSheetIndex($work_sheet)->setCellValue('A1', "DATA IPTB"); // Set kolom A1 dengan tulisan "DATA SISWA"
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
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('A3', "No.");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('B3', "Nama");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('C3', "No. Anggota");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('D3', "IPTB - LAK");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('D4', "Perencana");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('D5', "C");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('E5', "B");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('F5', "A");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('G4', "Masa Berlaku");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('H4', "Pengawas");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('H5', "C");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('I5', "B");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('J5', "A");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('K4', "Masa Berlaku");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('L4', "Pengkaji");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('L5', "C");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('M5', "B");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('N5', "A");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('O4', "Masa Berlaku");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('P3', "IPTB - LAL");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('P4', "Perencana");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('P5', "C");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('Q5', "B");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('R5', "A");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('S4', "Masa Berlaku");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('T4', "Pengawas");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('T5', "C");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('U5', "B");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('V5', "A");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('W4', "Masa Berlaku");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('X4', "Pengkaji");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('X5', "C");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('Y5', "B");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('Z5', "A");
        	 $excel->setActiveSheetIndex($work_sheet)->setCellValue('AA4', "Masa Berlaku");
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
         }
         $work_sheet++;
     }

     // Set orientasi kertas jadi LANDSCAPE
	 $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

	 // Proses file excel
	 header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	 header('Content-Disposition: attachment; filename="Daftar Anggota.xlsx"'); // Set nama file excel nya
	 header('Cache-Control: max-age=0');
	 $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
	 $write->save('php://output');

?>
