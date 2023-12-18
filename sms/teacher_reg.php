<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSRMS</title>
    <!-- <link rel="stylesheet" href="css/login.css"> -->
    <link rel="stylesheet" href="./font-awesome-4.7.0/css/font-awesome.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<style>
body {
  margin: 0;
  background-color: #222629;
  color: white;
  font-family: "Roboto", sans-serif;
}

.title {
  font-size: 3em;
  text-align: center;
  margin-top: 10px;
}

.main {
  /* display: grid;
  grid-template-rows: 80vh;
  grid-template-columns: 1fr 1fr; */
  padding-left: 300px;
  padding-right: 300px;
  padding-top: 100px;


  align-items: center;
}

.login,
.search {
  padding: 20px;
}

/* form */
input,
select {
  width: 100%;
  padding: 12px 20px;
  margin: 10px 0;
  box-sizing: border-box;
  display: block;
}

input[type="text"],
input[type="password"],
select {
  background-color: #474b4f;
  color: white;
  border: none;
  font-size: 100%;
  letter-spacing: 0.2em;
}

input[type="submit"] {
  background-color: #245d57;
  color: white;
  border: none;
  transition-duration: 0.4s;
  cursor: pointer;
  font-size: 16px;
}

input[type="submit"]:hover {
  background-color: #2f515f;
  color: white;
}

fieldset {
  font-size: 20px;
  border-radius: 10px;
  border-width: 5px;
  border-style: solid;
}

</style>

<body>
    <div class="title">
        <span>Simple Student Result Management System</span>
    </div>

    <div class="main">
        <div class="login" style="">
            <form action="" method="post" name="login">
                <fieldset>
                    <legend class="heading">Teacher's Signup</legend>
                    <input type="text" name="name" placeholder="Name" autocomplete="off">
                    <input type="text" name="userid" placeholder="Username" autocomplete="off">
                    <input type="password" name="password" placeholder="Password" autocomplete="off">
                    <input type="submit" value="Signup">
                    <center><sub><a style="color:white;" href="index.php">Already Registered</a></sub></center>
                </fieldset>
            </form>    
        </div>
        
    </div>

</body>
</html>

<?php
    include("init.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $username=$_POST["userid"];
        $password=$_POST["password"];
        $name = $_POST["name"];
        $sql = "SELECT name FROM teachers WHERE username='$username' AND `password` = '$password'";

        

        $sql="INSERT INTO `teachers`(`name`, `id`, `username`, `password`, `status`) VALUES ('$name','0','$username','$password','Pending')";
        $result=mysqli_query($conn,$sql);
        // $row=mysqli_fetch_array($result);
        echo "Registered Successfully";
        $count=mysqli_num_rows($result);
        
        if($count!=1) {
            echo '<script language="javascript">';
            echo 'alert("Registered Successfully")';
            echo '</script>';
            // header("Location: dashboard.php");
        }else {
            echo '<script language="javascript">';
            echo 'alert("Invalid Username or Password")';
            echo '</script>';
        }
        
    }
?>

