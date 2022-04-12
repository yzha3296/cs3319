<?php 
$query = "SELECT * FROM	busTrip";
$result = mysqli_query($connection,$query);
if(!$result){
  die("databases query failed.");
}
echo"Which order you would like to see?</br>";
echo '<input type="radio" name="order" value="trip_name">By trip name<br>';
echo '<input type="radio" name="order" value="visit_country">By country<br>';

echo"Ascending or descending?<br>";
echo '<input type="radio" name="scending" value="ascending">Ascending<br>';
echo '<input type="radio" name="scending" value="descending">Descending<br>';

mysqli_free_result($result);
?>
