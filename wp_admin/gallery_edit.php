<?php
	include 'includes/session.php';
    if(isset($_GET['return'])){
		$return = $_GET['return'];
		
	}
	else{
		$return = 'gallery.php?home=gallery';
	}

	if(isset($_POST['submit'])){
		$GALLERY_ID =$_POST['GALLERY_ID'];
		$GALLERY_DESC =$_POST['GALLERY_DESC'];

		if(!empty($_FILES["GALLERY_IMAGE"]["name"])) { 
			// Get file info 
			$fileName = basename($_FILES["GALLERY_IMAGE"]["name"]); 
			$fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
			 
			// Allow certain file formats 
			$allowTypes = array('jpg','png','jpeg','gif'); 
			if(in_array($fileType, $allowTypes)){ 
				$image = $_FILES['GALLERY_IMAGE']['tmp_name']; 
				$imgContent = addslashes(file_get_contents($image)); 
			 
				// Insert image content into database 
				$insert = $conn->query("UPDATE tbl_gallery SET GALLERY_IMAGE='$imgContent',GALLERY_DESC='$GALLERY_DESC' WHERE GALLERY_ID='$GALLERY_ID'"); 
				 
				if($insert){ 
					$_SESSION['success'] = "Photo uploaded successfully."; 
				}else{ 
					$_SESSION['error'] = "Photo upload failed, please try again."; 
				}  
			}else{ 
				$_SESSION['error'] = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
			} 
		}else{ 
				$insert = $conn->query("UPDATE tbl_gallery SET GALLERY_DESC='$GALLERY_DESC' WHERE GALLERY_ID='$GALLERY_ID'"); 
				 
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


