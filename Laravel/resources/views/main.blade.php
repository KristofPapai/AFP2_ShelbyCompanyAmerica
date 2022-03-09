<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Learning</title>
</head>
<body>
<?php
    $auth = Auth::user()->auth;
?>
<!--TODO: Navbar(?)-->
    <div>
        <!--TODO: Dinamikus dropdown kurzusok-->
        <select>
            <option value="Kurzusok">Kurzusok</option>}
        </select>
        <!--TODO: Jogosultság alapú beállítás megjelenítések-->
        <select onchange="window.location.href=this.value;">
            <option hidden value="" disabled selected>Beállítások</option>
            <optgroup label="Alap beállítások">
                <option value="{{route('options')}}">Beállítások</option>
            </optgroup>
            <!--TODO: Jogosultság ellenőrzés-->
            <optgroup label="Felhasználó beállítások">
                <option value="{{asset('courseoptions')}}">Kurzus hozzárendelés</option>
                <option value="{{asset('useroptions')}}">Beállítások</option>
            </optgroup>
        </select>
        <a href="{{asset('logout')}}">Kijelentkezés</a>
    </div>

</body>
</html>
