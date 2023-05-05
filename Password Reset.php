<?php

    @include 'config.php';

    if(isset($_POST['submit'])){
        $em = $_POST['email'];
        $pw = md5($_POST['password']);
        $cpw = md5($_POST['cpassword']);

        if($conn->connect_error){
            die("Connection Error :(".$conn->connect_error);
        }
        else{
            if($pw != $cpw){
                $error1[] = 'Password not matched!';
            }
            else{
                $update = "UPDATE form SET Password='$pw' WHERE Email='$em'";
                if($conn->query($update)===True){
                    echo "<br> Password Changed Successfully :) ...";
                    header('location:index.php');
                }
                else {
                    header('location:404 Page.html');
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/fe543d9714.js" crossorigin="anonymous"></script>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" type="image/x-icon" href="Svg/bx-notepad.svg">
    <title>Account Recovery</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        html{
            font-family: 'Poppins', sans-serif;
        }
        body{
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #16151f;
            text-align: center;
        }
        .container{
            width: 70%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .box{
            min-height: 70vh;
            width: 80%;
            border-radius: 30px;
            box-shadow: 5px 5px 6px rgba(0, 0, 0, 0.5),
                        -5px -5px 6px rgba(0, 0, 0, 0.5);
            flex-wrap: wrap;
            display: flex;
            align-items: center;
            justify-content: center;
            transform-style: preserve-3d;
            text-align: center;
        }
        button{
            position: absolute;
            top: 25px;
            left: 25px;
            padding: 5px;
            border-radius: 50%;
            display: flex;
            gap: 5px;
            justify-content: center;
            align-items: center;
            background: #11101d;
            border-color: #11101d;
            color: #fff;
            font-size: 18px;
            transition: .2s ease-out;
        }
        button span{
            display: none;
            padding-right: 5px;
            padding-top: 1px;
        }
        button:hover{
            border-radius: 5px;
        }
        button:hover span{
            display: block;
        }
        .path{
            position: absolute;
            min-height: 100%;
            width: 100%;
            background: linear-gradient(90deg, #21202c 55%, #131122 100%);
            clip-path: circle(380px at right 120px);
            border-radius: 30px;
            z-index: 0;
        }
        .form{
            display: flex;
            position: relative;
            top: -2rem;
            gap: 3rem;
            justify-content: center;
            z-index: 1;
            padding: 1rem 2rem;
        }

        /*-------------------- Heading Style --------------------*/
        h1{
            position: relative;
            font-size: 2rem;
            margin-top: 2rem;
            color: #252839;
            -webkit-text-stroke: 0.1vw #383d52;
            text-transform: uppercase;
        }
        h1::before{
            content: attr(data-text);
            position: absolute;
            top: 0;
            left: 0;
            width: 0;
            height: 100%;
            color: #7380ec;
            -webkit-text-stroke: 0vw #383d52;
            border-right: 2px solid #7380ec;
            overflow: hidden;
            animation: animate 6s linear infinite;
        }
        @keyframes animate{
            0%,10%,100%{
                width: 0;
            }
            70%,90%{
                width: 100%;
            }
        }

        /*-------------------- Reset Password Form --------------------*/
        form{
            margin-top: 2rem;
            color: #fff;
        }
        p{
            text-align: center;
            font-size: 20px;
            letter-spacing: .5px;
            color: rgb(177, 177, 177);
            font-weight: 600;
        }
        #em{
            outline: none;
            margin-top: .5rem;
            border: none;
            border-bottom: 1px solid #999;
            border-radius: 5px;
            width: 100%;
            height: 30px;
            padding: 5px 10px;
            font-size: 15px;
            color: white;
            background: transparent;
            font-family: 'Poppins', sans-serif;
        }
        #em:focus{
            border-bottom: 2px solid #7380ec;
        }
        h5{
            margin-top: 1rem;
            font-size: 16px;
            text-align: left;
        }
        .p{
            margin: .5rem auto;
            font-size: 14px;
            font-weight: 400;
        }
        .cb{
            margin-right: 15px;
            margin-left: 10px;
            background: none;
        }
        span{
            font-size: 15px;
        }
        .content{
            margin-top: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 30px;
            border-bottom: 2px solid #999;
            border-radius: 5px;
            padding: 0px .5rem;
            margin-bottom: 25px;
        }
        .pw{
            outline: none;
            width: 87%;
            height: 91%;
            background: transparent;
            border: none;
            color: #fff;
            font-size: 15px;
            flex: 1;
            padding: 3px auto;
            margin-top: -1px;
            font-family: 'Poppins', sans-serif;
        }
        #first{
            margin-top: -5px;
            margin-bottom: 2rem;
        }
        .cb{
            cursor: pointer;
        }
        #cb,#cb1{
            display: none;
        }
        label i{
            color: rgb(104, 104, 104);
            cursor: pointer;
            margin: 12px 0px;
        }
        .error-msg{
            text-align: center;
            display: flex;
            justify-content: center;
            margin: -20px 0 10px 0;
            padding: 0;
            font-size: 16px;
            color: red;
        }
        #sub{
            color: #11101d;
            font-weight: 700;
            padding: 7px 15px;
            border-radius: 5px;
            background-color: #7380ec;
            float: right;
            cursor: pointer;
            border-color: #7380ec;
        }
        a{
            color: #7380ec;
            font-weight: 600;
            cursor: pointer;
            background: transparent;
            font-size: 13px;
            padding-top: 8px;
            text-decoration: none;
            float: left;
        }

        /*--------------------Image--------------------*/
        .cls{
            margin-top: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 50vh;
        }
        img{
            width: 70vh;
        }
        @media screen and (max-width: 1300px) {
            .container{
                width: 80%;
            }
        }
        @media screen and (min-width: 1920px) and (max-width: 3000px){
            h1, .path, form{
                overflow: hidden;
                zoom: 1.4;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="box">
            <button onclick="history.back()"><i class='bx bx-arrow-back'></i><span>Back</span></button>
            <div class="path"></div>
            <h1 data-text="Password_Reset">Password_Reset</h1>
            <div class="form">
                <div class="cls">
                    <img src="Pic/cyber security.png" alt="Password Recovery">
                </div>
                <form action="" method="POST">
                    <p>Recover your Account</p>
                    <input type="text" id="em" name="email" placeholder="Enter your email"><br>

                    <h5>Create a strong Password</h5>
                    <p class="p">Create a new, strong password that you don't use for other websites</p>
                    <div class="content">
                        <input type="password" id="pass" class="pw" name="password" placeholder="Create Password">
                        <input type="checkbox" onclick="myFunction1()" id="cb">
                        <label for="cb"><i class="fa-solid fa-eye" id="eye1"></i></label>
                    </div>
                    <script>
                        function myFunction1(){
                        var x = document.getElementById("pass");
                        var y = document.getElementById("eye1");
                        if (x.type === "password") {
                            x.type = "text";
                            y.style.color = "#7380ec";
                            y. style.textShadow = "0 0 25px #7380ec";
                        } else {
                            x.type = "password";
                            y.style.color = "rgb(104, 104, 104)";
                            y. style.textShadow = "none";
                        }
                        }
                    </script>

                    <div class="content" id="first">
                        <input type="password" id="word" class="pw" name="cpassword" placeholder="Confirm Password">
                        <input type="checkbox" onclick="myFunction2()" id="cb1">
                        <label for="cb1"><i class="fa-solid fa-eye" id="eye2"></i></label>
                    </div>
                    <script>
                        function myFunction2(){
                            var x = document.getElementById("word");
                            var y = document.getElementById("eye2");
                            if (x.type === "password") {
                                x.type = "text";
                                y.style.color = "#7380ec";
                                y. style.textShadow = "0 0 25px #7380ec";
                            } else {
                                x.type = "password";
                                y.style.color = "rgb(104, 104, 104)";
                                y. style.textShadow = "none";
                            }
                        }
                    </script>
                    <?php
                        if(isset($error1)){
                            foreach($error1 as $error1){
                                echo '<span class="error-msg">'.$error1.'</span>';
                            };
                        };
                    ?>
                    <input type="submit" id="sub" name="submit" value="Save Password">
                </form>
            </div>  
        </div>
    </div>  
</body>
</html>
