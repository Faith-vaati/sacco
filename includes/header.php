<!DOCTYPE html>
<?php
session_start();
include "config.php";
if (isset($_REQUEST["pg"]))
{
$page = $_REQUEST["pg"];
}


if (!isset($_SESSION["ID"]) and $page!="lg" and $page!="hm" and $page!="ab" and $page!="rg") 
{
echo"<script>location.href='login.php?pg=lg';</script>"; # code...

}
?>
<html>
<head>
  <title>My Sacco - 
<?php
  if($page=="hm"){echo "Dashboard";}
   if($page=="ab"){echo "About";}
    if($page=="rg"){echo "Register";}
     if($page=="lg"){echo "Login";}
      if($page=="mem"){echo "Members";}
       if($page=="us"){echo "Users";}
        if($page=="pr"){echo "Profile";}
         if($page=="ln"){echo "Loans";}
          if($page=="sv"){echo "Savings";}
?>
  </title>

</head>
<body>
<center>
<h1>
<div style="width: 100%;background:gray;height: 50px;float: right;">
<?php
  if($page=="hm"){echo "Dashboard";}
   if($page=="ab"){echo "About";}
    if($page=="rg"){echo "Register";}
     if($page=="lg"){echo "Login";}
      if($page=="mem"){echo "Members";}
       if($page=="us"){echo "Users";}
        if($page=="pr"){echo "Profile";}
         if($page=="ln"){echo "Loans";}
          if($page=="sv"){echo "Savings";}
?>
  page
  </div>
</h1>

<?php

include "menu.php";
?>

<div style="height: 400px;background-color: grey;">
<div style="width:78%;height:350px;background-color: lightblue;border: 5px solid red;float: left;">