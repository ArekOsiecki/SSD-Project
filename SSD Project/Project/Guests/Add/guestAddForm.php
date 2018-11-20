 <form action="addGuest.php" method="post">                
        Email Address: <input type="text" name="guestEmail" value = "<?PHP if (isset($guestEmail)) {echo $guestEmail;} ?>"><br>
        Phone Number: <input type = "text" name= "guestPhone" value = "<?PHP if (isset($guestPhone)) {echo $guestPhone;} ?>"><br>
        Name and Surname: <input type="text" name="guestName" value = "<?PHP if (isset($guestName)) {echo $guestName;} ?>"><br>
        <input type="submit" name="submitdetails" value="SUBMIT" >
     </form>
 </body>
</html>
