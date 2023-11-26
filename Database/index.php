<?php

    $conn = new mysqli('localhost', 'root', '');
    $db = "CREATE DATABASE prototype";

    if ($conn->query($db)===true) {
        $db1 = "USE prototype";
        
        if ($conn -> query($db1)) {
            $table = "CREATE TABLE app(Addmission_No int(10) PRIMARY KEY,
                        First_Name Varchar(30) NULL,
                        Last_Name Varchar(30) NULL,
                        DOB date NULL,
                        Gender ENUM('Male','Female') NULL,
                        Telephone_No Varchar(15) NULL,
                        NIC_No Varchar(15) UNIQUE NULL,
                        Email Varchar(100) NULL)";

            if ($conn->query($table)===true) {
                $insert = "INSERT INTO app VALUES (9738, 'Thanushkar', 'Sivakumar', '2003-10-03', 'Male', '(000) 000 0000', '200300000000', 'thanushkarsivakumar@gmail.com'),
                            (9740, 'Jeewarani', 'Sivakumar', '2003-02-15', 'Female', '(000) 000 0000', '200300000001', 'jeewaranisivakumar@gmail.com')";
                if ($conn -> query($insert)) {
                    echo "<b>:)</b><br>";
                }
                else{
                    echo ":( &nbsp;". $conn->error;
                }
            }


            $table1 = "CREATE TABLE contact(Name Varchar(30) NULL,
                        Email Varchar(100) NULL,
                        Message Varchar(256) NULL,
                        Time TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL)";
                        
            if ($conn -> query($table1)===true) {
                $insert1 = "INSERT INTO contact(Name, Email, Message) VALUES ('Thanushkar', 'thanushkarsivakumar@gmail.com', 'Hello Sir')";
                if ($conn -> query($insert1)) {
                    echo "<b>:)</b><br>";
                }
                else{
                    echo ":( &nbsp;". $conn->error;
                }
            }


            $table2 = "CREATE TABLE form(User_Name Varchar(15) NOT NULL,
                        Email Varchar(120) NOT NULL,
                        Password Varchar(40) NOT NULL,
                        User_type ENUM('Admin','User'))";
            
            if ($conn -> query($table2)===true) {
                $insert2 = "INSERT INTO form VALUES ('SDMS Admin', 'sdmsad@live.com', 'a7d89772c92bcd9e5701457bd352f598', 'Admin'), 
                             ('SDMS User', 'sdmsus@live.com', '1a86cfbb4cc5496b9ad2ae8bfe7c5d7b', 'User')";
                if ($conn -> query($insert2)) {
                    echo "<b>:)</b><br>";
                }
                else{
                    echo ":( &nbsp;". $conn->error;
                }
            }


            $table3 = "CREATE TABLE message(Message Varchar(256),
                        Time TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL)";
            
            if ($conn -> query($table3)===true) {
                $insert3 = "INSERT INTO message(Message) VALUES ('Hello! Welcome...')";
                if ($conn -> query($insert3)) {
                    echo "<b>:)</b><br>";
                }
                else{
                    echo ":( &nbsp;". $conn->error;
                }
            }


            $table4 = "CREATE TABLE teachers(ID INT(10) AUTO_INCREMENT PRIMARY KEY,
                        Full_Name Varchar(80) NULL,
                        Qualification Varchar(30) NULL,
                        Registation_No Varchar(30) NOT NULL,
                        NIC_No Varchar(15) NULL,
                        Gender ENUM('Male','Female') NULL,
                        DOB date NULL,
                        Religion Varchar(15) NULL,
                        Blood_Group Varchar(30) NULL,
                        Home Varchar(100) NULL,
                        Email Varchar(100) NULL,
                        Phone_No Varchar(20) NULL,
                        Stream Varchar(50) NULL,
                        Subject Varchar(50) NULL,
                        Medium ENUM('Tamil','Sinhala', 'English') NULL,
                        Work_Years int(4) NULL)";
            
            if ($conn -> query($table4)===true) {
                $insert4 = "INSERT INTO teachers SET Full_Name = 'Full Name', Qualification = 'Qualification', Registation_No = 'Registation No', NIC_No = 'NIC No', Gender = 'Male', DOB = '2022-07-06', Religion = 'Hinduism', Blood_Group = 'O RhD positive (O+)', Home = 'Home Address', Email = 'Email Address', Phone_No = '(000) 000 0000', Stream = 'Physical Science (Maths)', Subject = 'Engineering Technology', Medium = 'Tamil', Work_Years = 10";
                if ($conn -> query($insert4)) {
                    header('location:Welcome.php');
                }
                else{
                    echo ":( &nbsp;". $conn->error;
                }
            }


            $table5 = "CREATE TABLE marks(Addmission_No int(10),
                        Sub_01 Int(3) NULL,
                        Sub_02 Int(3) NULL,
                        Sub_03 Int(3) NULL,
                        Total Int(5) NULL,
                        FOREIGN KEY(Addmission_No) REFERENCES app(Addmission_No)
                        ON DELETE CASCADE ON UPDATE CASCADE)";
            
            if ($conn -> query($table5)===true) {
                $insert5 = "INSERT INTO marks VALUES (9738, Null, Null, Null,Null), (9740, Null, Null, Null,Null)";
                if ($conn -> query($insert5)) {
                    header('location:Welcome.php');
                }
                else{
                    echo ":( &nbsp;". $conn->error;
                }
            }


            $table6 = "CREATE TABLE subjects(ID INT(10) AUTO_INCREMENT PRIMARY KEY,
                        Subjects Varchar(10) Null,
                        Detail VARCHAR(50) NULL)";
            
            if ($conn -> query($table6)===true) {
                $insert6 = "INSERT INTO subjects VALUES (Null, 'Sub_01', 'Teacher'), (Null, 'Sub_02', 'Class'), (Null, 'Sub_03', Null)";
                if ($conn -> query($insert6)) {
                    header('location:Welcome.php');
                }
                else{
                    echo ":( &nbsp;". $conn->error;
                }
            }
            else {
                $conn -> connect_error;
            }
            
        }
    }  
?>