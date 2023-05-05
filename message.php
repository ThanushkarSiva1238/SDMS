<?php

    @include 'config.php';
    
    $txt = $_POST['txt'];

    $sql3 = "INSERT INTO message SET Message = '$txt' ";
    if($conn->query($sql3)===True){
        echo "<br> Data insert successfully...";
        header('location:Contact.php');
    }
    else {
        header('location:404 Page.html');
    }

?>