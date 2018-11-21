<?php
include 'guestRegistration.html';
 if (isset($_POST['submitdetails'])) {                   
try { 
    
    $guestEmail = $_POST['guestEmail'];
    $guestPhone = $_POST['guestPhone'];
    $guestName = $_POST['guestName'];
    
    if ($guestPhone =='' or $guestEmail == '' or $guestName == ''  )
    {
        echo("You did not complete the insert form correctly <br> ");
    }else{
    $pdo = new PDO('mysql:host=localhost;dbname=RestaurantSYS; charset=utf8', 'root', ''); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
    $sql = "INSERT INTO guests (Guest_Email,Guest_Phone,Guest_Name) VALUES( :guestEmail,:guestPhone,:guestName)";
    
    $stmt = $pdo->prepare($sql);
    
	$stmt->bindValue(':guestEmail',$guestEmail);
    $stmt->bindValue(':guestPhone', $guestPhone);
    $stmt->bindValue(':guestName', $guestName);
    
    $stmt->execute();

    header('location: addGuest.php'); 
    }
      } 
      catch (PDOException $e) { 
          $title = 'An error has occurred';
          $output = 'Database error: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
      } 
      } 
      
       include 'guestAddForm.php' 
?>
