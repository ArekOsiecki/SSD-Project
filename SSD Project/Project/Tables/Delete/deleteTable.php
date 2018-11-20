<?php
if (isset($_POST['submitdetails'])) { 
try { 
$pdo = new PDO('mysql:host=localhost;dbname=RestaurantSYS; charset=utf8', 'root', ''); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = 'SELECT count(*) FROM tables where Table_Id =:tableId';
$result = $pdo->prepare($sql);
$result->bindValue(':tableId', $_POST['tableId']); 
$result->execute();
if($result->fetchColumn() > 0) 
{
    $sql = 'SELECT * FROM tables where Table_Id = :tableId';
    $result = $pdo->prepare($sql);
    $result->bindValue(':tableId', $_POST['tableId']); 
    $result->execute();
while ($row = $result->fetch()) { 
        echo $row['Table_Id'] . ' ' .$row['Table_Seats'] . ' ' . $row['Table_Status'] . ' ' . $row['Table_Description'] . ' Are you sure you want to delete ??' . 
	  '<form action="deletedTable.php" method="post">
            <input type="hidden" name="tableId" value="'.$row['Table_Id'].'"> 
            <input type="submit" value="yes delete" name="delete">
        </form>';
   }
}
else {
      print "No rows matched the query.";
    }} 
catch (PDOException $e) { 
$output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine(); 
}
}
?>