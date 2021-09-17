<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculater</title>
    <style>
        *{
            align-content: center;
        }
        #fb{
            border: none;
            box-sizing: border-box;
            background-color: #d2dede;
            margin-left: 20%;
            width: 30%;
            height: 50px;
            font-size: 34px;
        }
        #sb{
            border: none;
            box-sizing: border-box;
            background-color: #d2dede;
            width: 30%;
            height: 50px;
            font-size: 34px;
        }
        #x{
            border: none;
            box-sizing: border-box;
            background-color: #b5ff01;
            margin-left:40%;
            width: 60px;
            height: 50px;
            font-size: 34px;
        }
        #d{
            border: none;
            box-sizing: border-box;
            background-color: #b5ff01;
            width: 60px;
            height: 50px;
            font-size: 34px;
        }
        #a{
            border: none;
            box-sizing: border-box;
            background-color: #b5ff01;
            width: 60px;
            height: 50px;
            font-size: 34px;
        }
        #s{
            border: none;
            box-sizing: border-box;
            background-color: #b5ff01;
            width: 60px;
            height: 50px;
            font-size: 34px;
        }
    </style>
</head>
<body><br><br><br><br><br><br><br><br><br><br>
    <form method="get" action="own.php">
        <input type="number" name="fb" id="fb"> 
        <input type="number" name="sb" id="sb"><br><br><br>
        <input type="submit" name="mult"  value="x" id="x">
        &nbsp
        <input type="submit" name="div"  value="/" id="d">
        &nbsp
        <input type="submit" name="add"  value="+" id="a">
        &nbsp
        <input type="submit" name="sub"  value="-" id="s"><br><br><br>
        &nbsp
        
    </form>
    <?php
    $ans = 0;
        if($_GET["mult"] == "x"){
            $ans = $_GET["fb"]*$_GET["sb"];
            echo "$ans";
        }
        if($_GET["div"] == "/"){
            $ans = $_GET["fb"]/$_GET["sb"];
            echo "$ans";
        }
        if($_GET["add"] == "+"){
            $ans = $_GET["fb"]+$_GET["sb"];
            echo "$ans";
        }
        if($_GET["sub"] == "-"){
            $ans = $_GET["fb"]-$_GET["sb"];
            echo "$ans";
        }

    ?>
</body>
</html>