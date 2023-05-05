<?php

    @include 'config.php';
    
    $fn = $_POST['fn'];
    $qua = $_POST['qua'];
    $reg = $_POST['reg'];
    $nic = $_POST['nic'];
    $dob = $_POST['dob'];
    $gen = $_POST['gen'];
    $re = $_POST['re'];
    $bg = $_POST['bg'];
    $home = $_POST['home'];
    $em = $_POST['em'];
    $tel = $_POST['tel'];
    $str = $_POST['str'];
    $subj = $_POST['subj'];
    $med = $_POST['med'];
    $we = $_POST['we'];

    if($conn->connect_error){
        die("Connection Error :(".$conn->connect_error);
    }
    else {
        header('location:404 Page.html');
    }

    $sql3 = "INSERT INTO teachers(Full_Name, Qualification, Registation_No, NIC_No, Gender, DOB, Religion, Blood_Group, Home, Email, Phone_No, Stream, Subject, Medium, Work_Years) 
    VALUES('$fn','$qua','$reg','$nic','$gen','$dob','$re','$bg','$home','$em','$tel','$str','$subj','$med','$we')";
    if($conn->query($sql3)===True){
        echo "<br> Data insert successfully...";
        header('location:Home.php');
    }
    else {
        header('location:404 Page.html');
    }
?>