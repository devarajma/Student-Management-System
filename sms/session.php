<?php
   include('init.php');
   session_start();
   $db = mysqli_select_db($conn,'sms');
   $user_check = $_SESSION['login_user'];

   $user = $_SESSION['user'];

   $ses_sql = mysqli_query($conn,"SELECT `name`,`id` FROM `teachers` WHERE `username`= '$user_check'");
   $row = mysqli_fetch_array($ses_sql);

   if($user == 'admin'){
      $ses_sql_ad = mysqli_query($conn,"SELECT `name`,`id` FROM `admin` WHERE `username`= '$user_check'");
      $row = mysqli_fetch_array($ses_sql_ad);
   }
  

  


   
   $login_name = $row['name'];
   $login_id = $row['id'];

   if(!isset($_SESSION['login_user'])){
      header("Location:index.php");
   }
?>