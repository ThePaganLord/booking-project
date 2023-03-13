<?php
include("connect.php");

function Check_Existing_Database(){
    $check_db_exists = "SHOW DATABASES LIKE 'booking_project'";
    $result_check_db_exists=mysql_result($check_db_exists);
	$num_check_db_exists=mysql_num_rows($result_check_db_exists);    

    return $num_check_db_exists;
}

$check_initialize_db = Check_Existing_Database();
if($check_initialize_db == 0){
    $database_error="No Database Exists";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Booking System</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="sheets.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
    <br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-6">
                <table align="center" class="borderless">
                    <tr>
                        <td><a href="make_booking.php" class="button">Make A Booking</a></td>
                        <td><a href="list_booking.php" class="button">List Bookings</a></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>