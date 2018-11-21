<!DOCTYPE html>
<html lang='en'>
  <head>
      <title>Internet and WWW How to Program - Welcome</title>

<link rel="stylesheet" type="text/css" href="styles.css" />
   </head>

<?php
try{
$pdo = new PDO('mysql:host=localhost;dbname=RestaurantSYS; charset=utf8', 'root', ''); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql="SELECT count(*) FROM guests WHERE Guest_Id=:guestId";

$result = $pdo->prepare($sql);
$result->bindValue(':guestId', $_POST['guestId']); 
$result->execute();
if($result->fetchColumn() > 0) 
{
    $sql = 'SELECT * FROM guests where Guest_Id = :guestId';
    $result = $pdo->prepare($sql);
    $result->bindValue(':guestId', $_POST['guestId']); 
    $result->execute();

    $row = $result->fetch() ;
     $guestId = $row['Guest_Id'];
	  $guestPhone = $row['Guest_Phone'];
	  $guestEmail = $row['Guest_Email'];
     $guestName = $row['Guest_Name'];
 
	  
  
	  
   
}
else {
      print "No rows matched the query. try again click<a href='selectuestUpdate.php'> here</a> to go back";
}} 
catch (PDOException $e) { 
$output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine(); 
}

?>

<form action="guestUpdated.php" method="post">
<input type="hidden" name="ud_Guest_Id" value="<?php echo $guestId; ?>">
Guest Phone: <input type="text" name="ud_Guest_Phone" value="<?php if (isset($guestPhone))echo $guestPhone; ?>"><br />
Guest Email: <input type="text" name="ud_Guest_Email" value="<?php if (isset($guestEmail))echo $guestEmail; ?>"><br />
Guest Name: <input type="text" name="ud_Guest_Name" value="<?php if (isset($guestName))echo $guestName; ?>"><br />



<input type="Submit" value="Update">
</form>
</body>

</html>
