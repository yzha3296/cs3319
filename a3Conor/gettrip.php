<!DOCTYPE html>
<html>
<head>
<!-- programmer name: 90-->
<link rel = "stylesheet" href="trip.css">
<meta charset="utf-8">
<script language="JavaScript" type="text/javascript">
function Delete(){
    return confirm('Are you sure to delete?');
}</script>
<title>TRIPS | Bus Trip</title>
</head>
<body>
<script src="country.js"></script>
<?php
include 'connectdb.php';
?>
<h1>Here are trips available</h1>
<h3>refresh home page to see result</h3>
<h3>Select one to change it</h3>
<ol>
<form action = "update.php" method = "post">
<?php
include 'listdata.php';
?>
</ol>
Trip name: <input type = "text" name = "trip_name"><br>
start date: <input type = "text" name = "begin_date"><br>
end date: <input type = "text" name = "end_date"><br>
image file: <input type = "text" name ="urlmage"><br>
<input type = "submit">
</form>
<p>
<br><br><br><br>
<p>
<h3>Select one to delete it</h3>
<ol>
<form action = "delete.php" method = "post">
<?php
include 'listdata.php';
?>
</ol>
<input type = "submit" onclick="return Delete()" value = Delete>
</form>
<p>
<hr>
<p>

<h2>Add	new trip:</h2>
<form action="addtrip.php" method="post">
New trip's ID: <input type="number" name="trip_id"><br>
New trip's Name: <input type="text" name="trip_name"><br>
New trip's start date: <input type="date" name="start_date"><br>
New trip's end date: <input type="date" name="end_date"><br>
New trip's country: <input type="text" name="country"><br>
New trip's image: <input type="text" name="urlmage"><br>
New trip's bus: <br>
         <input type="radio" name="bus" value="TAXI222">TAXI222<br>
<input type="radio" name="bus" value="TAXI111">TAXI111<br>
<input type="radio" name="bus" value="VAN1111">VAN1111<br>
<input type="radio" name="bus" value="VAN1111">CAND123<br>
<input type="submit" value="Add New Trip">
</form>

<p>
<br>
<hr>
<br>
<p>

<h2>Bus trip by country </h2>
Select a Country:
<form action = "listcountry.php" method = "post">
<select name = "country" id = "country">
<option value="1">Select Here</option>
<?php
     	include "getcountry.php";
?>
</select>
<p>
<br>
<p> 
<input type = "submit" value = "select">
</form>

<p>
<br>
<hr>
<br>
<p>
<h2> create booking for passenger</h2>
<form action = "createbooking.php" method = "post">
<?php
include 'listdata.php';
?>
select a passenger
<select name = "passenger" id = "passenger">
<option value="1">Select Here</option>
<?php
     	include "getpassenger.php";
?>
</select>
<br>
Price: <input type="text" name="price"><br>
<input type = "submit" value = "select">

</form>
<p>
<br>
<hr>
<br>
<p>
<h3>passenger info</h3>
<h3>select on to see all of his/her booking</h3>
<form action = "booking.php" method = "post">
<?php
	include 'passenger.php';
?>
<br>
<input type = "submit" value = "select">
</form>

<p>
<br>
<hr>
<br>
<p>

<h2>all the trips that don't have booking</h2>
<?php
$query = 'SELECT trip_id, trip_name
    FROM busTrip 
    WHERE trip_id NOT IN (SELECT trip_id FROM tripBooking)
    GROUP BY trip_name;';
$result=mysqli_query($connection,$query);
if (!$result) {
       die("database query failed.". mysqli_error($connection));
     }
while ($row=mysqli_fetch_assoc($result)) {
    echo "<li>";
    echo $row["trip_name"];
    echo ", ";
    echo $row["trip_id"];
}
?>

<?php
    mysqli_close($connection);
?>
</body>
</html>
