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
        .body-bg {
            background-color: #9921e8;
            background-image: linear-gradient(315deg, #9921e8 0%, #5f72be 74%);
        }
    </style>
</head>
<body class="body-bg min-h-screen  pb-6 px-2 md:px-0" style="font-family:'Lato',sans-serif;">
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
        <a href="#" class="text-2xl hover:text-purple-700 duration-500 font-bold">KURZUSOK</a>
      </li>
      <li class="mx-4 my-6 md:my-0">
        <select onchange="window.location.href=this.value;" class="text-2xl hover:text-purple-700 duration-500 font-bold">
            <option hidden value="" disabled selected >BEÁLLÍTÁSOK</option>
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
