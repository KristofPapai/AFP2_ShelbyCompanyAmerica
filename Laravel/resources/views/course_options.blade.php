<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Learning Kurzus Beállítások</title>
    <script>
        function enableMultUpl() {
            var mult = document.getElementById("Mult");
            var singl = document.getElementById("Singl");
            var new_mult_neptun = document.getElementById("courseMultNeptun")
            var new_mult_course = document.getElementById("courseMultCourse")
            var new_mult_submit = document.getElementById("courseMultSubmit")
            new_mult_neptun.disabled = !mult.checked;
            new_mult_course.disabled = !mult.checked;
            new_mult_submit.disabled = !mult.checked;
            singl.disabled = mult.checked;

        }
        function enableSinglUpl(){
            var singl = document.getElementById("Singl");
            var mult = document.getElementById("Mult");
            var new_singl_neptun = document.getElementById("courseSinglNeptun")
            var new_singl_course = document.getElementById("courseSinglCourse")
            var new_singl_submit = document.getElementById("courseSinglSubmit")
            new_singl_neptun.disabled = !singl.checked;
            new_singl_course.disabled = !singl.checked;
            new_singl_submit.disabled = !singl.checked;
            mult.disabled = singl.checked;

        }
    </script>
</head>

<body>

<div>

    <form method="post" action='/checkcourse'>
        @csrf
        Neptun-kódok (.csv)<input id="courseMultNeptun" disabled type="file" accept=".csv" />
        Kurzus
        <!--TODO: dinamikus kurzus dropdown a tanár szempontjából-->
        <select disabled id="courseMultCourse">
            <option value="Kurzus">Valami</option>
        </select>
        <input disabled id="courseMultSubmit" type="submit" name="submit" value="Hozzárendelés">
        <input id="Mult" name="courseMult" onclick="enableMultUpl()" type="checkbox"><br></br>
        Neptun-Kód <input disabled id="courseSinglNeptun" type="text" name="neptun" required value="">
        Kurzus
        <!--TODO: dinamikus kurzus dropdown a tanár szempontjából-->
        <select disabled id="courseSinglCourse">
            <option value="Kurzus">Valami</option>
        </select>
        <input disabled id="courseSinglSubmit" type="submit" name="submit" value="Hozzárendelés">
        <input id="Singl" name="courseSingl" onclick="enableSinglUpl()" type="checkbox">
    </form>
    <!--TODO: Ha lesz navbar ez elengedhető-->
    <form method="get" action='/main'>
        <input type="submit" name="submit" value="Vissza">
    </form>
</div>
</body>
</html>
