 <form action="addTable.php" method="post">                
        Email Address: <input type="text" name="tableSeats" value = "<?PHP if (isset($tableSeats)) {echo $tableSeats;} ?>"><br>
        Phone Number: <input type = "text" name= "tableStatus" value = "<?PHP if (isset($tableStatus)) {echo $tableStatus;} ?>"><br>
        Name and Surname: <input type="text" name="tableDescription" value = "<?PHP if (isset($tableDescription)) {echo $tableDescription;} ?>"><br>
        <input type="submit" name="submitdetails" value="SUBMIT" >
     </form>
 </body>
</html>
