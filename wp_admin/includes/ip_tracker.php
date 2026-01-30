<?php
//define our "maximum idle period" to be 30 minutes
if (!isset($_SESSION)) {

    // server should keep session data for AT LEAST 24 hour
    ini_set('session.gc_maxlifetime', 60 * 60 * 24);
    
    // each client should remember their session id for EXACTLY 24 hour
    session_set_cookie_params(60 * 60 * 24);

    }

$ip_address = $_SERVER["REMOTE_ADDR"];
$page_name = $_SERVER["SCRIPT_NAME"];
$query_string = $_SERVER["QUERY_STRING"];
$current_page = $page_name."?".$query_string;
//connect to the database using your database settings
//include("db_connect.php");

if(isset($_SESSION["tracking"])){
    //update the visitor log in the database, based on the current visitor
    //id held in $_SESSION["visitor_id"]
    $visitor_id = isset($_SESSION["visitor_id"])?$_SESSION["visitor_id"]:0;
    if($_SESSION["current_page"] != $current_page)
    {
        $sql = "INSERT INTO visitor_tracking 
            (ip_address, page_name, query_string, visitor_id)
            VALUES ('$ip_address', '$page_name', '$query_string', '$visitor_id')";
        if(!$conn->query($sql)){
            echo "Failed to update visitor log";   
        }
        $_SESSION["current_page"] = $current_page;        
    }
} else {
    //set a session variable so we know that this visitor is being tracked
        
    //insert a new row into the database for this person
    $sql = "INSERT INTO visitor_tracking 
        (ip_address, page_name, query_string)
        VALUES ('$ip_address', '$page_name', '$query_string')";
    if(!$conn->query($sql)){
        echo "Failed to add new visitor into tracking log";
		$_SESSION["tracking"] = false;   
    } else {
        //find the next available visitor_id for the database
        //to assign to this person
        $_SESSION["tracking"] = true;
        $entry_id = mysqli_insert_id();
        $lowest_sql = $conn->query("SELECT MAX(visitor_id) as next FROM visitor_tracking");
        $lowest_row = mysqli_fetch_array($lowest_sql);
        $lowest = $lowest_row["next"];
        if(!isset($lowest))
            $lowest = 1;
        else
            $lowest++;
        //update the visitor entry with the new visitor id
        //Note, that we do it in this way to prevent a "race condition"
        $sql="UPDATE visitor_tracking SET visitor_id = '$lowest' WHERE entry_id = '$entry_id'";
        $query =$conn->query($sql);
        //place the current visitor_id into the session so we can use it on
        //subsequent visits to track this person
        $_SESSION["visitor_id"] = $lowest;
        //save the current page to session so we don't track if someone just refreshes the page
        $_SESSION["current_page"] = $current_page;
    }
}