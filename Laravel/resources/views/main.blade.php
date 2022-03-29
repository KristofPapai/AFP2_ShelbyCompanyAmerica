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
    <title>E-Learning</title>
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
</head>
<body class="body-bg min-h-screen  pb-6 px-2 md:px-0 bg-gradient-to-r from-cyan-300 via-teal-500 to-lime-400 background-animate" style="font-family:'Lato',sans-serif;">
<?php
    $auth = Auth::user()->auth;
?>
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
        <a href="#" class="text-2xl hover:text-lime-700 duration-500 font-bold">Kurzusok</a>
      </li>
      <li class="mx-4 my-6 md:my-0">
        <select onchange="window.location.href=this.value;" class="text-2xl hover:text-lime-700 duration-500 font-bold w-52">
            <option hidden value="" disabled selected >Beállítások</option>
            <optgroup label="Alap beállítások">
                <option value="{{route('options')}}">Beállítások</option>
            </optgroup>
            <!--TODO: Jogosultság ellenőrzés-->
            <optgroup label="Felhasználó beállítások">
                <option value="{{asset('courseoptions')}}">Kurzus hozzárendelés</option>
                <option value="{{asset('useroptions')}}">Beállítások</option>
            </optgroup>
        </select>
      </li>
      <li>
        <a href="{{asset('logout')}}" class="text-2xl hover:text-lime-700 duration-500 font-bold w-52">Kijelentkezés</a>
      </li>
      
<h2 class=""></h2>
    </ul>
  </nav>

  


  <script>
    function Menu(e){
      let list = document.querySelector('ul');
      e.name === 'menu' ? (e.name = "close",list.classList.add('top-[80px]') , list.classList.add('opacity-100')) :( e.name = "menu" ,list.classList.remove('top-[80px]'),list.classList.remove('opacity-100'))
    }
  </script>
</body>
</html>
