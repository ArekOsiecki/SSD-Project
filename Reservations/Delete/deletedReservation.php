<?php
try { 
$pdo = new PDO('mysql:host=localhost;dbname=RestaurantSYS; charset=utf8', 'root', ''); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = 'DELETE FROM reservations WHERE Reservation_Id = :reservationId';
$result = $pdo->prepare($sql);
$result->bindValue(':reservationId', $_POST['reservationId']); 
$result->execute();
echo "You just deleted guest no: " . $_POST['reservationId'] ." \n click<a href='deleteReservationForm.html'> here</a> to go back ";



} 
catch (PDOException $e) { 

if ($e->getCode() == 23000) {
          echo "ooops couldn't delete as that record is linked to other tables click<a href='deleteReservationForm.html'> here</a> to go back ";
     }

}
?>
