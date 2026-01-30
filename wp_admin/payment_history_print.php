<?php
	include "includes/header.php";
	
	$stmt=$conn->prepare("SELECT * FROM tbl_appointment WHERE APP_ID=?");
	$stmt->bind_param('s',$_GET['appid']);
	$stmt->execute();
	$result=$stmt->get_result();
	if($result->num_rows >0 ){
	while($appp = $result->fetch_assoc()){

?>
<style>
  table,th,td,tr{
    border-collapse:collapse;
    padding:3px;
    font-size:9pt;
 width: ;
  }
  @media print {
#printPageButton {
display: none;

}
}
body{
  border:1px solid rgba(38, 222, 129,1.0);
  padding:5px;
  font-family: Arial, Helvetica, sans-serif;
  font-size: 9pt; /* 40px/16=2.5em */
  
}
.col-md-4{
  float:left;
}
table #mytable{
 width: 100%;
}
#background{
  background:rgba(87, 96, 111,1.0);
}
  </style>
    <body onload="print()">
<table id="example1" width="100%" border="1" class="table table-bordered table-striped table-hover table-sm">
    <thead>
	<tr>
		<th colspan="5">Client Name: <?=$appp['FIRSTNAME'].' '.$appp['MIDDLENAME'].' '.$appp['LASTNAME']?>	| <a href="#" id="printPageButton" class="btn btn-info btn-sm" onclick="window.print();"><span class="fas fa fa-print"></span> PRINT</a> 
		</th>
	</tr>
    <tr>
    <th>#</th> 
    <th>PAYMENT</th>
    <th>BALANCE</th>
    <th>DATE</th>
    <th>REMARKS</th>
    </tr>
    </thead>
    <tbody>
				<?php
                  $stats=0;
				  $stmt=$conn->prepare("SELECT * FROM tbl_payment_history WHERE PAY_APP_ID=? ORDER BY PAY_DATE DESC");
                  $stmt->bind_param('s',$_GET['appid']);
                  if($stmt->execute()){
                    
				    $cnt=1;
                    $result=$stmt->get_result();
                    if($result->num_rows >0){
                    while($row = $result->fetch_assoc()){

                      $payment=$row['PAY_PAYMENT'];
                      $balance=$row['PAY_BALANCE'];
                      ?>
                        <tr>
                          <td><?=$cnt++; ?></td>
                          <td><?=number_format($payment,2); ?></td>
                          <td><?=number_format($balance,2); ?></td>
                          <td><?=$row['PAY_DATE']; ?></td>
                          <td><?=$row['PAY_REMARKS']; ?></td>
                        </tr>
                      <?php
                    }
                  }
                  }
                  ?>
                  </tbody>
</table>
                </body>
				
	<?php } } ?>