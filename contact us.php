<?php

    @include 'config.php';

    $txt = $_POST['name'];
    $em = $_POST['email'];
    $msg = $_POST['msg'];

    if($conn->connect_error){
        die("Connection Error :(".$conn->connect_error);
    }
    else{
        echo "<br> Database entered Successfully";
    }

    $insert = "INSERT INTO contact SET Name = '$txt', Email = '$em', Message = '$msg'";
    $result = mysqli_query($conn, $insert);
    if ($result === true) {
        header('location:UserCon.php');
    }

    mysqli_close($conn);

    // if($conn->query($insert)===True){
    //     echo "<br> Data insert successfully...";
    //     header('location:UserCon.php');
    // }
    // else{
    //     echo "<br> Error insert data". $conn->error;
    // }
?>