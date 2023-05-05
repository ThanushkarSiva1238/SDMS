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

        /*---------------MAIN---------------*/
        main{
            position: absolute;
            display: flex;
            height: 100%;
            width: 100%;
            transition: all 0.5s ease;
            padding: .8rem 2rem;
            font-family: 'Poppins', sans-serif;
            gap: 1.6rem;
        }
        button{
            position: absolute;
            top: 15px;
            left: 12px;
            padding: 5px;
            border-radius: 50%;
            display: flex;
            gap: 5px;
            justify-content: center;
            align-items: center;
            background: var(--color-sidebar);
            border-color: var(--color-sidebar);
            color: var(--color-white);
            font-size: 18px;
            font-weight: bold;
            transition: .2s ease-out;
        }
        main .main{
            width: 70%;
        }
        main .text{
            font-family: 'Lalezar', cursive;
            margin-left: 1em;
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
            box-shadow: 0 0 1rem 0 rgba(0,0,0,0.5);
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
            margin: .3rem 0;
        }
        .message .msg{
            height: 82%;
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
        .msg li #p1{
            margin-bottom: .2rem;
            font-size: 13px;
        }
        .msg li #p1 span{
            color: #8e8e8e;
            font-size: 14px;
            font-weight: 500;
            padding-right: .5rem;
        }
        .msg li h4{
            color: var(--color-info-dark);
        }
        .msg li h5{
            color: var(--color-dark-variant);
            padding: 0 .5rem;
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
            width: 30rem;
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
        .right .class img{
            width: 15rem;
            margin: -3.5rem 0;
        }
        .txt{
            width: 100%;
            height: 2.5rem;
            margin-top: 1rem;
            padding: 0 1rem;
            font-family: 'Poppins';
            background: var(--color-background);
            color: var(--color-white);
            border: none;
        }
        .txt:focus{
            border: 1px solid var(--color-white);
        }
        #msg{
            width: 100%;
            height: 10rem;
            margin: 1rem 0;
            resize: none;
            padding: .4rem .8rem;
            font-family: 'Poppins';
            background: var(--color-background);
            color: var(--color-white);
            border: none;
        }
        #msg:focus{
            border: 1px solid var(--color-white);
        }
        #submit{
            padding: .5rem 1rem;
            border-radius: 5px;
            background: transparent;
            border: 2px solid var(--color-dark);
            color: var(--color-white);
            font-family: 'poppins', sans-serif;
            transition: all 0.4s ease;
            width: 40%;
        }
        #submit:hover{
            box-shadow: 0 0 .8rem var(--color-primary);
            color: var(--color-primary);
            border-color: var(--color-primary);
        }
        @media screen and (max-width: 1300px) {
            .right .class{
                height: 38.5rem;
            }
            #msg{
                height: 11.5rem;
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
    <!------------------------MAIN------------------------>
    <main>
        <div class="main">
            <button onclick="history.back()"><i class='bx bx-arrow-back'></i></button>
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
                            <h4>Contact Details:</h4>
                            <p id="p1"><span>Address :</span> No. 00, Main Address. Address</p>
                            <p id="p1"><span>Email :</span> EmailAddress@gmail.com</p>
                            <p id="p1"><span>Contact No :</span> +94 (00) 000 0000</p>
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
                            <h4>Message : </h4>
                            <p><?= nl2br($row["Message"])?></p>
                            <div class="small"><?= $row["Time"] ?></div>
                        </li>
                        <?php
                                }
                            }
                        ?>
                    </ul>
                </div>
                <hr>
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
                <h2>Contact Us</h2>
                <img src="Pic/message.png" alt="Contact">
                <form action="contact us.php" method="POST">
                    <input type="text" name="name" id="name" placeholder="Your Name" class="txt" autocomplete="off" required>
                    <input type="email" name="email" id="email" placeholder="Email" class="txt" autocomplete="off" required>
                    <textarea name="msg" id="msg" placeholder="Message"></textarea>
                    <input type="submit" value="Send" id="submit">
                </form>
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