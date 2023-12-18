<?php
    include("init.php");
    
    $no_of_classes=mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) FROM `class`"));
    $no_of_students=mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) FROM `students`"));
    // $no_of_result=mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) FROM `results`"));
?>
        
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/home.css">
    
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" type='text/css' href="css/manage.css">

    <style>

        .heading{
            font-size: 1rem;
        }
    </style>
    
    <title>SSRMS</title>
    <style>
        .main{
            border-radius: 10px;
            border-width: 5px;
            border-style: solid;
            padding: 20px;
            margin: 7% 20% 0 20%;
        }
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
</head>
<body>
        
<div class="title">
        <a href="dashboard.php"  style="color: white; text-decoration:none;"><?php
        include("session.php");
        echo $login_name."  id:".$login_id ?></a>
        <span class="heading">Admin </span>
        <a href="logout.php" style="color: white; text-decoration:none;"><span class="fa fa-sign-out"></span> Logout</a>
    </div>

    <div class="nav">
        <ul>
            <li>
                <a href="admin.php">Dashboard</a>
            </li>
            <li class="dropdown" onclick="toggleDisplay('1')">
                <a href="" class="dropbtn">Classes &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="1">
                    <a href="add_classes.php">Add Class</a>
                    <a href="manage_classes.php">Manage Class</a>
                </div>
            </li>
            <li class="dropdown" onclick="toggleDisplay('2')">
                <a href="#" class="dropbtn">Students &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="2">
                    <a href="add_students.php">Add Students</a>
                    <a href="manage_students.php">Manage Students</a>
                </div>
            </li>
            <li class="dropdown" onclick="toggleDisplay('3')">
                <a href="#" class="dropbtn">Teachers &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="3">
                    <!-- <a href="add_results.php">Add Results</a> -->
                    <a href="manage_teachers.php">Manage Teachers</a>
                </div>
            </li>
            <li class="dropdown" onclick="toggleDisplay('3')">
                <a href="#" class="dropbtn">Results &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="3">
                    <a href="add_results.php">Add Results</a>
                    <a href="manage_results.php">Manage Results</a>
                </div>
            </li>
            
        </ul>
    </div>

    <div class="main">
        <?php
            echo '<p>Available Classes:'.$no_of_classes[0].'</p>';
            echo '<p>Registered Students:'.$no_of_students[0].'</p>';            
        ?>
    </div>
    <div class="main">
    <fieldset>
                    <legend class="heading">New Registration</legend>
                    <?php
            include('init.php');
            // include('session.php');
            // $db = mysqli_select_db($conn,'sms');

            $sql = "SELECT * FROM `teachers` WHERE `status` = 'Pending'";
            $result = mysqli_query($conn, $sql);


                if (mysqli_num_rows($result) > 0) {
                    echo "<table>
                     <tr>
                     <th>#</th>
                     <th>NAME</th>
                     <th>USERNAME</th>
                     <th>STATUS</th>
                     </tr>";
     
                     $cnt=1;
                     while($row = mysqli_fetch_array($result))
     
                       {
                       echo "<tr>";
                       echo "<td>$cnt</td>";
                       echo "<td>" . $row['name'] . "</td>";
                       echo "<td>" . $row['username'] . "</td>";         
                       echo "<td>" . $row['status'] . "</td>";         

                       echo "</tr>";
     
                      $cnt++; }
     
                     echo "</table>";
                 } else {
                     echo "0 results";
                 }
                 ?>
                </fieldset>
    </div>

    <div class="main">
    <fieldset>
                    <legend class="heading">Set Id </legend>
                    <?php
            include('init.php');
            // include('session.php');
            // $db = mysqli_select_db($conn,'sms');

            $sql = "SELECT * FROM `teachers` WHERE `status` = 'Pending'";
            $result = mysqli_query($conn, $sql);
 
$row = mysqli_fetch_array($result);
            
echo"
                    <form  method='post' name='login' action='$_SERVER[PHP_SELF]'; >
              
                    <input type='text' name='userid' placeholder='Username'>
                    <input type='text' name='id' placeholder='ID' autocomplete='off'>
                    <input type='submit' value='Confirm'>
                    
            </form>";
                 
                 ?>
                </fieldset>
    </div>
    
</body>
</html>

<?php
//    include('session.php');
if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $uname=$_POST["userid"];
        $id = $_POST["id"];        

        $sql="UPDATE `teachers` SET `id`='$id',`status` = 'Confirm' WHERE `username` = '$uname'";
        $result=mysqli_query($conn,$sql);
        header("Location: ".$_SERVER['PHP_SELF']);
    }
?>