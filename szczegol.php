<html>
    <head>
    <style>
        .d1
        {
            background: orange;
            height: 500px;
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
        .srodek
{
    margin: 15px 15px 15px 15px;
    text-align: left;
}
.blok
{
    background: lightgrey;
    border: 2px solid black;
    border-radius: 20px;
    margin: 10px 0 0 0;
}
        </style>
    </head>
    <body>
        <center>
    <?php
    session_start();
    $con = new mysqli("127.0.0.1","root","","sklep");
    echo '<form method="POST">';
    $res = $con->query("SELECT * FROM users");
    $cos = $res->fetch_all();

    $res1 = $con->query("SELECT * FROM offerts");
    $cos1 = $res1->fetch_all();

    echo '<center><div class="d1"> Zalogowany jako: '.$_SESSION["login"].'<h1>'.$cos1[$_GET["id"]][1].': </h1><br>Wlasciciel: '.$cos[$cos1[$_GET["id"]][3]][1].' <br>Opis: '.$cos1[$_GET["id"]][2].'<br>';

    echo '<a href="strona.php?page=1">Wróć</a><input type="submit" name="Dodaj" value="Dodaj do koszyka"></center>';
    if($_POST!=null)
    {
        $sqlquery = "INSERT INTO `orders` VALUES ('".$_SESSION["id"]."', '0', '".$_GET["id"]."','".$cos[$cos1[$_GET["id"]][3]][1]."');";
        $con->query($sqlquery);
        echo 'Dodano do koszyka';
    }
    echo '</form></div>';
    ?>
        </center>
    </body>
</html>