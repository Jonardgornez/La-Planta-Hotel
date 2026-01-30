<?php

        $duration = 60;
		$cleanup = 0;
		$start = "08:00";
		$end   ="15:00";
		
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
?>
<?php 
$timeslots =timeslots($duration,$cleanup,$start,$end);
foreach($timeslots as $key=> $ts){
?>

    <button class="btn btn-success book" data-timeslot="<?=$ts;?>"><?= $ts;?></button>
<?php } ?>