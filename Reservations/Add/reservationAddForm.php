<form action="addReservation.php" method="post">                
        Checkin: <input type="text" name="reservationCheckin" value = "<?PHP if (isset($reservationCheckin)) {echo $reservationCheckin;} ?>"><br>
        Slot: <input type="text" name="reservationSlot" value = "<?PHP if (isset($reservationSlot)) {echo $reservationSlot;} ?>"><br>
        Date: <input type="text" name="reservationDate" value = "<?PHP if (isset($reservationDate)) {echo $reservationDate;} ?>"><br>
        Details: <input type="text" name="reservationDetails" value = "<?PHP if (isset($reservationDetails)) {echo $reservationDetails;} ?>"><br>
        <input type="submit" name="submitdetails" value="SUBMIT" >
     </form>
 </body>
</html>

