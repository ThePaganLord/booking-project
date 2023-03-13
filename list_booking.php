<?
include("connect.php");
$user_selected_bookings=$_REQUEST['selected_list'];
$today=date('Y-m-d');

if(isset($user_selected_bookings)){
   	$list_of_bookings=array();
	if($user_selected_bookings == 'Past'){
		$get_bookings="SELECT * FROM  bookings WHERE booking_date <= '$today'";
	}
	elseif($user_selected_bookings == 'Future'){
		$get_bookings="SELECT * FROM  bookings WHERE booking_date > '$today'";
	}
	$result_get_bookings=mysql_query($get_bookings);
	$num_get_bookings=mysql_num_rows($result_get_bookings);
	if($num_get_bookings > 0){
		$book=0;
		while($num_get_bookings > $book){
			$list_booking_date=mysql_result($result_get_bookings, $book, "booking_date");
			$list_booking_reason=mysql_result($result_get_bookings, $book, "booking_reason");
			if (array_key_exists($list_booking_date,$list_of_bookings)){
			}
			else{
				$list_of_bookings += array($list_booking_date => array($list_booking_reason));
			}
			$book++;
		}
		
	}
}
else{
	$num_get_bookings=0;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>List Bookings</title>
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
                <table align="center" class="outline_table">
                    <?php
					if(empty($user_selected_bookings)){?>
						<tr>
                            <td><a href="list_booking.php?selected_list=Past" class="button">Past Bookings</td>
							<td><a href="list_booking.php?selected_list=Future" class="button">Future Bookings</td>
                        </tr>
					<?php 
						
					}
					else{
						if($num_get_bookings > 0){ 
							?>
							<tr>
								<th>Booking Date</th>
								<th>Booking Reason</th>
							</tr>
							<?
							$list_booking_key=array_keys($list_of_bookings);
							for($ocb=0; $ocb < count($list_booking_key); $ocb++){
								$list_booking_date=$list_booking_key[$ocb];
								$list_booking_reason=$list_of_bookings[$list_booking_date][0];
								?>
								<tr>
									<td><? echo $list_booking_date ?></td>
									<td><? echo $list_booking_reason ?></td>
								</tr>
								<?
							}
						} 
						else{ ?>
							<tr>
								<td colspan=2 align="center">No Bookings to list</td>
							</tr>
						<?
						} 
					}?>
					<br><br>
					<tr>
						<td colspan=2 align="center"><a href="index.php" class="small">Done</td>
					</tr>
                </table>
            </div>
        </div>
    </div>