<?php
    @include 'config.php';

    if(isset($_POST['SubReg'])){
        $name = mysqli_real_escape_string($conn, $_POST['fname']);
        $em = mysqli_real_escape_string($conn, $_POST['email']);
        $pw = md5($_POST['password']);
        $cpw = md5($_POST['cpassword']);
        $user_type = $_POST['user_type'];

        $select = " SELECT * FROM Form WHERE Email = '$em' && Password = '$pw' ";

        $result = mysqli_query($conn, $select);

        if(mysqli_num_rows($result) > 0){

            $error1[] = 'User already exist!';

        }else{
            if($pw != $cpw){
                $error1[] = 'Password not matched!';
            }else{
                $insert = "INSERT INTO Form VALUES('$name','$em','$pw','$user_type')";
                mysqli_query($conn, $insert);
            }
        }
    };
?>

<?php
    @include 'config.php';

    session_start();

    if(isset($_POST['SubLog'])){
        $em = mysqli_real_escape_string($conn, $_POST['email']);
        $pw = md5($_POST['password']);
        $select = "SELECT * FROM Form WHERE Email='$em' && Password='$pw'";

        $result = mysqli_query($conn, $select);

        if(mysqli_num_rows($result) > 0){

            $row = mysqli_fetch_array($result);

            if($row['User_type'] == 'Admin'){
                $_SESSION['admin_name'] = $row['User_Name'];
                header('location:Home.php');
            }
            if($row['User_type'] == 'User'){
                $_SESSION['user_name'] = $row['User_Name'];
                header('location:UserHome.php');
            }
        }
        else{
            $error[] = 'Incorrect Email or Password!';
        }
    };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/fe543d9714.js" crossorigin="anonymous"></script>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" type="image/x-icon" href="Svg/bx-log-in-circle.svg">
    <title>LogIn & Register</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'poppins', sans-serif;
        }
        body{
            background: #16151f;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
        }
        .color{
            position: absolute;
            min-height: 100vh;
            width: 100%;
            background: linear-gradient(90deg, #21202c 55%, #131122 100%);
            clip-path: circle(500px  at right 120px);
            z-index: 0;
        }
        .main{
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
        }
        .content{
            color: rgb(255, 255, 255);
            width: 65em;
            height: 100vh;
            z-index: 99;
        }
        .content .ac{
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .ac i{
            font-size: 75px;
            padding: auto;
            margin-top: 7vh;
            margin-left: 33vh;
            margin-right: 0;
        }
        .ac h3{
            float: right;
            font-size: 75px;
            margin-top: 7vh;
            margin-right: 35vh;
            text-transform: uppercase;
            filter: drop-shadow(-1px -1px 1px rgba(255,255,255,0.3))
                    drop-shadow(5px 5px 5px rgba(0,0,0,0.3))
                    drop-shadow(15px 15px 15px rgba(0,0,0,0.3));
        }
        #title{
            padding-top: 2rem;
            font-size: 2.5em;
            color: #7380ec;
            filter: drop-shadow(-1px -1px 1px rgba(255,255,255,0.3))
                    drop-shadow(5px 5px 5px rgba(0,0,0,0.3))
                    drop-shadow(15px 15px 15px rgba(0,0,0,0.3));
        }
        .container{
            width: 100%;
            height: 10vh;
            color: #fff;
            display: flex;
            margin-top: 10px;
            justify-content: center;
        }
        .container h2{
            font-size: 31px;
            font-weight: 600;
        }
        span{
            color: #fff724;
        }
        .img{ 
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .img img{
            width: 50vh;
        }
        .form-box{
            width: 23.2rem;
            height: 485px;
            border-radius: 30px;
            position: relative;
            float: right;
            margin: 0 6%;
            padding: 15px 5px;
            box-shadow: 5px 5px 6px 0 rgba(0,0,0,0.5),
                        -5px -5px 6px 0 rgba(0,0,0,0.5);
            color: #fff;
            transform-style: preserve-3d;
        }
        .form-box .bxl-redux{
            font-size: 35px;
            margin-left: 4.2rem;
            margin-top: 18px;
            z-index: 0;
            color: #11101d;
            filter: drop-shadow(-1px -1px 1px rgba(255,255,255,0.3));
        }
        .form-box i{
            margin-left: 4.2rem;
            margin-top: 15px;
            z-index: 0;
        }
        h1{
            margin-top: -45px;
            margin-left: 36px;
            line-height: 50px;
            letter-spacing: 1px;
            font-family: Tahoma, sans-serif;
            text-align: center;
        }
        h1 .P{
            font-size: 45px;
            color: #11101d;
            filter: drop-shadow(-1px -1px 1px rgba(255,255,255,0.3))
                    drop-shadow(5px 5px 5px rgba(0,0,0,0.3))
                    drop-shadow(15px 15px 15px rgba(0,0,0,0.3));
        }
        .button-box{
            width: 220px;
            margin: 15px auto;
            position: relative;
            box-shadow: 0 0 20px 9px #ff61241f;
            border-radius: 30px;
            box-shadow: -1.5px -1.5px 3px 0 rgba(255,255,255,0.3),
                        5px 5px 5px 0 rgba(0,0,0,0.3),
                        15px 15px 15px 4px rgba(0,0,0,0.3);
        }
        .toggle-btn{
            padding: 10px 30px;
            cursor: pointer;
            background: transparent;
            border: 0;
            outline: none;
            position: relative;
            font-size: 12.5px;
            font-weight: 600;
            font-family: cursive;
        }
        #LI{
            padding-left: 30px;
            color: #7380ec;
        }
        #RS{
            float: right;
            left: 7px;
            top: -37.6px;
            color: white;
        }
        #btn{
            top: 0;
            left: 0;
            position: absolute;
            width: 110px;
            height: 100%;
            background: #11101d;
            border-radius: 30px;
            transition: .5s;
        }
        .input-login .icon{
            margin-top: -8px;
            text-align: center;
        }
        .input-login .icon a #logo{
            font-size: 25px;
            color: #fff;
            margin-right: 5px;
            margin-left: 5px;

        }
        .input-login .icon a #logo:hover{
            color: #7380ec;
            font-size: 30px;
            text-shadow: 0 0 15px #7380ec;
        }
        .input-login{
            position: absolute;
            width: 250px;
            transition: .5s;
            margin-left: -15.5px;
        }
        .input-register{
            top: 130px;
            position: absolute;
            width: 250px;
            margin-left: 35px;    
        }
        .input-field{
            width: 100%;
            padding: 5px 5px;
            margin: 7px 0;
            border-left: 0;
            border-top: 0;
            border-right: 0;
            border-bottom: 1px solid #999;
            outline: none;
            background: transparent;
            font-size: 15px;
            border-radius: 5px;
            font-family: 'Poppins', sans-serif;
        }
        input[type=text]:focus{
            border-bottom: 2px solid #7380ec;
        }
        input[type=password]:focus{
            border-bottom: 2px solid #7380ec;
        }
        input[type=email]:focus{
            border-bottom: 2px solid #7380ec;
        }
        #pass{
            width: 90%;
        }
        #pass:focus{
            border-bottom: 2px solid #7380ec;
            width: 90%;
        }
        
        #cb{
            display: none;
        }
        #lab i{
            color: rgb(104, 104, 104);
            cursor: pointer;
            margin: 0px 5px;
            font-size: 18px;
            position: relative;
            top: -52px;
        }
        .submit-btn{
            width: 85%;
            height: 40px;
            padding: 5px 30px;
            cursor: pointer;
            display: flex;
            background: #11101d;
            color: #fff;
            border: 0;
            outline: none;
            border-radius: 30px;
            font-size: 15px;
            font-family: cursive;
            font-weight: 700;
            box-shadow: inset 0 0 0 0 white;
            transition: ease-out 0.4s;
            align-items: center;
            justify-content: center;
        }
        .submit-btn i{
            font-size: 24px;
            margin: 0 5px;
        }
        .submit-btn:hover{
            background: white;
            color: #11101d;
            cursor: pointer;
            box-shadow: inset 300px 0 0 0 white;
        }
        label{
            color: white;
            font-size: 15px;
            bottom: 63.5px;
            position: absolute;
        }
        #login{
            left: 50px;
        }
        #login a{
            color: white;
            font-size: 13px;
            text-decoration: none;
            letter-spacing: .8px;
            margin: 20px 10px;
        }
        #fp:hover{
            color: #7380ec;
        }
        #login input{
            color: white;
            font-size: 15;
        }
        #register{
            left: 0;
            display: none;
            margin-top: 20px;
        }
        #register input{
            color: white;
            font-size: 15;
        }
        .error-msg{
            text-align: center;
            display: flex;
            justify-content: center;
            margin: 0;
            padding: 0;
            font-size: 16px;
            margin-top: 2px;
            color: red;
        }
        select{
            margin-top: 5px;
            padding-left: 10px;
            width: 100%;
            height: 30px;
            background: #16151f;
            font-size: 15px;
            font-weight: 600;
            color: #fff;
            border-radius: 5px;
        }
        @media screen and (max-width: 1300px) {
            .content{
                width: 73.7%;
            }
        }
        @media screen and (min-width: 1920px) and (max-width: 3000px){
            body{
                overflow: hidden;
                zoom: 1.2;
            }
            .main{
                display: flex;
                align-items: center;
                justify-content: center;
                width: 100%;
                height: 90vh;
            }
            .form-box{
                zoom: 1.1;
                width: 22%;
                height: 500px;
                margin-top: -3.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="color"></div>
    <div class="main">
        <div class="content">
            <div class="ac">
                <i class='bx bxl-redux bx-spin'></i>
                <h3>SDMS</h3>
            </div>
            <H1 id="title">Students Data Management System</H1>
            <div class="container">
                <h2>Like a <span class="auto-type"></span></h2>
            </div>
            <div class="img">
                <img src="Pic/Idea.png" alt="Login And Register">
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
        <script>
            var typed = new Typed(".auto-type", {
                strings: ["Web Application ", "Informative Web ", "Records Store "],
                typeSpeed: 150,
                backSpeed: 150,
                loop: true
            })
        </script>

        <div class="form-box">
            <i class='bx bxl-redux bx-spin'></i>
            <h1><span class="P">SDMS</span></h1>
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" onclick="login()" class="toggle-btn" id="LI">LOG IN</button>
                <button type="button" onclick="register()" class="toggle-btn" id="RS">REGISTER</button>
            </div>

        <!--------------------Login Page-------------------->
            <form action="" method="POST" id="login" class="input-login">
                <div class="icon">
                    <a href="https://accounts.google.com/signin/v2/identifier?service=accountsettings&continue=https%3A%2F%2Fmyaccount.google.com%2F%3Futm_source%3Dsign_in_no_continue%26pli%3D1&ec=GAlAwAE&flowName=GlifWebSignIn&flowEntry=AddSession"><i class='bx bxl-google' id="logo"></i></a>
                    <a href="https://www.google.com/aclk?sa=l&ai=DChcSEwio-v3agKP4AhXLlGYCHYKKCQ0YABAAGgJzbQ&ae=2&sig=AOD64_374SkdXbfyl5pSZxIdX075Pqmprg&q&adurl&ved=2ahUKEwi8j_fagKP4AhUDjdgFHc7qAdMQ0Qx6BAgCEAE"><i class='bx bxl-facebook-circle' id="logo"></i></a>
                    <a href="https://appleid.apple.com/"><i class='bx bxl-apple'  id="logo"></i></a>
                </div>
                <?php
                    if(isset($error)){
                        foreach($error as $error){
                            echo '<span class="error-msg">'.$error.'</span>';
                        };
                    };
                ?>
                <input type="email" name="email" class="input-field" placeholder="Email ID" required autocomplete="off">
                <input type="password" name="password" class="input-field" id="pass" placeholder="Enter Password" required>
                <label for="cb" id="lab"><i class="fa-solid fa-eye" id="eye1"></i></label>
                <input type="checkbox" onclick="myFunction1()" id="cb">
                <a href="Password Reset.php" id="fp">Forgot Password?</a><br>
                <button type="submit" name="SubLog" class="submit-btn" style="margin: 40px auto 0;">Log In<i class='bx bx-log-in'></i></button>
            </form>

        <!--------------------Register Page-------------------->
            <form action="" method="POST" id="register" class="input-register">
                <?php
                    if(isset($error1)){
                        foreach($error1 as $error1){
                            echo '<span class="error-msg">'.$error1.'</span>';
                        };
                    };
                ?>
                <input type="text" name="fname" class="input-field" placeholder="User Name" maxlength="15" required>
                <input type="email" name="email" class="input-field" placeholder="Email ID" required>
                <input type="password" name="password" id="pass1" class="input-field" placeholder="Enter Password" required>
                <input type="password" name="cpassword" class="input-field" id="pass2" placeholder="Confirm Password" required>
                <select name="user_type">
                    <option value="User">User</option>
                    <option value="Admin">Admin</option>
                </select>
                <button type="submit" name="SubReg" class="submit-btn" style="margin: 20px auto;">Register<i class='bx bx-user-plus'></i></button>
            </form>
        </div>
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
    <script>
        var a = document.getElementById('LI');
        var b = document.getElementById('RS');
        var x = document.getElementById('login');
        var y = document.getElementById('register');
        var z = document.getElementById('btn');
        function register()
        {
            z.style.left = '110px';
            a.style.color = 'white';
            b.style.color = '#7380ec';
            x.style.display = 'none';
            y.style.display = 'block';
        }

        function login()
        {
            z.style.left = '0px';
            a.style.color = '#7380ec';
            b.style.color = 'white';
            y.style.display = 'none';
            x.style.display = 'block';
        }
    </script>
    <script>
        var model = document.getElementById('login-form');
        window.onclick = function(event){
            if(event.target == model){
                model.style.display = "none";
            }
        }
    </script>
</body>
</html>
