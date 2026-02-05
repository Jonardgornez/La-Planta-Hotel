<?php
date_default_timezone_set('Asia/Manila');
function build_calendar($month, $year, $offid) {
    include "wp_admin/includes/conn.php";
	
    $stmt = $conn->prepare("SELECT * FROM tbl_blocked_days");
    $bookings = array();
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $bookings[] = date('Y-'.$row['blocked_date']);
                ///$blocked_name = $row['blocked_name'];
            }
            
            $stmt->close();
        }
    }
     $curYear =date('Y');

     $daysOfWeek = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
     $firstDayOfMonth = mktime(0,0,0,$month,1,$year);
     $numberDays = date('t',$firstDayOfMonth);
     $dateComponents = getdate($firstDayOfMonth);
     $monthName = $dateComponents['month'];
     $dayOfWeek = $dateComponents['wday'];
    $datetoday = date('Y-m-d');
    
    $prev_month = date('m',mktime(0,0,0,$month-1,1,$year));
    $prev_year = date('Y',mktime(0,0,0,$month-1,1,$year));
    $next_month = date('m',mktime(0,0,0,$month+1,1,$year));
    $next_year = date('Y',mktime(0,0,0,$month+1,1,$year));
    
    $calendar = "<table class='table table-bordered table-clickable' border='1'>";
    $calendar .= "<center><h2 class='text-uppercase'>$monthName $year</h2>
    <button class='changemonth btn btn-primary' data-month='".date('m',mktime(0,0,0,$month-1,1,$year))."' data-year='".date('Y',mktime(0,0,0,$month-1,1,$year))."'><i class='fas fa-angle-left left'></i></button>
   <button class='changemonth btn btn-primary' id='current_month' data-month='".date('m')."' data-year='".date('Y')."'>TODAY</button>
   <button class='changemonth btn btn-primary' data-month='".date('m',mktime(0,0,0,$month+1,1,$year))."' data-year='".date('Y',mktime(0,0,0,$month+1,1,$year))."'><i class='fas fa-angle-right right'></i></button>
   <br><br>
   ";   
      $calendar .= "<tr>";

     // Create the calendar headers

     foreach($daysOfWeek as $day) {
          $calendar .= "<th class='header'>$day</th>";
     } 

     // Create the rest of the calendar

     // Initiate the day counter, starting with the 1st.

     $currentDay = 1;

     $calendar .= "</tr><tr>";

     // The variable $dayOfWeek is used to
     // ensure that the calendar
     // display consists of exactly 7 columns.

     if ($dayOfWeek > 0) { 
         for($k=0;$k<$dayOfWeek;$k++){
                $calendar .= "<td  class='empty'></td>"; 

         }
     }
    
     
     $month = str_pad($month, 2, "0", STR_PAD_LEFT);
  
     while ($currentDay <= $numberDays) {
        
          // Seventh column (Saturday) reached. Start a new row.

          if ($dayOfWeek == 7) {

               $dayOfWeek = 0;
               $calendar .= "</tr><tr>";

          }
          
          $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
          $date = "$year-$month-$currentDayRel";
          
            $dayname = strtolower(date('l', strtotime($date)));
            $eventNum = 0;
            $today = $date==date('Y-m-d')? "today" : "";

      
          
            if(in_array($date, $bookings)){
					
                $blockdays = $conn->prepare("SELECT * FROM tbl_blocked_days");
                    if($blockdays->execute()){
                        $result = $blockdays->get_result();
                        if($result->num_rows>0){
                            while($blockeddate = $result->fetch_assoc()){
    
                                $blocked_d= $blockeddate['blocked_date'];
                                $blocked_n= $blockeddate['blocked_name'];
                                $blocked_y= date('Y-'.$blocked_d);
                                    if($blocked_y ==$date){
                                        $calendar.="<td><h4>$currentDay</h4> 
                                        <button class='btn btn-app btn-block' style='background:red;color:#fff;font-size:9pt'>
                                            <i class='fas fa-calendar-day fa-solid'></i> $blocked_n
                                        </button>
                                        ";
                                    }
                           }
                        }
                   }
                   
            }elseif($curYear!=$year){
                $calendar.="<td><h4 class='text-muted'>$currentDay</h4> <button class='btn btn-default prevent-select' style='border:none;background:none;pointer-events: none;color:#fff'>N/A</button>";
            }elseif($date<date('Y-m-d')){
                $calendar.="<td><h4>$currentDay</h4> <button class='btn btn-default prevent-select' style='border:none;background:none;pointer-events: none;color:#fff'>N/A</button>";
            }else{
                
				if($offid==0){
					$calendar.="<td class='$today'><h4>$currentDay </h4>
					<button class='btn bg-warning btn-block' style='color:#fff;font-size:9pt'>no Room selected</button>
                    "; 
				}else{
				$totalbookings=checkSlots($conn, $date, $offid);
                $stmts = $conn->prepare("SELECT * FROM tbl_appointment WHERE BOOK_DATE = ? and COT_ID=?");
                $stmts->bind_param('ss', $date, $offid);
                if($stmts->execute()){
                    $result = $stmts->get_result();
                    if($result->num_rows>0){
                        
                         $calendar.="<td class='$today'><h4>$currentDay</h4>
                            <button class='btn btn-app btn-danger btn-block' style='font-size:9pt' disabled>
                            <i class='fas fa-lock fa-solid'></i> RESERVED
                         </button>
                            ";
                
                    }else{  
                        $calendar.="<td class='$today' data-sdate='$date' data-cotidss='$offid' onclick='bookDate(this);' style='cursor:pointer'><h4>$currentDay </h4> 
                        <button class='btn btn-app btn-primary btn-block' style='font-size:9pt'>
                            <i class='fas fa-unlock fa-solid'></i> AVAILABLE
                         </button>
                            "; 
                    }
                }
				}
				

            }
          $calendar .="</td>";
          // Increment counters
 
          $currentDay++;
          $dayOfWeek++;

     }
     
     

     // Complete the row of the last week in month, if necessary

     if ($dayOfWeek != 7) { 
     
          $remainingDays = 7 - $dayOfWeek;
            for($l=0;$l<$remainingDays;$l++){
                $calendar .= "<td class='empty'></td>"; 

         }

     }
     
     $calendar .= "</tr>";

     $calendar .= "</table>";

     echo $calendar;

}

function checkSlots($conn,$date,$offid){
	
    $stmt = $conn->prepare("SELECT * FROM tbl_appointment WHERE BOOK_DATE =? and COT_ID=?");
    $stmt->bind_param('ss', $date, $offid);
    $totalbookings = 0;
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $totalbookings=$row['BOOK_DATE'];
            }
            
            $stmt->close();
        }
    }

return $totalbookings;

}
$dateComponents = getdate();
if(isset($_POST['month']) && isset($_POST['year']) && isset($_POST['offid'])){
    $month = $_POST['month']; 			     
    $year = $_POST['year'];
    $offid =$_POST['offid'];
}else{
    $month = $dateComponents['mon']; 			     
    $year = $dateComponents['year'];
    $offid =0;
   
}
echo build_calendar($month, $year, $offid);
    
?>