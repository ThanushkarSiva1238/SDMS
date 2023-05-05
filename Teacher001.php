<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <title>Teacher 001</title>
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
            box-sizing: border-box;
        }
        html{
            font-family: 'Poppins', sans-serif;
        }
        body{
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            gap: 15px;
            align-items: center;
            justify-content: center;
            background: #16151f;
        }
        .container{
            width: 70%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .box{
            min-height: 70vh;
            width: 70%;
            border-radius: 30px;
            box-shadow: 5px 5px 6px rgba(0, 0, 0, 0.5),
                        -5px -5px 6px rgba(0, 0, 0, 0.5);
            flex-wrap: wrap;
            display: flex;
            align-items: center;
            justify-content: center;
            transform-style: preserve-3d;
        }
        .path{
            position: absolute;
            min-height: 100%;
            width: 100%;
            background: linear-gradient(90deg, #21202c 100%, #131122 100%);
            clip-path: circle(220px at left -1.9rem);
            border-radius: 30px;
            z-index: 1;
        }
        .left{
            border-right: 2px solid #21202c;
            height: 68vh;
            width: 32.5%;
            z-index: 2;
            text-align: center;
        }
        .left i{
            font-size: 8rem;
            padding: 1.5rem 0 .8rem 0;
            color: var(--color-primary);
        }
        .left table{
            padding: 2px;
            position: initial;
            width: 100%;
        }
        .left table th{
            color: var(--color-white);
            display: flex;
            align-items: center;
            justify-content: center;
            padding-bottom: .1rem;
        }
        .left table th .material-icons-round{
            font-size: 1rem;
        }
        .left table td{
            font-size: .9rem;
            display: flex;
            align-items: center;
            justify-content: center;
            padding-bottom: 1rem;
            color: var(--color-dark-variant);
        }
        .main{
            height: 70vh;
            width: 67.5%;
            z-index: 2;
            padding: 1.5rem 1rem;
        }
        h1{
            margin-bottom: -.2rem;
            font-size: 1.5rem;
            color: #7380ec;
            z-index: 1;
        }
        small{
            font-size: 1.1rem;
            color: var(--color-info-dark);
            margin-left: 1rem;
        }
        .main table{
            width: 100%;
            margin: 1rem auto;
            font-size: .9rem;
        }
        .main table tr{
            height: 2rem;
            text-align: left;
        }
        .main table tr th{
            color: var(--color-white);
        }
        .main table tr #space{
            padding: 0 .5rem;
            text-align: right;
            color: var(--color-dark-variant);
        }
        .main table tr td{
            color: var(--color-dark-variant);
        }
        button{
            padding: 5px 10px;
            border-radius: 5px;
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
            padding-right: 5px;
            padding-top: 1px;
        }
        @media screen and (min-width: 1920px) and (max-width: 3000px){
            .main, .left{
                zoom: 1.4;
                overflow: hidden;
                height: 50vh;
            }
            .path{
                zoom: 1.4;
                overflow: hidden;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="box">
            <div class="path"></div>
            <div class="left">
                <i class='bx bxs-user-circle bx-tada bx-flip-horizontal' ></i>
                <table>
                    <?php
                        @include 'config.php';
                        if($conn->connect_error){
                            die("Connection failed: ". $conn->connect_error);
                        }

                        $sql = "SELECT * FROM teachers ORDER BY ID LIMIT 0,1";
                        $result = $conn->query($sql);

                        if($result-> num_rows > 0){
                            while($row = $result-> fetch_assoc()){
                    ?>
                    <tr>
                        <th><span class="material-icons-round">location_on</span></th>
                        <td><?= $row["Home"] ?></td>
                    </tr>
                    <tr>
                        <th><span class="material-icons-round">today</span></th>
                        <td><?= $row["DOB"] ?></td>
                    </tr>
                    <tr>
                        <th><span class="material-icons-round">phone</span></th>
                        <td><?= $row["Phone_No"] ?></td>
                    </tr>
                    <tr>
                        <th><span class="material-icons-round">auto_stories</span></th>
                        <td><?= $row["Stream"] ?></td>
                    </tr>
                </table>
            </div>
            <div class="main">
                <h1 id="head"><?= $row["Full_Name"] ?></h1>
                <small><?= $row["Qualification"] ?></small>
                <table>
                    <thead>
                        <tr>
                            <th>NIC No</th><td id="space">:</td><td><?= $row["NIC_No"] ?></td>
                        </tr>
                        <tr>
                            <th>Registation No</th><td id="space">:</td><td><?= $row["Registation_No"] ?></td>
                        </tr>
                        <tr>
                            <th>Email</th><td id="space">:</td><td><?= $row["Email"] ?></td>
                        </tr>
                        <tr>
                            <th>Gender</th><td id="space">:</td><td><?= $row["Gender"] ?></td>
                        </tr>
                        <tr>
                            <th>Blood Group</th><td id="space">:</td><td><?= $row["Blood_Group"] ?></td>
                        </tr>
                        <tr>
                            <th>Religion</th><td id="space">:</td><td><?= $row["Religion"] ?></td>
                        </tr>
                        <tr>
                            <th>Subject</th><td id="space">:</td><td><?= $row["Subject"] ?></td>
                        </tr>
                        <tr>
                            <th>Medium</th><td id="space">:</td><td><?= $row["Medium"] ?></td>
                        </tr>
                        <tr>
                            <th>Work Experience (Years)</th><td id="space">:</td><td><?= $row["Work_Years"] ?></td>
                        </tr>
                    </thead>
                    <?php
                            }
                        }
                    ?>
                </table>
            </div>   
        </div>
    </div>
    <button onclick="history.back()"><i class='bx bx-arrow-back'></i><span>Back</span></button>
</body>
</html>