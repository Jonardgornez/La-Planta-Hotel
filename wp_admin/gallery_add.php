<?php
	include 'includes/session.php';
    if(isset($_GET['return'])){
		$return = $_GET['return'];
		
	}
	else{
		$return = 'gallery.php?home=gallery';
	}

	if(isset($_POST['submit'])){			
		$GALLERY_DESC=$_POST['GALLERY_DESC'];
		
        $GALLERY_SIZE = $_FILES["GALLERY_IMAGE"]["size"]; 
		$allowTypes = array('jpg','JPG','png','PNG','jpeg','JPEG','gif','GIF'); 
        
			foreach($_FILES['GALLERY_IMAGE']['name'] as $key=>$val){ 
				if($GALLERY_SIZE >=10000000){
			    $GALLERY_IMAGE = basename($_FILES["GALLERY_IMAGE"]["name"][$key]); 
				$GALLERY_TYPE = pathinfo($GALLERY_IMAGE, PATHINFO_EXTENSION); 
				if(in_array($GALLERY_TYPE, $allowTypes)){ 
					$GALLERY_TEMP = $_FILES['GALLERY_IMAGE']['tmp_name'][$key]; 
					$GALLERY_FINAL = addslashes(file_get_contents($GALLERY_TEMP)); 

					$stmt="INSERT INTO tbl_gallery(GALLERY_DESC,GALLERY_SIZE,GALLERY_TYPE,GALLERY_IMAGE)VALUES('".$GALLERY_DESC[$key]."','". $GALLERY_SIZE[$key]."','$GALLERY_TYPE','".$GALLERY_FINAL."')";
					if($conn->query($stmt)){
						$_SESSION['success'] = "Gallery successfully saved!";
					}else{
						$_SESSION['error'] = $conn->error;
					}
				}else{ 
					$_SESSION['error'] ="Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.";
				
				} 
				}else{
					$_SESSION['error'] ="Image is to large to save!. Please choose smaller size.";
				}
			}

	}else{
		$_SESSION['error'] = 'Fill up add form first';
		
	}
	header('location:'.$return);
?>