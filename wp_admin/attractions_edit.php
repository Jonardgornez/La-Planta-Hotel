<?php
	include 'includes/session.php';
    if(isset($_GET['return'])){
		$return = $_GET['return'];
		
	}
	else{
		$return = 'attractions.php?home=attractions';
	}

	if(isset($_POST['submit'])){
		$ATTRACT_ID =$_POST['ATTRACT_ID'];
		$ATTRACT_DESC =$_POST['ATTRACT_DESC'];

		if(!empty($_FILES["ATTRACT_IMAGE"]["name"])) { 
			// Get file info 
			$fileName = basename($_FILES["ATTRACT_IMAGE"]["name"]); 
			$fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
			 
			// Allow certain file formats 
			$allowTypes = array('jpg','png','jpeg','gif'); 
			if(in_array($fileType, $allowTypes)){ 
				$image = $_FILES['ATTRACT_IMAGE']['tmp_name']; 
				$imgContent = addslashes(file_get_contents($image)); 
			 
				// Insert image content into database 
				$insert = $conn->query("UPDATE tbl_attractions SET ATTRACT_IMAGE='$imgContent',ATTRACT_DESC='$ATTRACT_DESC' WHERE ATTRACT_ID='$ATTRACT_ID'"); 
				 
				if($insert){ 
					$_SESSION['success'] = "Photo uploaded successfully."; 
				}else{ 
					$_SESSION['error'] = "Photo upload failed, please try again."; 
				}  
			}else{ 
				$_SESSION['error'] = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
			} 
		}else{ 
				$insert = $conn->query("UPDATE tbl_attractions SET ATTRACT_DESC='$ATTRACT_DESC' WHERE ATTRACT_ID='$ATTRACT_ID'"); 
				 
				if($insert){ 
					$_SESSION['success'] = "Photo uploaded successfully."; 
				}else{ 
					$_SESSION['error'] = "Photo upload failed, please try again."; 
				} 
		} 

	}
	else{
		$_SESSION['error'] = 'Select recird to edit first';
	}

	header('location:'.$return);
?>


