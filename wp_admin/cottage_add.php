<?php
	include 'includes/session.php';
    if(isset($_GET['return'])){
		$return = $_GET['return'];
		
	}else{
		$return = 'cottage.php?name=cottage';
	}

	if(isset($_POST['submit'])){			
		$COT_NUMBER =$_POST['COT_NUMBER'];
		$COT_NAME = $conn -> real_escape_string(strtoupper($_POST["COT_NAME"]));
		$COT_DESCRIPTION =$conn -> real_escape_string($_POST["COT_DESCRIPTION"]);
		$COT_PRICE = $_POST["COT_PRICE"];
		$COT_NUM_GUEST =$_POST["COT_NUM_GUEST"];
		$COT_INCLUSION = $conn -> real_escape_string(strtoupper($_POST["COT_INCLUSION"]));
		$COT_STATUS = $_POST["COT_STATUS"];
		$sql="SELECT * FROM tbl_cottage WHERE COT_NUMBER='$COT_NUMBER'";
		$query=$conn->query($sql);
		if($query->num_rows>0){
			$_SESSION['error']='Cottage number already in the database!';
		}else{
			
				$UPLOAD_IDS = basename($_FILES["COT_IMAGE"]["name"]); 
				$UPLOAD_SIZE = $_FILES["COT_IMAGE"]["size"]; 
				$UPLOAD_ID_TYPE = pathinfo($UPLOAD_IDS, PATHINFO_EXTENSION); 
	
				if($UPLOAD_SIZE <=2097152){
		
				$allowTypes = array('jpg','JPG','png','PNG','jpeg','JPEG','gif','GIF'); 
				if(in_array($UPLOAD_ID_TYPE, $allowTypes)){ 
					$IMAGE_ID = $_FILES['COT_IMAGE']['tmp_name']; 
					$UPLOAD_ID = addslashes(file_get_contents($IMAGE_ID)); 
		
					
					$sql="INSERT INTO `tbl_cottage`(`COT_NUMBER`, `COT_NAME`, `COT_DESCRIPTION`, `COT_PRICE`, `COT_NUM_GUEST`, `COT_INCLUSION`, `COT_STATUS`, `COT_IMAGE`) 
					VALUES ('$COT_NUMBER','$COT_NAME','$COT_DESCRIPTION','$COT_PRICE','$COT_NUM_GUEST','$COT_INCLUSION ','$COT_STATUS','$UPLOAD_ID')";
					if($conn->query($sql)){
						$_SESSION['success']='New record has been successfully added!';
						$autonum= "INSERT INTO `tbl_autonumber`(AUTO_NUMBER)VALUES ('$COT_NUMBER')";
						$conn->query($autonum);
					}else{
						$_SESSION['error']='Opps! we have error while saving your data';
					}
					
				}else{ 
					$_SESSION['error']='Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
				} 
			}else{
				$_SESSION['error']='Attachment image is to large to save!. Please choose smaller size.';
			}
		}
	

	}else{
		$_SESSION['error'] = 'Fill up add form first';
		
	}
	header('location:'.$return);
?>