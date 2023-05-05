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
    <link rel="icon" type="image/x-icon" href="Svg/bxs-contact.svg">
    <title>Contact</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lalezar&family=Marcellus&family=Noto+Sans:wght@500&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap');

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
            padding-left: 50px;
            font-size: 18px;
            color: var(--color-white);
        }
        .sidebar ul li .bx-search{
            position: absolute;
            z-index: 99;
            color: var(--color-white);
            font-size: 22px;
            transition: all 0.5 ease;
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
        main .message{
            background: var(--color-sidebar);
            margin: 2rem 0;
            height: 75vh;
            width: 100%;
            border-radius: 2rem;
            box-shadow: 0 0 1.5rem 0 rgba(0,0,0,0.5);
            text-align: center;
            padding: 1rem;
        }
        main .message:hover{
            box-shadow: none;
        }
        .message h3{
            font-size: 1.6rem;
            color: var(--color-white);
            padding: 0 0 .5rem 0;
        }
        .message hr{
            border: .5px solid var(--color-white);
            margin-bottom: .4rem;
        }
        .message .msg{
            height: 77%;
            overflow-y: auto;
            padding: .5rem;

        }
        /* width */
        ::-webkit-scrollbar {
            width: 10px;
            height: 10px;
        }
        /* Track */
        ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 5px grey; 
            border-radius: 10px;
        }        
        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #888; 
            border-radius: 10px;
        }
        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #555; 
        }

        .msg li{
            background: var(--color-background);
            max-width: fit-content;
            padding: .5rem 1rem;
            border-bottom-left-radius: 1.5rem;
            border-top-right-radius: 1.5rem;
            border-bottom-right-radius: 1.5rem;
            margin: .5rem 10rem 1rem .5rem;
            text-align: left;
            box-shadow: 3px 3px 5px 0 rgba(0,0,0,0.5),
                        -3px -3px 5px 0 rgba(0,0,0,0.5);
        }
        .msg #li{
            position: relative;
            max-width: fit-content;
            right: 0;
            text-align: right;
            margin: .5rem 0 1rem auto;
            border-top-right-radius: 0;
            border-top-left-radius: 1.5rem;
        }
        .sidebar.active ~ main .message .msg #li{
            position: relative;
            margin: .5rem 0 1rem auto;
            overflow-x: none;
        }
        .msg li h4{
            color: var(--color-info-dark);
        }
        .msg li p{
            color: var(--color-white);
            font-size: .9rem;
            text-align: left;
            padding: 0 .5rem;
        }
        .msg li .small{
            color: var(--color-info-dark);
            font-size: .9rem;
            text-align: right;
            margin-top: .5rem;
        }
        .message .send{
            margin-top: .2rem;
            border-top: 2px solid var(--color-white);
        }
        .send form{
            display: flex;
            align-items: center;
            justify-content: center;
            padding: .5rem 0;
            color: var(--color-white);
            z-index: 1;
        }
        #txt{
            width: 93%;
            height: 2.7rem;
            padding: 0.1rem .5rem;
            color: var(--color-white);
            background: transparent;
            border-bottom: 1px solid var(--color-white);
            font-size: 15px;
            font-family: 'Poppins', sans-serif;
            resize:inherit;
            line-height: 2rem;
        }
        #txt:focus{
            border-bottom: 2px solid #7380ec;
        }
        .send form #sub{
            display: none;
        }
        .send form .bxs-send{
            font-size: 2.1rem;
            height: 2.5rem;
            display: flex;
            align-items: center;
            margin-left: .5rem;
            color: var(--color-primary);
        }
        .send form .bxs-send:hover{
            text-shadow: 0 0 20px #7380ec;
        }
        /*----------Right----------*/
        .right{
            margin-left: 3rem;
            margin-right: 1rem;
            margin: .8rem auto;
            height: 100%;
            width: 40rem;
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
            padding: 1rem 1.2rem;
            height: 37rem;
            border-radius: 2rem;
            box-shadow: 0 0 1.5rem 0 rgba(0,0,0,0.5);
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
        .right .class img{
            width: 15rem;
            margin: -3.5rem 0;
        }
        .user{
            width: 100%;
            height: 60%;
            margin-top: 1rem;
            padding: 0 .5rem;
            font-family: 'Poppins';
            color: var(--color-white);
            overflow-y: auto;
        }
        .user ul li{
            background: var(--color-background);
            max-width: 95%;
            padding: .5rem 1rem;
            border-bottom-left-radius: 1.5rem;
            border-top-right-radius: 1.5rem;
            border-bottom-right-radius: 1.5rem;
            margin: .5rem 0 1rem 0;
            text-align: left;
            box-shadow: 3px 3px 5px 0 rgba(0,0,0,0.5),
                        -3px -3px 5px 0 rgba(0,0,0,0.5);
        }
        .user ul li h4{
            color: var(--color-info-dark);
        }
        .user ul li h5{
            color: var(--color-dark-variant);
            padding: 0 .5rem;
        }
        .user ul li p{
            color: var(--color-white);
            font-size: .9rem;
            text-align: left;
            padding: 0 .5rem;
        }
        .user ul li .small{
            color: var(--color-info-dark);
            font-size: .9rem;
            text-align: right;
            margin-top: .5rem;
        }
        @media screen and (max-width: 1300px) {
            main .main{
                width: 80%;
            }
            .right .class{
                height: 38.6rem;
            }
            .user{
                height: 60%;
            }
        }
        @media screen and (min-width: 1920px) and (max-width: 3000px){
            body{
                overflow: hidden;
                zoom: 1.4;
            }
            main .message{
                height: 53vh;
            }
            .right .class{
                height: 38.6rem;
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
                    <span class="links_name">Message</span>
                </a>
            </li>
            <li>
                <a href="Settings.php">
                    <i class='bx bx-cog' ></i>
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
            <div class="text">Message & Contact</div>

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

            <div class="message">
                <h3>Message</h3><hr>
                <div class="msg">
                    <ul>
                        <li>
                            <h4>Welcome Message:</h4>
                            <p>Like a scene in a movie or a verse in a song, paragraphs are the building blocks of any good piece of writing. Paragraphs lend a natural rhythm to your writing that makes it a joy to read.</p>
                            <div class="small">Today</div>
                        </li>
                        <?php
                            @include 'config.php';
                            if($conn->connect_error){
                                die("Connection failed: ". $conn->connect_error);
                            }

                            $sql = "SELECT * FROM message ORDER BY Time ASC";
                            $result = $conn->query($sql);

                            if($result-> num_rows > 0){
                                while($row = $result-> fetch_assoc()){       
                        ?>
                        <li id="li">
                            <h4>Message :</h4>
                            <p><?= nl2br($row["Message"])?></p>
                            <div class="small"><?= $row["Time"] ?></div>
                        </li>
                        <?php
                                }
                            }
                        ?>
                    </ul>
                </div>
                <div class="send">
                    <form action="message.php" method="POST">
                        <textarea type="text" name="txt" id="txt" placeholder="Informative Message"></textarea>
                        <input type="submit" value="sub" id="sub">
                        <label for="sub"><i class='bx bxs-send'></i></label>
                    </form> 
                </div>
            </div>

        </div>

        <div class="right">
            <div class="top">
                <div class="theme-tog">
                    <span class="material-icons-round active">dark_mode</span>
                    <span class="material-icons-round">light_mode</span>
                </div>
            </div>
            <div class="class">
                <h2>Users Message</h2>
                <img src="Pic/message.png" alt="Contact">
                <div class="user">
                    <ul>
                        <?php
                            @include 'config.php';

                            if($conn->connect_error){
                                die("Connection failed: ". $conn->connect_error);
                            }

                            $sql = "SELECT * FROM contact ORDER BY Time ASC";
                            $result = $conn->query($sql);

                            if($result-> num_rows > 0){
                                while($row = $result-> fetch_assoc()){       
                        ?>
                        <li>
                            <h4><?= $row["Name"] ?> :</h4>
                            <h5>Email : <?= $row["Email"] ?></h5>
                            <p><?= nl2br($row["Message"])?></p>
                            <div class="small"><?= $row["Time"] ?></div>
                        </li>
                        <?php
                                }
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </main>

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