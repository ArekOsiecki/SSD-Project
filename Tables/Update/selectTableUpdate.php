<?php
try {
$pdo = new PDO('mysql:host=localhost,dbname=RestaurantSYS;charset=utf8','root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT * FROM tables';
$result = $pdo ->query($sql);

echo "<br /><b>Choose which table you want to update</b><br/>";
echo "<table border = 1>";
echo "<tr><th>Table ID</th>
<th>Seats :</th></tr>
<th>Status :</th></tr>
<th>Description :</th></tr>";


while ($row = $result->fetch()) {
echo '<tr><td>' . $row['Table_Id'] . '</td><td>'. $row['Table_Seats'] .
 '</td></tr>'. $row['Table_Status'] . '</td></tr>'. $row['Table_Description'] . '</td></tr>';
}

echo '</table>';
} 
catch (PDOException $e) { 
$output = 'Unable to connect to the database server: ' .
 $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine(); 
}


include 'whichTableToUpdate.html';

?>