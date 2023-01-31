<?php
include "includes/header.php";
?>
<marquee><h4>Welcome to savings page</h4></marquee>
<form>
<table><tr><td>member's name:</td><td><select required name= "mem_id"><option value="">...select member...</option>
     <?php
     //retrieving data from db
     $query=mysqli_query($conn,"select * from user_type") or mysqli_error("Error in querry!!");

     while($row =mysqli_fetch_array($query))

     {
     	echo "<option value='".$row["level"]."'>".$row["name"]."</option>";
     }

     ?>
     </select>
     <tr><td>Shares Contributed:</td><td><input type="text" name="curr_ln" required></td></tr>
     <tr><td>Total Shares:</td><td><input type="text" name="ln_rqstd" required></td></tr>
     <tr><td>Date contributed:</td><td><input type="date" name="d_contributed" required></td></tr>

   
     
     </select>

      </td></tr>
     <tr><td colspan="2"><input type ="submit" name="add" value="Add user"></td></tr>

</table>
</form>

<?php
include "includes/footer.php";
?><!DOCTYPE html>