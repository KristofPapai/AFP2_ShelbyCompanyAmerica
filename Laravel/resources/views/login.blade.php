<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Learning Belépés</title>
</head>
<body>
<?php
?>
<form method="post" action='/checklogin'>
    @csrf
    Neptun-kód: <input type="text" name="neptun_kod" value=""><br></br>
    Jelszó: <input type="password" name="password" value=""><br></br>
<input type="submit" name="submit" value="Belépés">
</form>
</body>
</html>
