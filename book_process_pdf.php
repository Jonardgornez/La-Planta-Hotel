<?php
	//ob_start();
	// session_start();
	// if(!isset($_SESSION['admin']) || trim($_SESSION['admin']) == ''){
	// 	header("location:404.php?404");
	// }
include "wp_admin/includes/conn.php";
	
$AUTO_NUMBER = $conn -> real_escape_string(strtoupper($_GET['AUTO_NUMBER']));
$FIRSTNAME = $conn -> real_escape_string(strtoupper($_GET['FIRSTNAME']));
$MIDDLENAME = $conn -> real_escape_string(strtoupper($_GET["MIDDLENAME"]));
$LASTNAME =$conn -> real_escape_string(strtoupper($_GET["LASTNAME"]));

 
    $stmt =$conn->prepare("SELECT * FROM tbl_appointment WHERE AUTO_NUMBER=?");
    $stmt->bind_param('s',$AUTO_NUMBER);
    if($stmt->execute()){
    $result=$stmt->get_result();
    if($result->num_rows > 0){
        
        $value = $result->fetch_assoc();
          $APP_ID    	        =$value['APP_ID'];
          $NAME               =$value['LASTNAME'].', '.$value['FIRSTNAME'].' '.$value['MIDDLENAME'];
          $BOOK_DATE   			  =$value['BOOK_DATE'];
          $APP_STATUS    		  =$value['APP_STATUS'];
          $DATE_ACTION    		=$value['DATE_ACTION'];
          $AUTO_NUMBER        =$value['AUTO_NUMBER'];
          $BOOK_TIME          =$value['BOOK_TIME'];
          $MOBILE             =$value['MOBILE'];
          $ADDRESS            =$value['ADDRESS'];
          $VALID_ID_NUMBER    =$value['VALID_ID_NUMBER'];
		  
          $DOWN_PAYMENT    	=$value['DOWN_PAYMENT'];
          $BALANCE    		=$value['BALANCE'];
          $PAYMENT_REF_NO    =$value['PAYMENT_REF_NO'];
          $PAYMENT_STATUS    =$value['PAYMENT_STATUS'];

		  
          if($value['APP_STATUS']==0){
            $STATUS='<label class="text-warning" style="color:orange">Pending</label>';
          }elseif($value['APP_STATUS']==1){
              $STATUS='<label class="text-success" style="color:green">Approved</label>';
          }elseif($value['APP_STATUS']==2){
            $STATUS='<label class="text-primary" style="color:blue">Completed</label>';
          }elseif($value['APP_STATUS']==3){
              $STATUS='<label class="text-danger" style="color:red">Rejected</label>';
          }

        $stmt=$conn->prepare("SELECT * FROM tbl_cottage WHERE COT_ID=?");
        $stmt->bind_param('s',$value['COT_ID']);
        $stmt->execute();
        $cottage_query = $stmt->get_result();
        $cot_rows=$cottage_query->fetch_assoc();
        $COT_NUMBER=$cot_rows['COT_NUMBER'];
        $COT_NAME=$cot_rows['COT_NAME'];
        $COT_DESCRIPTION=$cot_rows['COT_DESCRIPTION'];
        $COT_PRICE=$cot_rows['COT_PRICE'];
        $COT_NUM_GUEST=$cot_rows['COT_NUM_GUEST'];
        $COT_INCLUSION=$cot_rows['COT_INCLUSION'];
        $COT_IMAGE=$cot_rows['COT_IMAGE'];

        

        
    }
  }

  

  
