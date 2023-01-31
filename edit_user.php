<?php
include"includes/header.php";

if(isset($_POST["sub"]))//recording of data in the db
{
  $name=$_POST["fname"];
    $email=$_POST["email"];
    $username=$_POST["user"];
    // $password=md5($_POST["pass"]);//encryption your passwords
    // $con_pass=md5($_POST["con_pass"]);
  $type=$_POST["ty_id"];
  $id=$_POST["us_id"];

    //the query hapa chini ni ya kucheck kama user anaexist kwa db ama haexist akiexist anapewa messo
    
           $query= mysqli_query($conn,"UPDATE users SET name='$name',user='$username',email='$email',level='$type' WHERE id='$id'") or mysqli_error("Error in query!!");
          if($query)
          {


            echo "<script> alert ('User updated successful!!!');
                location.href='users.php?pg=us';
            </script>";


          }
       
}

if(isset($_REQUEST["id"]))
{
  $qr = mysqli_query($conn,"SELECT * FROM users WHERE id=".$_REQUEST["id"]);
  $rw = mysqli_fetch_assoc($qr);
}

?>
<marquee><h3>Add User</h3></marquee>
<br><br>
<form action="edit_user.php?pg=us" method="Post" enctype="multipart/form-data">
<input type="hidden" name="us_id" value="<?php echo $_REQUEST['id']; ?>">
<table width="80%"border="0"cellspaing="0">

<tr><td>Full Name:</td><td><input type="text" value="<?php echo $rw["name"];?>" name="fname"required></td></tr>
<tr><td>Username:</td><td><input type="text" value="<?php echo $rw["user"];?>" name="user"required></td></tr>
<tr><td>Email:</td><td><input type="email" value="<?php echo $rw["email"];?>" name="email"required></td></tr>

<tr><td>User type:</td><td>
<select required name="ty_id">
<option value="">...Select Type...</option>
<?php
$query=mysqli_query($conn,"select*from user_type") or mysqli_error("Error in query!!");
while($row=mysqli_fetch_array($query))
{
  echo "<option value='".$row["level"]."'";
if($rw['level']==$row['level']){echo"selected";}
 echo ">".$row["name"]."</option>";
}

//$query=mysql_query("select*from user_type")for people using mysql

?>

</select>
</td></tr>
<tr><td colspan="3"><input type="submit" name="sub" value="Edit User"></td></tr>
</table>
<?php
include "includes/footer.php";
?>
