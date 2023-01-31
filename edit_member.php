<?php
include "includes/header.php";

if(isset($_POST["sub"])) 
{
   $name=$_POST["fname"];# code...
   $dob=$_POST["dob"];
   $gender=$_POST["gender"];
   $address=$_POST["addr"];
   $email=$_POST["email"];
   $mobno = $_POST["mobno"];
   $user=$_POST["user"];
   $id = $_POST['id'];
   

        $query= mysqli_query($conn,"UPDATE members SET name='$name',dob='$dob',gender='$gender',address='$address',email='$email',mobno='$mobno',user='$user' WHERE id='$id'") or mysqli_error("Error in query!!");
        

    if($query) 
    {
     

     echo "<script>alert('Member updated successfull!!');


     location.href='members.php?pg=mem'</script>";

    

    }

    }
   
if(isset($_REQUEST["id"]))
{
  $qr = mysqli_query($conn,"SELECT * FROM members WHERE id=".$_REQUEST["id"]);
  $rw = mysqli_fetch_assoc($qr);
}


?>
<!--<marquee><h4>Register here </h4></marquee> -->

<marquee><h3>Edit Member</h3></marquee>
<br><br>
<form action="edit_member.php?pg=mem" method="post" enctype="multipart/form-data">

<input type="hidden" name="id" value="<?php echo $_REQUEST["id"];?>">

<table width="80%" border="0" cellspacing"0">
  <tr><td>Full name:</td><td><input type="text" value="<?php echo $rw ["name"];?>" name="fname" placeholder="Type First Input" required></td></tr>
  <tr><td>Date of birth:</td><td><input type="date" value="<?php echo $rw ["dob"];?>" name="dob" required></td></tr>
  <tr><td>Gender:</td><td><input type="radio" name="gender" <?php if ($rw["gender"]=="male") {
   echo "checked"; }?> value="male">Male | <input type="radio" name="gender" <?php if ($rw["gender"]=="female") { echo "checked";}?> value="female">Female</td></tr>
     <tr><td>Address:</td><td><textarea name="addr"> <?php echo $rw ["address"];?> </textarea></td></tr>
     <tr><td>Email:</td><td><input type="email" value="<?php echo $rw ["email"];?>" name="email" required></td></tr>
     <tr><td>Mobile no.:</td><td><input type="text" value="<?php echo $rw ["mobno"];?>" name="mobno"></td></tr>
      <tr><td>Username:</td><td><input type="text"  value="<?php echo $rw ["user"];?>" name="user" required?</td></tr>
     <tr><td colspan="2"><input type ="submit" name="sub" value="Edit Member"></td></tr>

</table>

</form>
<?php
include "includes/footer.php";
?>