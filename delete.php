<?php

    @include 'config.php';

    $add = $_POST['addno'];

    $delete = "DELETE FROM app WHERE Addmission_No = '$add'";
    if($conn->query($delete)===True){
        echo "<br> Data deleted Successfully :( ...";
        header('location:Settings.php');
    }
    else {
        header('location:404 Page.html');
    }

?>