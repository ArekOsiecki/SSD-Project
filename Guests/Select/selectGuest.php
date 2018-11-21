<?php try { 
$pdo = new PDO('mysql:host=localhost;dbname=RestaurantSYS; charset=utf8', 'root', ''); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = 'SELECT Guest_Id FROM guests'; 
$result = $pdo->query($sql); 
while ($row = $result->fetch()) { 
      echo $row['Guest_Id'] . '<br>';
}
} 
catch (PDOException $e) { 
$output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine(); 
}
