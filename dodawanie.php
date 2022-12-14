<html>
    <head>
        <style>
        .d1
        {
            background: orange;
            height: 800px;
            width: 500px;
            border: 50%;
            outline: 5px black solid;
            font-size: 20px;
            text-align: center;
            border-top-left-radius: 100px;
            border-bottom-right-radius: 50px;
            border-bottom-left-radius: 10px;
        }
        input
        {
            background: grey;
            border-radius:20px;
        }
        button
        {
            background: grey;
            border-radius:20px;
        }
        </style>
    </head>
    <body>
        <center><div class="d1">
    <?php
    session_start();
    $con = new mysqli("127.0.0.1","root","","sklep");
    echo '<form method="POST">';
    $res = $con->query("SELECT * FROM users");
    $cos = $res->fetch_all();

    $res1 = $con->query("SELECT * FROM offerts");
    $cos1 = $res1->fetch_all();
    echo '<center><div class="d1"> Zalogowany jako: '.$_SESSION["login"].'<h1>Wystaw:</h1><br> Nazwa Itemu: <input name="name"><br> Opis: <input name="description"><br><input type="submit">';
    if($_POST!=NULL)
    {
            $sqlquery = "INSERT INTO `offerts` VALUES ('".count($cos1)."', '".$_POST['name']."', '".$_POST['description']."','".$_SESSION["id"]."');";
            $con->query($sqlquery);
            header('location: strona.php');
    }
    echo '</form>';

    echo '<form action="strona.php"><button>Wróć</button></form></center></div>';
    ?>
        </div></center>
    </body>
</html>