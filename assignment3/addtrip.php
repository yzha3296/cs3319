<!DOCTYPE html>
<html>
<head>
<!-- programmer name: 90-->
<link rel = "stylesheet" href="trip.css">
<meta charset="utf-8">
<title>ADD TRIP | busTrip</title>
</head>
<body>
<?php
   include 'connectdb.php';
?>
<ol>
<?php
   $trip_id = $_POST["trip_id"];
   $trip_name = $_POST["trip_name"];
   $start =$_POST["start_date"];
   $end = $_POST["end_date"];
   $country = $_POST["country"];
   $image = $_POST["urlmage"];
   $bus = $_POST["bus"];
   $query1 = 'SELECT * FROM busTrip WHERE trip_id = '.$trip_id.'';
   $result = mysqli_query($connection,$query1);
   if($start > $end){
       echo "invalid date";
   }elseif($result->num_rows != 0){
       echo "trip id already exits!";
   }else{
    $query = 'INSERT INTO busTrip (trip_id, trip_name, begin_date, end_date, visit_country, License_Plate_number, urlmage)
    values (' . $trip_id . ',"' . $trip_name . '","' . $start . '","' . $end . '", "' . $country . '", "' . $bus . '","' . $image . '")';
    if (!mysqli_query($connection, $query)) {
         die("Error: insert failed" . mysqli_error($connection));
     }
    echo "Your trip was added!";
   }
   mysqli_close($connection);
?>
</ol>
</body>
</html>
