<?php
	include 'includes/session.php';
    if(isset($_GET['return'])){
		$return = $_GET['return'];
		
	}
	else{
		$return = 'attractions.php?home=attractions';
	}

	if(isset($_POST['submit'])){			
		$ATTRACT_DESC=$_POST['ATTRACT_DESC'];
		
        $ATTRACT_SIZE = $_FILES["ATTRACT_IMAGE"]["size"]; 
		$allowTypes = array('jpg','JPG','png','PNG','jpeg','JPEG','gif','GIF'); 
        
			foreach($_FILES['ATTRACT_IMAGE']['name'] as $key=>$val){ 
				if($ATTRACT_SIZE >=10000000){
			    $ATTRACT_IMAGE = basename($_FILES["ATTRACT_IMAGE"]["name"][$key]); 
				$ATTRACT_TYPE = pathinfo($ATTRACT_IMAGE, PATHINFO_EXTENSION); 
				if(in_array($ATTRACT_TYPE, $allowTypes)){ 
					$ATTRACT_TEMP = $_FILES['ATTRACT_IMAGE']['tmp_name'][$key]; 
					$ATTRACT_FINAL = addslashes(file_get_contents($ATTRACT_TEMP)); 

					$stmt="INSERT INTO tbl_attractions(ATTRACT_DESC,ATTRACT_SIZE,ATTRACT_TYPE,ATTRACT_IMAGE)VALUES('".$ATTRACT_DESC[$key]."','". $ATTRACT_SIZE[$key]."','$ATTRACT_TYPE','".$ATTRACT_FINAL."')";
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