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
        <center><div class="d1">
    <?php
        session_start();
        echo 'Zalogowany jako: '.$_SESSION["login"].'<h3>Twój koszyk</h3>';

        echo '<a href="index.php">Wyloguj</a>';
        echo '<a href="strona.php?page=1">Strona Główna</a>';
        echo '<a href="dodawanie.php">Wystaw</a>';

        $con = new mysqli("127.0.0.1","root","","sklep");
        echo '<form method="POST">';
        $res = $con->query("SELECT * FROM offerts");
        $cos = $res->fetch_all();

        $res1 = $con->query("SELECT * FROM users");
        $cos1 = $res1->fetch_all();

        echo '<div class="srodek">';

        $offset=($_GET['page']-1)*10;
        $cos2 = $con->query("SELECT * FROM offerts LIMIT 10 OFFSET ".$offset."");
        $cos22 = $cos2->fetch_all();

        for($i = 0; $i<count($cos22);$i++)
        {
            if($cos22[$i][0]==$_SESSION["id"])
            {
            echo '<div class="blok">item: '.$cos[$i][1].', Sprzedający: '.$cos1[$cos[$i][3]][1].'<br>opis: '.$cos[$i][2].'<a href="szczegol.php?id='.$i.'">Szczegóły</a> </div>';
            }
        }
        echo '<br>';
        $ile = (count($cos22)/10)+1;
        for($i = 1; $i<$ile; $i++)
        {
            echo '<a class="dwa" href="koszyk.php?page='.$i.'">'.$i.'</a>';
        }
        echo '</div></form>';
    ?>
        </div></center>
    </body>
</html>