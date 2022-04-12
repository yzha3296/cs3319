
<!DOCTYPE html<html>
<head>
<!-- programmer name: 90-->
<link rel = "stylesheet" href="trip.css">
<meta charset="utf-8">
<title>deleteBooking | bus trip</title>
</head>
<body>
<?php
   include 'connectdb.php';
?>
<?php
list($passenger_id, $trip_id) = explode("|", $_POST["booking"],2); // split the content in $_POST
$query = 'DELETE FROM tripBooking WHERE passenger_id = '.$passenger_id.' AND trip_id = '.$trip_id.'';
$result=mysqli_query($connection,$query);
if (!$result) {
    die("database query failed.". mysqli_error($connection));
}
echo 'booking deleted!'

?>
</body>
</html>
