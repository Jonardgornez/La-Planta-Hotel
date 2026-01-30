<?php
	include 'includes/session.php';
    if(isset($_GET['return'])){
		$return = $_GET['return'];
		
	}
	else{
		$return = 'schedule.php';
	}

	if(isset($_POST['submit'])){			
		$slots_date=$_POST['slots_date'];
		$slots=$_POST['slots'];
		$start_time=$_POST['start_time'];
		$end_time=$_POST['end_time'];
		$dura_tion=$_POST['duration'];

		$duration = $dura_tion;
		$cleanup = 0;
		$start = $start_time;
		$end   =$end_time;
		
		function timeslots($duration,$cleanup,$start,$end){
		
			$start=new DateTime($start);
			$end=new DateTime($end);
			$interval=new DateInterval("PT".$duration."M");
			$cleanupinterval=new DateInterval("PT".$cleanup."M");
			$slots=array();
		
			for($intStart=$start;$intStart<$end;$intStart->add($interval)->add($cleanupinterval)){
				$endPeriod=clone $intStart;
				$endPeriod->add($interval);
				if($endPeriod>$end){
					break;
				}
				$slots[]=$intStart->format("H:i")."-".$endPeriod->format("H:i");
			}
			return $slots;
		}

		$timeslots =timeslots($duration,$cleanup,$start,$end);
		foreach($timeslots as $key=> $ts){
			// $stmt=$conn->prepar("INSERT INTO tbl_slot_date(slots_date,slots,start_time,end_time,duration)VALUES
			// ('$slots_date','$slots','$ts','$end_time','$duration')");
			$stmt=$conn->prepare("INSERT INTO tbl_slot_date(slots_date,slots,start_time,end_time,duration)VALUES(?,?,?,?,?)");
			$stmt->bind_param('sssss',$slots_date,$slots,$ts,$end_time,$duration);
			if($stmt->execute()){
				$_SESSION['success'] = 'New schedule successfully set!.';
			}else{
				$_SESSION['error'] = $conn->error;
			}
		} 
	}	else{
		$_SESSION['error'] = 'Fill up add form first';
		
	}
	//header('location: clientAccount.php?q='.$_POST['id']);
	header('location:'.$return);
?>