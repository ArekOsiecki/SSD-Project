<?php

try { 
$pdo = new PDO('mysql:host=localhost;dbname=RestaurantSYS; charset=utf8', 'root', ''); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = 'SELECT count(Reservation_Id) FROM reservations where Reservation_Id = :reservationId';
$result = $pdo->prepare($sql);
$result->bindValue(':reservationId', $_POST['reservationId']); 
$result->execute();
if($result->fetchColumn() > 0) 
{
    $sql = 'SELECT Reservation_Id FROM guests where Reservation_Id = :reservationId';
    $result = $pdo->prepare($sql);
    $result->bindValue(':reservationId', $_POST['reservationId']); 
    $result->execute();

while ($row = $result->fetch()) { 
      echo $row['Reservation_Id'] . '<br>';
   }
}
else {
      print "No rows matched the query.";
    }} 
catch (PDOException $e) { 
$output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine(); 
}



?>