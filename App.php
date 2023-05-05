<?php

    @include 'config.php';

    $add = $_POST['add'];
    $fn = $_POST['fn'];
    $ln = $_POST['ln'];
    $dob = $_POST['dob'];
    $gen = $_POST['gen'];
    $nic = $_POST['nic'];
    $tel = $_POST['tel'];
    $em = $_POST['em'];

    if($conn->connect_error){
        die("Connection Error :(".$conn->connect_error);
    }
    else{
        echo "<br> Database entered Successfully";
    }

    $sql3 = "INSERT INTO app VALUES('$add','$fn','$ln','$dob','$gen','$tel','$nic','$em')";
    if($conn->query($sql3)===True){
        $sql4 = "INSERT INTO marks SET Addmission_No = '$add'" ;
        if ($conn -> query($sql4)===True){
            echo "<br> Data insert successfully...";
            header('location:Application.html');
        }
    }

    
?>