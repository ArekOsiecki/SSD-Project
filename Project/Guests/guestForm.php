 <form action="addGuest.php" method="post">                
        Name and Surname: <input type="text" name="fullName" value = "<?PHP if (isset($fullName)) {echo $fullName;} ?>"><br>
        Email Address: <input type="text" name="guestEmail" value = "<?PHP if (isset($guestEmail)) {echo $guestEmail;} ?>"><br>
        Phone Number: <input type = "text" name= "guestPhone" value = "<?PHP if (isset($guestPhone)) {echo $guestPhone;} ?>"><br>
        <input type="submit" name="submitdetails" value="SUBMIT" >
     </form>
 </body>
</html>
