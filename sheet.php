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
    <title>Mark Schedule</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');

        :root{
            --color-background: #dce1eb;
            --color-white: #fff;
            --color-info-dark: #7d8da1;
            --color-info-light: #dce1eb;
            --color-dark: #363949;
            --color-light: rgba(0, 0, 0, 0.4);
            --color-toggle: #fff;
            --color-dark-variant: #303d44;
            --color-pro: #c5cad3;
            --color-sidebar: #fff;
            --color-hover: #dce1eb;
        }
        *{
            margin: 0;
            padding: 0;
            outline: none;
            text-decoration: none;
            list-style: none;
            box-sizing: border-box;
        }
        body{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            font-family: "poppins";
            background: var(--color-white);
            overflow-x: hidden;
        }
        button{
            position: relative;
            width: 7rem;
            top: 10px;
            right: -44.5%;
            padding: 5px 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #3080ea;
            border-color: #3080ea;
            border-radius: 5px;
            color: #fff;
            font-size: 15px;
            font-weight: bold;
        }
        button span{
            padding-right: 5px;
            border-right: 2px solid #fff;
            margin-right: 5px;
        }
        .class{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin-top: -30px;
            width: 100%;
        }
        .class h2{
            margin: 1rem 0 0.2rem 0;
            text-align: center;
        }
        .rig{
            width: 45em;
        }
        #right{
            text-align: left;
            width: fit-content;
        }
        table{
            margin-top: .2rem;
            border-collapse: collapse;
        }
        table tr th,td{
            padding: 2px 10px;
        }
        table tr #center{
            text-align: center;
        }
        .class .sign{
            display: flex;
            gap: 20em;
            margin-top: 5em;
        }
        .sign span{
            width: 10em;
            padding-top: 5px;
            text-align: center;
            border-top: 2px dotted #000;
            font-weight: bold;
            font-size: 16px;
        }
        @media print{
            body *{
                visibility: hidden;
            }
            .class, .class *{
                visibility: visible;
            }
        }
    </style>
</head>
<body>
    <button onclick="window.print()"><span class="material-icons-sharp">print</span>Print</button>
    <div class="class">
        <h2>Marks Schedule</h2>
        <div class="rig">
            <table id="right">
                <tr>
                    <?php
                        @include 'config.php';
                        $sql0 = "select Detail from subjects where ID = 1";
                        $result0 = $conn->query($sql0);
                        if($result0 -> num_rows > 0){
                                while($row = $result0-> fetch_assoc()){
                                
                    ?>
                    <th>Class Teacher</th><th class="space">:</th><td><?= $row['Detail']?></td>
                    <?php
                            }
                        }    
                    ?>
                </tr>
                <tr>
                    <?php
                        @include 'config.php';
                        $sql0 = "select Detail from subjects where ID = 2";
                        $result0 = $conn->query($sql0);
                        if($result0 -> num_rows > 0){
                                while($row = $result0-> fetch_assoc()){
                                
                    ?>
                    <th>Class</th><th class="space">:</th><td><?= $row['Detail']?></td>
                    <?php
                            }
                        }    
                    ?>
                </tr>
                <tr>
                    <?php
                        @include 'config.php';
                        $count = "SELECT * FROM app";
                        $count_run = mysqli_query($conn, $count);
                        $row1 = mysqli_num_rows($count_run);        
                    ?>
                    <th>No. of Students</th><th class="space">:</th><td><?= $row1?></td>               
                </tr>
            </table>
        </div>
        <table border="2">
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
                    $sql1 = "SELECT * FROM app INNER JOIN marks on app.Addmission_No = marks.Addmission_No;";
                    // $result1 = $conn->query($sql1);
                    if($result1 = $conn -> query($sql1)){
                        while($row1 = $result1-> fetch_row()){   
                ?>
                <tr>
                    <td id="center"><?= $row1[0]?></td>
                    <td><?= $row1[1]?></td>
                    <td><?= $row1[2]?></td>
                    <td id="center"><?= $row1[9]?></td>
                    <td id="center"><?= $row1[10]?></td>
                    <td id="center"><?= $row1[11]?></td>
                    <td id="center"><?= $row1[12]?></td>
                </tr>
                <?php   
                        }
                    }
                ?>
            </tbody>
        </table>
        <div class="sign">
            <span>Date</span>
            <span>Signature</span>
        </div>
    </div>
</body>
</html>