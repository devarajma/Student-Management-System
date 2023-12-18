<!-- p1=first;p2=second;p3=third;p4=forth;p5=fifth; -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/home.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="./css/form.css">
    <title>SSRMS</title>
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
                    <a href='manage_results.php'>Manage Results</a>
                </div>
            </li>
        </ul>
    </div>";
    }else{

        echo"
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
                    <a href='manage_classes.php'>Manage Class</a>
                </div>
            </li>
            <li class='dropdown' onclick='toggleDisplay('2')'>
                <a href='#' class='dropbtn'>Students &nbsp
                    <span class='fa fa-angle-down'></span>
                </a>
                <div class='dropdown-content' id='2'>
                    <!-- <a href='add_students.php'>Add Students</a> -->
                    <a href='manage_students.php'>Manage Students</a>
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
        <form action="" method="post">
            <fieldset>
                <legend>Enter Marks</legend>
                <form method="post">
                    <?php
                    include("init.php");
                    // echo $login_name;
                    echo '<select name="class_name">';
                    echo '<option selected disabled>Select Class</option>';
                    $sql = "SELECT `name` FROM `class`";
                    // $result = $conn->query($sql);
                    $result = mysqli_query($conn, $sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $sem = $row['name'];
                            echo "<option value='" . $sem . "'>" . $sem . "</option>";
                        }
                    } else {
                        echo "no result";
                    }
                    echo '</select>';
                    ?>
                    <input type="submit" name="form1" value="Select">
                </form>

                <?php

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (isset($_POST["form1"])) {
                        $class_name = $_POST['class_name'];

                        echo $class_name;
                        $_SESSION['sub'] = $class_name;

                        echo '<select name="stud_name">';
                        echo '<option selected disabled>Select Student</option>';

                        $sql = "SELECT `name` FROM `students` WHERE `class_name` = '$class_name'";
                        $result = mysqli_query($conn, $sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $sname = $row['name'];
                                echo "<option value='" . $sname . "'>" . $sname . "</option>";
                            }
                        } else {
                            echo "no result";
                        }
                    }
                }
                ?>
                <input type="text" name="p1" id="" placeholder="Internal 1 - Marks (40)">
                <input type="text" name="p2" id="" placeholder="Internal 2 - Marks (40)">
                <input type="text" name="p3" id="" placeholder="Assignment - Marks (05)">
                <input type="text" name="p4" id="" placeholder="Attendance - Percentage (100)">
                <input type="submit" name="form2" value="Generate">
            </fieldset>
        </form>
    </div>
</body>

</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["form2"])) {
        $display = $_POST['stud_name'];

        $m1 = (int) $_POST['p1'];
        $p1 = ($m1 / 40) * 5;

        $m2 = (int) $_POST['p2'];
        $p2 = ($m2 / 40) * 5;

        $m3 = (int) $_POST['p3'];
        $p3 = ($m3 / 5) * 5;

        $m4 = (int) $_POST['p4'];
        $p4 = ($m4 / 100) * 5;

        $marks = $p1 + $p2 + $p3 + $p4;

        $sub = $_SESSION['sub'];

        $sql_t = "SELECT `id` FROM subjects WHERE `semester` = '$sub' AND `teachers` = '$login_name'";
        $res_id = mysqli_query($conn, $sql_t);
        $row = mysqli_fetch_assoc($res_id);
        $sub_id = $row['id'];
        $sid = $sub_id % 10;

        echo $sid."___".$display."____".$marks;
        $sql1 = "SELECT sub1,sub2,sub3,sub4,sub5,tot FROM students WHERE `name`='$display'";

        if ($sid == '1') {
            $sql = "UPDATE `students` SET `sub1`='$marks' WHERE `name` = '$display'";
            $res = mysqli_query($conn, $sql);
        } else if ($sid == '2') {
            $sql = "UPDATE `students` SET `sub2`='$marks' WHERE `name` = '$display'";
            $res = mysqli_query($conn, $sql);
        } else if ($sid == '3') {
            $sql = "UPDATE `students` SET `sub3`='$marks' WHERE `name` = '$display'";
            $res = mysqli_query($conn, $sql);
        } else if ($sid == '4') {
            $sql = "UPDATE `students` SET `sub4`='$marks' WHERE `name` = '$display'";
            $res = mysqli_query($conn, $sql);
        } else if ($sid == '5') {
            $sql = "UPDATE `students` SET `sub5`='$marks' WHERE `name` = '$display'";
            $res = mysqli_query($conn, $sql);
        }else{
            echo"no marks";
        }

        $sql2 = "SELECT sub1,sub2,sub3,sub4,sub5,tot,`grade` FROM students WHERE `name`='$display'";
        $res1 = mysqli_query($conn, $sql2);
        if ($res1->num_rows > 0) {
            while ($row = $res1->fetch_assoc()) {
                $total = (float) $row['sub1'] + (float) $row['sub2'] + (float) $row['sub3'] + (float) $row['sub4'] + (float) $row['sub5'];
                // echo $total;
            }
            if ($total >= 95) {
                $grade = "S";
            } elseif ($total >= 90) {
                $grade = "A+";
            } elseif ($total >= 85) {
                $grade = "A";
            } elseif ($total >= 80) {
                $grade = "B+";
            } elseif ($total >= 75) {
                $grade = "B";
            } elseif ($total >= 70) {
                $grade = "C+";
            } elseif ($total >= 65) {
                $grade = "C";
            } elseif ($total >= 60) {
                $grade = "D+";
            } elseif ($total >= 55) {
                $grade = "D";
            } else {
                $grade = "Failed";
            }
            $sql = "UPDATE `students` SET `tot`='$total',`grade`='$grade' WHERE `name` = '$display'";
            $res = mysqli_query($conn, $sql);

        }

        if ($res) {
            echo '<script language="javascript">';
            echo 'alert("Success!!")';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Invalid Details")';
            echo '</script>';
        }
    }
}
?>