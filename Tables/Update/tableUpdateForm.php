<!DOCTYPE html>
<html lang='en'>
  <head>
      <title>Table Status</title>

<link rel="stylesheet" type="text/css" href="styles.css" />
   </head>
<?php
try { 
$pdo = new PDO('mysql:host=localhost;dbname=RestaurantSYS; charset=utf8', 'root', ''); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql="SELECT count(*) FROM tables WHERE Table_Id=:tableId";

$result = $pdo->prepare($sql);
$result->bindValue(':tableId', $_POST['Table_Id']); 
$result->execute();
if($result->fetchColumn() > 0) 
{
    $sql = 'SELECT * FROM tables where Table_Id = :tableId';
    $result = $pdo->prepare($sql);
    $result->bindValue(':tableId', $_POST['tableId']); 
    $result->execute();

    $row = $result->fetch() ;
     $tableId = $row['Table_Id'];
	 $tableSeats= $row['Table_Seats'];
	  $tableStatus=$row['Table_Status'];
      $tableDescription=$row['Table_Description'];
	  
  
	  
   
}

else {
      print "No rows matched the query. try again click<a href='selectTableUpdate.php'> here</a> to go back";
    }} 
catch (PDOException $e) { 
$output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine(); 
}

?>

<form action="tableUpdated.php" method="post">
<input type="hidden" name="ud_Table_Id" value="<?php echo $id; ?>">
Table Id: <input type="text" name="ud_Table_Id" value="<?php if (isset($tableId)) echo $tableId; ?>"><br />
Table Seats: <input type="text" name="ud_Table_Seats" value="<?php if (isset($tableSeats))echo $tableSeats; ?>"><br />
Table Status: <input type="text" name="ud_Table_Status" value="<?php if (isset($tableStatus))echo $tableStatus; ?>"><br />
Table Description: <input type="text" name="ud_Table_Description" value="<?php if (isset($tableDecription))echo $tableDescription; ?>"><br />


<input type="Submit" value="Update">
</form>
</body>

</html>
