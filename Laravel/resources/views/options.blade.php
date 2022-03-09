<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Learning Beállítások</title>
</head>
<body>
<?php
    $neptun = AUTH::user()->neptun_kod;
    $name = AUTH::user()->diak_nev;
?>
<div>
    <form method="post" action='/checkpassword'>
        @csrf
        Neptun-Kód <input type="text" name="neptun_kod" required value={{$neptun}}><br></br>
        Név: <input type="text" name="name" required value={{$name}}><br></br>
        Régi jelszó: <input type="password"  name="old_password" required value=""><br></br>
        Új jelszó: <input type="password" name="new_password" required value=""><br></br>
        <input type="submit" name="submit" value="Megváltoztatás">
    </form>
    <!--TODO: Ha lesz navbar ez elengedhető-->
    <form method="get" action='/main'>
        <input type="submit" name="submit" value="Vissza">
    </form>
</div>
</body>
</html>
