<?php
if (isset($_POST['submitdetails'])) { 
try { 
$pdo = new PDO('mysql:host=localhost;dbname=RestaurantSYS; charset=utf8', 'root', ''); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = 'SELECT count(*) FROM guests where Guest_Id =:guestId';
$result = $pdo->prepare($sql);
$result->bindValue(':guestId', $_POST['guestId']); 
$result->execute();
if($result->fetchColumn() > 0) 
{
    $sql = 'SELECT * FROM guests where Guest_Id = :guestId';
    $result = $pdo->prepare($sql);
    $result->bindValue(':guestId', $_POST['guestId']); 
    $result->execute();
while ($row = $result->fetch()) { 
        echo $row['Guest_Id'] . ' ' .$row['Guest_Name'] . ' ' . $row['Guest_Email'] . ' Are you sure you want to delete ??' . 
	  '<form action="deleteGuest.php" method="post">
            <input type="hidden" name="guestId" value="'.$row['Guest_Id'].'"> 
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
