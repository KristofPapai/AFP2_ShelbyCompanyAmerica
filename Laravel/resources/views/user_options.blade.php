<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Learning Felhasználó Beállítások</title>
    <script>
        function enablePass() {
            var pass = document.getElementById("password");
            var new_pass = document.getElementById("password_change")
            new_pass.disabled = !pass.checked;
        }
        function enableAuth(){
            var auth = document.getElementById("auth");
            var new_auth = document.getElementById("auth_change")
            new_auth.disabled = !auth.checked;
        }
    </script>
</head>
<body>

<div>
    <form method="post" action='/useroptionscheck'>
        @csrf
        Neptun-Kód <input type="text" name="neptun" required value=""><br></br>
        Név: <input type="text" name="name" required value=""><br></br>
        Új jelszó: <input id="password_change" disabled type="password"  name="new_password" required value="">
        <input name="password" onclick="enablePass()" id="password" type="checkbox"><br></br>
        Jogosultság: <input id="auth_change" disabled type="text" name="new_auth" required value="">
        <input name="auth" onclick="enableAuth()" id="auth" type="checkbox"><br></br>
        <input type="submit" name="submit" value="Megváltoztatás">
    </form>
    <!--TODO: Ha lesz navbar ez elengedhető-->
    <form method="get" action='/main'>
        <input type="submit" name="submit" value="Vissza">
    </form>
</div>
</body>
</html>
