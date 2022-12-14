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
        .srodek
        {
            margin: 15px 15px 15px 15px;
            text-align: left;
        }
        </style>
    </head>
    <body>
        <center><div class="d1">
    <?php
        session_start();
        echo 'Zalogowany jako: '.$_SESSION["login"].'';

        echo '<form action="index.php"><button>Wyloguj</button></form>';
        echo '<form action="dodawanie.php"><button>Wystaw</button></form>';

        $con = new mysqli("127.0.0.1","root","","sklep");
        echo '<form method="POST" action="dodawanie.php">';
        $res = $con->query("SELECT * FROM offerts");
        $cos = $res->fetch_all();

        $res1 = $con->query("SELECT * FROM users");
        $cos1 = $res1->fetch_all();

        echo '<div class="srodek">';
        for($i=0; $i<count($cos);$i++)
        {
            echo 'item: '.$cos[$i][1].', Sprzedający: '.$cos1[$cos[$i][3]][1].'<br>'  ; 
        }

        echo '</div></form>';
    ?>
        </div></center>
    </body>
</html>