<!DOCTYPE html>
<html>
<head>
<!-- programmer name: 90-->
<link rel = "stylesheet" href="trip.css">
<meta charset="utf-8">
<title>Select | bus trip</title>
</head>
<body>
<?php
   include 'connectdb.php';
?>

<?php
 $country = $_POST["country"]; //get selected country value from the form
echo "$country";
 $query = 'SELECT * FROM busTrip WHERE visit_country="'. $country.'"'; //fill in with correct query
 $result = mysqli_query($connection, $query);
 if (!$result) {
 die("databases query failed.");
 }
 echo "<ul>"; //put the trips in an unordered bulleted list
 while ($row = mysqli_fetch_assoc($result)) {
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
            echo "<br>";
}
 echo "</ul>";
 mysqli_free_result($result);
?>
</body>
</html>
