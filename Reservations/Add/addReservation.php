<?php
include 'reservationRegistration.html';
 if (isset($_POST['submitdetails'])) {                   
try { 
    $reservationCheckin = $_POST['reservationCheckin'];
    $reservationSlot = $_POST['reservationSlot'];
    $reservationDate = $_POST['reservationDate'];
    $reservationDetails = $_POST['reservationDetails'];
   
    if ($reservationCheckin == ''  or $reservationSlot == '' or $reservationDate =='' )
    {
        echo("You did not complete the insert form correctly <br> ");
    }else{
    $pdo = new PDO('mysql:host=localhost;dbname=RestaurantSYS; charset=utf8', 'root', ''); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
    $sql = "INSERT INTO reservations (Reservation_Checkin,Reservation_Slot,Reservation_Date,Reservation_Details) 
    VALUES(:reservationCheckin, :reservationSlot, :reservationDate, :reservationDetails)";
    
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindValue(':reservationCheckin', $reservationCheckin);
    $stmt->bindValue(':reservationSlot', $reservationSlot);
    $stmt->bindValue(':reservationDate', $reservationDate);
    $stmt->bindValue(':reservationDetails', $reservationDetails);
    
    $stmt->execute();

    header('location: addReservation.php'); 
    }
      } 
      catch (PDOException $e) { 
          $title = 'An error has occurred';
          $output = 'Database error: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
      } 
      } 
      
       include 'reservationAddForm.php' 
?>
