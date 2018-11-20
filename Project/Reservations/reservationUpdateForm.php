<!DOCTYPE html>
<html lang='en'>
  <head>
      <title>Reservation Status</title>

<link rel="stylesheet" type="text/css" href="styles.css" />
   </head>
<?php
try { 
$pdo = new PDO('mysql:host=localhost;dbname=RestaurantSYS; charset=utf8', 'root', ''); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql="SELECT count(*) FROM reservations WHERE Reservation_Id=:reservationId";

$result = $pdo->prepare($sql);
$result->bindValue(':reservationId', $_POST['Reservation_Id']); 
$result->execute();
if($result->fetchColumn() > 0) 
{
    $sql = 'SELECT * FROM reservations where Reservation_Id = :reservationId';
    $result = $pdo->prepare($sql);
    $result->bindValue(':reservationId', $_POST['Reservation_Id']); 
    $result->execute();

    $row = $result->fetch() ;
     $reservationId = $row['Reservation_Id'];
	  $reservationCheckin = $row['Reservation_Checkin'];
	  $reservationSlot = $row['Reservation_Slot'];
     $reservationDate = $row['Reservation_Date'];
     $reservationDetails= $row['Reservation_Details'];
	  
  
	  
   
}

else {
      print "No rows matched the query. try again click<a href='selectTableUpdate.php'> here</a> to go back";
    }} 
catch (PDOException $e) { 
$output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine(); 
}

?>

<form action="reservationUpdated.php" method="post">
<input type="hidden" name="ud_Reservation_Id" value="<?php echo $id; ?>">
Reservation Id: <input type="text" name="ud_Reservation_Id" value="<?php if (isset($reservationId)) echo $reservationId; ?>"><br />
Reservation Checkin: <input type="text" name="ud_Reservation_Checkin" value="<?php if (isset($reservationCheckin))echo $reservationCheckin; ?>"><br />
Reservation Slot: <input type="text" name="ud_Reservation_Slot" value="<?php if (isset($reservationSlot))echo $reservationSlot; ?>"><br />
Reservation Date: <input type="text" name="ud_Reservation_Date" value="<?php if (isset($reservationDate))echo $reservationDate; ?>"><br />
Reservation Details: <input type="text" name="ud_Reservation_Details" value="<?php if (isset($reservationDetails))echo $reservationDetails; ?>"><br />


<input type="Submit" value="Update">
</form>
</body>

</html>
