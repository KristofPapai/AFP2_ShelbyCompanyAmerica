<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <title>E-Learning Felhasználó Beállítások</title>
    <style>
        body {
            font-family: "Inter", sans-serif;
        }

        .background-animate {
            background-size: 400%;

            -webkit-animation: AnimationName 10s ease infinite;
            -moz-animation: AnimationName 10s ease infinite;
            animation: AnimationName 10s ease infinite;
        }

        @keyframes AnimationName {
            0%,
            100% {
            background-position: 0% 50%;
            }
            50% {
            background-position: 100% 50%;
            }
        }
    </style>  
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
<body class="body-bg min-h-screen  pb-6 px-2 md:px-0 bg-gradient-to-r from-indigo-500 via-red-500 to-yellow-500 background-animate" style="font-family:'Lato',sans-serif;">
    <nav class="p-5 bg-white shadow md:flex md:items-center md:justify-between rounded-lg">
        <div class="flex justify-between items-center ">
          <span class="text-2xl font-bold cursor-pointer">
            MyLearning
          </span>
    
          <span class="text-3xl cursor-pointer mx-2 md:hidden block">
            <ion-icon name="menu" onclick="Menu(this)"></ion-icon>
          </span>
        </div>
    
    <ul class="md:flex md:items-center z-[-1] md:z-auto md:static absolute bg-white w-full left-0 md:w-auto md:py-0 py-4 md:pl-0 pl-7 md:opacity-100 opacity-0 top-[-400px] transition-all ease-in duration-500">
        <li class="mx-4 my-6 md:my-0">
            <a href="{{ asset('listcourses') }}" class="text-2xl hover:text-yellow-500 duration-500 font-bold">Kurzusok</a>
        </li>
        <li class="mx-4 my-6 md:my-0">
            <select onchange="window.location.href=this.value;" class="text-2xl hover:text-yellow-500 duration-500 font-bold w-52">
                <option hidden value="" disabled selected >Beállítások</option>
                <optgroup label="Alap beállítások">
                    <option value="{{route('options')}}">Beállítások</option>
                </optgroup>
                @if ($user->legitimacy == 1)
                <optgroup label="Felhasználó beállítások">
                  <option value="{{asset('courseoptions')}}">Kurzus hozzárendelés</option>
                  <option value="{{asset('addcourse')}}">Kurzus létrehozása</option>
                  <option value="{{asset('useroptions')}}">Beállítások</option>
                </optgroup>
                @endif
            </select>
        </li>
        <li>
            <a href="{{asset('logout')}}" class="text-2xl hover:text-yellow-500 duration-500 font-bold w-52">Kijelentkezés</a>
        </li>
    </ul>
</nav>
<br/>
<main class="bg-white max-w-lg mx-auto p-8 md:p-12 my-10 rounded-lg shadow-2xl">
    <form method="post" action='/useroptionscheck' class="flex flex-col">
        @csrf
        Neptun: <input type="text" name="neptun" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3"><br></br>
        Név: <input type="text" name="name" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3"><br></br>
        Új jelszó: <input id="password_change" disabled type="password"  name="new_password" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3">
        <input name="password" onclick="enablePass()" id="password" type="checkbox" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3"><br></br>
        Jogosultság: <input id="auth_change" disabled type="text" name="new_auth" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3">
        <input name="auth" onclick="enableAuth()" id="auth" type="checkbox" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3"><br></br>
        <button type="submit" name="submit" value="Megváltoztatás" class="border-t-2 bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200">Megváltoztatás</button>
    </form>
    <!--TODO: Ha lesz navbar ez elengedhető-->
    <form method="get" action='/main' class="flex flex-col">
        <button type="submit" name="submit" class="border-t-2 bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200">Vissza</button>

    </form>
</main>
</div>
</body>
</html>
