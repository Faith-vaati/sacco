<?php
include"includes/header.php";

if(isset($_POST["sub"]))//recording of data in the db
{
  $name=$_POST["fname"];
    $email=$_POST["email"];
    $username=$_POST["user"];
    $password=md5($_POST["pass"]);//encryption ya passwords
    $con_pass=md5($_POST["con_pass"]);
  $level=$_POST["ty_id"];

    //the query hapa chini ni ya kucheck kama user anaexist kwa db ama haexist akiexist anapewa messo
    $result=mysqli_query($conn,"SELECT * FROM users WHERE email='$email'")or mysqli_error("Error in query");

    $user_check=mysqli_num_rows($result);

    if($user_check==0)
    {
        //submit action here
        if($password==$con_pass)//inacheck whether password zinafanana
        {
          //submit action

          $query=mysqli_query($conn,"INSERT INTO users VALUES(0,'$name','$username','$email','$password','$level')")or
      mysqli_error("Error in query!!");

          if($query)
          {


            echo "<script>alert('Member registration successful!!!');
                location.href='users.php?pg=us';
            </script>";


          }
        }
        else
        {
          echo"<script>alert('Password and confirm password not matching!!');</script>";
        }
    }
    else
    {
      echo"<script>alert('The member already exist!!');</script>";
    }
}


?>
<marquee><h3>Add User</h3></marquee>
<br><br>

<form action="add_user.php?pg=us" method="Post" enctype="multipart/form-data">
<table width="80%" border="0" cellspaing="0">

<tr><td>Full Name:</td><td><input type="text" name="fname" required></td></tr>
<tr><td>Username:</td><td><input type="text " name="user" required></td></tr>
<tr><td>Email:</td><td><input type="email " name="email" required></td></tr>
<tr><td>Password:</td><td><input type="password" name="pass" required></td></tr>
<tr><td>Confirm password:</td><td><input type="password" name="con_pass" required></td></tr>
<tr><td>User type:</td><td>
<select required name="ty_id">
<option value="">...Select Type...</option>
<?php
$query=mysqli_query($conn,"select * from user_type") or mysqli_error("Error in query!!");
while($row=mysqli_fetch_array($query))
{
  echo"<option value='".$row["level"]."'>".$row["name"]."</option>";
}
//$query=mysql_query("select*from user_type")for people using mysql

?>
</select>
</td></tr>
<tr><td colspan="3"><input type="submit" name="sub" value="Add User"></td></tr>
</table>
<?php
include "includes/footer.php";
?>
