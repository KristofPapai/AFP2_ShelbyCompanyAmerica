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
        .body-bg {
            background-color: #9921e8;
            background-image: linear-gradient(315deg, #9921e8 0%, #5f72be 74%);
        }
    </style>
</head>
<body class="body-bg min-h-screen pt-12 md:pt-20 pb-6 px-2 md:px-0" style="font-family:'Lato',sans-serif;">
<header class="max-w-lg mx-auto">
    <a href="#">
        <h1 class="text-4xl font-bold text-white text-center">MyLearning</h1>
        <h1 class="text-2xl text-white text-center">Knowledge is power</h1>
    </a>
</header>

<main class="bg-white max-w-lg mx-auto p-8 md:p-12 my-10 rounded-lg shadow-2xl">
    <section>
        <h3 class="font-bold text-2xl">Neptun kód</h3>
        <p>Itt küldjük neptun kódját amivel be tud jelentkezni</p>
    </section>

    <section class="mt-10">
        <form class="flex flex-col" method="post">
            @csrf
            <div class="mb-6 pt-3 rounded bg-gray-200">
                <h1>{{$neptun}}</h1>
            </div>
        </form>
    </section>
</main>
</body>
</html>
