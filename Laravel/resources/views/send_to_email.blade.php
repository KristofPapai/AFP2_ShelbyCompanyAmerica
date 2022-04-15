<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MyLearning</title>

    <meta name="description" content="">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "Inter", sans-serif;
        }

        .background-animate {
            background-size: 400%;

            -webkit-animation: AnimationName 6s ease infinite;
            -moz-animation: AnimationName 6s ease infinite;
            animation: AnimationName 6s ease infinite;
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
<body class="body-bg min-h-screen pt-12 md:pt-20 pb-6 px-2 md:px-0 bg-gradient-to-r from-indigo-500 via-red-500 to-yellow-500 background-animate" style="font-family:'Lato',sans-serif;">
<header class="max-w-lg mx-auto">
    <a href="{{ asset('login') }}">
        <h1 class="text-4xl font-bold text-white text-center">MyLearning</h1>
        <h1 class="text-2xl text-white text-center">Knowledge is power</h1>
    </a>
</header>

<main class="bg-white max-w-lg mx-auto p-8 md:p-12 my-10 rounded-lg shadow-2xl">
    <section>
        <h3 class="font-bold text-2xl">Elfelejtett jelszó</h3>
        <p>Kérjük adja meg az e-mail címét és a neptun kódját az ellenőrző kód küldéshez</p>
    </section>

    <section class="mt-10">
        <form class="flex flex-col" method="post" action='/send_email'>
            @csrf
            <div class="mb-6 pt-3 rounded bg-gray-200">
                <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="neptun">Neptun kód</label>
                <input type="text" id="neptun" name="neptun" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3" required value="">
            </div>
            <div class="mb-6 pt-3 rounded bg-gray-200">
                <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="email">Email</label>
                <input type="email" id="email" name="email" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3" required value="">
            </div>
            <button class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" type="submit" name="submit">Küldés</button>
        </form>
    </section>
</main>
</body>
</html>
