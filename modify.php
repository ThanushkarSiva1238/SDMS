<?php

    @include 'config.php';
    
    $add = $_POST['add'];
    $txt = $_POST['txt'];
    $dob = $_POST['dob'];
    $tel = $_POST['tel'];
    $app = $_POST['app'];

    if($app == 'DOB'){
        $update = "UPDATE app SET DOB = '$dob' WHERE Addmission_No = '$add'";
        if($conn->query($update)===True){
            echo "<br> Data Changed Successfully :( ...";
            header('location:Settings.php');
        }
        else {
            header('location:404 Page.html');
        }
    }
    else{
        if($app == 'Telephone_No'){
            $update = "UPDATE app SET Telephone_No = '$tel' WHERE Addmission_No = '$add'";
            if($conn->query($update)===True){
                echo "<br> Data Changed Successfully :( ...";
                header('location:Settings.php');
            }
            else {
                header('location:404 Page.html');
            }
        }
        else{
            $update = "UPDATE app SET $app = '$txt' WHERE Addmission_No = '$add'";
            if($conn->query($update)===True){
                echo "<br> Data Changed Successfully :( ...";
                header('location:Settings.php');
            }
            else {
                header('location:404 Page.html');
            }
        }
    }
?>