
<!DOCTYPE html>
<html>
<head>
<!-- programmer name: 90-->
<link rel = "stylesheet" href="trip.css">
<script language="JavaScript" type="text/javascript">
function Delete(){
    return confirm('Are you sure to delete?');
}</script>
<meta charset="utf-8">
<title>Booking | bus trip</title>
</head>
<body>
<?php
   include 'connectdb.php';
?>
<h3>here is all his/her booking</h3>
<form action = "deletebooking.php" method = "post">
<?php
$passenger_id = $_POST["passenger"];
$query = 'SELECT *
FROM tripBooking
    INNER JOIN passenger ON passenger.passenger_id = tripBooking.passenger_id
    INNER JOIN busTrip ON busTrip.trip_id = tripBooking.trip_id
WHERE tripBooking.passenger_id = '.$passenger_id.';';
$result=mysqli_query($connection,$query); // show passenger's booking info and echo them
if (!$result) {
     die("database query failed.". mysqli_error($connection));
 }
 while ($row=mysqli_fetch_assoc($result)) {
    echo "<li><br>";
    echo $row["passenger_id"];
    echo ", ";
    echo $row["first_name"];
    echo ", ";
    echo $row["last_name"];
    echo ", ";
    echo $row["price"];
    echo ", ";
    echo $row["begin_date"];
    echo ", ";
    echo $row["end_date"];
    echo ", ";
    echo $row["visit_country"];
    echo ", ";
    echo $row["trip_name"];
    echo ",  ";
    echo "tripID: ". $row["trip_id"];
    echo ",  ";
    echo'<input type = "radio" name = "booking" value = "'; // put a botton so that we can select one
    echo $row['passenger_id'].'|'.$row['trip_id'];
    echo '">';
}
?>
<br>
<input type = "submit" onclick="return Delete()" value = "delete">
</form>
</body>
</html>
