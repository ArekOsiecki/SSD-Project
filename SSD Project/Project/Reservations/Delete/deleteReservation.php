<?php
if (isset($_POST['submitdetails'])) { 
try { 
$pdo = new PDO('mysql:host=localhost;dbname=RestaurantSYS; charset=utf8', 'root', ''); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = 'SELECT count(*) FROM reservations where Reservation_Id =:reservationId';
$result = $pdo->prepare($sql);
$result->bindValue(':reservationId', $_POST['reservationId']); 
$result->execute();
if($result->fetchColumn() > 0) 
{
    $sql = 'SELECT * FROM reservations where Reservation_Id = :reservationId';
    $result = $pdo->prepare($sql);
    $result->bindValue(':reservationId', $_POST['resevationId']); 
    $result->execute();
while ($row = $result->fetch()) { 
        echo $row['Reservation_Id'] . ' ' .$row['Reservation_Checkin'] . ' ' . $row['Reservation_Slot'] 
        . ' ' . $row['Reservation_Date'] .' ' . $row['Reservation_Details'] . ' Are you sure you want to delete ??' . 
	  '<form action="deletedReservation.php" method="post">
            <input type="hidden" name="reservationId" value="'.$row['Reservation_Id'].'"> 
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