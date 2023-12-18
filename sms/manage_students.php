<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" type='text/css' href="css/manage.css">
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
                    <a href='manage_results.php'>Manage Results</a>
                </div>
            </li>
        </ul>
    </div>";
    }

    ?>

    <div class="main">


        <?php
        if ($user == "admin") {
            ?>

            <form method="post">
                <?php
                include("init.php");
                include('session.php');
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
                }
            }
            ?>
            <?php
            $sql = "SELECT `name`, `rno`, `class_name` FROM `students` WHERE `class_name`='$class_name'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                echo "<table>
                     <caption>Manage Students</caption>
                     <tr>
                     <th>#</th>
                     <th>NAME</th>
                     <th>ROLL</th>
                     <th>CLASS</th>
                     <th>ACTION</th>
                     </tr>";
                $cnt = 1;
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>$cnt</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['rno'] . "</td>";
                    echo "<td>" . $row['class_name'] . "</td>";
                    echo "<td><a href='delete-student.php?rno=" . $row['rno'] . "' style='color:#F66; text-decoration:none;'><span class='fa fa-trash'></span> Remove</a></td>";
                    echo "</tr>";
                    $cnt++;
                }

                echo "</table>";
            }
        } else {
            ?>
            <form method="post">
                <?php
                include("init.php");
                include('session.php');
                // echo $login_name;
                echo '<select name="class_name">';
                echo '<option selected disabled>Select Class</option>';
                $sql = "SELECT `semester` FROM `subjects` WHERE `teachers` = '$login_name'";
                // $result = $conn->query($sql);
                $result = mysqli_query($conn, $sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $sem = $row['semester'];
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
                }
            }
            $sql = "SELECT `name`, `rno`, `class_name` FROM `students` WHERE `class_name`='$class_name'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                echo "<table>
                     <caption>Manage Students</caption>
                     <tr>
                     <th>#</th>
                     <th>NAME</th>
                     <th>ROLL</th>
                     <th>CLASS</th>
                   
                     </tr>";
                $cnt = 1;
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>$cnt</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['rno'] . "</td>";
                    echo "<td>" . $row['class_name'] . "</td>";
                    //  echo "<td><a href='delete-student.php?rno=".$row['rno']."' style='color:#F66; text-decoration:none;'><span class='fa fa-trash'></span> Remove</a></td>";
                    echo "</tr>";
                    $cnt++;
                }

                echo "</table>";
            }
        }
        ?>


    </div>


</body>

</html>