
<?php
include 'connectdb.php';
?>
<?php
   $order= $_POST["order"];
   $scending = $_POST["scending"];
if ($order == "trip_name"){
        if($scending == "ascending"){
            $query = 'SELECT * FROM busTrip ORDER BY trip_name';
        }else{
            $query = 'SELECT * FROM busTrip ORDER BY trip_name DESC';
        }
    $result=mysqli_query($connection,$query);
        if (!$result) {
             die("database query failed.");
         }
	while ($row=mysqli_fetch_assoc($result)) {
            echo "<li><br>";
            echo '<img src="' . $row["urlmage"] . '" height="60" width="60"><br>';
            echo $row["trip_name"];
            echo ", ";
            echo $row["begin_date"];
            echo ", ";
            echo $row["end_date"];
            echo ", ";
            echo $row["visit_country"];
            echo ", ";
            echo $row["License_Plate_number"];
            echo'<input type = "radio" name = "trip" value = "';
            echo $row["trip_id"];
            echo '">';
        }
}else{
    if($scending == "ascending"){
        $query = 'SELECT * FROM busTrip ORDER BY visit_country';
    }else{
	$query = 'SELECT * FROM busTrip ORDER BY visit_country DESC';
    }
 $result=mysqli_query($connection,$query);
        if (!$result) {
             die("database query failed.");
         }
	while ($row=mysqli_fetch_assoc($result)) {
            echo "<li><br>";
            echo '<img src="' . $row["urlmage"] . '" height="60" width="60"><br>';
            echo $row["visit_country"];
            echo", ";
            echo $row["begin_date"];
            echo ", ";
            echo $row["end_date"];
            echo ", ";
            echo $row["trip_name"];
            echo ", ";
            echo $row["License_Plate_number"];
            echo'<input type = "radio" name = "trip" value = "';
            echo $row["trip_id"];
            echo '">';
        }
}
     mysqli_free_result($result);
?>

