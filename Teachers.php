<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <title>Teachers</title>
    <style>
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
            overflow: hidden;
        }
        .container{
            margin: 2rem auto;
        }
        #button{
            position: absolute;
            top: 2px;
            left: 30px;
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
        #button span{
            display: none;
            padding-right: 5px;
            padding-top: 1px;
        }
        #button:hover{
            border-radius: 5px;
        }
        #button:hover span{
            display: block;
        }
        .head{
            display: flex;
            align-items: center;
            justify-content: center;
            transform-style: preserve-3d;
        }
        h1{
            position: relative;
            font-size: 2rem;
            color: #252839;
            -webkit-text-stroke: 0.1vw #383d52;
            text-transform: uppercase;
            filter: drop-shadow(-1px -1px .1px rgba(255,255,255,0.3))
                    drop-shadow(5px 5px 5px rgba(0,0,0,0.3))
                    drop-shadow(15px 15px 15px rgba(0,0,0,0.3));
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
            filter: drop-shadow(-1px -1px .1px rgba(255,255,255,0.3))
                    drop-shadow(5px 5px 5px rgba(0,0,0,0.3))
                    drop-shadow(15px 15px 15px rgba(0,0,0,0.3));
        }
        @keyframes animate{
            0%,10%,100%{
                width: 0;
            }
            70%,90%{
                width: 100%;
            }
        }
        .insight{
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 3rem;
            font-family: 'Poppins', sans-serif;
            margin: .5rem 5rem;
        }
        .insight > div{
            background: var(--color-white);
            padding: 1.2rem;
            border-radius: 2rem;
            margin-top: 1rem;
            box-shadow: 0 0 1.5rem var(--color-light);
            transition: all 300ms ease;
            background: var(--color-sidebar);
            color: var(--color-white);
            text-align: center;
        }
        .insight > div:hover{
            box-shadow: none;
        }
        .insight h2{
            padding: 0.7rem 2rem;
            font-size: 1.4rem;
            font-weight: 500;
            text-align: center;
        }
        .insight > div i{
            font-size: 6rem;
            color: var(--color-primary);
            text-align: center;
        }
        .insight > div .middle{
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .insight > div .middle{
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .insight .middle .down{
            background: transparent;
            text-align: left;
            width: 100%;
            font-size: 1.1rem;
            margin-top: .5rem;
        }
        .down table{
            text-align: left;
            width: 100%;
        }
        table tr{
            height: 2rem;
        }
        table th{
            color: var(--color-dark-variant);
        }
        table td{
            color: var(--color-hover);
            font-size: 1rem;
        }
        table tr #space{
            padding-left: .5rem;
            padding-right: .5rem;
        }
        .container a button{
            width: 90%;
            height: 2.5rem;
            margin: 2rem 0 1rem 0;
            color: var(--color-primary);
            background: var(--color-dark);
            font-weight: 700;
            border-radius: 1rem;
            border: none;
        }
        .container a button:hover{
            box-shadow: 0 0 1rem var(--color-primary);
        }
        .container .add{
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            top: 5vh;
        }
        .add a{
            display: flex;
            align-items: center;
            justify-content: center; 
            background: var(--color-sidebar);
            padding: 10px 10px;
            border-radius: 1rem;
            transition: all 0.4s ease;
            color: #fff;
            box-shadow: none;
        }
        .add a .bx-user-plus{
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
        }
        .add a:hover h2{
            display: block;
        }
        @media screen and (min-width: 1920px) and (max-width: 3000px){
            body{
                overflow: hidden;
                zoom: 1.4;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="head">
            <button onclick="history.back()" id="button"><i class='bx bx-arrow-back'></i><span>Back</span></button>
            <h1 data-text="Teacher_Details">Teacher_Details</h1>
        </div>
        <div class="insight">
        <?php
            @include 'config.php';
            if($conn->connect_error){
               die("Connection failed: ". $conn->connect_error);
            }

            $sql = "SELECT Full_Name, Qualification, Registation_No, NIC_No, Stream, Subject FROM teachers ORDER BY ID LIMIT 0,1";
            $result = $conn->query($sql);

            if($result-> num_rows > 0){
                while($row = $result-> fetch_assoc()){
        ?>
            <div>
                <h2><?= $row["Full_Name"] ?></h2>
                <i class='bx bxs-user-circle bx-tada bx-flip-horizontal' ></i>
                <div class="middle">
                    <div class="down">
                        <table>
                            <tr>
                                <th>Qualification</th> <td id="space">:</td> <td><?= $row["Qualification"] ?></td>
                            </tr>
                            <tr>
                                <th>Registation No</th> <td id="space">:</td> <td><?= $row["Registation_No"] ?></td>
                            </tr>
                            <tr>
                                <th>NIC No</th> <td id="space">:</td> <td><?= $row["NIC_No"] ?></td>
                            </tr>
                            <tr>
                                <th>Stream</th> <td id="space">:</td> <td><?= $row["Stream"] ?></td>
                            </tr>
                            <tr>
                                <th>Subject</th> <td id="space">:</td> <td><?= $row["Subject"] ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <a href="Teacher001.php"><button>VIEW</button></a>
            
            </div>
        <?php
                }
            }    
            $sql1 = "SELECT Full_Name, Qualification, Registation_No, NIC_No, Stream, Subject FROM teachers ORDER BY ID LIMIT 1,1";
            $result1 = $conn->query($sql1);

            if($result1-> num_rows > 0){
                while($row1 = $result1-> fetch_assoc()){
        ?>
            <div>
                <h2><?= $row1["Full_Name"] ?></h2>
                <i class='bx bxs-user-circle bx-tada bx-flip-horizontal' ></i>
                <div class="middle">
                    <div class="down">
                    <table>
                            <tr>
                                <th>Qualification</th> <td id="space">:</td> <td><?= $row1["Qualification"] ?></td>
                            </tr>
                            <tr>
                                <th>Registation No</th> <td id="space">:</td> <td><?= $row1["Registation_No"] ?></td>
                            </tr>
                            <tr>
                                <th>NIC No</th> <td id="space">:</td> <td><?= $row1["NIC_No"] ?></td>
                            </tr>
                            <tr>
                                <th>Stream</th> <td id="space">:</td> <td><?= $row1["Stream"] ?></td>
                            </tr>
                            <tr>
                                <th>Subject</th> <td id="space">:</td> <td><?= $row1["Subject"] ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <a href="Teacher002.php"><button>VIEW</button></a>
            </div>
        <?php
                }
            }    
            $sql2 = "SELECT Full_Name, Qualification, Registation_No, NIC_No, Stream, Subject FROM teachers ORDER BY ID LIMIT 2,1";
            $result2 = $conn->query($sql2);

            if($result2-> num_rows > 0){
                while($row2 = $result2-> fetch_assoc()){
        ?>
            <div>
                <h2><?= $row2["Full_Name"] ?></h2>
                <i class='bx bxs-user-circle bx-tada bx-flip-horizontal' ></i>
                <div class="middle">
                    <div class="down">
                    <table>
                            <tr>
                                <th>Qualification</th> <td id="space">:</td> <td><?= $row2["Qualification"] ?></td>
                            </tr>
                            <tr>
                                <th>Registation No</th> <td id="space">:</td> <td><?= $row2["Registation_No"] ?></td>
                            </tr>
                            <tr>
                                <th>NIC No</th> <td id="space">:</td> <td><?= $row2["NIC_No"] ?></td>
                            </tr>
                            <tr>
                                <th>Stream</th> <td id="space">:</td> <td><?= $row2["Stream"] ?></td>
                            </tr>
                            <tr>
                                <th>Subject</th> <td id="space">:</td> <td><?= $row2["Subject"] ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <a href="Teacher003.php"><button>VIEW</button></a>
            </div>
        <?php
                }
            }
        ?>
        </div>
        <div class="add">
            <a href="Teachers_App.html">
                <i class='bx bx-user-plus' ></i>
                <h2>Add Teachers</h2>
            </a>
        </div>
    </div>
</body>
</html>