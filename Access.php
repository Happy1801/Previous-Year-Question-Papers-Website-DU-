<?php
    $server = "mysql:host=localhost;dbname=PYQ";
    $username = "root";
    $password = "";
    $con = new PDO($server, $username, $password);

    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }

    SESSION_START();
    $sql = $con->prepare("SELECT * FROM `COURSE`");
    $sql->execute();
?>

<html>
    <style>
        .course{
            display: flex;
            justify-content : center;
            align-items : center;
            flex-direction: column;
        }
        .course-div{
            width: 80%;
            display: flex;
            justify-content : center;
            align-items : center;
        }
        .course-form{
            padding: 5px;
            display: flex;
            flex-direction: column;
            justify-content : center;
            align-items : center;
            
        }
        .course-form select, option{
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
        }
        input{
            padding: 7px;
            border : 5px solid white;
            background : black;
            color : white;
            margin-top : 25px;
            border-radius : 40px;
            padding-right : 30px;
            padding-left : 30px;
            font-weight : 800;
            font-size : 15px;
        }
        input:hover{
            border : 5px solid black;
            background : white;
            color : black;
            font-weight : 800;
            font-size : 15px;
        }
    .course h1 {
        display: flex;
        justify-content: center;
        align-items: center;
        width: auto;
        background-color: skyblue;
        padding: 5px;
        background-color: rgb(59, 235, 185);
        border: 10px solid black;
    }

    .course h2 {
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
    body{
        background-color: rgb(6, 26, 94);
    }
</style>

<body>
<div class='course'>
        <big><h1>PREVIOUS YEARS' QUESTIONS PAPERS</h1></big>
        <big><h2>(University Of Delhi)</h2></big>
        <div class='course-div'>
    <form class='course-form' action="Access1.php" method="post">
        <select name="course">
            <option>--Choose Course--</option>
            <?php while($row = $sql->fetch(PDO::FETCH_ASSOC))
            {?>
                <option value="<?= $row["Course_Name"];?>"><?= $row["Course_Name"]; ?></option>
                <?php }?>
        </select>
        <input type="submit" name="submit" value="Next">
    </form>
    </div>
    </div>
</body>