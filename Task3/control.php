<?php

// Establish a connection with the database 
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "sm_tasks";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if ($conn === false)
{
    die("ERROR: Could not connect. ".mysqli_connect_error());
}
//----------------------------------------------

// Check if the forward button is clicked

if (isset($_POST["Forward"]))
{

    $sql = "INSERT INTO `controlpanle`(`_forward`) VALUES ('F')";

    if (mysqli_query($conn, $sql))
    {
        echo "F";
    }
    else
    {
        echo "ERROR: Could not able to execute $sql. ".mysqli_error($conn);
    }
}
//----------------------------------------------

// Check if the left button is clicked

elseif(isset($_POST["Left"]))
{

    $sql = "INSERT INTO `controlpanle`(`_left`) VALUES ('L')";

    if (mysqli_query($conn, $sql))
    {
        echo "F";
    }
    else
    {
        echo "ERROR: Could not able to execute $sql. ".mysqli_error($conn);
    }
}
//----------------------------------------------

// Check if the right button is clicked

elseif(isset($_POST["Right"]))
{

    $sql = "INSERT INTO `controlpanle`(`_right`) VALUES ('R')";

    if (mysqli_query($conn, $sql))
    {
        echo "R";
    }
    else
    {
        echo "ERROR: Could not able to execute $sql. ".mysqli_error($conn);
    }
}
//----------------------------------------------

// Check if the backward button is clicked

elseif(isset($_POST["Backward"]))
{

    $sql = "INSERT INTO `controlpanle`(`_backward`) VALUES ('B')";

    if (mysqli_query($conn, $sql))
    {
        echo "B";
    }
    else
    {
        echo "ERROR: Could not able to execute $sql. ".mysqli_error($conn);
    }
}
//----------------------------------------------

// Check if the stop button is clicked

else
{
    $sql = "INSERT INTO `controlpanle`(`_stop`) VALUES ('S')";

    if (mysqli_query($conn, $sql))
    {
        echo "S";
    }
    else
    {
        echo "ERROR: Could not able to execute $sql. ".mysqli_error($conn);
    }
    mysqli_close($conn);
} 
?>