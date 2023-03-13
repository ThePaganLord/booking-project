<?
include("connect.php");

$user_selected_date=$_REQUEST['user_selected_date'];
$booking_reason=$_REQUEST['booking_reason'];

$insert_booking="INSERT INTO bookings (booking_date, booking_reason) VALUES ('$user_selected_date', '$booking_reason')";
mysql_query($insert_booking);
?>
<script language="JavaScript">
	window.location.href="index.php";
</script>