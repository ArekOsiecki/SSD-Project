<?php
try { 
$pdo = new PDO('mysql:host=localhost; dbname=RestaurantSYS; charset=utf8', 'root', ''); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = 'update reservations set Reservation_Checkin=:reservationCheckin,
Reservation_Slot=:reservationSlot,Reservation_Date=:reservationDate,
Reservation_Details=:reservationDetails WHERE Reservation_Id = :reservationId';
$result = $pdo->prepare($sql);
$result->bindValue(':reservationId', $_POST['ud_Reservation_Id']); 
$result->bindValue(':reservationCheckin', $_POST['ud_Reservation_Checkin']); 
$result->bindValue(':reservationSlot', $_POST['ud_Reservation_Slot']); 
$result->bindValue(':reservationDate', $_POST['ud_Reservation_Date']); 
$result->bindValue(':reservationDetails', $_POST['ud_Reservation_Details']); 
$result->execute();
         
$count = $result->rowCount();
if ($count > 0)
{
echo "Reservation" . $_POST['ud_Reservation_Id'] .", updated successfully click<a href='selectTableUpdate.php'> here</a> to go back ";
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