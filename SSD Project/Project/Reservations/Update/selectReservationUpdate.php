<?php
try {
$pdo = new PDO('mysql:host=localhost,dbname=RestaurantSYS;charset=utf8','root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT * FROM reservations';
$result = $pdo ->query($sql);

echo "<br /><b>Choose which reservation you want to update</b><br/>";
echo "<table border = 1>";
echo "<tr><th>Reservation ID</th>
<th>Checkin :</th></tr>
<th>Slot :</th></tr>
<th>Date :</th></tr>
<th>Details :</th></tr>";


while ($row = $result->fetch()) {
echo '<tr><td>' . $row['Reservation_Id'] . '</td><td>'. $row['Reservation_Checkin'] .
 '</td></tr>'. $row['Reservation_Slot'] . '</td></tr>'. $row['Reservation_Date'] . '</td></tr>'. $row['Reservation_Details'] . '</td></tr>';
}

echo '</table>';
} 
catch (PDOException $e) { 
$output = 'Unable to connect to the database server: ' .
 $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine(); 
}


include 'whichReservationToUpdate.html';

?>