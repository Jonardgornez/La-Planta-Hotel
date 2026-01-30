<?php
session_start();
include "wp_admin/includes/conn.php";
if (!isset($_SERVER['HTTP_REFERER'])){
    header("location:404.php?404");
}else{

            $BOOK_DATE =$_POST["BOOK_DATE"];
            $BOOK_TIME =$_POST["BOOK_TIME"];
            $FIRSTNAME = $conn -> real_escape_string(strtoupper($_POST['FIRSTNAME']));
            $MIDDLENAME = $conn -> real_escape_string(strtoupper($_POST["MIDDLENAME"]));
            $LASTNAME =$conn -> real_escape_string(strtoupper($_POST["LASTNAME"]));
            $GENDER = $conn -> real_escape_string(strtoupper($_POST["GENDER"]));
            $DATE_OF_BIRTH =$_POST["DATE_OF_BIRTH"];
            $AGE = $_POST["AGE"];
            $MOBILE = $conn -> real_escape_string(strtoupper($_POST["MOBILE"]));
            $ADDRESS = $conn -> real_escape_string(strtoupper($_POST["ADDRESS"]));
            $VALID_ID_NUMBER =  $conn -> real_escape_string(strtoupper($_POST["VALID_ID_NUMBER"]));
            $AUTO_NUMBER    =$_POST['AUTO_NUMBER'];
            $TERMS_OF_SERVICE=$_POST['TERMS_OF_SERVICE'];
			$COT_ID =$_POST['COT_ID'];
            $DOWN_PAYMENT =$_POST['DOWN_PAYMENT'];
            $BALANCE =$_POST['BALANCE'];
            $PAYMENT_REF_NO =$_POST['PAYMENT_REF_NO'];
            $PAYMENT_STATUS =$_POST['PAYMENT_STATUS'];
            $COT_PRICE =$_POST['COT_PRICE'];
            

            $UPLOAD_IDS = basename($_FILES["UPLOAD_ID"]["name"]); 
            $UPLOAD_SIZE = $_FILES["UPLOAD_ID"]["size"]; 
            $UPLOAD_ID_TYPE = pathinfo($UPLOAD_IDS, PATHINFO_EXTENSION); 

            $UPLOAD_WITH_SELFIES = basename($_FILES["UPLOAD_WITH_SELFIE"]["name"]); 
            $UPLOAD_WITH_SELFIE_SIZE =$_FILES["UPLOAD_WITH_SELFIE"]["size"]; 
            $UPLOAD_WITH_SELFIE_TYPE = pathinfo($UPLOAD_WITH_SELFIES, PATHINFO_EXTENSION); 
			
			$PROOF_PAYMENT = basename($_FILES["PROOF_PAYMENT"]["name"]); 
            $PROOF_PAYMENT_SIZE =$_FILES["PROOF_PAYMENT"]["size"]; 
            $PROOF_PAYMENT_TYPE = pathinfo($PROOF_PAYMENT, PATHINFO_EXTENSION); 
            
            $uploadfile_now =array($UPLOAD_ID_TYPE, $UPLOAD_WITH_SELFIE_TYPE,$PROOF_PAYMENT_TYPE);

            if($UPLOAD_SIZE <=2097152 || $UPLOAD_WITH_SELFIE_SIZE <=2097152 || $PROOF_PAYMENT_SIZE <=2097152){

            $allowTypes = array('jpg','JPG','png','PNG','jpeg','JPEG','gif','GIF'); 
            if(in_array($UPLOAD_ID_TYPE, $allowTypes) || in_array($UPLOAD_WITH_SELFIE_TYPE, $allowTypes) || in_array($PROOF_PAYMENT_TYPE, $allowTypes)){ 
                $IMAGE_ID = $_FILES['UPLOAD_ID']['tmp_name']; 
                $UPLOAD_ID =file_get_contents($IMAGE_ID);
                $WITH_SELFIE = $_FILES['UPLOAD_WITH_SELFIE']['tmp_name']; 
                $UPLOAD_WITH_SELFIE = file_get_contents($WITH_SELFIE);
				$PROOF_PAY = $_FILES['PROOF_PAYMENT']['tmp_name']; 
                $UPLOAD_PAYMENT = file_get_contents($PROOF_PAY);
				
                $stmt=$conn->prepare("INSERT INTO `tbl_appointment`(`BOOK_DATE`, `BOOK_TIME`, `FIRSTNAME`, `MIDDLENAME`, `LASTNAME`, `GENDER`, `DATE_OF_BIRTH`, `AGE`, `MOBILE`, `ADDRESS`, `VALID_ID_NUMBER`, `UPLOAD_ID`, `UPLOAD_WITH_SELFIE`, `TERMS_OF_SERVICE`,`AUTO_NUMBER`, COT_ID,DOWN_PAYMENT,BALANCE,PAYMENT_REF_NO,PROOF_PAYMENT,PAYMENT_STATUS,COT_PRICE)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                $stmt->bind_param('ssssssssssssssssssssss',$BOOK_DATE,$BOOK_TIME,$FIRSTNAME,$MIDDLENAME,$LASTNAME,$GENDER,$DATE_OF_BIRTH,$AGE,$MOBILE,$ADDRESS,$VALID_ID_NUMBER,$UPLOAD_ID,$UPLOAD_WITH_SELFIE,$TERMS_OF_SERVICE,$AUTO_NUMBER,$COT_ID,$DOWN_PAYMENT,$BALANCE,$PAYMENT_REF_NO,$UPLOAD_PAYMENT,$PAYMENT_STATUS,$COT_PRICE);
                if($stmt->execute()){
					 echo '<script>
					  Swal.fire({
					  icon: "success",
					  title: "SUCCESS",
					  text: "Your application has been successfully submited and  waiting for the confirmation.",
					  showConfirmButton: false,
					  timer: 3000
					}).then((result) => {
                  if(result){
                    window.open("book_process_pdf.php?AUTO_NUMBER='.$AUTO_NUMBER.'&FIRSTNAME='.$FIRSTNAME.'&MIDDLENAME='.$MIDDLENAME.'&LASTNAME='.$LASTNAME.'_blank");
                  }
                });
					  </script>';
                    $autonum= "INSERT INTO `tbl_autonumber`(AUTO_NUMBER)VALUES ('$AUTO_NUMBER')";
                    $conn->query($autonum);
                    $NOTFICATION_SMS="Your appointment has been submitted and waiting for approval";
                    require_once "wp_admin/sms_script.php";
                }else{
					echo '<script>
					  Swal.fire({
					  icon: "error",
					  title: "Oops!!",
					  text: "Opps! we have error while saving your information",
					  showConfirmButton: false,
					  timer: 3000
					});
					  </script>';
                }


            }else{ 
				echo '<script>
					  Swal.fire({
					  icon: "error",
					  title: "Oops!!",
					  text: "Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.",
					  showConfirmButton: false,
					  timer: 3000
					});
					  </script>';
            } 
        }else{
			echo '<script>
					  Swal.fire({
					  icon: "error",
					  title: "Oops!!",
					  text: "Attachment image is to large to save!. Please choose smaller size.",
					  showConfirmButton: false,
					  timer: 3000
					});
					  </script>';
        }
}
?>
