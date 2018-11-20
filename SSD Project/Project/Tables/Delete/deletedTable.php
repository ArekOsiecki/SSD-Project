<?php
try { 
$pdo = new PDO('mysql:host=localhost;dbname=RestaurantSYS; charset=utf8', 'root', ''); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = 'DELETE FROM tables WHERE Table_Id = :tableId';
$result = $pdo->prepare($sql);
$result->bindValue(':tableId', $_POST['tableId']); 
$result->execute();
echo "You just deleted table no: " . $_POST['tableId'] ." \n click<a href='deletetableForm.html'> here</a> to go back ";



} 
catch (PDOException $e) { 

if ($e->getCode() == 23000) {
          echo "ooops couldn't delete as that record is linked to other tables click<a href='deleteTableForm.html'> here</a> to go back ";
     }

}
?>
