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
        </style>
    </head>
    <body>
    <?php
        session_start();
        $con = new mysqli("127.0.0.1","root","","sklep");
        echo '<form method="POST">';
        $res = $con->query("SELECT * FROM users");
        $cos = $res->fetch_all();

        echo '<center><div class="d1"><h1>Logowanie:</h1><br> Nazwa Użytkownika: <input name="login"><br> Haslo: <input name="password" type="password"><br><input type="submit">';
        if($_POST!=NULL)
        {
            for($i=0;$i<count($cos);$i++)
            {
                if($_POST['login']==$cos[$i][1] && $_POST['password']==$cos[$i][2])
                {
                    $_SESSION["login"] = $_POST['login'];
                    $_SESSION["id"] = $i;
                    echo 'udalo sie zalogowac';
                    header("Location: strona.php");
                }
            }
        }
        echo '</form>';
    ?>
    <?php
        echo '<form action="rejestracja.php"><button>Rejestracja</button></form></center></div>';
    ?>

    </body>
</html>