<?php
   include 'connectdb.php';
?>
<?php
$trip_id = $_POST["trip"];
$query = 'DELETE FROM busTrip WHERE trip_id = '.$trip_id.'';
$result=mysqli_query($connection,$query);
if ($result === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Cannot delete, There was at least one passenger booked that trip!";
}
?>
