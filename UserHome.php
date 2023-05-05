<?php

    @include 'config.php';

    session_start();

    if(isset($_SESSION_1['user_name'])){
        header('location:UserHome.php');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="Svg/bxs-dashboard.svg">
    <title>Dashboard</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lalezar&family=Marcellus&family=Noto+Sans:wght@500&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');

        :root{
            --color-primary: #7380ec;
            --color-danger: #ff7782;
            --color-success: #41f1b6;
            --color-white: #fff;
            --color-info-dark: #7d8da1;
            --color-info-light: #dce1eb;
            --color-dark: #363949;
            --color-light: rgba(132, 139, 200, 0.18);
            --color-toggle: rgba(132, 139, 200, 0.18);
            --color-primary-variant: #111e88;
            --color-dark-variant: #677483;
            --color-background: #16151f;
            --color-sidebar: #11101d;
            --color-pro: #1d1b31;
            --color-hover: #fff;

            --box-shadow: 0 1rem 2rem var(--color-light);
        }
        .light-theme-variables{
            --color-background: #dce1eb;
            --color-white: #0c0e0f;
            --color-light: rgba(0, 0, 0, 0.4);
            --color-toggle: #fff;
            --color-dark-variant: #303d44;
            --color-pro: #c5cad3;
            --color-sidebar: #fff;
            --color-info-dark: #0c2038;
            --color-hover: #dce1eb;
        }

        *{
            margin: 0;
            padding: 0;
            outline: none;
            appearance: none;
            border: none;
            text-decoration: none;
            list-style: none;
            box-sizing: border-box;
        }
        html{
            font-size: 14px;
        }
        body{
            position: relative;
            height: 100vh;
            width: 100%;
            background: var(--color-background);
            user-select: none;
            font-family: 'Poppins', sans-serif;
        }
        main{
            position: absolute;
            display: flex;
            height: 100%;
            width: 100%;
            padding: 1rem 2rem;
            font-family: 'Poppins', sans-serif;
            gap: 1rem;
        }
        main .main{
            width: 70%;
            margin-left: 1rem;
        }
        .main .logo{
            color: var(--color-white);
            display: flex;
            height: 50px;
            width: 100%;
            align-items: center;
            pointer-events: none;
            transition: all .5s ease;
        }
        .main .logo i{
            font-size: 35px;
            margin-top: -6px;
            margin-right: 10px;
            color: var(--color-primary);
            filter: drop-shadow(-1px -1px 1px rgba(255,255,255,0.3))
                    drop-shadow(0 0 5px rgba(0,0,0,0.3));
        }
        .main .logo .text{
            font-size: 38px;
            font-weight: 500;
            color: var(--color-primary);
            font-family: 'Lalezar', cursive;
            letter-spacing: 1.5px;
            filter: drop-shadow(-1px -1px 1px rgba(255,255,255,0.3))
                    drop-shadow(5px 5px 5px rgba(0,0,0,0.3));
        }
        .text .id{
            font-variant: small-caps;
        }
        main .datetime{
            display: flex;
            justify-content: center;
            background-color: var(--color-light);
            border-radius: 0.4rem;
            margin-top: 1rem;
            width: 100%;
            padding: 0.5rem 1rem;
            font-size: 18px;
            color: var(--color-white);
            box-shadow: 3px 3px 5px 0 rgba(0,0,0,0.5),
                        -3px -3px 5px 0 rgba(0,0,0,0.5);
        }
        main .datetime .time{
            padding-left: 1rem;
        }
        .content{
            display: flex;
            align-items: center;
            margin: .5rem 0;
            justify-content: center;
        }
        .search{
            background: var(--color-pro);
            width: 85%;
            margin: 1rem 0;
            padding: 1.5rem 2rem;
            border-radius: 1rem;
            box-shadow: 0 0 2rem 0 rgba(0,0,0,0.5);
        }
        .search:hover{
            box-shadow: none;
        }
        form{
            position: relative;
            height: 50px;
            width: 100%;
            line-height: 50px;
        }
        form #add{
            position: absolute;
            height: 100%;
            width: 100%;
            left: 0;
            top: 0;
            border-radius: 12px;
            outline: none;
            border: none;
            background: var(--color-background);
            padding: 0 15px 0 50px;
            font-size: 18px;
            color: var(--color-white);
            box-shadow: 0 0 1rem 0 rgba(0,0,0,0.5);
            font-family: 'poppins';
        }
        form #sub{
            display: none;
        }
        form label{
            position: absolute;
            z-index: 99;
            color: var(--color-white);
            font-size: 25px;
            padding: 3px 0 0 0;
        }
        form i{
            height: 50px;
            min-width: 50px;
            border-radius: 12px;
            line-height: 50px;
            text-align: center;
        }
        .tab{
            position: relative;
            padding: .5rem;
            width: 100%;
            margin: .8rem 0 0;
            line-height: 2rem;
            background: var(--color-background);
            border-radius: 12px;
            box-shadow: 0 0 1rem 0 rgba(0,0,0,0.5);
        }
        table{
            text-align: left;
            padding: 0 .6rem;
            font-size: 15px;
        }
        table th{
            color: var(--color-white);
            font-weight: 400;
        }
        table .space{
            font-weight: 500;
            padding: 0 .5rem;
        }
        table td{
            color: var(--color-dark-variant);
            font-weight: 500;
        }
        .search #zero{
            padding-left: 2em;
            padding-top: 8px;
            font-size: 16px;
            color: var(--color-white);
        }
        .add{
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            margin: 1rem 0;
            gap: 2rem;
        }
        .add a{
            display: flex;
            align-items: center;
            justify-content: center; 
            background: var(--color-sidebar);
            box-shadow: 0 0 1rem 0 rgba(0,0,0,0.5);
            padding: 10px 10px;
            border-radius: 1rem;
            transition: 0.5s ease-in;
            color: var(--color-white);
        }
        .add a i{
            font-size: 2.5rem;
            font-weight: 400;
        }
        .add a h2{
            display: none;
            font-size: 1.3rem;
            font-weight: 400;
            padding-left: 1rem;
        }
        .add a:hover{
            box-shadow: 0 0 1rem var(--color-primary);
            color: var(--color-primary);
            transition: .5s;
        }
        .add a:hover h2{
            display: block;
        }
        
        /*---------- Right Side Panel ----------*/
        .right{
            margin: .5rem 0 .5rem 1rem;
            height: 100%;
            width: 50%;
        }
        .right .top{
            width: 100%;
            height: 40px;
        }
        .right .top .theme-tog{
            display: flex;
            position: absolute;
            right: 2.5rem;
            background: var(--color-toggle);
            justify-content: space-between;
            align-items: center;
            height: 2rem;
            width: 4.2rem;
            cursor: pointer;
            border-radius: 0.4rem;
        }
        .top .theme-tog span{
            font-size: 1.2rem;
            width: 50%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .top .theme-tog span.active{
            background: var(--color-primary);
            color: #fff;
            border-radius: 0.4rem;
        }
        .rig{
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 2rem;
        }
        .details{
            background: var(--color-pro);
            padding: 1rem 1.5rem;
            border-radius: 2rem;
            line-height: 2rem;
            box-shadow: 0 0 1rem 0 rgba(0,0,0,0.5);
            width: 22rem;
            height: 35rem;
        }
        .details:hover{
            box-shadow: none;
        }
        #google{
            width: 100%;
            margin: 1.2rem 0 0;
        }
        .details img{
            width: 100%;
            margin: 1rem 0 0;
        }
        .details .table{
            width: 100%;
            position: relative;
            display: flex;
            justify-content: center;
            padding: .5rem 0;
            width: 100%;
            margin: 0;
            line-height: 2rem;
            background: var(--color-background);
            border-radius: 12px;
            box-shadow: 0 0 1rem 0 rgba(0,0,0,0.5);
        }
        .table table{
            font-size: 1.2rem;
        }
        .table table tr td{
            text-align: right;
        }
        .right .class{
            margin: 1rem;
            color: var(--color-dark-variant);
            background: var(--color-sidebar);
            padding: 1rem 1rem;
            height: 35rem;
            width: 23.7rem;
            border-radius: 2rem;
            box-shadow: 0 0 1rem 0 rgba(0,0,0,0.5);
            transition: all 300ms ease;
            text-align: center;
        }
        .right .class:hover{
            box-shadow: none;
        }
        .right .class h2{
            margin: 0.8rem 0 1rem 0;
            color: var(--color-white);
        }
        .right .class i{
            font-size: 10rem;
            color: var(--color-primary);
        }
        .right .class table{
            width: 100%;
            margin: .5rem 0 .5rem;
            font-size: 1rem;
        }
        .class table tr{
            height: 2.5rem;
            border-bottom: 2px solid var(--color-dark-variant);
        }
        .class table tr th{
            color: var(--color-white);
            text-align: center;
            padding-right: .5rem;
        }
        .class table tr th span{
            color: var(--color-white);
            font-size: 20px;
            padding: .55rem 2px;
        }
        .class table tr td{
            color: var(--color-dark-variant);
            width: 100%;
            text-align: left;
            padding-left: .5rem;
            border-bottom: 2px solid var(--color-dark-variant);
        }
        .class .btn{
            width: 100%;
            margin-top: 1rem;
        }
        .btn a{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .btn a button{
            margin: .8rem;
            padding: .5rem 1rem;
            border-radius: 5px;
            background: transparent;
            border: 2px solid var(--color-dark);
            color: var(--color-white);
            font-family: 'poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: all 0.4s ease;
        }
        .btn button span{
            padding-left: 1rem;
        }
        .btn a button:hover{
            box-shadow: 0 0 .8rem var(--color-primary);
            color: var(--color-primary);
            border-color: var(--color-primary);
        }
        @media screen and (max-width: 1300px){
            main{
                padding: 1rem 1rem;
                gap: 3rem;
            }
            main .main{
                width: 42%;
                margin-left: 1rem;
            }
            main .datetime{
                width: 100%;
            }
            .search{
                width: 100%;
            }
            .add{
                margin: 2rem 0;
                gap: 3rem;
            }
            .right{
                margin: .5rem 0 ;
                width: 55%;
            }
            .rig{
                margin-top: .2rem;
                gap: 1rem;
            }
            .details{
                width: 27rem;
                height: 36rem;
            }
            .right .class{
                width: 29rem;
                height: 36rem;
            }
        }
        @media screen and (min-width: 1920px) and (max-width: 3000px){
            body{
                overflow: hidden;
                zoom: 1.4;
            }
        }
    </style>
</head>
<body onload="initClock()">
    <main>
        <div class="main">
            <div class="logo">
                <i class='bx bxl-redux bx-spin' ></i>
                <div class="text">S<span class="id">tudents</span> D<span class="id">ata</span> M<span class="id">anagement</span> S<span class="id">ystem</span></div>
            </div>
                    
            <!-------------Date & Time------------->
            <div class="datetime">
                <div class="date">
                    <span id="dayname">day</span>,
                    <span id="month">month</span>
                    <span id="dayno">00</span>,
                    <span id="year">year</span>
                </div>
                <div class="time">
                    <span id="hour">00</span> :
                    <span id="min">00</span> :
                    <span id="sec">00</span>
                    <span id="period">AM</span>
                </div>
            </div>
            <div class="content">
                <div class="search">
                    <form action="" method="POST">
                        <input type="text" name="add" id="add" placeholder="Addmission No" autocomplete="off">
                        <input type="submit" value="sub" id="sub" name="sub">
                        <label for="sub"><i class='bx bx-search'></i></label>
                    </form>
                    <?php
                        @include 'config.php';

                        if(isset($_POST['sub'])){
                            $add =  $_POST['add'];

                            $sql = "SELECT * FROM app WHERE Addmission_No = '$add' ";
                            $result = $conn->query($sql);

                            if($result-> num_rows > 0){
                                while($row = $result-> fetch_assoc()){
                        
                    ?>
                    <div class="tab">
                        <table>
                            <tr>
                                <th>Addmission No</th><th class="space">:</th><td><?= $row["Addmission_No"] ?></td>
                            </tr>
                            <tr>
                                <th>Full Name</th><th class="space">:</th><td><?= $row["First_Name"] ?> <?= $row["Last_Name"] ?></td>
                            </tr>
                            <tr>
                                <th>DOB</th><th class="space">:</th><td><?= $row["DOB"] ?></td>
                            </tr>
                            <tr>
                                <th>Gender</th><th class="space">:</th><td><?=$row["Gender"]?></td>
                            </tr>
                            <tr>
                                <th>NIC No</th><th class="space">:</th><td><?= $row["NIC_No"] ?></td>
                            </tr>
                            <tr>
                                <th>Telephone</th><th class="space">:</th><td><?= $row["Telephone_No"] ?></td>
                            </tr>
                            <tr>
                                <th>Email</th><th class="space">:</th><td><?= $row["Email"] ?></td>
                            </tr>
                        </table>
                    </div>
                    <?php
                                }
                            }
                            else{
                                echo '<div class="tab" id="zero"> 0 Results </div>';
                            }
                        };
                    ?>
                </div>
            </div>

            <div class="add">
                <a href="Application.html">
                    <i class='bx bx-user-plus' ></i>
                    <h2>Add Students</h2>
                </a>
                <a href="sheet.php" target="_blank">
                    <i class='bx bx-spreadsheet'></i>
                    <h2>Mark Sheet</h2>
                </a>
                <a href="UserCon.php">
                    <i class='bx bx-message'></i>
                    <h2>Contact Us</h2>
                </a>
            </div>
            <!-------------End of Insight------------->
        </div>
        
    <!--------------------End of Main--------------------->
        <div class="right">
            <div class="top">
                <div class="theme-tog">
                    <span class="material-icons-round active">dark_mode</span>
                    <span class="material-icons-round">light_mode</span>
                </div>
            </div>
            <div class="rig">
            <!-------------User Panel------------->
                <div class="details">
                    <form action="https://www.google.com/search" method="GET" id="google">    
                        <input type="submit" value="sub" id="sub" name="sub">
                        <label for="sub"><i class='bx bx-search'></i></label>
                        <input type="text" name="q" id="add" placeholder="Google Search..." autocomplete="off">
                    </form>
                    <img src="Pic/interface technology.png" alt="User Interface">
                    <div class="table">
                        <table>
                            <tr>
                                <?php
                                    @include 'config.php';

                                    $count = "SELECT * FROM app WHERE Gender = 'Male'";
                                    $count_run = mysqli_query($conn, $count);
                                    $row = mysqli_num_rows($count_run);

                                ?>
                                <th>Boys</th><th class="space"> : </th><td><?= $row?></td>
                            </tr>
                            <tr>
                                <?php

                                    $count1 = "SELECT * FROM app WHERE Gender = 'Female'";
                                    $count_run1 = mysqli_query($conn, $count1);
                                    $row1 = mysqli_num_rows($count_run1);

                                ?>
                                <th>Girls</th><th class="space"> : </th><td><?= $row1?></td>
                            </tr>
                            <tr>
                                <?php

                                    $count2 = "SELECT * FROM app";
                                    $count_run2 = mysqli_query($conn, $count2);
                                    $row2 = mysqli_num_rows($count_run2);

                                ?>
                                <th>Total Students</th><th class="space"> : </th><td><?= $row2?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            <?php
                @include 'config.php';
                if($conn->connect_error){
                    die("Connection failed: ". $conn->connect_error);
                }

                $name = $_SESSION['user_name'];
                $sql = "SELECT * FROM form WHERE User_Name = '$name'";
                $result = $conn->query($sql);
                if($result-> num_rows > 0){
                    while($row = $result-> fetch_assoc()){
            ?>
            
            <div class="class">
                <h2>USER</h2>
                <i class='bx bx-user-circle bx-tada bx-flip-horizontal' ></i>
                <table>
                    <tr>
                        <th><span class="material-icons-round">person_outline</span></th>
                        <td><?= $row["User_Name"] ?></td>
                    </tr>
                    <tr>
                    <th><span class="material-icons-round">alternate_email</span></th>
                    <td><?= $row["Email"] ?></td>
                    </tr>
                    <tr>
                        <th><span class="material-icons-round">password</span></th>
                        <td>●●●●●●●●●●</td>
                    </tr>
                </table>

                <div class="btn">
                    <a href="Password Reset.php"><button>Change a Password <span class="material-icons-round">lock_reset</span></button></a>
                    <a href="logout.php"><button>Log Out <span class="material-icons-round">logout</span></button></a>
                </div>
            </div>
            <?php
                    }
                }
                else{
                    echo "<br> Error insert data : ". $conn->error;
                }
            ?>
            </div>
        </div>
    </main>
<!------------------------JavaScripts------------------------>
    <script>
        let btn = document.querySelector("#btn1");
        let sidebar = document.querySelector(".sidebar");
        let searchbtn = document.querySelector(".bx-search");

        btn.onclick = function(){
            sidebar.classList.toggle("active");
        }
        searchbtn.onclick = function(){
            sidebar.classList.toggle("active");
        }
    </script>
    <script type="text/javascript">
        function updateClock(){
            var now = new Date();
            var dname = now.getDay(),
                mo = now.getMonth(),
                dnum = now.getDate(),
                yr = now.getFullYear(),
                hou = now.getHours(),
                min = now.getMinutes(),
                sec = now.getSeconds(),
                pe = "AM";

                if(hou == 0){
                    hou = 12;
                }
                if(hou > 12){
                    hou= hou - 12;
                    pe = "PM";
                }

                Number.prototype.pad = function(digits){
                    for(var n = this.toString(); n.length < digits; n = 0 + n);
                    return n;
                }

                var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
                var week = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
                var ids = ["dayname", "month", "dayno", "year", "hour", "min", "sec", "period"];
                var values = [week[dname], months[mo], dnum.pad(2), yr, hou.pad(2), min.pad(2), sec.pad(2), pe];
                for(var i = 0; i < ids.length; i++)
                document.getElementById(ids[i]).firstChild.nodeValue = values[i];
        }

        function initClock(){
            updateClock();
            window.setInterval("updateClock()", 1);
        }
    </script>
    <script>

        const theme = document.querySelector(".theme-tog");

        theme.addEventListener('click', () => {
            document.body.classList.toggle('light-theme-variables');

            theme.querySelector('span:nth-child(1)').classList.toggle('active');
            theme.querySelector('span:nth-child(2)').classList.toggle('active');
        })
    </script>
</body>
</html>