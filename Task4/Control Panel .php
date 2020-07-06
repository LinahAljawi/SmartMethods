<!DOCTYPE html>
<html>

<head>
    <title>Control Panle</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        html {
            background: url(cool-background.png) no-repeat center fixed;
            background-size: cover;
        }

        #box1 {
            background-color: rgb(239, 245, 245);
            border: 15px solid DarkSlateGray;
            border-radius: 20px;
            width: 500px;
            height: 350px;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 5%;
        }

        #box2 {
            background-color: rgb(239, 245, 245);
            border: 15px solid DarkSlateGray;
            border-radius: 20px;
            width: 200px;
            height: 500px;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 5%;
            align-content: center;
        }

        label {
            padding: 12px 12px 12px 0;
            display: inline-block;
            margin-left: 5%;
        }

        input {
            width: 25%;
            margin-top: 5%;
            margin-right: 50%;
            padding: 12px 20px;
            border: 2px solid DarkSlateGray;
            box-sizing: border-box;
            border-radius: 15px;
        }

        button {
            background-color: DarkSlateGray;
            border: none;
            color: white;
            padding: 16px 32px;
            margin: auto;
            text-align: center;
            padding: 15px 32px;
            cursor: pointer;
            border-radius: 15px;
        }

        table {
            border: 5px solid DarkSlateGray;
            width: 300px;
            color: DarkSlateGray;
            font-size: 15px;
            text-align: center;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 5%;
            border-radius: 5px;
        }

        th {
            background-color: DarkSlateGray;
            color: white;
        }

        tr {
            background-color: #f2f2f2
        }

        p {
            text-align: center;
        }
    </style>
</head>

<body>

    <h1 class=" w3-light-gray w3-text-teal" style="text-align:center"><b>Control Panel</b></h1>

    <b>
        <p style="font-size:20px; text-align=center ">Enter the distance in the desired direction to move the
            robot
        </p>
    </b>

    <form method="post">

        <div id="box1">

            <b><label>Right</label></b>
            <input name="right" style="margin-left:6%">

            <b><label>Left</label></b>
            <input name="left" style="margin-left:8%">

            <b><label>Forward</label></b>
            <input name="forward">

            <br></br>

            <button name="Start" style="margin-left: 15% ">Start</button>
            <button name="Save">Save</button>
            <button name="Delete">Delete</button>

        </div>
        <table>
            <tr>
                <th>Forward</th>
                <th>Right</th>
                <th>Left</th>
            </tr>
    </form>

<?php

// Establish a connection with the database 
$host       = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname     = "sm_tasks";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if ($conn === false) 
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

//----------------------------------------------

// Check if the start button is clicked

if (isset($_POST["Start"])) 
{
    
    if (!empty($_POST["right"])) 
    {
        $var = $_POST["right"];
        $sql = "INSERT INTO `contrlpanel_2`(`Right_`) VALUES ($var)";
        mysqli_query($conn, $sql);
       
    } elseif (!empty($_POST["left"])) 
    {
        
        $var = $_POST["left"];
        $sql = "INSERT INTO `contrlpanel_2`(`Left_`) VALUES ($var)";
        mysqli_query($conn, $sql);

    } elseif (!empty($_POST["forward"])) 
    {
        
        $var = $_POST["forward"];
        $sql = "INSERT INTO `contrlpanel_2`(`Forward_`) VALUES ($var)";
        mysqli_query($conn, $sql);
    }
}
//----------------------------------------------

// Check if the delete button is clicked

if (isset($_POST["Delete"])) 
{

    $selectSQL= 'DELETE FROM `contrlpanel_2`';
    $result = mysqli_query($conn, $selectSQL);
}

//----------------------------------------------

// Check if the save button is clicked  

// Print the content of Database
if (isset($_POST["Save"])) 
{
    
    $selectSQL = 'SELECT * FROM `contrlpanel_2`';
    $result = $conn->query($selectSQL);

    if ($result->num_rows > 0) 
    {
        
        while ($row = $result->fetch_assoc()) 
        {
            echo "<tr><td>" . $row["Forward_"] . "</td><td>" . $row["Right_"] . "</td><td>" . $row["Left_"] . "</td></td>";
        }
    }

    ?>
    
    <b><p style="font-size:20px; text-align=center ">Robot movements map (from top to bottom)</p></b>
    <div ID="box2">
    <?php


    // Draw movements map
    $result = $conn->query($selectSQL);

    if ($result->num_rows > 0)
    {

        while ($row = $result->fetch_assoc())
        {
            if($row["Forward_"]>0)
            {
                ?>
                <lable style="font-size:45px; margin-left:70px" >&#8593</lable>
                <?php
            }
            if($row["Right_"]>0)
            {
                ?>
                <lable style="font-size:45px; margin-left:70px" >&#8594</lable>
                <?php
            }
            if($row["Left_"]>0)
            {
                ?>
                <lable style="font-size:45px; margin-left:70px" >&#8592</lable>
                <?php
            }
        }
    }
    ?>
    </div>
    <?php
    $conn->close();
}
?>

</body>
</table>

<div class="w3-panel w3-light-gray w3-text-teal" style="margin-top: 120px;">
        <h>Linah Aljawi-Smart Methods</h>
</div>

</html>