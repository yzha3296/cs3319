<!DOCTYPE html>
<html>
<head>
<!-- programmer name: 90-->
<link rel = "stylesheet" href="trip.css">
<meta charset="utf-8">
<title>Creaate | busTrip</title>
</head>
<body>
<?php
   include 'connectdb.php';
?>
<ol>
<?php
   $trip_id = $_POST["trip"];
   $passenger = $_POST["passenger"];
   $price = $_POST["price"];
   $query = 'INSERT INTO tripBooking (passenger_id, trip_id, price) VALUES ('.$passenger.',' . $trip_id . ',' . $price . ');';
   echo $query."<br>";
   $result = mysqli_query($connection,$query);
   if (!$result) {
             die("database query failed.". mysqli_error($connection));
   }
   echo"create succeed!";
   mysqli_close($connection);
?>
</ol>
</body>
</html>


