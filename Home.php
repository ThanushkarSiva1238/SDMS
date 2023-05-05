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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="Svg/bxs-dashboard.svg">
    <title>DashBoard</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lalezar&family=Marcellus&family=Noto+Sans:wght@500&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');

        :root{
            --color-primary: #7380ec;
            --color-danger: #ff0070;
            --color-success: #0f0;
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
            font-weight: 500;
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
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.6rem;
            font-family: 'Poppins', sans-serif;
        }
        .sidebar.active ~ main .insight{
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
            font-family: 'Noto Sans', sans-serif;
        }
        main .study1{
            width: 17rem;
            height: 12rem;
        }
        main .insight a .study2{
            width: 17rem;
            height: 12rem;
        }
        main .insight a .study3{
            width: 17rem;
            height: 12rem;
        }
        .sidebar.active ~ main .study1{
            width: 15rem;
            height: 12rem;
        }
        .sidebar.active ~ main .insight a .study2{
            width: 15rem;
            height: 12rem;
        }
        .sidebar.active ~ main .insight a .study3{
            width: 15rem;
            height: 12rem;
        }
        main .insight a > div{
            background: var(--color-white);
            padding: 1.5rem;
            border-radius: 2rem;
            margin-top: 1rem;
            box-shadow: 0 1rem 2rem var(--color-light);
            transition: all 300ms ease;
            cursor: pointer;
            background: var(--color-sidebar);
            color: var(--color-white);
        }
        main .insight a > div:hover{
            box-shadow: none;
        }
        main .insight > div{
            background: var(--color-white);
            padding: 1.5rem;
            border-radius: 2rem;
            margin-top: 1rem;
            box-shadow: 0 1rem 2rem var(--color-light);
            transition: all 300ms ease;
            cursor: pointer;
            background: var(--color-sidebar);
            color: var(--color-white);
            transform-style: preserve-3d;
        }
        main .insight > div:hover{
            box-shadow: none;
        }
        main .insight a > div span{
            background: var(--bg);
            padding: 0.5rem;
            border-radius: 50%;
            font-size: 2rem;
            color: var(--color-background);
        }
        main .insight a > div .middle{
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
        }
        main .insight .study1 h4{
            padding: 0.2rem 1rem 0.6rem 1rem;
            font-size: 1.2rem;
            font-weight: 500;
            float: right;
        }
        main .insight h4{
            padding: 0.2rem 2rem 0.6rem 1.2rem;
            font-size: 1.2rem;
            font-weight: 500;
            float: right;
        }
        .sidebar.active ~ main .insight .study1 h4{
            padding: 0.2rem 0.3rem 0.6rem ;
            font-size: 1.1rem;
            float: right;
        }
        .sidebar.active ~ main .insight h4{
            padding: 0.2rem 1.1rem 0.6rem 1rem;
            font-size: 1.1rem;
            float: right;
        }
        main .insight .middle .left{
            text-align: center;
            width: 100%;
            font-size: 1.5rem;
            margin-top: .5rem;
        }
        main .insight small{
            display: block;
            font-size: 14px;
            color: var(--color-dark-variant);
        }
        .middle .box{
            position: relative;
            margin-right: .5rem;
        }
        .box .text{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: var(--color-white);
        }
        .text h2{
            font-size: 17px;
            font-weight: 400;
            letter-spacing: 1px;
        }
        .circle{
            width: 80px;
            height: 80px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .circle .points{
            width: 3px;
            height: 9px;
            background: var(--color-light);
            position: absolute;
            transform: rotate(calc(var(--i)*var(--rot))) translateY(-40px);
        }
        .points.marked{
            animation: glow 0.04s linear forwards;
            animation-delay: calc(var(--i)*0.05s);
        }

        @keyframes glow{
            0%{
                background: var(--color-light);
                box-shadow: none;
            }
            100%{
                background: var(--bgColor);
                box-shadow: 0 0 4.5px var(--bgColor);
            }
        }

        /*---------------Student Details---------------*/
        main .student-details{
            margin-top: 1rem;
            color: var(--color-white);
        }
        main .student-details h2{
            margin-bottom: .8rem;
        }
        main .student-details a table{
            background: var(--color-sidebar);
            width: 100%;
            border-radius: 2rem;
            padding: 1.5rem 1.5rem .7rem 1.5rem;
            text-align: center;
            box-shadow: 0 1rem 2rem var(--color-light);
            transition: all 300ms ease;
        }
        main .student-details a table:hover{
            box-shadow: none;
        }
        main a table tbody td{
            height: 2.2rem;
            border-bottom: 1px solid var(--color-light);
            color: var(--color-dark-variant);
        }
        main a table tbody .PS{
            color: var(--color-success);
        }
        main a table tbody .AS{
            color: var(--color-danger);
        }
        main a table tbody tr:last-child td{
            border: none;
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
            margin-top: 0.5rem;
            color: var(--color-dark-variant);
        }
        .right .class h2{
            margin-bottom: 0.8rem;
            color: var(--color-white);
        }
        .right .class .details{
            background: var(--color-sidebar);
            padding: 1rem .5rem;
            height: 16rem;
            border-radius: 2rem;
            box-shadow: 0 1rem 2rem var(--color-light);
            transition: all 300ms ease;
        }
        .right .class .details:hover{
            box-shadow: none;
        }
        .right .class .details .teacher{
            display: grid;
            grid-template-columns: 2.6rem auto;
            gap: 2rem;
            margin-bottom: 1rem;
            align-items: center;
        }
        .right .class .details .teacher .pro-pic i{
            padding: 4px 6px;
            font-size: 47px;
        }
        .right .class .details .teacher .message b{
            color: var(--color-primary);
        }
        .right .class .details .teacher .message ul{
            margin-left: .5rem;
            color: var(--color-dark-variant);
            font-size: 12px;
        }

        .right .students-reg{
            margin-top: 2rem;
        }
        .right .students-reg h2{
            margin-bottom: 0.8rem;
            color: var(--color-white);
        }
        .right .students-reg .name{
            background: var(--color-sidebar);
            display: flex;
            align-items: center;
            gap: 0.8rem;
            margin-bottom: 0.7rem;
            padding: 0.5rem 1rem;
            border-radius: 1.2rem;
            box-shadow: 0 .5rem 1rem var(--color-light);
            transition: all 300ms ease;
            color: var(--color-white);
        }
        .right .students-reg .name .info h3{
            color: var(--color-primary);
        }
        .right .students-reg .name .info small{
            color: var(--color-info-dark);
            padding-left: 1rem;
        }
        .right .students-reg .add{
            background: rgba(37, 36, 36, 0.18);
            display: flex;
            border: 2px dashed var(--color-primary);
            align-items: center;
            border-radius: 1.2rem;
            align-items: center;
            justify-content: center;
            color: var(--color-primary);
            padding: 1rem;
            box-shadow: 0 .5rem 1rem var(--color-light);
        }
        .right .students-reg .add div{
            display: flex;
        }
        .right .students-reg .add div i{
            font-size: 2rem;
            padding: 0 1rem;
        }
        .right .students-reg .name .ico span{
            padding-top: 5px;
            font-size: 3rem;
            color: #797474;
        }
        .right .students-reg .name:hover{
            box-shadow: none;
        }
        .right .students-reg .add:hover{
            box-shadow: none;
        }

        /*========== MEDIA OUERIES ==========*/
        @media screen and (max-width: 875px){
            main{
                padding: .8rem 1.5rem;
            }
            .sidebar.active{
                width: 40%;
                z-index: 99;
            }
            .profile .profile_details i{
                margin-left: .5rem;
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
            .main .datetime{
                width: 35.5rem;
                display: flex;
                align-items: center;
                justify-content: center;
                margin-top: 1rem;
            }
            .sidebar.active ~ main .datetime{
                width: 22.5rem;
            }
            main .insight{
                display: block;
                width: 35.5rem;
            }
            .sidebar.active ~ main .insight{
                display: block;
                width: 22.5rem;
            }
            .sidebar.active ~ main{
                width: calc(100% - 255px);
                left: 255px;
            }
            main .insight a .study1{
                width: 100%;
                height: 12.6rem;
            }
            .sidebar.active ~ main .insight a .study1{
                width: 100%;
                height: 12.6rem;
            }
            main .insight a .study2{
                width: 100%;
                height: 12.6rem;
            }
            .sidebar.active ~ main .insight a .study2{
                width: 100%;
                height: 12.6rem;
                margin-left: -.1rem;
            }
            main .insight a .study3{
                width: 100%;
                height: 12.6rem;
            }
            .sidebar.active ~ main .insight a .study3{
                width: 100%;
                height: 12.6rem;
            }
            main .insight .study1 h4{
                padding: 0.7rem 4rem 0 1rem;
                font-size: 1.5rem;
            }
            main .insight a h4{
                padding: 0.7rem 4rem 0.6rem 1.2rem;
                font-size: 1.5rem;
            }
            main .student-details{
                margin-top: 2rem;
                width: 36.5rem;
            }
            main .student-details table{
                width: 35.5rem;
            }
            .sidebar.active ~ main .student-details table{
                width: 22.5rem;
            }
            main .student-details table th:nth-child(4){
                display: none;
            }
            main .student-details table td:nth-child(4){
                display: none;
            }
            .sidebar.active ~ main .student-details table th:nth-child(3){
                display: none;
            }
            .sidebar.active ~ main .student-details table td:nth-child(3){
                display: none;
            }

            .right{
                z-index: 0;
                margin-top: -.3rem;
            }
            .sidebar.active ~ main .right{
                z-index: 0;
                margin-top: -.3rem;
            }
            .right .rig{
                position: absolute;
                left: 4.8rem;
                top: 75rem;
            }
            .right .class{
                margin-left: -3.2rem;
                width: 35.5rem;
            }
            .sidebar.active ~ main .right .class{
                margin-left: -3.2rem;
                width: 22.5rem;
            }
            .right .class h2{
                margin-bottom: 0.8rem;
            }
            .right .class .details{
                padding: 1.5rem 2rem;
                height: 16.6rem;
            } 
            .right .students-reg{
                width: 35.5rem;
                margin-left: -3.2rem;
                margin-bottom: 1rem;
            }
            .sidebar.active ~ main .right .students-reg{
                margin-left: -3.2rem;
                width: 22.5rem;
            }
            .right .students-reg h2{
                margin-bottom: 0.8rem;
                color: var(--color-white);
            }
        }
        @media screen and (max-width: 576px){
            body{
                overflow-x: hidden;
            }
            main{
                padding: .8rem .9rem;
            }
            .sidebar.active ~ main{
                display: none;
            }
            .sidebar{        
                z-index: 99;
            }
            .sidebar.active{
                width: 100%;
                padding: 1rem 2rem;
            }
            .profile .profile_details i{
                margin-left: 2rem;
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
            .main .datetime{
                width: 27rem;
                display: flex;
                align-items: center;
                justify-content: center;
                margin-top: 1rem;
            }
            main .insight{
                display: block;
            }
            main .insight a .study1{
                width: 27rem;
                height: 12.6rem;
            }
            main .insight a .study2{
                width: 27rem;
                height: 12.6rem;
            }
            main .insight a .study3{
                width: 27rem;
                height: 12.6rem;
            }
            main .insight .study1 h4{
                padding: 0.7rem 2.8rem 0 1rem;
                font-size: 1.5rem;
            }
            main .insight a h4{
                padding: 0.7rem 4rem 0.6rem 1.2rem;
                font-size: 1.5rem;
            }
            main .student-details{
                margin-top: 2rem;
                width: 28rem;
            }
            main .student-details table{
                width: 29rem;
            }
            main .student-details table th:nth-child(4){
                display: none;
            }
            main .student-details table td:nth-child(4){
                display: none;
            }

            .right{
                z-index: 0;
            }
            .right .rig{
                position: absolute;
                left: 4rem;
                top: 75rem;
            }
            .right .class{
                margin-left: -3.2rem;
                width: 27rem;
            }
            .right .class h2{
                margin-bottom: 0.8rem;
            }
            .right .class .details{
                padding: 1.5rem 2rem;
                height: 16.6rem;
            } 
            .right .students-reg{
                width: 27rem;
                margin-left: -3.2rem;
                margin-bottom: 1rem;
            }
            .right .students-reg h2{
                margin-bottom: 0.8rem;
                color: var(--color-white);
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
            <div class="text">Dashboard</div>
                    
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
                <a href="#">
                    <div class="study1">
                        <span class="material-icons-sharp" style="--bg: #7380ec;">groups</span><h4>Total Students</h4>
                        <div class="middle">
                            <div class="left">
                                <?php
                                    @include 'config.php';

                                    $count = "SELECT * FROM app";
                                    $count_run = mysqli_query($conn, $count);
                                    $row = mysqli_num_rows($count_run);

                                    echo '<h1>' . $row . '</h1>';

                                    $tot = ($row/$row)*100;
                                ?>
                                <small class="text-mute">Today</small>
                            </div>
                            <div class="box">
                                <div class="circle" data-dots="180" data-percentage="<?=$row?>" total="<?=$row?>" style="--bgColor: #7380ec;"></div>
                                <div class="text">
                                    <h2><?=$tot?>%</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="Boys_Table.php">
                    <div class="study2">
                        <span class="material-icons-sharp" style="--bg: #ff0070;">boy</span><h4>Total_Boys</h4>
                        <div class="middle">
                            <div class="left">
                                <?php
                                    @include 'config.php';

                                    $count = "SELECT * FROM app where Gender = 'Male'";
                                    $count_run = mysqli_query($conn, $count);
                                    $row1 = mysqli_num_rows($count_run);

                                    echo '<h1>' . $row1 . '</h1>';

                                    $tot = ($row1/$row)*100;
                                    $format1 = number_format($tot, 1);
                                ?>
                                <small class="text-mute">Today</small>
                            </div>
                            <div class="box">
                                <div class="circle" data-dots="180" data-percentage="<?=$row1?>" total="<?=$row?>" style="--bgColor: #ff0070;"></div>
                                <div class="text">
                                    <h2><?=$format1?>%</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="Girls_Table.php">
                    <div class="study3">
                        <span class="material-icons-sharp" style="--bg: #0f0;">girl</span><h4>Total_Girls</h4>
                        <div class="middle">
                            <div class="left">
                                <?php
                                    @include 'config.php';

                                    $count = "SELECT * FROM app where Gender = 'Female'";
                                    $count_run = mysqli_query($conn, $count);
                                    $row2 = mysqli_num_rows($count_run);

                                    echo '<h1>' . $row2 . '</h1>';

                                    $tot = ($row2/$row)*100;
                                    $format2 = number_format($tot, 1);
                                ?>
                                <small class="text-mute">Today</small>
                            </div>
                            <div class="box">
                                <div class="circle" data-dots="180" data-percentage="<?=$row2?>" total="<?=$row?>" style="--bgColor: #0f0;"></div>
                                <div class="text">
                                    <h2><?=$format2?>%</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <!-------------End of Insight------------->
            <div class="student-details">
                <h2>Student Details</h2>
                <a href="Student_Table.php">
                    <table>
                        <thead>
                            <tr style="color: #7380ec;">
                                <th>Add_No</th>
                                <th>First_Name</th>
                                <th>Last_Name</th>
                                <th>NIC_No</th>
                                <th>Gender</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php

                            @include 'config.php';

                            if($conn->connect_error){
                                die("Connection failed: ". $conn->connect_error);
                            }

                            $sql = "SELECT Addmission_No, First_Name, Last_Name, NIC_No, Gender FROM app ORDER BY Addmission_No ASC LIMIT 7";
                            $result = $conn->query($sql);

                            if($result-> num_rows > 0){
                                while($row = $result-> fetch_assoc()){
                        ?>
                            <tr><td><?= $row["Addmission_No"] ?></td>
                                <td><?= $row["First_Name"] ?></td>
                                <td><?= $row["Last_Name"] ?></td>
                                <td><?= $row["NIC_No"] ?></td>
                                <td><?php 
                                        if($row["Gender"]=="Male"){
                                            echo "<span class = AS> Male </span>";
                                        }
                                        else{
                                            echo "<span class = PS> Female </span>";
                                        }
                                    ?>
                                </td>
                            </tr>
                        <?php
                                }
                            }
                        ?>
                        </tbody>
                    </table>    
                </a>
            </div>
        </div>
        
    <!--------------------End of Main--------------------->
        <div class="right">
            <div class="top">
                <div class="theme-tog">
                    <span class="material-icons-sharp active">dark_mode</span>
                    <span class="material-icons-sharp">light_mode</span>
                </div>
            </div>
            <div class="rig">
            <!-------------Teacher's Details------------->
                <div class="class">
                    <h2>Class Teacher's Details</h2>
                    <a href="Teachers.php">
                        <div class="details">
                        <?php

                            @include 'config.php';

                            if($conn->connect_error){
                            die("Connection failed: ". $conn->connect_error);
                            }

                            $sql = "SELECT Full_Name, Subject, Medium FROM teachers ORDER BY ID ASC LIMIT 3";
                            $result = $conn->query($sql);

                            if($result-> num_rows > 0){
                                while($row = $result-> fetch_assoc()){
                        ?>
                            <div class="teacher">
                                <div class="pro-pic">
                                    <i class='bx bx-user-circle' style='color:#797474'></i>
                                </div>
                                <div class="message">
                                    <b><?= $row["Full_Name"] ?> :</b>
                                    <ul><li><strong>Subject :</strong> &nbsp; <?= $row["Subject"] ?> (<?= $row["Medium"] ?>)</li></ul>
                                </div>
                            </div>
                        <?php
                                }
                            }
                        ?>
                        </div>
                    </a>
                </div>
                
                <div class="students-reg">
                    <h2>Student Registation</h2>
                    <?php

                        @include 'config.php';

                        if($conn->connect_error){
                            die("Connection failed: ". $conn->connect_error);
                        }

                        $sql = "SELECT Addmission_No, First_Name, Last_Name, NIC_No FROM app ORDER BY Addmission_No DESC LIMIT 2";
                        $result = $conn->query($sql);

                        if($result-> num_rows > 0){
                            while($row = $result-> fetch_assoc()){
                    ?>
                    <div class="name">
                        <div class="ico">
                            <span class="material-icons-sharp">perm_identity</span>
                        </div>
                        <div class="info">
                            <h3><?= $row["First_Name"] ?> <?= $row["Last_Name"] ?></h3>
                            <small>Ad_No : <?= $row["Addmission_No"] ?></small>&nbsp;&nbsp;<small>NIC : <?= $row["NIC_No"] ?></small>
                        </div>
                    </div>
                    <?php
                            }
                        }
                    ?>

                    <a href="Application.html">
                        <div class="add">
                            <div>
                                <i class='bx bx-user-plus bx-tada' ></i>
                                <h3>Add Students</h3>
                            </div>
                        </div>
                    </a>
                </div>
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
    <script>
        const circles = document.querySelectorAll('.circle');
        circles.forEach(elem=>{
            var dots = elem.getAttribute('data-dots');
            var marked = elem.getAttribute('data-percentage');
            var tot = elem.getAttribute('total');

            var num = Math.floor(100*marked/tot);
            var percent = Math.floor(dots*num/100);
            var rotate = 360/dots;
            var points = "";

            for(let i = 0; i < dots; i++) {
                points += `<div class="points" style="--i: ${i}; --rot: ${rotate}deg"></div>`
            }
            elem.innerHTML = points;

            const pointsMarked = elem.querySelectorAll('.points');
            for (let i = 0; i < percent; i++) {
                pointsMarked[i].classList.add('marked')
                
            }

        })
    </script>
</body>
</html>