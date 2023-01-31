<?php
include "includes/header.php";
?>

<?php
if(isset($_POST["sub"])) 
{
   $curr_loan=$_POST["curr_ln"];
   $loan_rqstd=$_POST["ln_rqstd"];
   $pre_loan_bal=$_POST["pre_ln_bal"];
   $loan_payment=$_POST["ln_rpmt"];
   $loan_dt = $_POST["ln_dt"];




        $query= mysqli_query($conn,"INSERT INTO loans VALUES(0,'$curr_loan','$loan_rqstd','$pre_loan_bal','$loan_date')") or mysqli_error("Error in query!!");
        

    if($query) 
    {
     

     echo "<script>alert('Loan Applied successfull!!');


     location.href='add_mem.php?pg=mem'</script>";

    

    }

    }
    else
  
?>
<!-- <marquee><h4>Add user</h4></marquee>  -->


<form action="loans.php?pg=ln" method="post" enctype="multipart/form-data">

<table width="80%" border="0" cellspacing"0">
	
     <tr><td>Member's name:</td><td><select required name= "mem_id"><option value="">...select member...</option>
     <?php
     //retrieving data from db
     $query=mysqli_query($conn,"select * from members") or mysql_error("Error in querry!!");

     while($row =mysqli_fetch_array($query))

     {
     	echo "<option value='".$row["id"]."'>".$row["name"]."</option>";
     }

     ?>
     </select>
     <tr><td>Current Loan:</td><td><input type="text" name="curr_ln" required></td></tr>
     <tr><td>Loan requested:</td><td><input type="text" name="ln_rqstd" required></td></tr>
     <tr><td>Previous Loan Bal:</td><td><input type="text" name="pre_ln_bal" required></td></tr>
     <tr><td>Loan Repayment:</td><td><input type="text" name="ln_rpmt" required></td></tr>
     	<tr><td>Loan date:</td><td><input type="date" name="ln_dt" required></td></tr>
     </select>

      </td></tr>
     <tr><td colspan="2"><input type ="submit" name="add" value="Add user"></td></tr>

</table>
</form>
<?php
include "includes/footer.php";
?>