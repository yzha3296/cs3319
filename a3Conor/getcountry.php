
<?php
   include 'connectdb.php';
?>

<?php
 $query = 'SELECT distinct visit_country FROM busTrip ORDER BY "visit_country"';
 $result = mysqli_query($connection,$query);
 if (!$result) {
 die("databases query failed.");
 } 
 while ($row = mysqli_fetch_assoc($result)) {
 echo "<option value=". $row[visit_country] . ">" . $row[visit_country] . "</option>";
 }
 mysqli_free_result($result);
?>
