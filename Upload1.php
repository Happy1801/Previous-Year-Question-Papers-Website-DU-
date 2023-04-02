<?php
    $server = "mysql:host=localhost;dbname=PYQ";
    $username = "root";
    $password = "";
    $con = new PDO($server, $username, $password);

    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }

    SESSION_START();
    if(isset($_POST['course'])) {
        $course = $_POST['course'];
        $sql = $con->prepare("SELECT * FROM `SUBJECT` WHERE Course_Id = (SELECT Course_Id FROM `COURSE` WHERE Course_Name = ?)");
        $sql->execute([$course]);
    } 
?>
<html>
    <style>
        .form2{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .content h1 {
        display: flex;
        justify-content: center;
        align-items: center;
        width: auto;
        background-color: skyblue;
        padding: 5px;
        background-color: rgb(59, 235, 185);
        border: 10px solid black;
    }

    .content h2 {
        margin-top: -25px;
        display: flex;
        justify-content: center;
        background-color: rgb(99, 153, 246);
        align-items: center;
        /* width: ; */
        padding: 5px;
        border: 10px solid black;
        border-top: 0px;
    }
    .content{
        width : 86%;
    }
    .container {
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
    }
    body{
        background-color: rgb(6, 26, 94);
    }
    .form2 select, option{
            /* padding:10px; */
            color: black;
            background-color: rgb(5, 155, 67);
            border: 9px solid darkred;
            margin-bottom: 5px;
            font-size: 12px;
            font-weight : 600;
            font-size : 18px;
            border-radius : 50px;
            padding :7px;
            padding-right : 30px;
            padding-left : 30px;
            margin-top : 25px;
            text-align: center;
        }
        .form2 input{
            color: black;
            background-color: rgb(5, 155, 67);
            border: 9px solid darkred;
            margin-bottom: 5px;
            font-size: 12px;
            font-weight : 600;
            font-size : 18px;
            border-radius : 50px;
            padding :7px;
            padding-right : 30px;
            padding-left : 30px;
            margin-top : 25px;
            text-align : center;    
            
        }
        input::placeholder{
            color : white;
        }
        #sub {
            text-decoration: none;
            border-radius: 50px;
            font-size: 20px;
            font-weight: 600;
            border: 5px solid white;
            background-color: black;
            margin: 50px;
            margin-left : 60px;
            padding: 10px;
            padding-right: 30px;
            padding-left: 30px;
            color: white;
            margin-top: 30px;
        }
        #sub1{
            color: black;
            background-color: rgb(5, 155, 67);
            border: 9px solid darkred;
            margin-bottom: 5px;
            font-size: 12px;
            font-weight : 600;
            font-size : 18px;
            border-radius : 50px;
            padding :8px;
            padding-right : 90px;
            padding-left : 90px;
            margin-top : 25px;
            text-align : center;   
        }
        #sub:hover{
            border : 5px solid black;
            background : white;
            color : black;
            font-size: 20px;
            font-weight: 600;
        }
</style>
    
<body>
    <div class="container">
        <div class = "content">
            <big><h1>PREVIOUS YEARS' QUESTIONS PAPERS</h1></big>
            <big><h2>(University Of Delhi)</h2></big>
         </div>
        <form class="form2" action="Upload2.php" method="post">
            <select name="subject">
                <option>--Choose Subject--</option>
                <?php while($row = $sql->fetch(PDO::FETCH_ASSOC))
            {?>
                <option value="<?= $row["Subject_Name"];?>"><?= $row["Subject_Name"]; ?></option>
                <?php }?>
            </select>
            <input id = "sub1" type="url" name="link" placeholder="Insert the File-Link here"required>
            <input  type="number" name="year" placeholder="Input the Exam-Year" required>
            <input id ="sub" type="submit" name="submit" value="Submit">
        </form>
    </div></div>
</body>
</html>