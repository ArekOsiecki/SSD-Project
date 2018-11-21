
<?php
try {
$pdo = new PDO('mysql:host=localhost,dbname=RestaurantSYS;charset=utf8','root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT * FROM guests';
$result = $pdo ->query($sql);

echo "<br /><b>Choose which guest you want to update</b><br/>";
echo "<table border = 1>";
echo "<tr><th>Guest ID</th>
<th>Phone :</th></tr>
<th>Email :</th></tr>
<th>Name :</th></tr>";


while ($row = $result->fetch()) {
echo '<tr><td>' . $row['Guest_Id'] . '</td><td>'. $row['Guest_Phone'] .
 '</td></tr>'. $row['Guest_Email'] . '</td></tr>'. $row['Guest_Name'] . '</td></tr>';
}

echo '</table>';
} 
catch (PDOException $e) { 
$output = 'Unable to connect to the database server: ' .
 $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine(); 
}


include 'whichGuestToUpdate.html';

?>