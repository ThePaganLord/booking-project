<?php
$user_selected_date=$_GET['selected_date'];

$captured_reason=NULL;
$today=date('Y-m-d');

if(isset($user_selected_date)){
	$dateTimeToday = strtotime($today);
	$dateTimeuser_selected = strtotime($user_selected_date);
	if($dateTimeuser_selected <= $dateTimeToday){
		$pastTense="Cannot book a past date";
	}
	else{
		$pastTense=NULL;
		
		$check_date="SELECT * FROM bookings WHERE booking_date='$user_selected_date'";
		$result_check_date=mysql_query($check_date);
		$num_check_date=mysql_num_rows($result_check_date);
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Make A Booking</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="sheets.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script language="JavaScript">
		var selected_date = "<?php $myselected_date ?>";		
		function DateSearch(selectDate){
			document.getElementById
			window.location.href="make_booking.php?selected_date="+encodeURIComponent(selectDate);
		}
    </script>
</head>
<body>
    <br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-6">
				<form action="write_booking.php" method="post">
                <table align="center" class="borderless">
					<tr>
						<td colspan=2 align="center"><b>Make your booking</b></td>
					</tr>
                    <?php
					if(isset($pastTense)){?>
						<tr>
                            <td><? echo $pastTense ?></td>
                        </tr>
					<?php 
						
					}
                    if($num_check_date > 0){ ?>
                        <tr>
                            <td>This date has been booked.</td>
                        </tr>
                    <?php
                    }?>
                    <tr>
                        <td>Please select a date: </td>
                        <td><input type="date" name="selected_date" value="<? echo $user_selected_date ?>" onChange="DateSearch(this.value)"></td>
                    </tr>
					
					<?
					if($num_check_date == 0 && isset ($user_selected_date) && empty($pastTense)){
						?>
						<tr>
							<td>Please enter a reason for booking</td>
							<td><input type="text" name="booking_reason" required autofocus></td>
						</tr>
						
						<tr>
							<input type="hidden" name="user_selected_date" value="<? echo $user_selected_date ?>">
							<td colspan=2 align="center"><input type="submit" value="submit" class="button"></td>
						</tr>
					<?
					}
					?>
                </table>
            </div>
        </div>
    </div>