<?php

    @include 'config.php';
    
    $app = $_POST['app'];
    $reg = $_POST['reg'];
    $txt = $_POST['txt'];
    $dob = $_POST['dob'];
    $tel = $_POST['tel'];
    $re = $_POST['re'];
    $bg = $_POST['bg'];
    $str = $_POST['str'];
    $med = $_POST['med'];

    if($app == 'DOB'){
        $update = "UPDATE teachers SET DOB = '$dob' WHERE Registation_No = '$reg'";
        if($conn->query($update)===True){
            echo "<br> Data Changed Successfully :( ...";
            header('location:Settings.php');
        }
        else {
            header('location:404 Page.html');
        }
    }
    else{
        if($app == 'Phone_No'){
            $update = "UPDATE teachers SET Phone_No = '$tel' WHERE Registation_No = '$reg'";
            if($conn->query($update)===True){
                echo "<br> Data Changed Successfully :( ...";
                header('location:Settings.php');
            }
            else {
                header('location:404 Page.html');
            }
        }
        else{
            if($app == 'Religion'){
                $update = "UPDATE teachers SET Religion = '$re' WHERE Registation_No = '$reg'";
                if($conn->query($update)===True){
                    echo "<br> Data Changed Successfully :( ...";
                    header('location:Settings.php');
                }
                else {
                    header('location:404 Page.html');
                }
            }
            else{
                if($app == 'Blood_Group'){
                    $update = "UPDATE teachers SET Blood_Group = '$bg' WHERE Registation_No = '$reg'";
                    if($conn->query($update)===True){
                        echo "<br> Data Changed Successfully :( ...";
                        header('location:Settings.php');
                    }
                    else {
                        header('location:404 Page.html');
                    }
                }
                else{
                    if($app == 'Stream'){
                        $update = "UPDATE teachers SET Stream = '$str' WHERE Registation_No = '$reg'";
                        if($conn->query($update)===True){
                            echo "<br> Data Changed Successfully :( ...";
                            header('location:Settings.php');
                        }
                        else {
                            header('location:404 Page.html');
                        }
                    }
                    else{
                        if($app == 'Medium'){
                            $update = "UPDATE teachers SET Medium = '$med' WHERE Registation_No = '$reg'";
                            if($conn->query($update)===True){
                                echo "<br> Data Changed Successfully :( ...";
                                header('location:Settings.php');
                            }
                            else {
                                header('location:404 Page.html');
                            }
                        }
                        else{
                            $update = "UPDATE teachers SET $app = '$txt' WHERE Registation_No = '$reg'";
                            if($conn->query($update)===True){
                                echo "<br> Data Changed Successfully :( ...";
                                header('location:Settings.php');
                            }
                            else {
                                header('location:404 Page.html');
                            }
                        }
                    }
                }
            }
        }
    }
?>