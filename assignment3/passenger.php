<?php
$query = 'SELECT * FROM passenger INNER JOIN passport ON passenger.passenger_id = passport.passenger_id;';
$result=mysqli_query($connection,$query); // show passenger and passport info echo them.
        if (!$result) {
             die("database query failed.");
         }
	while ($row=mysqli_fetch_assoc($result)) {
            echo "<li>";
            echo $row["passenger_id"];
            echo ", ";
            echo $row["first_name"];
            echo ", ";
            echo $row["last_name"];
            echo ", ";
            echo $row["passport_num"];
            echo ", ";
            echo $row["citizenship"];
            echo ", ";
            echo $row["exp_date"];
            echo ", ";
            echo $row["birth_date"];
            echo'<input type = "radio" name = "passenger" value = "'; // put a botton so that we can select one
            echo $row["passenger_id"];
            echo '">';
        }
?>
