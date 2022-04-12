


<?php
   include 'connectdb.php';
?>

<?php
 $query = 'SELECT distinct passenger_id, first_name, last_name FROM passenger ORDER BY "first_name"';
 $result = mysqli_query($connection,$query);
 if (!$result) {
 die("databases query failed.");
 }
 while ($row = mysqli_fetch_assoc($result)) {
 echo "<option value='$row[passenger_id]'>" . $row[first_name] . " " . $row[last_name] . "</option>";
 }
 mysqli_free_result($result);
?>
