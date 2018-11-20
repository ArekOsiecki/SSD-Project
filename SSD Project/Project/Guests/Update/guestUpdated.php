<?php
try { 
$pdo = new PDO('mysql:host=localhost; dbname=RestaurantSYS; charset=utf8', 'root', ''); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = 'update guests set Guest_Phone=:guestPhone,
Guest_Email=:guestEmail,Guest_Name=:guestName WHERE Guest_Id = :guestId';
$result = $pdo->prepare($sql);
$result->bindValue(':guestId', $_POST['ud_Guest_Id']); 
$result->bindValue(':guestPhone', $_POST['ud_Guest_Phone']); 
$result->bindValue(':guestEmail', $_POST['ud_Guest_Email']); 
$result->bindValue(':guestName', $_POST['ud_Guest_Name']); 
$result->execute();
         
$count = $result->rowCount();
if ($count > 0)
{
echo "Guest" . $_POST['ud_Guest_Id'] .", updated successfully click<a href='selectGuestUpdate.php'> here</a> to go back ";
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