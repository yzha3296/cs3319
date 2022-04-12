<!DOCTYPE html>
<html>
<head>
<!-- programmer name: 90-->
<link rel = "stylesheet" href="trip.css">
<meta charset="utf-8">
<title>Updated | bus trip</title>
</head>
<body>
<?php
   include 'connectdb.php';
?>
<h1>updated your data!</h1>
<ol>
<?php
   $trip_id= $_POST["trip"];
   $tripName = $_POST["trip_name"];
   $startdate = $_POST["begin_date"];
   $enddate = $_POST["end_date"];
   $image = $_POST["urlmage"];

   $query = 'UPDATE busTrip SET
   trip_name = "'.$tripName.'",
   begin_date = "'.$startdate.'",
   end_date = "'.$enddate.'",
   urlmage = "'.$image.'"
   WHERE trip_id = "'.$trip_id.'"';
   $result=mysqli_query($connection,$query);
   if ($result){
   echo "Your data was updated!";
}else{
   echo " updated failed";
}
   mysqli_close($connection);
?>
</ol>
</body>
</html>
