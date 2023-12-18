<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/home.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" type='text/css' href="css/manage.css">
    <link rel="stylesheet" href="./css/form.css">
    <title>SSRMS</title>
    <style>
        fieldset {
            font-size: 20px;
            border-radius: 10px;
            border-width: 5px;
            border-style: solid;
            padding: 20px;
            margin: 0;
        }
    </style>
</head>

<body>

    <div class="title">
        <a href="dashboard.php" style="color: white; text-decoration:none;">
            <?php
            include("session.php");
            echo $login_name . "  id:" . $login_id ?>
        </a>
        <span class="heading">Results Section</span>
        <a href="logout.php" style="color: white; text-decoration:none;"><span class="fa fa-sign-out"></span> Logout</a>
    </div>

    <?php
    if ($user == "admin") {
        echo "
    <div class='nav'>
        <ul>
            <li>
                <a href='admin.php'>Dashboard</a>
            </li>
            <li class='dropdown' onclick='toggleDisplay('1')'>
                <a href='' class='dropbtn'>Classes &nbsp
                    <span class='fa fa-angle-down'></span>
                </a>
                <div class='dropdown-content' id='1'>
                    <a href='add_classes.php'>Add Class</a>
                    <a href='manage_classes.php'>Manage Class</a>
                </div>
            </li>
            <li class='dropdown' onclick='toggleDisplay('2')'>
                <a href='#' class='dropbtn'>Students &nbsp
                    <span class='fa fa-angle-down'></span>
                </a>
                <div class='dropdown-content' id='2'>
                    <a href='add_students.php'>Add Students</a>
                    <a href='manage_students.php'>Manage Students</a>
                </div>
            </li>
            <li class='dropdown' onclick='toggleDisplay('3')'>
            <a href='#' class='dropbtn'>Teachers &nbsp
                <span class='fa fa-angle-down'></span>
            </a>
            <div class='dropdown-content' id='3'>
                <!-- <a href='add_results.php'>Add Results</a> -->
                <a href='manage_teachers.php'>Manage Teachers</a>
            </div>
        </li>
            <li class='dropdown' onclick='toggleDisplay('3')'>
                <a href='#' class='dropbtn'>Results &nbsp
                    <span class='fa fa-angle-down'></span>
                </a>
                <div class='dropdown-content' id='3'>
                    <a href='add_results.php'>Add Results</a>
                    <a href='manage_results.php'>View Results</a>
                </div>
            </li>
        </ul>
    </div>";
    } else {

        echo "
        <div class='nav'>
        <ul>
            <li>
                <a href='dashboard.php'>Dashboard</a>
            </li>
            <li class='dropdown' onclick='toggleDisplay('1')'>
                <a href='' class='dropbtn'>Classes &nbsp
                    <span class='fa fa-angle-down'></span>
                </a>
                <div class='dropdown-content' id='1'>
                    <!-- <a href='add_classes.php'>Add Class</a> -->
                    <a href='manage_classes.php'>View Class</a>
                </div>
            </li>
            <li class='dropdown' onclick='toggleDisplay('2')'>
                <a href='#' class='dropbtn'>Students &nbsp
                    <span class='fa fa-angle-down'></span>
                </a>
                <div class='dropdown-content' id='2'>
                    <!-- <a href='add_students.php'>Add Students</a> -->
                    <a href='manage_students.php'>View Students</a>
                </div>
            </li>
            <li class='dropdown' onclick='toggleDisplay('3')'>
                <a href='#' class='dropbtn'>Results &nbsp
                    <span class='fa fa-angle-down'></span>
                </a>
                <div class='dropdown-content' id='3'>
                    <a href='add_results.php'>Add Results</a>
                    <a href='manage_results.php'>Manage Results</a>
                </div>
            </li>
        </ul>
    </div>";
    }

    ?>

    <div class="main">







        <?php
        include('init.php');
        include('session.php');
        $db = mysqli_select_db($conn, 'sms');

        // $sql = "SELECT `name`, `id` FROM `class`";
        
        // $result = mysqli_query($conn, $sql);

        if ($user == "admin") {
            $sql = "SELECT `name`, `id` FROM `class`";
            $result = mysqli_query($conn, $sql);
    
            if (mysqli_num_rows($result) > 0) {
                echo "<table>
                     <caption>Manage Classes</caption>
                     <tr>
                     <th>#</th>
                     <th>NAME</th>
                     <th>ACTION</th>
                     </tr>";

                $cnt = 1;
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>$cnt</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td><a href='delete-class.php?id=" . $row['id'] . "' style='color:#F66; text-decoration:none;'><span class='fa fa-trash'></span> Remove</a></td>";

                    echo "</tr>";

                    $cnt++;
                }

                echo "</table>";
            } else {
                echo "0 results";
            }
        } else {
            $sql = "SELECT `semester` FROM `subjects` WHERE `teachers` = '$login_name'";
            $result = mysqli_query($conn, $sql);
    
            if (mysqli_num_rows($result) > 0) {
                echo "<table>
                     <caption>Manage Classes</caption>
                     <tr>
                     <th>#</th>
                     <th>SEMESTER</th>
                    
                     </tr>";

                $cnt = 1;
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>$cnt</td>";
                    echo "<td>" . $row['semester'] . "</td>";
                    //    echo "<td><a href='delete-class.php?id=".$row['id']."' style='color:#F66; text-decoration:none;'><span class='fa fa-trash'></span> Remove</a></td>";
        
                    echo "</tr>";

                    $cnt++;
                }

                echo "</table>";
            } else {
                echo "0 results";
            }
        }

        ?>
        <?php
        if ($user == "admin") {
            ?>
            <div class="main">
                <div class="login">
                    <form action="" method="post" name="login">
                        <fieldset>
                            <legend class="heading" style="font-size:1.5rem;">Assign Teacher's </legend>
                            <!-- <input type="text" name="sem" placeholder="Semester" autocomplete="off"> -->
                            <form method='post'>
                            <?php
                            
                            echo '<select name="class_name">';
                            echo '<option selected disabled>Select Semester</option>';
                            $sql = "SELECT `name` FROM `class`";
                            // $result = $conn->query($sql);
                            $result = mysqli_query($conn, $sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $sem = $row['name'];
                                    echo "<option value='" . $sem . "'>" . $sem . "</option>";
                                }
                            }
                            echo "<input type='submit' value='Select'>";
                            ?>
                            </form>
                            <?php
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                if (isset($_POST['class_name'])) {
                                    $sem = $_POST["class_name"];
                                    $_SESSION['sem'] = $sem;
                                }
                            }
                            $seme = $_SESSION['sem'];

                            ?>
                           

                            <input type="text" name="userid" placeholder="Username" autocomplete="off">
                            <!-- <input type="text" name="sub" placeholder="Suject" autocomplete="off"> -->
                            
                            <?php
                            echo '<select name="class_sub">';
                            echo '<option selected disabled>Select Subject</option>';


                            $sql = "SELECT `subject` FROM `subjects` WHERE `semester`= '$seme'";
                            // $result = $conn->query($sql);
                            $result = mysqli_query($conn, $sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $sub = $row['subject'];
                                    echo "<option value='" . $sub . "'>" . $sub . "</option>";
                                }
                            }
                            ?>
                            <input type="submit" value="Assign">
                        </fieldset>
                    </form>
                </div>
            </div>
            <?php
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["userid"];
            // $sem = $_POST["sem"];
            // $sub = $_POST["sub"];
            $sub = $_POST["class_sub"];


            // $sql = "SELECT name FROM teachers WHERE username='$username' AND `password` = '$password'";
            $sql1 = "UPDATE `subjects` SET `teachers` = '' WHERE `semester` = '$seme' AND `teachers` = '$username'";
            $result1 = mysqli_query($conn, $sql1);
            // while ($row = $result->fetch_assoc()) {
            //     $sub = $row['subject'];
            // }

            $sql = "UPDATE `subjects` SET `teachers` = '$username' WHERE `semester` = '$seme' AND `subject`='$sub'";
            $result = mysqli_query($conn, $sql);
        }
        ?>

    </div>

</body>

</html>