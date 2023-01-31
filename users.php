<?php
include "includes/header.php";

if(isset($_REQUEST['id'])) 
{


$del = mysqli_query($conn,"DELETE FROM users WHERE id=".$_REQUEST['id']);
if ($del) 
{
 

echo "<script>alert('user deleted successful!!');
location.href='users.php?pg=us';</script>";
}
}


?>
<strong><a href="add_user.php?pg=us">Add User</a></strong>
<table width="100%" border="1" cellspacing"0" cellpadding="1">
  <tr>
    <th>S/N</th><th>Name</th><th>Username</th><th>Email</th><th>level</th><th>Action</th>
    </tr>
    <?php

    $query = mysqli_query($conn,"SELECT * FROM users");
    $i=1;
    while ($row = mysqli_fetch_array($query)) 
    {
       ?>  
   <tr>
   <td><?php echo $i;?></td>
   <td><?php echo $row["name"];?></td>
   <td><?php echo $row["user"];?></td>
   <td><?php echo $row["email"];?></td>
   <td><?php echo $row["level"];?></td>
    <td><a href="edit_user.php?pg=us&id=<?php echo $row["id"]; ?>">Edit</a>|<a onclick="javascript: return confirm('are you sure you want to delete user!!')" href="?pg=us&id=<?php echo $row["id"]; ?>">Delete</a></td>
   </tr>
   <?php
   $i++;
     }
     ?>

</table>

<?php
include "includes/footer.php";
?>