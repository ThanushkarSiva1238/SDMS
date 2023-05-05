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
    <script src="https://kit.fontawesome.com/fe543d9714.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="Svg/bx-spreadsheet.svg">
    <title>Report Sheet</title>
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
            --color-success: #ff0070;
        }

        *{
            margin: 0;
            padding: 0;
            outline: none;
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
            overflow: hidden;
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
            gap: 1.5rem;
        }
        .sidebar.active ~ main{
            width: calc(100% - 240px);
            left: 240px;
        }
        main .main{
            width: 35%;
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
        main .content{
            opacity: 0;
            visibility: hidden;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
            height: 350px;
            background: var(--color-sidebar);
            border-radius: 1rem;
            box-shadow: 0 2px 12px 700px rgba(0, 0, 0, 0.5);
            color: var(--color-white);
            transition: .3s ease-in;
        }
        #click{
            display: none;
        }
        #click:checked ~ .content{
            opacity: 1;
            visibility: visible;
        }
        .click-me{
            display: block;
            width: 305px;
            height: 50px;
            background: var(--color-pro);
            color: var(--color-white);
            text-align: center;
            font-size: 1.2em;
            line-height: 50px;
            box-shadow: 0 0 .5rem rgba(0, 0, 0, 0.4);
            cursor: pointer;
            transition: .5s;
            margin-top: 1.5rem;
            margin-bottom: 2rem;
        }
        .click-me i{
            font-size: 1.4em;
            padding-right: 10px;
            position: relative;
            top: 5px;
        }
        .click-me:hover{
            box-shadow: none;
        }
        .content .header{
            background: var(--color-pro);
            height: 68px;
            overflow: hidden;
            border-radius: 1rem 1rem 0 0;
            display: flex;
            align-items: center;
        }
        .header h2{
            padding-top: -20px;
            padding-left: 32px;
            font-weight: normal;
            font-size: 20px;
        }
        .fa-xmark{
            position: absolute;
            right: 32px;
            top: 25px;
            color: #999;
            font-size: 20px;
            font-weight: bold;
            cursor: pointer;
        }
        .content #main{
            display: flex;
            align-items: center;
            flex-direction: column;
            height: 282px;
            border-radius: 0 0 1rem 1rem;
            overflow: hidden;
            padding: 1rem 2rem;
        }
        #main .table{
            display: flex;
            flex-direction: column;           
            justify-content: center;
            width: 100%;
        }
        .table label{
            font-size: 18px;
            font-weight: 600;
        }
        .table select{
            margin: .5rem 1rem;
            margin-bottom: 2rem;
            padding: 5px 2px;
            font-family: "poppins";
            color: var(--color-white);
            background: none;
            font-size: 15px;
            outline: none;
        }
        select option{
            background: rgb(161, 152, 152);
            font-family: 'Poppins', sans-serif;
            color: var(--color-white);
        }
        .table .field{
            outline: none;
            margin: 0 1rem;
            margin-bottom: .5rem;
            border: none;
            border-bottom: 2px solid #999;
            background: none;
            padding: 3px 5px;
            color: var(--color-white);
            font-size: 16px;
            font-family: "poppins";
        }
        .field:focus{
            border-bottom: 2px solid #7380ec;
        }
        hr{
            width: 150%;
            height: 1px;
            position: relative;
            left: -50px;
            margin: .4rem 0;
            margin-top: 1.5rem;
            border-color: var(--color-pro);
            background: var(--color-pro);
        }
        #main .line{
            width: 100%;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 2rem;
            margin: .5rem 0 .3rem;
        }
        .line #submit{
            display: none;
        }
        .line #Reg{
            position: relative;
            background: #444;
            color: var(--color-white);
            text-transform: uppercase;
            font-size: 1.15em;
            letter-spacing: .1em;
            font-weight: 400;
            padding: 8px 30px;
            transition: .5s;
        }
        #Reg:hover{
            letter-spacing: 0.25em;
            background: var(--clr);
            color: var(--clr);
            box-shadow: 0 0 15px var(--clr);
        }
        #Reg::before{
            content: '';
            position: absolute;
            inset: 2px;
            background: #27282c;
        }
        #Reg span{
            position: relative;
            z-index: 1;
        }
        #Reg i{
            position: absolute;
            inset: 0;
            display: block;
        }
        #Reg i::before{
            content: '';
            position: absolute;
            top: -5px;
            left: 100%;
            transform: translateX(-50%);
            position: absolute;
            height: 8px;
            width: 8px;
            border: 2px solid var(--clr);
            background: #27282c;
            transition: 0.5s;
        }
        #Reg:hover i::before{
            left: 0.8%;
            transform: translateX(-50%) rotate(45deg);
            box-shadow: 27.5px 27.5px var(--clr);
        }
        #Reg i::after{
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0%;
            position: absolute;
            height: 8px;
            width: 8px;
            border: 2px solid var(--clr);
            background: #27282c;
            transform: translateX(-50%);
            transition: 0.5s;
        }
        #Reg:hover i::after{
            left: 99.2%;
            transform: translateX(-50%) rotate(45deg);
            box-shadow: -27.5px -27.5px var(--clr);
        }
        /*---------------Student Details---------------*/
        main .student-details{
            margin-top: 1rem;
            color: var(--color-white);
            width: 305px;
        }
        .detail{
            outline: none;
            width: 100%;
            height: 28px;
            border: none;
            background: none;
            border-bottom: 1px solid #999;
            color: var(--color-white);
            font-size: 16px;
            font-family: "poppins";
            border-radius: 5px;
            padding: 0 8px;
            margin-bottom: 1.2rem;
        }
        .detail:hover{
            border-bottom: 2px solid #7380ec;
        }
        main .student-details #add{
            outline: none;
            width: 100%;
            height: 30px;
            background: var(--color-pro);
            color: var(--color-white);
            font-size: 15px;
            font-family: "poppins";
            border-radius: 5px;
            padding: 0 10px;
            margin-bottom: 1rem;
        }
        .main #col,#col1,#col2{
            outline: none;
            width: 140px;
            height: 30px;
            background: var(--color-pro);
            color: var(--color-white);
            font-size: 15px;
            font-family: "poppins";
            border-radius: 5px;
            margin: 10px 10px 10px 32px;
        }
        #col:nth-child(1){
            visibility: hidden;
        }
        .main #mark,#mark1,#mark2{
            outline: none;
            width: 80px;
            height: 28px;
            border: none;
            background: none;
            border-bottom: 1px solid #999;
            color: var(--color-white);
            font-size: 18px;
            font-family: "poppins";
            border-radius: 5px;
            padding: 0 8px;
        }
        #mark:focus{
            border-bottom: 2px solid #7380ec;
        }
        #mark1:focus{
            border-bottom: 2px solid #7380ec;
        }
        #mark2:focus{
            border-bottom: 2px solid #7380ec;
        }
        #do,#doo{
            display: none;
        }
        .do{
            display: block;
            width: 80px;
            height: 30px;
            background: var(--color-pro);
            color: var(--color-white);
            text-align: center;
            font-size: 15px;
            line-height: 43px;
            box-shadow: 0 0 .5rem rgba(0, 0, 0, 0.4);
            cursor: pointer;
            transition: .5s;
            margin-top: 1rem;
            margin-left: 7.8rem;
        }
        .do:hover{
            color: var(--color-success);
            box-shadow: 0 0 .5rem var(--color-success);
        }
        .doo{
            display: block;
            width: 80px;
            height: 30px;
            background: var(--color-pro);
            color: var(--color-white);
            text-align: center;
            font-size: 15px;
            line-height: 43px;
            box-shadow: 0 0 .5rem rgba(0, 0, 0, 0.4);
            cursor: pointer;
            transition: .5s;
            margin-top: 0;
            margin-bottom: 1.2rem;
            margin-left: 7.8rem;
        }
        .doo:hover{
            color: var(--color-success);
            box-shadow: 0 0 .5rem var(--color-success);
        }
        /*---------------Right---------------*/
        .right{
            padding-right: 1rem;
            margin: .8rem 0;
            height: 100%;
            width: 65%;
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
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;
            color: var(--color-dark-variant);
        }
        .right .class h2{
            margin-bottom: 0.8rem;
            color: var(--color-white);
        }
        .right .class table{
            background: var(--color-sidebar);
            width: 100%;
            border-radius: 2rem;
            padding: 1.5rem 1rem .7rem;
            text-align: center;
            box-shadow: 0 .5rem 1rem var(--color-light);
            transition: all 300ms ease;
        }
        .class table:hover{
            box-shadow: none;
        }
        table thead th{
            color: var(--color-primary);
        }
        table tbody td{
            height: 2.2rem;
            border-bottom: 1px solid var(--color-light);
            color: var(--color-dark-variant);
        }
        table tbody tr:last-child td{
            border: none;
        }
        .class a{
            color: var(--color-white);
            text-decoration: none;
            border: 2px solid var(--color-sidebar);
            border-radius: 10px;
            background: var(--color-pro);
            padding: 8px 18px;
            font-size: 1.1em;
            margin: 1.5em 0 0 0;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.4);
        }
        .class a:hover{
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
            <div class="text">Report Sheet</div>
                    
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
                <input type="checkbox" id="click">
                <label for="click" class="click-me"><i class='bx bx-rename'></i>Change Subject Name</label>
                <div class="content">
                    <div class="header">
                        <h2>Change Subject Name</h2>
                        <label for="click"><i class="fa-solid fa-xmark"></i></label>
                    </div>
                    <?php
                        @include 'config.php';

                        if (isset($_POST['submit'])) {

                            $col = $_POST['column'];
                            $sub = $_POST['sub'];
                            $alter = "ALTER TABLE marks CHANGE $col $sub int(3)";
                            if($conn->query($alter)===True){
                                $rename ="UPDATE subjects SET Subjects = '$sub' WHERE Subjects = '$col'";
                                if ($conn->query($rename)===True) {

                                }
                                else {
                                    header('location:404 Page.html');
                                }
                            }
                            else {
                                header('location:404 Page.html');
                            }
                        }
                    ?>
                    <form action="" method="POST" id="main">
                        <div class="table">
                            <label for="column">Old Name: </label>
                            <select name="column" id="column">
                                <?php
                                    @include 'config.php';
                                    $sql0 = "select * from subjects";
                                    
                                    
                                    if($result0 -> num_rows > 0){
                                            while($row = $result0-> fetch_assoc()){
                                            
                                ?>
                                <option value="<?= $row["Subjects"]?>"><?= $row["Subjects"]?></option>
                                <?php
                                        }
                                    }
                                ?>
                            </select>
                            <label for="sub">New Name: </label>
                            <input type="text" name="sub" id="sub" class="field" autocomplete="off">
                            <hr>
                        </div>
                                
                        <div class="line">
                            <input type="submit" name="submit" id="submit">
                            <label for="submit" id="Reg" style="--clr:#6eff3e"><span>Change</span><i></i></label>
                        </div>
                    </form>
                </div>
            </div>
            <!-------------End of Insight------------->
            <div class="student-details">
                <?php
                    @include 'config.php';

                    if (isset($_POST['doo'])) {
                        $tea = $_POST['tea'];
                        $cls = $_POST['cls'];

                        $detail ="UPDATE subjects SET Detail = '$tea' WHERE ID = 1";
                        if ($conn->query($detail)===True) {
                        }
                        $detail1 ="UPDATE subjects SET Detail = '$cls' WHERE ID = 2";
                        if ($conn->query($detail1)===True) {
                        }
                    }
                ?>
                <form action="" method="POST">

                    <input type="text" name="tea" id="tea" class="detail" placeholder="Class Teacher Name" autocomplete="off">
                    <input type="text" name="cls" id="cla" class="detail" placeholder="Class Name" autocomplete="off">

                    <!-- Submit Button -->
                    <input type="submit" name="doo" value="Submit" id="doo">
                    <label for="doo" class="doo"><span class="material-icons-sharp">task_alt</span></label>

                </form>
                <?php
                    @include 'config.php';

                    if (isset($_POST['do'])) {

                        $col = $_POST['col'];
                        $col1 = $_POST['col1'];
                        $col2 = $_POST['col2'];

                        $add = $_POST['add'];
                        $m = $_POST['mark'];
                        $m1 = $_POST['mark1'];
                        $m2 = $_POST['mark2'];
                        $tot = $m + $m1 + $m2;

                        $update = "UPDATE marks SET $col = '$m', $col1 = '$m1', $col2 = '$m2', Total = '$tot' WHERE Addmission_No = '$add'";
                        if($conn->query($update)===True){
                        }
                    }
                ?>
                <form action="" method="POST">

                    <select name="add" id="add">
                        <?php
                            @include 'config.php';
                            $sql = "SELECT Addmission_No FROM marks";
                            $result = $conn->query($sql);
                            if($result-> num_rows > 0){
                                    while($row = $result-> fetch_assoc()){
                            
                        ?>
                        <option value="<?= $row["Addmission_No"] ?>"><?=$row["Addmission_No"]?></option>
                        <?php
                                }
                            }
                        ?> 
                    </select><br>
                    
                    <!-- Subject 001 marks -->
                    <select name="col" id="col">
                        <option value="none">- Choose S01 -</option>
                        <?php
                            @include 'config.php';
                            $sql0 = "select * from subjects";
                            $result0 = $conn->query($sql0);
                            if($result0 -> num_rows > 0){
                                    while($row = $result0-> fetch_assoc()){
                            
                        ?>
                        <option value="<?= $row["Subjects"]?>"><?= $row["Subjects"]?></option>
                        <?php
                                }
                            }
                        ?>
                    </select>
                    <input type="text" name="mark" id="mark" autocomplete="off"><br>

                    <!-- Subject 002 marks -->
                    <select name="col1" id="col1">
                        <option value="none">- Choose S02 -</option>
                        <?php
                            @include 'config.php';
                            $sql0 = "select * from subjects";
                            $result0 = $conn->query($sql0);
                            if($result0 -> num_rows > 0){
                                    while($row = $result0-> fetch_assoc()){
                            
                        ?>
                        <option value="<?= $row["Subjects"]?>"><?= $row["Subjects"]?></option>
                        <?php
                                }
                            }
                        ?>
                    </select>
                    <input type="text" name="mark1" id="mark1" autocomplete="off"><br>

                    <!-- Subject 003 marks -->
                    <select name="col2" id="col2">
                        <option value="none">- Choose S03 -</option>
                        <?php
                            @include 'config.php';
                            $sql0 = "select * from subjects";
                            $result0 = $conn->query($sql0);
                            if($result0 -> num_rows > 0){
                                    while($row = $result0-> fetch_assoc()){
                            
                        ?>
                        <option value="<?= $row["Subjects"]?>"><?= $row["Subjects"]?></option>
                        <?php
                                }
                            }
                        ?>
                    </select>
                    <input type="text" name="mark2" id="mark2" autocomplete="off"><br>

                    <!-- Submit Button -->
                    <input type="submit" name="do" value="Submit" id="do">
                    <label for="do" class="do"><span class="material-icons-sharp">done_all</span></label>

                </form>
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

            <!-------------Teacher's Details------------->
            <div class="rig">
                <div class="class">
                    <h2>Marks Schedule</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Addmission_No</th>
                                <th>First_Name</th>
                                <th>Last_Name</th>
                                <?php
                                    @include 'config.php';
                                    $sql0 = "select * from subjects";
                                    $result0 = $conn->query($sql0);
                                    if($result0 -> num_rows > 0){
                                            while($row = $result0-> fetch_assoc()){
                                            
                                ?>
                                <th><?= $row["Subjects"]?></th>
                                <?php   
                                        }
                                    }
                                ?>  
                                <th>Total</th> 
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                @include 'config.php';
                                $sql1 = "SELECT * FROM app INNER JOIN marks on app.Addmission_No = marks.Addmission_No limit 12;";
                                // $result1 = $conn->query($sql1);
                                if($result1 = $conn -> query($sql1)){
                                    while($row1 = $result1-> fetch_row()){   
                            ?>
                            <tr>
                                <td><?= $row1[0]?></td>
                                <td><?= $row1[1]?></td>
                                <td><?= $row1[2]?></td>
                                <td><?= $row1[9]?></td>
                                <td><?= $row1[10]?></td>
                                <td><?= $row1[11]?></td>
                                <td><?= $row1[12]?></td>
                            </tr>
                            <?php   
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                    <a href="sheet.php" target="_blank">View All</a>
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