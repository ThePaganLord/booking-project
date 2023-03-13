<?
// First we need to connect to the data base
$db = mysql_connect("10.0.0.xx", 'xxxxxxx', 'xxxxxxxxxxxxxxxx') or die("Could not connect to DB.");
// Note - the server, user and password should be set
if(!$db)
   die("no DB");
if(!mysql_select_db("booking_project", $db))
   die("No database selected");
?>
