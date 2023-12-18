<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSRMS</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="./font-awesome-4.7.0/css/font-awesome.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body>
    <div class="title">
        <span>Simple Student Result Management System</span>
    </div>
    
    <div class="main">
        <div class="login">
            <form action="" method="post" name="login">
                <fieldset>
                    <legend class="heading">Teacher's Login</legend>
                    <input type="text" name="userid" placeholder="Username" autocomplete="off">
                    <input type="password" name="password" placeholder="Password" autocomplete="off">
                    <input type="submit" value="Login">
                    <center><sub><a style="color:white;" href="teacher_reg.php">New Registration</a>&nbsp;&nbsp;&nbsp;<a style="color:white;text-decoration:none;" href="admin_login.php">Admin Login</a></sub></center>
                </fieldset>
            </form>    
            

        </div>
        <div class="search">
            <form action="./student.php" method="get">
                <fieldset>
                    <legend class="heading">Student's Section</legend>

                    <?php
                        include('init.php');

                        $class_result=mysqli_query($conn,"SELECT `name` FROM `class`");
                            echo '<select name="class">';
                            echo '<option selected disabled>--Select Class--</option>';
                        while($row = mysqli_fetch_array($class_result)){
                            $display=$row['name'];
                            echo '<option value="'.$display.'">'.$display.'</option>';
                        }
                        echo'</select>'
                    ?>

                    <input type="text" name="rn" placeholder="Roll Number">
                    <input type="submit" value="Get Result">
                </fieldset>
            </form>
        </div>
    </div>

</body>
</html>

<?php
    include("init.php");
    session_start();

    if (isset($_POST["userid"],$_POST["password"]))
    {
        $username=$_POST["userid"];
        $password=$_POST["password"];
        $password = $_POST["password"];
        $sql = "SELECT name FROM teachers WHERE username='$username' AND `password` = '$password' AND `status` = 'Confirm'";
        $result=mysqli_query($conn,$sql);

        // $row=mysqli_fetch_array($result);
        $count=mysqli_num_rows($result);
        
        if($count==1) {
            $_SESSION['login_user']=$username;
            $_SESSION['user'] = "teacher";
            header("Location: dashboard.php");
        }else {
            echo '<script language="javascript">';
            echo 'alert("Invalid Username or Password")';
            echo '</script>';
        }
        
    }
?>

