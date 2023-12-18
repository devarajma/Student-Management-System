<?php
include("init.php");

$no_of_classes = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM `class`"));
$no_of_students = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM `students`"));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/home.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="css/login.css">
    <title>SSRMS</title>
    <style>
        .main {
            border-radius: 10px;
            border-width: 5px;
            border-style: solid;
            padding: 20px;
            margin: 7% 20% 0 20%;
        }
    </style>
</head>

<body>

    <div class="title">
        <a href="#" style="color: white; text-decoration:none;">
            <?php
           
             ?>
        </a>
        <span class="heading">Admin SignUp</span>
        </a>
    </div>

    <div class="nav">
        <ul>
            <li>
                <a href="dashboard.php">Dashboard</a>
            </li>
            <li class="#" onclick="toggleDisplay('1')">
                <a href="" class="dropbtn">Classes &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="1">
                    <a href="#">Add Class</a>
                    <a href="#">Manage Class</a>
                </div>
            </li>
            <li class="dropdown" onclick="toggleDisplay('2')">
                <a href="#" class="dropbtn">Students &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="2">
                    <a href="#">Add Students</a>
                    <a href="#">Manage Students</a>
                </div>
            </li>
            <li class="dropdown" onclick="toggleDisplay('3')">
                <a href="#" class="dropbtn">Results &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="3">
                    <a href="#">Add Results</a>
                    <a href="#">Manage Results</a>
                </div>
            </li>
        </ul>
    </div>
    <form method="post" name="login">
        <fieldset>
            <legend class="heading">Admin's Login</legend>
            <input type="text" name="userid" placeholder="Username" autocomplete="off">
            <input type="password" name="password" placeholder="Password" autocomplete="off">
            <input type="submit" value="Login">
        </fieldset>
    </form>
</body>

</html>

<?php
    include("init.php");
    session_start();

    if (isset($_POST["userid"],$_POST["password"]))
    {
        $username=$_POST["userid"];
        $password=$_POST["password"];
        $sql = "SELECT `name` FROM `admin` WHERE username='$username' AND `password` = '$password'";
        $result=mysqli_query($conn,$sql);
        $count=mysqli_num_rows($result);
        
        if($count==1) {
            $_SESSION['login_user']=$username;
            $_SESSION['user'] = "admin";
            header("Location: admin.php");
        }else {
            echo '<script language="javascript">';
            echo 'alert("Invalid Username or Password")';
            echo '</script>';
        }
        
    }
?>