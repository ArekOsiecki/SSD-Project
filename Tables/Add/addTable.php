<?php
include 'tableRegistration.html';
 if (isset($_POST['submitdetails'])) {                   
try { 
    
    
    $tableSeats = $_POST['tableSeats'];
    $tableStatus = $_POST['tableStatus'];
    $tableDescription = $_POST['tableDescription'];
    
    if ($tableSeats =='' or $tableStatus == '' or $tableDescription == ''  )
    {
        echo("You did not complete the insert form correctly <br> ");
    }else{
    $pdo = new PDO('mysql:host=localhost;dbname=RestaurantSYS; charset=utf8', 'root', ''); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
    $sql = "INSERT INTO tables (Table_Seats,Table_Status,Table_Description) VALUES(:tableSeats, :tableStatus, :tableDescription)";
    
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindValue(':tableSeats', $tableSeats);
    $stmt->bindValue(':tableStatus',$tableStatus);
    $stmt->bindValue(':tableDescription', $tableDescription);
    
    $stmt->execute();

    header('location: addTable.php'); 
    }
      } 
      catch (PDOException $e) { 
          $title = 'An error has occurred';
          $output = 'Database error: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
      } 
      } 
      
       include 'tableAddForm.php' 
?>