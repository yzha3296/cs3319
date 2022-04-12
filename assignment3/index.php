<!DOCTYPE html>
<html>
<!-- programmer name: 90-->
    <head>
<link rel = "stylesheet" href="trip.css">
    <meta charset = "utf-8">
    <title>Home | BusTrip</title>
    </head>
<body>
<?php
include'connectdb.php';
?>
<h1>Welcome to the Bus Trip Website</h1>
<h2>Bus trips</h2>
<form action="gettrip.php" method="post">
<?php
   include 'getdata.php';
?>
<input type="submit" value="Show Bus Trips!">
</form>
<?php
mysqli_close($connection);
?>
</body>
</html>
