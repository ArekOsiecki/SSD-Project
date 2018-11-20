<?php
try { 
$pdo = new PDO('mysql:host=localhost;dbname=RestaurantSYS; charset=utf8', 'root', ''); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = 'DELETE FROM guests WHERE Guest_Id = :guestId';
$result = $pdo->prepare($sql);
$result->bindValue(':guestId', $_POST['guestId']); 
$result->execute();
echo "You just deleted guest no: " . $_POST['guestId'] ." \n click<a href='deleteGuestForm.html'> here</a> to go back ";



} 
catch (PDOException $e) { 

if ($e->getCode() == 23000) {
          echo "ooops couldn't delete as that record is linked to other tables click<a href='deleteGuestForm.html'> here</a> to go back ";
     }

}
?>
