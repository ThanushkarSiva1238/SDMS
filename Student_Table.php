<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');

        body{
            background: #16151f;
            font-family: 'Poppins', sans-serif;
            text-align: center;
        }
        .student-details{
            color: #fff;
            margin: auto 2rem;
            flex-wrap: wrap;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            transform-style: preserve-3d;
        }
        button{
            position: absolute;
            top: 25px;
            left: 10px;
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
        button span{
            display: none;
            padding-right: 5px;
            padding-top: 1px;
        }
        button:hover{
            border-radius: 5px;
        }
        button:hover span{
            display: block;
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
        .student-details table{
            background: #11101d;
            width: 100%;
            border-radius: 2rem;
            padding: 1.8rem;
            text-align: center;
            box-shadow: 5px 5px 6px 0 rgba(0,0,0,0.5),
                        -5px -5px 6px 0 rgba(0,0,0,0.5);
        }
        table tbody td{
            height: 2rem;
            border-bottom: 1px solid rgba(132, 139, 200, 0.18);
            color: #677483;
        }
        table tbody tr:last-child td{
            border: none;
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
    <div class="student-details">
        <button onclick="history.back()"><i class='bx bx-arrow-back'></i><span>Back</span></button>
        <h1 data-text="Student_Details">Student_Details</h1>
        <table>
            <thead>
                <tr>
                    <th>Addmission_No</th>
                    <th>First_Name</th>
                    <th>Last_Name</th>
                    <th>DOB</th>
                    <th>Gender</th>
                    <th>Telephone_No</th>
                    <th>NIC_No</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    @include 'config.php';
                    if($conn->connect_error){
                        die("Connection failed: ". $conn->connect_error);
                    }

                    $sql = "SELECT * FROM app ORDER BY Addmission_No ASC";
                    $result = $conn->query($sql);

                    if($result-> num_rows > 0){
                        while($row = $result-> fetch_assoc()){
                ?>
                <tr><td><?= $row["Addmission_No"] ?></td>
                    <td><?= $row["First_Name"] ?></td>
                    <td><?= $row["Last_Name"] ?></td>
                    <td><?= $row["DOB"] ?></td>
                    <td><?php 
                            if($row["Gender"]=="Male"){
                                echo "<span style ='color: #ff0070;'> Male </span>";
                            }
                            else{
                                echo "<span style ='color: #0f0;'> Female </span>";
                            }
                        ?>
                    </td>
                    <td><?= $row["Telephone_No"] ?></td>
                    <td><?= $row["NIC_No"] ?></td>
                    <td><?= $row["Email"] ?></td>
                </tr>
                <?php
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>