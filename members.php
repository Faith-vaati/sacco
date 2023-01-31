<?php
include "includes/header.php";


if(isset($_REQUEST['id'])) 
{

$res = mysqli_query($conn,"SELECT image,email FROM members WHERE id=".$_REQUEST['id']);
$rw = mysqli_fetch_assoc($res);
$photo=$rw['image'];
//saving the value of profile pic to the $photo variable
$email=$rw['email'];

$del = mysqli_query($conn,"DELETE FROM members WHERE id=".$_REQUEST['id']);
if ($del) 
{
 unlink($photo); # code...
mysqli_query($conn,"DELETE FROM users WHERE email='$email'");
echo "<script>alert('member delelted successful!!');
location.href='members.php?pg=mem';</script>";
}
}
?>
<marquee><h4>Add members</h4></marquee> 

<form action="members.php?pg=mem" method="post" enctype="multipart/form-data">
  <?php if ($_SESSION["TYPE_ID"]==1){?>
<strong><a href="add_member.php?pg=mem">Add member</a></strong>
<?php }?>
<table width="100%" border="1" cellspacing="0" cellpadding="1">
	<tr>
    <th>S/N</th><th>Name</th><th>Date Of Birth</th><th>Gender</th><th>Address</th><th>Email</th><th>Mobile No.</th><th>Username</th><th>Date Registered</th><th>Profile Pic</th><th>Action</th>
    </tr>
    <?php

    $query = mysqli_query($conn,"SELECT * FROM members");
    $i=1;
    while ($row = mysqli_fetch_array($query)) 
    {
       ?>  
   <tr>
   <td><?php echo $i;?></td>
   <td><?php echo $row["name"];?></td>
   <td><?php echo $row["dob"];?></td>
   <td><?php echo $row["gender"];?></td>
   <td><?php echo $row["address"];?></td>
   <td><?php echo $row["email"];?></td>
   <td><?php echo $row["mobno"];?></td>
   <td><?php echo $row["user"];?></td>
   <td><?php echo $row["date"];?></td>
   <td><img width="50px" src="<?php echo $row["image"];?>"></td>
   <td><a href="?id=<?php echo $row["id"]; ?>">View</a> 
  
    <?php if ($_SESSION["EMAIL"]==$row["email"] or $_SESSION["TYPE_ID"]==1){
       ?> 

      |<a href="edit_member.php?pg=mem&id=<?php echo $row["id"]; ?>">Edit</a>|
      <?php if ($_SESSION["TYPE_ID"]==1){ ?>
        <a onclick="javascript: return confirm('are you sure you want to delete member!!')" href="?pg=mem&id=<?php echo $row["id"]; ?>">Delete</a> 
         </td>
         <?php }} ?>
   </tr>
   <?php
   $i++;
     }
     ?>

</table>

</form>

<?php
include "includes/footer.php";
?>