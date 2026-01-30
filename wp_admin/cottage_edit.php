<?php
	include 'includes/session.php';
    if(isset($_GET['return'])){
		$return = $_GET['return'];
		
	}
	else{
		$return = 'cottage.php?home=cottage';
	}

	if(isset($_POST['submit'])){
		$COT_ID=$_POST['COT_ID'];
		$COT_NAME = $conn -> real_escape_string(strtoupper($_POST['COT_NAME']));
		$COT_DESCRIPTION = $conn -> real_escape_string($_POST["COT_DESCRIPTION"]);
		$COT_PRICE =$_POST["COT_PRICE"];
		$COT_NUM_GUEST = $_POST["COT_NUM_GUEST"];
		$COT_INCLUSION = $conn -> real_escape_string(strtoupper($_POST['COT_INCLUSION']));
		$COT_STATUS = $_POST["COT_STATUS"];

			    $UPLOAD_IDS = basename($_FILES["COT_IMAGE"]["name"]); 
				$UPLOAD_SIZE = $_FILES["COT_IMAGE"]["size"]; 
				$UPLOAD_ID_TYPE = pathinfo($UPLOAD_IDS, PATHINFO_EXTENSION); 
				if(empty($_FILES["COT_IMAGE"]["name"])){
					$sql= "UPDATE tbl_cottage SET
						COT_NAME='$COT_NAME',
						COT_DESCRIPTION='$COT_DESCRIPTION',
						COT_PRICE='$COT_PRICE',
						COT_NUM_GUEST='$COT_NUM_GUEST',
						COT_INCLUSION='$COT_INCLUSION',
						COT_STATUS='$COT_STATUS'
						WHERE COT_ID='$COT_ID'";
						if($conn->query($sql)){
						  $_SESSION['success']='Successfully updated';
						}else{
						  $_SESSION['error']='Opps! we have error while saving your data';
						}
				}else{
					if($UPLOAD_SIZE <=2097152){
						$allowTypes = array('jpg','JPG','png','PNG','jpeg','JPEG','gif','GIF'); 
							if(in_array($UPLOAD_ID_TYPE, $allowTypes)){ 
								$IMAGE_ID = $_FILES['COT_IMAGE']['tmp_name']; 
								$UPLOAD_ID = addslashes(file_get_contents($IMAGE_ID)); 
								$sql= "UPDATE tbl_cottage SET
									COT_NAME='$COT_NAME',
									COT_DESCRIPTION='$COT_DESCRIPTION',
									COT_PRICE='$COT_PRICE',
									COT_NUM_GUEST='$COT_NUM_GUEST',
									COT_INCLUSION='$COT_INCLUSION',
									COT_STATUS='$COT_STATUS',
									COT_IMAGE='$UPLOAD_ID'
									WHERE COT_ID='$COT_ID'";
									if($conn->query($sql)){
									$_SESSION['success']='Successfully updated';
									}else{
									$_SESSION['error']='Opps! we have error while saving your data';
									}
							}else{ 
								$_SESSION['error']='Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
							} 
		
						}else{
							$_SESSION['error']='Sorry, Image is to large to save!';
						}
				}
				
	}else{
		$_SESSION['error'] = 'Select recird to edit first';
	}
	
	header('location:'.$return);
?>