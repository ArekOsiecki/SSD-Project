<?php
try { 
$pdo = new PDO('mysql:host=localhost;dbname=RestaurantSYS; charset=utf8', 'root', ''); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = 'update tables set Table_Seats=:tableSeats,Table_Status=:tableStatus WHERE Table_Id = :tableId';
$result = $pdo->prepare($sql);
$result->bindValue(':tableId', $_POST['Table_Id']); 
$result->bindValue(':tableSeats', $_POST['Table_Seats']); 
$result->bindValue(':tableStatus', $_POST['Table_Status']); 
$result->bindValue(':tableDescription', $_POST['Table_Description']); 
$result->execute();
         
$count = $result->rowCount();
if ($count > 0)
{
echo "Table no: " . $_POST['ud_Table_Id'] .", updated successfully click<a href='selectTableUpdate.php'> here</a> to go back ";
}
else
{
echo "nothing updated";
}
}
 
catch (PDOException $e) { 

$output = 'Unable to process query sorry : ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine(); 

}
?>