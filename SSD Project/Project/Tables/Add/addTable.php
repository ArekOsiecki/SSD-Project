<?php
include 'tableRegistration.html';
 if (isset($_POST['submitdetails'])) {                   
try { 
    
    
    $guestPhone = $_POST['tableSeats'];
    $guestEmail = $_POST['tableStatus'];
    $guestName = $_POST['tableDescription'];
    
    if ($tableSeats =='' or $tableStatus == '' or $tableDescription == ''  )
    {
        echo("You did not complete the insert form correctly <br> ");
    }else{
    $pdo = new PDO('mysql:host=localhost;dbname=RestaurantSYS; charset=utf8', 'root', ''); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
    $sql = "INSERT INTO tables (Table_Seats,Table_Status,Table_Description) VALUES(:tableSeats, :tableStatus, :tableDescription)";
    
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindValue(':tableSeats', $tableSeats);
    $smtm->bindValue(':tableStatus',$tableStatus);
    $stmt->bindValue(':tableDescription', $tableDescription);
    
    $stmt->execute();

    guestRegistration('location: addtable.php'); 
    }
      } 
      catch (PDOException $e) { 
          $title = 'An error has occurred';
          $output = 'Database error: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
      } 
      } 
      
       include 'tableAddForm.php' 
?>