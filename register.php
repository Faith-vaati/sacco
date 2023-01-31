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
   $pro_photo=$_FILES["photo"]["name"];
  // $photo_size=$_FILES[""][""]//restricting the size
   $user=$_POST["user"];
   $password=md5($_POST["pass"]);
   $confirm_password=md5($_POST["conpass"]);
   $date=date("d-m=Y");


$result = mysqli_query($conn,"SELECT * FROM members  WHERE email='$email'") or mysqli_error("Error in query");
$member_check = mysqli_num_rows($result);
//exit;
if($member_check==0) {
   //submit action here # code...
    if($password==$confirm_password) 
    {
     //submit action   # code...
        $photo_path = "profile_photos/";
        $image = $photo_path.$pro_photo;


        $query= mysqli_query($conn,"INSERT INTO members VALUES(0,'$name','$dob','$gender','$address','$email','$mobno','$image','$user','$password','$date')") or mysqli_error("Error in query!!");
        

    if($query) 
    {
     move_uploaded_file($_FILES["photo"]["tmp_name"],$image);   # code...

      $query= mysqli_query($conn,"INSERT INTO users VALUES('NULL','$name','$user','$email','$password',2)") or mysqli_error("Error in query!!");
   // exit;

     echo "<script>alert('Member registration successfull!!');


     location.href='login.php?pg=lg'</script>";

    

    }

    }
    else
    {
  echo "<script>alert('Password and Confirm password are not matching!!');</script>";
    }
}
else{
    echo "<script>alert('The member already exists!!');</script>";
}

  }
?>
<!--<marquee><h4>Register here </h4></marquee> -->


<form action="register.php?pg=rg" method="post" enctype="multipart/form-data">

<table width="80%" border="0" cellspacing"0">
  <tr><td>Full name:</td><td><input type="text" name="fname" placeholder="Type First Input" required></td></tr>
  <tr><td>Date of birth:</td><td><input type="date" name="dob" required></td></tr>
  <tr><td>Gender:</td><td><input type="radio" name="gender" value="male">Male | <input type="radio" name="gender" value="female">Female</td></tr>
     <tr><td>Address:</td><td><textarea name="addr"></textarea></td></tr>
     <tr><td>Email:</td><td><input type="email" name="email" required></td></tr>
     <tr><td>Mobile no.:</td><td><input type="text" name="mobno"></td></tr>
     <tr><td>Profile photo:</td><td><input type="file" name="photo"?</td></tr>
      <tr><td>Username:</td><td><input type="text" name="user" required?</td></tr>
     <tr><td>Password:</td><td><input type="password" name="pass"></td></tr>
     <tr><td>Confirm password:</td><td><input type="password" name="conpass"></td></tr>
     <tr><td colspan="2"><input type ="submit" name="sub" value="Register"></td></tr>

</table>

</form>
<?php
include "includes/footer.php";
?>