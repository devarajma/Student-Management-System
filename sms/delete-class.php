<?php

session_start();

include ("init.php");
                                     
if (isset($_GET['id']))
{
    $id=$_GET['id'];
    $deleteQuery="DELETE FROM class where `id`='$id'"; 
    $res = mysqli_query($conn, $deleteQuery);
    if($res){
        header('location:./manage_classes.php');
    }else{
        echo"not working ";
    }

    // echo "<script>window.location = 'manage_classes.php';</script>";
} else {
    echo "ERR!";
}

?>