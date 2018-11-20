<?php

try { 
$pdo = new PDO('mysql:host=localhost;dbname=RestaurantSYS; charset=utf8', 'root', ''); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = 'SELECT count(Guest_Name) FROM guests where Guest_Name = :guestName';
$result = $pdo->prepare($sql);
$result->bindValue(':guestName', $_POST['guestName']); 
$result->execute();
if($result->fetchColumn() > 0) 
{
    $sql = 'SELECT Guest_Name FROM guests where Guest_Name = :guestName';
    $result = $pdo->prepare($sql);
    $result->bindValue(':guestName', $_POST['guestName']); 
    $result->execute();

while ($row = $result->fetch()) { 
      echo $row['Guest_Name'] . '<br>';
   }
}
else {
      print "No rows matched the query.";
    }} 
catch (PDOException $e) { 
$output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine(); 
}



?>