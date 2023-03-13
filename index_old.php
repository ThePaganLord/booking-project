<?php


/*function Create_Data_Base(){
    // This will be used to create a booking system
    $servername="localhost";
    $username="root";
    $password="";

    //try{
    //    $connection=new PDO ("mysql:host=$servername", $username, $password);
    //    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//        $create_database=$connection->prepare("CREATE DATABASE Booking_Project");
//        $create_database->execute();
//
//        echo "Connected Successfully<br>";
//    }
//    catch( PDOExeption $error){
//        echo "Connection Failed".$error->getMessage();
//    }
    
    // Create Table
    try{
        $connection=new PDO ("mysql:host=$servername; dbname=Booking_Project", $username, $password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        echo "Connected Successfully<br>";
    }
    catch( PDOExeption $error){
        echo "Connection Failed".$error->getMessage();
    }
    $create_database_table = $connection->prepare("CREATE TABLE bookings 
                                     (booking_id INT(10) NOT NULL AUTO_INCREMENT, 
                                      booking_date DATE NULL,
                                      booking_reason varchar(250))");
    $create_database_table->execute();

    // Close connection
    $connection=NULL;
}*/

function Check_Existing_Database(){
    $servername="localhost";
    $username="root";
    $password="";

    try{
        $connection=new PDO ("mysql:host=$servername", $username, $password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //echo "Connected Successfully1<br>";
    }
    catch( PDOExeption $error){
        //echo "Connection Failed".$error->getMessage();
    }
    
    $check_db_exists = $connection->prepare("SHOW DATABASES LIKE 'booking_project'");
    $check_db_exists->execute();
    
    if ($data = $check_db_exists->fetch()) {
        $database_exists = 'Yes';
    } 
    else {
        $database_exists = 'No';
    }
    $connection=NULL;

    //return $database_exists;
}

$check_initialize_db = Check_Existing_Database();
if($check_initialize_db == 'No'){
    Create_Data_Base();
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