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
    <div>
        <select>
            <option value="Kurzusok">Kurzusok</option>}
            //TODO N&B: Dinamikus dropdown kurzusok
            //TODO K: Navbar(?)
        </select>
        <form method="post" action='/logout'>
            @csrf
            <input type="submit" name="logout" value="Kijelentkezés">
        </form>

    </div>

</body>
</html>