require_once('tcpdf/tcpdf.php');  

  // Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {
  //Page header
  public function Header() {
      // get the current page break margin
      $bMargin = $this->getBreakMargin();
      // get current auto-page-break mode
      $auto_page_break = $this->AutoPageBreak;
      // disable auto-page-break
      $this->SetAutoPageBreak(false, 0);
      // set bacground image
      $img_file = file_get_contents('dist/img/Logo.png');
	  $pdf->Image('@' . $img_file, 25, 50, 160, '', '', '', '', false, 50, '', false);
	  
      // restore auto-page-break status
      $this->SetAutoPageBreak($auto_page_break, $bMargin);
      // set the starting point for the page content
      $this->setPageMark();
  }
  public function Footer() {
    // Position at 15 mm from bottom
    $this->SetY(-15);
    // Set font
    $this->SetFont('helvetica', 'I', 8);
    // Page number
    //$this->Cell(0, 10, 'Generated on '.date('l F d, Y').' Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
}
}

    //$pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
    $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->SetCreator(PDF_CREATOR);  
    $pdf->SetTitle('REFERENCE: '.$AUTO_NUMBER);  
    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    $pdf->SetDefaultMonospacedFont('helvetica');  
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
    $pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
    $pdf->setPrintHeader(FALSE);  
    $pdf->setPrintFooter(TRUE);  
    $pdf->SetAutoPageBreak(TRUE, 10);  
    $pdf->SetFont('helvetica', '', 11);  
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
	$pdf->AddPage(); 
	
	$pdf->SetAlpha(0.1);
	$img_file = file_get_contents('dist/img/sprrlogo.png');
	$pdf->Image('@' . $img_file, 25, 40, 150, '', '', '', '', false, 50, 'C', false);
	$pdf->SetAlpha(1);
	
	
  $style = array(
    'position' => '',
    'align' => 'C',
    'stretch' => false,
    'fitwidth' => true,
    'cellfitalign' => '',
    'border' => true,
    'hpadding' => 'auto',
    'vpadding' => 'auto',
    //'fgcolor' => array(128,0,0),
    'bgcolor' => false, //array(255,255,255),
    'text' => true,
    'font' => 'helvetica',
    'fontsize' => 8,
    'stretchtext' => 4
);
$pdf->write1DBarcode($AUTO_NUMBER, 'C128', 15, 180, '', 15, 0.4, $style, 'N');
$pdf->SetY(-280);
$contents = '
<table >
<td align="center"><img src="dist/img/sprrlogo.png" alt="" class="float-left" width="100"></td>
</table>
<h1 align="center">RESERVATION RECEIPT</h1>
<div style="border-bottom:1px solid #000"></div>
<br>
<br>
<br>
<br>
<table cellspacing="5" width="100%" border="0">
<tbody>
<tr>
  <td>STATUS:</td>
  <td>'.$STATUS.'</td>
</tr>
<tr>
  <td>REFERENCE NO:</td>
  <td>'.$AUTO_NUMBER.'</td>
</tr>
<tr>
  <td>CLEINT NAME:</td>
  <td>'.$NAME.'</td>
</tr>
<tr>
  <td>CONTACT:</td>
  <td>'.$MOBILE.'</td>
</tr>
<tr>
  <td>ADDRESS:</td>
  <td>'.$ADDRESS.'</td>
</tr>

<tr>
  <td>DATE RESERVED:</td>
  <td>'.date('l F d, Y',strtotime($BOOK_DATE)).' '.$BOOK_TIME.'</td>
</tr>
<tr>
  <td>VALID ID:</td>
  <td>'.$VALID_ID_NUMBER.'</td>
</tr>

</tbody>
</table>
<div style="border-bottom:1px solid #000"></div>
<table cellspacing="5" width="100%">
<tbody>
<tr>
  <td>NO:</td>
  <td>'.$COT_NUMBER.'</td>
</tr>
<tr>
  <td>COTTAGE:</td>
  <td>'.$COT_NAME.'</td>
</tr>
<tr>
  <td>PRICE:</td>
  <td>'.$COT_PRICE.'</td>
</tr>
<tr>
  <td>INCLUSION:</td>
  <td>'.$COT_INCLUSION.'</td>
</tr>
<tr>
  <td>DOWN PAYMENT:</td>
  <td>'.$DOWN_PAYMENT.'</td>
</tr>
<tr>
  <td>BALANCE:</td>
  <td>'.$BALANCE.'</td>
</tr>
<tr>
  <td>PAYMENT REFERENCE NO:</td>
  <td>'.$PAYMENT_REF_NO.'</td>
</tr>
<tr>
  <td>PAYMENT STATUS:</td>
  <td>'.$PAYMENT_STATUS.'</td>
</tr>
</tbody>
</table>
<br><br>
<div align="center">
<br><br>
<br><br>
<br><br>

</div>


    ';
    $pdf->writeHTML($contents);  
    //$pdf->writeHTML($contents,true, false, true, false, '');
    ob_end_clean();
    $pdf->Output('Reservation Receipt.pdf', 'I');

?>