<?php

@include 'config.php';

session_start();

if(isset($_SESSION_1['admin_name'])){
    header('location:Home.php');
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
    <link rel="icon" type="image/x-icon" href="Svg/manage_accounts_black_24dp.svg">
    <title>Settings</title>
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
            min-height: 100vh;
            width: 100%;
            background: var(--color-background);
            user-select: none;
            font-family: 'Poppins', sans-serif;
        }
        .sidebar{
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 78px;
            background: var(--color-sidebar);
            padding: 6px 14px;
            transition: all 0.5s ease;
        }
        .sidebar.active{
            width: 240px;
        }
        .sidebar .logo_content .logo{
            color: var(--color-white);
            display: flex;
            height: 50px;
            width: 100%;
            align-items: center;
            opacity: 0;
            pointer-events: none;
            transition: all .5s ease;
        }
        .sidebar.active .logo_content .logo{
            opacity: 1;
            pointer-events: none;
        }
        .logo_content .logo i{
            font-size: 28px;
            margin-right: 5px;
            color: var(--color-info-dark);
        }
        .logo_content .logo .logo_name{
            font-size: 20px;
            font-weight: 600;
            color: var(--color-info-dark);
            font-family: 'Marcellus';
        }
        .sidebar #btn1{
            position: absolute;
            color: var(--color-white);
            left: 50%;
            top: 6px;
            font-size: 20px;
            height: 50px;
            width: 50px;
            text-align: center;
            line-height: 50px;
            transform: translateX(-50%);
        }
        .sidebar.active #btn1{
            left: 90%;
        }
        .sidebar ul{
            margin-top: 20px;
        }
        .sidebar ul li{
            list-style: none;
            position: relative;
            height: 50px;
            width: 100%;
            margin: 0;
            line-height: 50px;
        }
        .sidebar ul li input{
            position: absolute;
            height: 100%;
            width: 100%;
            left: 0;
            top: 0;
            border-radius: 12px;
            outline: none;
            border: none;
            background: var(--color-pro);
            padding: 0 0 0 50px;
            font-size: 18px;
            color: var(--color-white);
        }
        .sidebar ul li .bx-search{
            position: absolute;
            z-index: 99;
            color: var(--color-white);
            font-size: 22px;
            transition: all 0.5 ease;
            margin-left: -1rem;
        }
        .sidebar ul li .bx-search:hover{
            background: var(--color-white);
            color: var(--color-primary);
        }
        .sidebar ul #blank{
            margin-bottom: 3rem;
        }
        .sidebar ul li a{
            color: var(--color-white);
            display: flex;
            align-items: center;
            text-decoration: none;
            transition: all 0.3s ease;
            border-radius: 12px;
            white-space: nowrap;
        }
        .sidebar ul li a:hover{
            color: var(--color-primary);
            background: var(--color-hover);
        }
        .sidebar ul li i{
            height: 50px;
            min-width: 50px;
            border-radius: 12px;
            line-height: 50px;
            text-align: center;
        }
        .sidebar .links_name{
            opacity: 0;
            pointer-events: none;
            transition: all .5s ease;
        }
        .sidebar.active .links_name{
            opacity: 1;
            pointer-events: auto;
        }
        .sidebar ul li h4{
            background: red;
            margin-left: 1rem;
            padding: .3rem .35rem .22rem .38rem;
            height: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 5px;
            font-size: 1rem;
            letter-spacing: .05rem;
            font-weight: 400;
            opacity: 0;
            pointer-events: none;
            transition: all .5s ease;
        }
        .sidebar.active ul li h4{
            opacity: 1;
            pointer-events: auto;
        }
        .sidebar .profile_content{
            position: absolute;
            color: var(--color-white);
            bottom: 0;
            left: 0;
            width: 100%;
        }
        .sidebar .profile_content .profile{
            position: relative;
            padding: 10px 6px;
            height: 60px;
            background: none;
            transition: all 0.4s ease;
        }
        .sidebar.active .profile_content .profile{
            background: var(--color-pro);
        }
        .profile_content .profile .profile_details{
            display: flex;
            align-items: center;
            opacity: 0;
            pointer-events: none;
            white-space: nowrap;
        }
        .sidebar.active .profile .profile_details{
            opacity: 1;
            pointer-events: auto;
        }
        .profile .profile_details i{
            height: 45px;
            width: 45px;
            font-size: 45px;
            font-weight: 400;
        }
        .profile .profile_details .name_job{
            margin-left: 10px;
        }
        .profile .profile_details .name{
            font-size: 16px;
            font-weight: 400;
        }
        .profile .profile_details .job{
            font-size: 12px;
        }
        .profile a #log_out{
            position: absolute;
            left: 48%;
            bottom: 5px;
            transform: translateX(-50%);
            min-width: 50px;
            line-height: 50px;
            font-size: 20px;
            border-radius: 12px;
            text-align: center;
            transition: all 0.5s ease;
            background: var(--color-pro);
        }
        .sidebar.active .profile #log_out{
            left: 88%;
            background: none;
        }

        /*---------------MAIN---------------*/
        main{
            position: absolute;
            display: flex;
            height: 100%;
            width: calc(100% - 88px);
            left: 88px;
            transition: all 0.5s ease;
            padding: .8rem 1rem;
            font-family: 'Poppins', sans-serif;
            gap: 1.6rem;
        }
        .sidebar.active ~ main{
            width: calc(100% - 240px);
            left: 240px;
        }
        main .main{
            width: 70%;
        }
        main .text{
            font-family: 'Lalezar', cursive;
            font-size: 30px;
            font-weight: 500;
            color: var(--color-white);
        }
        main .datetime{
            display: flex;
            background-color: var(--color-light);
            border-radius: 0.4rem;
            margin-top: 0.3rem;
            width: fit-content;
            padding: 0.4rem 0.7rem;
            font-size: 15px;
            color: var(--color-white);
            box-shadow: 3px 3px 5px 0 rgba(0,0,0,0.5),
                        -3px -3px 5px 0 rgba(0,0,0,0.5);
        }
        main .datetime .time{
            padding-left: 1rem;
        }
        main .insight{
            margin: 1rem 0;
            height: 78vh;
        }
        main .insight h2{
            color: var(--color-white);
            margin-top: 1rem;
        }
        .sidebar.active ~ main .insight h2{
            color: var(--color-white);
            margin-top: .5rem;
        }
        .box{
            display: flex;
            gap: 2rem;
        }
        .modify{
            margin: 1rem 0;
            color: var(--color-dark-variant);
            background: var(--color-sidebar);
            padding: 1rem 0;
            border-radius: 2rem;
            box-shadow: 0 0 1.5rem var(--color-light);
            width: 50%;
            transition: all 300ms ease;
        }
        .modify:hover{
            box-shadow: none;
        }
        .modify h3{
            color: var(--color-white);
            text-align: center;
        }
        form{
            margin: .5rem 1rem;
            color: var(--color-white);
        }
        form label{
            padding-right: .5rem;
            font-size: 1.1rem;
        }
        form #add{
            font-size: 15px;
            border-radius: 5px;
            margin-bottom: 1rem;
            width: 66%;
            background: transparent;
            color: var(--color-info-dark);
            border-bottom: 1px solid #999;
        }
        .sidebar.active ~ main form #add{
            width: 58.5%;
        }
        #add:focus{
            border-bottom: 2px solid #7380ec;
        }
        form .update{
            display: flex;
            align-items: center;
        }
        .update select{
            border: 1px solid #999;
            width: 39%;
            background: transparent;
            font-family: 'Poppins', sans-serif;
            font-size: 1.1rem;
            border-radius: 5px;
            height: 1.8rem;
            color: var(--color-info-dark);
            padding: 0 .4rem;
            margin-right: .5rem;
        }
        .update select option{
            background: rgb(161, 152, 152);
            font-family: 'Poppins', sans-serif;
            color: #fff;
        }
        .update .input{
            margin-left: .5rem;
            font-size: 15px;
            border-radius: 5px;
            width: 56%;
            background: transparent;
            color: var(--color-info-dark);
            border-bottom: 1px solid #999;
        }
        .update #date{
            font-size: 15px;
            width: 40%;
            text-align: center;
            border: 1px solid #999;
            display: none;
            color: var(--color-info-dark);
        }
        #tel{
            display: none;
        }
        #txt:focus{
            border-bottom: 2px solid #7380ec;
        }
        #date:focus{
            border: 2px solid #7380ec;
        }
        #tel:focus{
            border-bottom: 2px solid #7380ec;
        }
        #tel:valid{
            border-bottom: 2px solid #6eff3e;
        }
        input[type=text],#tel{
            border-bottom: 1px solid #999;
            padding: 0 .5rem;
            font-weight: 400;
            font-family: 'Poppins', sans-serif;
            color: var(--color-info-dark);
        }
        .act{
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 1rem;
            margin-top: 1rem;
        }
        #mod{
            margin: .5rem 0 0;
            padding: .1rem 1rem;
            border-radius: 5px;
            background: transparent;
            border: 2px solid var(--color-dark);
            color: var(--color-white);
            font-family: 'poppins', sans-serif;
            transition: all 0.4s ease;
        }
        #mod:hover{
            box-shadow: 0 0 .5rem var(--color-primary);
            color: var(--color-primary);
            border-color: var(--color-primary);
        }
        .delete{
            margin: 1rem 0;
            color: var(--color-dark-variant);
            background: var(--color-sidebar);
            padding: 1rem 0;
            border-radius: 2rem;
            box-shadow: 0 0 1.5rem var(--color-light);
            width: 50%;
            transition: all 300ms ease;
        }
        .delete:hover{
            box-shadow: none;
        }
        .delete h3{
            color: var(--color-white);
            text-align: center;
            margin-bottom: 1.8rem;
        }
        #reg{
            font-size: 15px;
            border-radius: 5px;
            margin-bottom: 1rem;
            width: 66%;
            background: transparent;
            color: var(--color-info-dark);
            border-bottom: 1px solid #999;
        }
        .sidebar.active ~ main form #reg{
            width: 59%;
        }
        #reg:focus{
            border-bottom: 2px solid #7380ec;
        }
        #txt1:focus{
            border-bottom: 2px solid #7380ec;
        }
        #date1{
            display: none;
            font-size: 15px;
            width: 40%;
            text-align: center;
            border: 1px solid #999;
            color: var(--color-info-dark);
        }
        #tel1{
            display: none;
            border-bottom: 1px solid #999;
            padding: 0 .5rem;
            font-weight: 400;
            font-family: 'Poppins', sans-serif;
            color: var(--color-info-dark);
        }
        #tel1:focus{
            border-bottom: 2px solid #7380ec;
        }
        #tel1:valid{
            border-bottom: 2px solid #6eff3e;
        }
        #re{
            display: none;
            margin-left: .5rem;
            width: 15rem;
        }
        #bg{
            display: none;
            margin-left: .5rem;
            width: 15rem;
        }
        #str{
            display: none;
            margin-left: .5rem;
            width: 15rem;
        }
        #med{
            display: none;
            margin-left: .5rem;
            width: 15rem;
        }

        /*---------------Right---------------*/
        .right{
            margin-left: 3rem;
            margin-right: 1rem;
            margin: .8rem auto;
            height: 100%;
            width: 25rem;
        }
        .right .top{
            width: 100%;
            height: 40px;
        }
        .right .top .theme-tog{
            display: flex;
            position: absolute;
            right: 2.5rem;
            margin-top: .2rem;
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
        .right .class{
            margin: 1rem;
            color: var(--color-dark-variant);
            background: var(--color-sidebar);
            padding: 1rem 1rem;
            height: 35rem;
            border-radius: 2rem;
            box-shadow: 0 1rem 2rem var(--color-light);
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

        @media screen and (max-width: 1300px) {
            .box{
                gap: 1rem;
            }
            form label{
                padding-right: .5rem;
                font-size: 1.05rem;
            }
            form #add{
                width: 64%;
                background: transparent;
                color: var(--color-info-dark);
                border-bottom: 1px solid #999;
            }
            .sidebar.active ~ main form #add{
                width: 55%;
            }
            #reg{
                width: 65%;
            }
            .sidebar.active ~ main form #reg{
                width: 57%;
            }
            .right .class{
                height: 36.5rem;
            }
            .class .btn{
                margin-top: 2rem;
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
    <div class="sidebar">
        <div class="logo_content">
            <div class="logo">
                <i class='bx bxl-redux bx-spin' ></i>
                <div class="logo_name">SDMS</div>
            </div>
            <i class='bx bx-menu' id="btn1"></i>
        </div>
        <ul class="nav_list">
            <li id="blank">
                <form action="https://www.google.com/search" method="GET">    
                    <i class='bx bx-search'></i>
                    <input type="text" name="q" id="search" placeholder="Google Search..." autocomplete="off">
                </form>
            </li>
            <li>
                <a href="Home.php">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="mark.php">
                    <i class='bx bx-spreadsheet'></i>
                    <span class="links_name">Mark Sheet</span>
                </a>
            </li>
            <li>
                <a href="Contact.php">
                    <i class='bx bx-message'></i>
                    <?php
                        @include 'config.php';

                        $count = "SELECT * FROM contact";
                        $count_run = mysqli_query($conn, $count);
                        $row = mysqli_num_rows($count_run);
                    ?>
                    <span class="links_name">Message</span> <h4><?= $row ?></h4>
                </a>
            </li>
            <li>
                <a href="Settings.php">
                    <i class='bx bx-cog'></i>
                    <span class="links_name">Settings</span>
                </a>
            </li>
            <li>
                <a href="About.php">
                    <i class='bx bx-book'></i>
                    <span class="links_name">About</span>
                </a>
            </li>
        </ul>
        <div class="profile_content">
            <div class="profile">
                <div class="profile_details">
                    <i class='bx bx-user-circle bx-tada bx-flip-horizontal' ></i>
                    <div class="name_job">
                        <div class="name"><?php echo $_SESSION['admin_name']?></div>
                        <div class="job">Admin</div>
                    </div>
                </div>
                <a href="logout.php" style="color: #fff;"><i class='bx bx-log-out' id="log_out"></i></a>
            </div>
        </div>
    </div>
    <!------------------------MAIN------------------------>
    <main>
        <div class="main">
            <div class="text">Settings</div>
          
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
            <div class="insight">
                <h2>Student Details</h2>
                <div class="box">
                    <div class="modify">
                        <h3>Modify Details</h3>
                        <form action="modify.php" method="POST">
                            <label for="add">Addmission No : </label><input type="text" name="add" id="add" autocomplete="off" required>
                            <div class="update">
                                <select name="app" id="app" onclick="select()">
                                    <option value="First_Name">First_Name</option>
                                    <option value="Last_Name">Last_Name</option>
                                    <option value="DOB">DOB</option>
                                    <option value="Gender">Gender</option>
                                    <option value="Telephone_No">Telephone_No</option>
                                    <option value="NIC_No">NIC_No</option>
                                    <option value="Email">Email</option>
                                </select>:
                                <input type="text" name="txt" id="txt" class="input" autocomplete="off">
                                <input type="date" name="dob" id="date" class="input">
                                <input type="tel" name="tel" id="tel" class="input" maxlength="14" pattern="[0-9,(,)]{5} [0-9]{3} [0-9]{4}" placeholder="(000) 000 0000" autocomplete="off">
                            </div>
                            <div class="act">
                                <input type="reset" value="Clear" id="mod">
                                <input type="submit" value="Modify" id="mod">
                            </div>
                        </form>
                    </div>
                    <div class="delete">
                        <h3>Delete Details</h3>
                        <form action="delete.php" method="POST">
                            <label for="add">Addmission No : </label><input type="text" name="addno" id="add" autocomplete="off">
                            <div class="act">
                                <input type="reset" value="Clear" id="mod">
                                <input type="submit" value="Delete" id="mod">
                            </div>
                        </form>
                    </div>
                </div>

                <h2>Teacher Details</h2>
                <div class="box">
                    <div class="modify">
                        <h3>Modify Details</h3>
                        <form action="modifyT.php" method="POST">
                            <label for="reg">Registation No : </label><input type="text" name="reg" id="reg" autocomplete="off" required>
                            <div class="update">
                                <select name="app" id="app1" onclick="selectfunction()">
                                    <option value="Full_Name">Full_Name</option>
                                    <option value="Qualification">Qualification</option>
                                    <option value="NIC_No">NIC_No</option>
                                    <option value="DOB">DOB</option>
                                    <option value="Gender">Gender</option>
                                    <option value="Religion">Religion</option>
                                    <option value="Blood_Group">Blood_Group</option>
                                    <option value="Home">Home</option>
                                    <option value="Email">Email</option>
                                    <option value="Phone_No">Phone_No</option>
                                    <option value="Stream">Stream</option>
                                    <option value="Subject">Subject</option>
                                    <option value="Medium">Medium</option>
                                    <option value="Work_Years">Work_Years</option>
                                </select>:
                                <input type="text" name="txt" id="txt1" class="input" autocomplete="off">
                                <input type="date" name="dob" id="date1" class="input">
                                <input type="tel" name="tel" id="tel1" class="input" maxlength="14" pattern="[0-9,(,)]{5} [0-9]{3} [0-9]{4}" placeholder="(000) 000 0000" autocomplete="off">
                                <select name="re" id="re">
                                    <option value=""></option>
                                    <option value="Buddhism">Buddhism</option>
                                    <option value="Hinduism">Hinduism</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Roman Catholic">Roman Catholic</option>
                                    <option value="Other Christian">Other Christian</option>
                                </select>
                                <select name="bg" id="bg">
                                    <option value=""></option>
                                    <option value="A RhD positive (A+)">A RhD positive (A+)</option>
                                    <option value="A RhD negative (A-)">A RhD negative (A-)</option>
                                    <option value="B RhD positive (B+)">B RhD positive (B+)</option>
                                    <option value="B RhD negative (B-)">B RhD negative (B-)</option>
                                    <option value="O RhD positive (O+)">O RhD positive (O+)</option>
                                    <option value="O RhD negative (O-)">O RhD negative (O-)</option>
                                    <option value="AB RhD positive (AB+)">AB RhD positive (AB+)</option>
                                    <option value="AB RhD negative (AB-)">AB RhD negative (AB-)</option>
                                </select>
                                <select name="str" id="str">
                                    <option value=""></option>
                                    <option value="Arts">Arts</option>
                                    <option value="Commerce">Commerce</option>
                                    <option value="Bio Science">Bio Science</option>
                                    <option value="Physical Science (Maths)">Physical Science (Maths)</option>
                                    <option value="Technology">Technology</option>
                                </select>
                                <select name="med" id="med">
                                    <option value=""></option>
                                    <option value="Tamil">Tamil</option>
                                    <option value="Sinhala">Sinhala</option>
                                    <option value="English">English</option>
                                </select>

                            </div>
                            <div class="act">
                                <input type="reset" value="Clear" id="mod">
                                <input type="submit" value="Modify" id="mod">
                            </div>
                        </form>
                    </div>
                    <div class="delete">
                        <h3>Delete Details</h3>
                        <form action="deleteT.php" method="POST">
                            <label for="reg">Registation No : </label><input type="text" name="addno" id="reg" autocomplete="off">
                            <div class="act">
                                <input type="reset" value="Clear" id="mod">
                                <input type="submit" value="Delete" id="mod">
                            </div>
                        </form>
                    </div>
                </div>
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
            <?php
                @include 'config.php';
                if($conn->connect_error){
                    die("Connection failed: ". $conn->connect_error);
                }

                $name = $_SESSION['admin_name'];
                $sql = "SELECT * FROM form WHERE User_Name = '$name'";
                $result = $conn->query($sql);
                if($result-> num_rows > 0){
                    while($row = $result-> fetch_assoc()){
            ?>
            
            <div class="class">
                <h2>ADMIN</h2>
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
    <script>
        function select()
        {
            let select = document.querySelector('select');
            var a = select.options[select.selectedIndex].text;
            var x = document.getElementById('txt');
            var y = document.getElementById('date');
            var z = document.getElementById('tel');

            if(a == 'DOB'){
                x.style.display = 'none';
                y.style.display = 'block';
                z.style.display = 'none';
            }
            else{
                if(a == 'Telephone_No'){
                x.style.display = 'none';
                y.style.display = 'none';
                z.style.display = 'block';
                }
                else{
                    x.style.display = 'block';
                    y.style.display = 'none';
                    z.style.display = 'none';
                }
            }
        }   
    </script>
    <script>
        function selectfunction()
        {
            let select = document.getElementById('app1');
            var a = select.options[select.selectedIndex].text;

            var t = document.getElementById('re');
            var u = document.getElementById('bg');
            var v = document.getElementById('str');
            var w = document.getElementById('med');
            var x = document.getElementById('txt1');
            var y = document.getElementById('date1');
            var z = document.getElementById('tel1');

            if(a == 'DOB'){
                t.style.display = 'none';
                u.style.display = 'none';
                v.style.display = 'none';
                w.style.display = 'none';
                x.style.display = 'none';
                y.style.display = 'block';
                z.style.display = 'none';
                
            }
            else{
                if(a == 'Phone_No'){
                    t.style.display = 'none';
                    u.style.display = 'none';
                    v.style.display = 'none';
                    w.style.display = 'none';
                    x.style.display = 'none';
                    y.style.display = 'none';
                    z.style.display = 'block';
                }
                else{
                    if(a == 'Religion'){
                        t.style.display = 'block';
                        u.style.display = 'none';
                        v.style.display = 'none';
                        w.style.display = 'none';
                        x.style.display = 'none';
                        y.style.display = 'none';
                        z.style.display = 'none';
                    }
                    else{
                        if(a == 'Blood_Group'){
                            t.style.display = 'none';
                            u.style.display = 'block';
                            v.style.display = 'none';
                            w.style.display = 'none';
                            x.style.display = 'none';
                            y.style.display = 'none';
                            z.style.display = 'none';
                        }
                        else{
                            if(a == 'Stream'){
                                t.style.display = 'none';
                                u.style.display = 'none';
                                v.style.display = 'block';
                                w.style.display = 'none';
                                x.style.display = 'none';
                                y.style.display = 'none';
                                z.style.display = 'none';
                            }
                            else{
                                if(a == 'Medium'){
                                    t.style.display = 'none';
                                    u.style.display = 'none';
                                    v.style.display = 'none';
                                    w.style.display = 'block';
                                    x.style.display = 'none';
                                    y.style.display = 'none';
                                    z.style.display = 'none';
                                }
                                else{
                                    t.style.display = 'none';
                                    u.style.display = 'none';
                                    v.style.display = 'none';
                                    w.style.display = 'none';
                                    x.style.display = 'block';
                                    y.style.display = 'none';
                                    z.style.display = 'none';
                                }
                            }
                        }
                    }
                }
            }
        }   
    </script>
</body>
</html>