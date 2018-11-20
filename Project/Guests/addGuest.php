<?php
include 'guestRegistration.html';
 if (isset($_POST['submitdetails'])) {                   
try { 
    $fullName = $_POST['fullName'];
    $guestEmail = $_POST['guestEmail'];
    $guestPhone = $_POST['guestPhone'];
    if ($fullName == ''  or $guestEmail == '' or $guestPhone =='')
    {
        echo("You did not complete the insert form correctly <br> ");
    }else{
    $pdo = new PDO('mysql:host=localhost;dbname=RestaurantSYS; charset=utf8', 'root', ''); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
    $sql = "INSERT INTO guests (Guest_Name,Guest_Phone,Guest_Email) VALUES(:fullName, :guestPhone, :guestEmail)";
    
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindValue(':fullName', $fullName);
    $stmt->bindValue(':guestPhone', $guestPhone);
    $smtm->bindValue(':guestEmail',$guestEmail);
    
    $stmt->execute();

    guestRegistration('location: addGuest.php'); 
    }
      } 
      catch (PDOException $e) { 
          $title = 'An error has occurred';
          $output = 'Database error: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
      } 
      } 
      
       include 'guestForm.php' 
       ?>
