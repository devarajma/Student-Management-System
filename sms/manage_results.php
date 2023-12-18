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

    <!-- <link rel="stylesheet" type='text/css' href="css/manage.css"> -->
    <style>
        /*table*/
        /* .main {
  display: grid;
  justify-content: center;
  padding: 30px;
} */
        .main table {
            margin: 50px auto;
        }

        .main table,
        th,
        td {
            border-collapse: collapse;
            text-align: left;
            table-layout: fixed;
            padding: 8px 30px;
            width: 70%;
        }

        .main th {
            color: #87ceeb;
        }

        .main tr:hover {
            background-color: #474b4f;
        }

        th,
        td {
            border-bottom: 1px solid #7b7b7b;
        }
    </style>
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
                    <a href='manage_results.php'>View Results</a>
                </div>
            </li>
        </ul>
    </div>";
    }

    ?>



    <div class="main">


        <?php
        // if ($user == "admin") {
            ?>
            <!-- <form method='post'>
                <fieldset>
                    <legend>Delete Result</legend>
                    <?php
                    // $class_result = mysqli_query($conn, 'SELECT `name` FROM `class`');
                    // echo '<select name= class_name>';
                    // echo '<option selected disabled>Select Class</option>';
                    // while ($row = mysqli_fetch_array($class_result)) {
                    //     $display = $row['name'];
                    //     echo '<option value=' . $display . '>' . $display . '</option>';
                    // }
                    // echo '</select>';
                        ?>
                    <input type='text' name='rno' placeholder='Roll No'>
                    <input type='submit' name='form2' value='Delete'>
                </fieldset>
            </form> -->
            <?php
            // if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //     if (isset($_POST["form2"])) {

            //         $class_name = $_POST['class_name'];
            //         $rno = $_POST['rno'];
            //         echo $class_name;
            //         echo $rno;
            //         // $sqll = "UPDATE `students` SET `sub1`= NULL,`sub2`=NULL,`sub3`=NULL,`sub4`=NULL,`sub5`=NULL,`tot`=NULL,`grade`='NULL' WHERE class_name = '$class_name' AND rno = '$rno' ";
            //         $sqld = "UPDATE `students` SET `sub1`= NULL,`sub2`= NULL,`sub3`= NULL,`sub4`= NULL,`sub5`= NULL,`tot`= NULL,`grade`= NULL WHERE `class_name`= '$class_name' AND `name` = '$rno' ";
            //         $delete = mysqli_query($conn, $sqld);
            //         echo "processing";
            //         if (!$delete) {
            //             echo '<script language="javascript">';
            //             echo 'alert("Not available")';
            //             echo '</script>';
            //         } else {
            //             echo '<script language="javascript">';
            //             echo 'alert("Deleted")';
            //             echo '</script>';
            //         }
            //     }
            // } 
            ?>
            <?php
        // }

        ?>


        <form method="post">
            <fieldset>
                <legend>Manage Result</legend>

                <?php
                $class_result = mysqli_query($conn, "SELECT `name` FROM `class`");
                echo '<select name="class">';
                echo '<option selected disabled>Select Class</option>';
                while ($row = mysqli_fetch_array($class_result)) {
                    $display = $row['name'];
                    echo '<option value="' . $display . '">' . $display . '</option>';
                }
                echo '</select>';
                ?>
                <input type="submit" value="Results" name="form1">
            </fieldset>
        </form>



        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["form1"])) {
                $class_name = $_POST['class'];


                $sql = "SELECT `name`, `rno`, `class_name`, `sub1`, `sub2`, `sub3`, `sub4`, `sub5`, `tot`, `grade` FROM `students` WHERE `class_name` = '$class_name'";

                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    echo "<table>
                             <caption>Manage Results</caption>
                             <tr>
                             <th>#</th>
                             <th>NAME</th>
                             <th>R_ID</th>
                             <th>SUB1</th>
                             <th>SUB2</th>
                             <th>SUB3</th>
                             <th>SUB4</th>
                             <th>SUB5</th>
                             <th>TOTAL</th>
                             <th>GRADE</th>
                             </tr>";

                    $cnt = 1;
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>$cnt</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['rno'] . "</td>";
                        echo "<td>" . $row['sub1'] . "</td>";
                        echo "<td>" . $row['sub2'] . "</td>";
                        echo "<td>" . $row['sub3'] . "</td>";
                        echo "<td>" . $row['sub4'] . "</td>";
                        echo "<td>" . $row['sub5'] . "</td>";
                        echo "<td>" . $row['tot'] . "</td>";
                        echo "<td>" . $row['grade'] . "</td>";

                        echo "</tr>";

                        $cnt++;
                    }

                    echo "</table>";
                } else {
                    echo "0 results";
                }
            }
        }
        ?>


    </div>



</body>

</html>

<?php


// if (isset($_POST['rn'], $_POST['p1'], $_POST['p2'], $_POST['p3'], $_POST['p4'], $_POST['p5'], $_POST['class'])) {
//     $rno = $_POST['rn'];
//     $class_name = $_POST['class'];
//     $p1 = (int) $_POST['p1'];
//     $p2 = (int) $_POST['p2'];
//     $p3 = (int) $_POST['p3'];
//     $p4 = (int) $_POST['p4'];
//     $p5 = (int) $_POST['p5'];

//     $marks = $p1 + $p2 + $p3 + $p4 + $p5;
//     $percentage = $marks / 5;


//     $sql = "UPDATE `result` SET `p1`='$p1',`p2`='$p2',`p3`='$p3',`p4`='$p4',`p5`='$p5',`marks`='$marks',`percentage`='$percentage' WHERE `rno`='$rno' and `class`='$class_name'";
//     $update_sql = mysqli_query($conn, $sql);

//     if (!$update_sql) {
//         echo '<script language="javascript">';
//         echo 'alert("Invalid Details")';
//         echo '</script>';
//     } else {
//         echo '<script language="javascript">';
//         echo 'alert("Updated")';
//         echo '</script>';
//     }
// }
?>