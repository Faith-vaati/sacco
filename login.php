<?php
include "includes/header.php";

if(isset($_POST["sub"]))
{
	$user = $_POST["user"];
	$pass=md5($_POST["pass"]);

	$query=mysqli_query($conn,"SELECT * FROM users WHERE user='$user' and password='$pass'");

	$result = mysqli_num_rows($query);
	if($result>0){
		$row =mysqli_fetch_assoc($query);
		$_SESSION["ID"] = $row["id"];
		$_SESSION["NAME"] = $row["name"];
		$_SESSION["USER"] = $row["username"];
		$_SESSION["EMAIL"] = $row["email"];
		$_SESSION["TYPE_ID"] = $row["level"];

		echo "<script>alert('Login successful!!');
		location.href='index.php?pg=hm';</script>";

	}
	else{
		echo "<script>alert('Login failed!!');</script>";
	}
}
?>
   <marquee><h4>Login Here</h4></marquee> 
   
<form action="login.php?pg=lg" method="post" enctype="multipart/form-data">

<table width="80%" border="0" cellspacing"0">
<tr><td>Username:</td><td><input type="text" name="user" placeholder="Enter username" required></td></tr>
 <tr><td>Password:</td><td><input type="password" name="pass"></td></tr>
 <tr><td colspan="2"><input type="submit" name="sub" value="Login"></td></tr>

</table>
<p><a href="">forgot password?</a> </p>
</form>

<?php
include "includes/footer.php";
?>