<?php
    $server = "mysql:host=localhost;dbname=PYQ";
    $username = "root";
    $password = "";
    $con = new PDO($server, $username, $password);

    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    SESSION_START();

    if(isset($_POST['subject'])) {
        $subject = $_POST['subject'];
        $link = $_POST['link'];
        $year = $_POST['year'];
        $id = $con->prepare("SELECT Subject_Id FROM `SUBJECT` WHERE Subject_Name = ?");
        $id->execute([$subject]);
        while($row = $id->fetch(PDO::FETCH_ASSOC)) {
            $sid = $row['Subject_Id'];
        }
        $sql = $con->prepare("INSERT INTO `PAPERS` VALUES (?, ?, ?)");
        $sql->execute([$sid, $year, $link]);
        
        $sql1 = $con->prepare("SELECT * FROM `PAPERS`");
        $sql1->execute();
        echo "<html><div id='h1'><h1>Showing Table in Database :-</h1>";
        echo "<div class='cont'><table><tr><th>Subject-Id</th><th>Exam-Year</th><th>File-Link</th></tr>";
        while($row = $sql1->fetch(PDO::FETCH_ASSOC)){ 
            $new = $row['File_Link'];
            echo "<tr><td>".$row['Subject_Id']."</td><td>".$row['Exam_Year']."</td><td><a class='anchor' href=$new >". $row['File_Link']."</a></td></tr>";
        }
        echo "</table></div></div>";
    }
?>
<style>
        body{
            background-color: rgb(6, 26, 94);
        }
        .cont table, th, tr, td{
            border : 4px solid black;
            border-collapse : collapse;
            padding : 80px;
            padding-top : 20px;
            padding-bottom : 20px;
            font-size : 20px;
        }
        #h1 {
            display : flex;
            justify-content: center;
            flex-direction: column;
            align-items : center;
        }
        th{
            text-decoration : underline;
        }
        h1{
            margin : 20px;
            background : black;
            color : white;
            border : 5px solid white;
            padding: 7px;
            position : sticky;
            padding-right: 20px;
            padding-left:20px;
        }
        table{
            background-color : darkred;
            color : white;
            margin-top : 20px;
        }
        .anchor{
            color : white;
        }
        a:hover{
            color : black;
        }
    </style></html>
