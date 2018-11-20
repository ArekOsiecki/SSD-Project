<?php
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql="SELECT count(*) FROM guests WHERE Guest_Id=:guestId";

$result = $pdo->prepare($sql);
$result->bindValue(':guestId', $_POST['Guest_Id']); 
$result->execute();
if($result->fetchColumn() > 0) 
{
    $sql = 'SELECT * FROM guests where Guest_Id = :guestId';
    $result = $pdo->prepare($sql);
    $result->bindValue(':guestId', $_POST['Guest_Id']); 
    $result->execute();

    $row = $result->fetch() ;
     $reservationId = $row['Guest_Id'];
	  $reservationCheckin = $row['Guest_Phone'];
	  $reservationSlot = $row['Guest_Email'];
     $reservationDate = $row['Guest_Name'];
 
	  
  
	  
   
}

else {
      print "No rows matched the query. try again click<a href='selectuestUpdate.php'> here</a> to go back";
    }} 
catch (PDOException $e) { 
$output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine(); 
}

?>

<form action="guestUpdated.php" method="post">
<input type="hidden" name="ud_Reservation_Id" value="<?php echo $id; ?>">
Reservation Id: <input type="text" name="ud_Guest_Id" value="<?php if (isset($guestId)) echo $guestId; ?>"><br />
Reservation Checkin: <input type="text" name="ud_Guest_Phone" value="<?php if (isset($guestPhone))echo $guestPhone; ?>"><br />
Reservation Slot: <input type="text" name="ud_Guest_Email" value="<?php if (isset($guestEmail))echo $guestEmail; ?>"><br />
Reservation Date: <input type="text" name="ud_Guest_Name" value="<?php if (isset($guestName))echo $guestName; ?>"><br />



<input type="Submit" value="Update">
</form>
</body>

</html>
?>