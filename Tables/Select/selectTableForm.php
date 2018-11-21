<?php

try { 
$pdo = new PDO('mysql:host=localhost;dbname=RestaurantSYS; charset=utf8', 'root', ''); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = 'SELECT count(Table_Id) FROM tables where Table_Id = :tableId';
$result = $pdo->prepare($sql);
$result->bindValue(':tableId', $_POST['tableId']); 
$result->execute();
if($result->fetchColumn() > 0) 
{
    $sql = 'SELECT Table_Id FROM tables where Table_Id = :tableId';
    $result = $pdo->prepare($sql);
    $result->bindValue(':tableId', $_POST['tableId']); 
    $result->execute();

while ($row = $result->fetch()) { 
      echo $row['Table_Id'] . '<br>';
   }
}
else {
      print "No rows matched the query.";
    }} 
catch (PDOException $e) { 
$output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine(); 
}



?>