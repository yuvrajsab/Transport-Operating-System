<?php
  require "vendor/autoload.php";
  require 'db_conn.php';
  if(mysqli_connect_errno()){
    echo mysqli_connect_error();
  }
  use PhpOffice\PhpSpreadsheet\Spreadsheet;
  use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
  use PhpOffice\PhpSpreadsheet\Writer\Csv;
  use PhpOffice\PhpWord\PhpWord;

  if(isset($_POST['exportxls'])){
    $filename = "export_customer_".date('Y-m-d').".xlsx";
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $query = "SELECT * FROM customer";
    $result = mysqli_query($conn,$query);
    $row = 2;

    while($data = mysqli_fetch_object($result)){
      $spreadsheet->getActiveSheet()
      ->setCellValue('A'.$row , $data -> customer_id)
      ->setCellValue('B'.$row , $data -> customer_name)
      ->setCellValue('C'.$row , $data -> customer_address1)
      ->setCellValue('D'.$row , $data -> customer_address2)
      ->setCellValue('E'.$row , $data -> customer_address3)
      ->setCellValue('F'.$row , $data -> customer_landmark)
      ->setCellValue('G'.$row , $data -> customer_city)
      ->setCellValue('H'.$row , $data -> customer_state)
      ->setCellValue('I'.$row , $data -> customer_country)
      ->setCellValue('J'.$row , $data -> customer_pin)
      ->setCellValue('K'.$row , $data -> customer_phone)
      ->setCellValue('L'.$row , $data -> customer_mobile)
      ->setCellValue('M'.$row , $data -> customer_email)
      ->setCellValue('N'.$row , $data -> customer_website)
      ->setCellValue('O'.$row , $data -> customer_gstin)
      ->setCellValue('P'.$row , $data -> customer_pin);
      $row++;
    }

    for($col = 'A'; $col !== 'Q'; $col++) {
      $sheet->getColumnDimension($col)->setAutoSize(true);
    }

    $spreadsheet->getActiveSheet()
      ->setCellValue('A1','CUSTOMER ID')
      ->setCellValue('B1','CUSTOMER NAME')
      ->setCellValue('C1','CUSTOMER ADDRESS1')
      ->setCellValue('D1','CUSTOMER ADDRESS2')
      ->setCellValue('E1','CUSTOMER ADDRESS3')
      ->setCellValue('F1','CUSTOMER LANDMARK')
      ->setCellValue('G1','CUSTOMER CITY')
      ->setCellValue('H1','CUSTOMER STATE')
      ->setCellValue('I1','CUSTOMER COUNTRY')
      ->setCellValue('J1','CUSTOMER PIN')
      ->setCellValue('K1','CUSTOMER PHONE')
      ->setCellValue('L1','CUSTOMER MOBILE')
      ->setCellValue('M1','CUSTOMER EMAIL')
      ->setCellValue('N1','CUSTOMER WEBSITE')
      ->setCellValue('O1','CUSTOMER GSTIN')
      ->setCellValue('P1','CUSTOMER PAN');
    ;

    $sheet->getStyle('A1:P1')->applyFromArray(
      array(
        'font'=>array(
          'bold'=>true
        )
      )
    );

    $spreadsheet->getProperties()
      ->setCreator("SM EXPRESS")
      ->setTitle("Customer List ".date('Y-m-d'));

    header("Content-Disposition: attachment; filename='".$filename."'");
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Transfer-Encoding: binary');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');

    $writer = new Xlsx($spreadsheet);
    $writer->save("php://output");

    mysqli_free_result($result);
    mysqli_close($conn);
  }

  if(isset($_POST['exportcsv'])){
    $filename = "export_customer_".date('Y-m-d').".csv";
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $query = "SELECT * FROM customer";
    $result = mysqli_query($conn,$query);
    $row = 2;

    while($data = mysqli_fetch_object($result)){
      $spreadsheet->getActiveSheet()
      ->setCellValue('A'.$row , $data -> customer_id)
      ->setCellValue('B'.$row , $data -> customer_name)
      ->setCellValue('C'.$row , $data -> customer_address1)
      ->setCellValue('D'.$row , $data -> customer_address2)
      ->setCellValue('E'.$row , $data -> customer_address3)
      ->setCellValue('F'.$row , $data -> customer_landmark)
      ->setCellValue('G'.$row , $data -> customer_city)
      ->setCellValue('H'.$row , $data -> customer_state)
      ->setCellValue('I'.$row , $data -> customer_country)
      ->setCellValue('J'.$row , $data -> customer_pin)
      ->setCellValue('K'.$row , $data -> customer_phone)
      ->setCellValue('L'.$row , $data -> customer_mobile)
      ->setCellValue('M'.$row , $data -> customer_email)
      ->setCellValue('N'.$row , $data -> customer_website)
      ->setCellValue('O'.$row , $data -> customer_gstin)
      ->setCellValue('P'.$row , $data -> customer_pin);
      $row++;
    }

    for($col = 'A'; $col !== 'Q'; $col++) {
      $sheet->getColumnDimension($col)->setAutoSize(true);
    }

    $spreadsheet->getActiveSheet()
      ->setCellValue('A1','CUSTOMER ID')
      ->setCellValue('B1','CUSTOMER NAME')
      ->setCellValue('C1','CUSTOMER ADDRESS1')
      ->setCellValue('D1','CUSTOMER ADDRESS2')
      ->setCellValue('E1','CUSTOMER ADDRESS3')
      ->setCellValue('F1','CUSTOMER LANDMARK')
      ->setCellValue('G1','CUSTOMER CITY')
      ->setCellValue('H1','CUSTOMER STATE')
      ->setCellValue('I1','CUSTOMER COUNTRY')
      ->setCellValue('J1','CUSTOMER PIN')
      ->setCellValue('K1','CUSTOMER PHONE')
      ->setCellValue('L1','CUSTOMER MOBILE')
      ->setCellValue('M1','CUSTOMER EMAIL')
      ->setCellValue('N1','CUSTOMER WEBSITE')
      ->setCellValue('O1','CUSTOMER GSTIN')
      ->setCellValue('P1','CUSTOMER PAN');
    ;

    $sheet->getStyle('A1:P1')->applyFromArray(
      array(
        'font'=>array(
          'bold'=>true
        )
      )
    );

    $spreadsheet->getProperties()
      ->setCreator("SM EXPRESS")
      ->setTitle("Customer List ".date('Y-m-d'));

    header("Content-Disposition: attachment; filename='".$filename."'");
    header('Content-Type: text/csv');
    header('Content-Transfer-Encoding: binary');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');

    $writer = new Csv($spreadsheet);
    $writer->save('php://output');

    mysqli_free_result($result);
    mysqli_close($conn);
  }

  if(isset($_POST['exportdoc'])){
    $filename = "export_customer_".date('Y-m-d').".docx";

    $phpWord = new PhpWord();
    $section = $phpWord->addSection();

    $query = "SELECT * FROM customer";
    if($result = mysqli_query($conn,$query)){
      // $rows = mysqli_num_rows($result);
      $cols = mysqli_num_fields($result);

      $table = $section->addTable('customer');

      $tableStyle = array(
        'borderColor' => '000000',
        'borderSize'  => 6,
        'cellMargin'  => 50 );

      $firstRowStyle = array('bgColor' => 'eeeeee');
      $phpWord->addTableStyle('customer', $tableStyle, $firstRowStyle);

      $table->addRow();
      while($colsname = mysqli_fetch_field($result)){
        $table->addCell(1750)->addText(htmlspecialchars($colsname->name));
      }

      while($row = mysqli_fetch_row($result)){
        $table->addRow();
        for($i=0;$i<$cols;$i++){
          $table->addCell(1750)->addText(htmlspecialchars($row[$i]));
        }
      }

      header("Content-Disposition: attachment; filename='".$filename."'");
      header('Content-Type: application/vnd.ms-word');
      header('Content-Transfer-Encoding: binary');
      header('Cache-Control: must-revalidate');
      header('Pragma: public');

      $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
      $objWriter->save('php://output');

      mysqli_free_result($result);
    }
    mysqli_close($conn);
  }

  if(isset($_POST['exportpdf'])){
    $filename = "export_customer_".date('Y-m-d').".pdf";

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('SM EXPRESS');
    $pdf->SetTitle('CUSTOMER REPORT '.date('Y-m-d'));

    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
        require_once(dirname(__FILE__).'/lang/eng.php');
        $pdf->setLanguageArray($l);
    }

    $pdf->SetFont('helvetica', '', 9);
    $pdf->AddPage();

    $query = "SELECT * FROM customer";
    if($result = mysqli_query($conn,$query)){
      $cols = mysqli_num_fields($result);
      $thead = '';
      $tbody = '';

      while($colsname = mysqli_fetch_field($result)){
        $thead .= "<th>".$colsname->name."</th>";
      }

      while($row = mysqli_fetch_row($result)){
        $tbody .= "<tr>";
        for($i=0;$i<$cols;$i++){
          $tbody .= "<td>".$row[$i]."</td>";
        }
        $tbody .= "</tr>";
      }

      $tbl = '<table cellspacing="0" cellpadding="2" border="1">
      <thead>
        <tr>'.$thead.'</tr>
      </thead>
      <tbody>'.$tbody.'</tbody>
      </table>';

      header("Content-Disposition:attachment;filename='$filename'");
      header("Content-type:application/pdf");

      $pdf->writeHTML($tbl, true, false, false, false, '');
      $pdf->Output($filename, 'D');

      mysqli_free_result($result);
    }
    mysqli_close($conn);
  }
?>
