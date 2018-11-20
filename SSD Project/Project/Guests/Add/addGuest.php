<?php
include 'guestRegistration.html';
 if (isset($_POST['submitdetails'])) {                   
try { 
    
    
    $guestPhone = $_POST['guestPhone'];
    $guestEmail = $_POST['guestEmail'];
    $guestName = $_POST['guestName'];
    
    if ($guestPhone =='' or $guestEmail == '' or $guestName == ''  )
    {
        echo("You did not complete the insert form correctly <br> ");
    }else{
    $pdo = new PDO('mysql:host=localhost;dbname=RestaurantSYS; charset=utf8', 'root', ''); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
    $sql = "INSERT INTO guests (Guest_Phone,Guest_Email,Guest_Name) VALUES(:guestPhone, :guestEmail, :guestName)";
    
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindValue(':guestPhone', $guestPhone);
    $smtm->bindValue(':guestEmail',$guestEmail);
    $stmt->bindValue(':guestName', $guestName);
    
    $stmt->execute();

    guestRegistration('location: addGuest.php'); 
    }
      } 
      catch (PDOException $e) { 
          $title = 'An error has occurred';
          $output = 'Database error: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
      } 
      } 
      
       include 'guestAddForm.php' 
?>
