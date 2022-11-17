<!DOCTYPE html>
<html>
    <head>
        <style>
        </style>
    </head>
    <body>
        <?php
           $con = new mysqli("127.0.0.1","root","","sklep"); 
           if(isset($_POST['login'])&& strlen($_POST['login'])){ 
            
           } 

          
        $res=$con->query("SELECT * FROM users");
        $offers=$res->fetch_all(MYSQLI_ASSOC); 
        $res->fetch_all(); 
         

        ?>
      <center>
        <form method="POST">
      <input type="Login" placeholder="Login">
      <input type="password" placeholder="Hasło">
</form>
      <button class="pure-button">Zaloguj</button>
</center>
        
        
    </body>
</html>