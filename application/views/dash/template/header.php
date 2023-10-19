<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title; ?></title>
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets') ?>/images/smkn2kra-removebg-preview.png">
    <meta name="author" content="name">
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/> <!--Replace with your tailwind.css once created-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.7.3/dist/full.css" rel="stylesheet" type="text/css" />
<style>
/* Configure this in Tailwind.config.js */

@keyframes fadeIn {
  0% {
    opacity: 0;
  }
  50% {
    opacity: 0.7;
  }
  100% {
    opacity: 1;
  }
}

@keyframes fade-out-down {
  0% {
    opacity: 1;
    transform: translateY(0);
  }
  100% {
    opacity: 0;
    transform: translateY(20px);
  }
}

@keyframes fade-in-down {
  0% {
    opacity: 0;
    transform: translateY(-30px);
  }
  50% {
    opacity: 0.7;
    transform: translateY(-10px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}

.animate-fadeIn {
  animation: fade-in-down 1.5s ease-in forwards;
}
.animate-fadeOut {
  animation: fade-out-down 1.5s ease-out forwards;
}


:root{
::-webkit-scrollbar{height:10px;width:10px}::-webkit-scrollbar-track{background:#efefef;border-radius:6px}::-webkit-scrollbar-thumb{background:#d5d5d5;border-radius:6px}::-webkit-scrollbar-thumb:hover{background:#c4c4c4}}
</style>
</head>

<body class="bg-gray-200 font-sans leading-normal tracking-normal">
<!--Header-->
    <div class="w-full m-0 p-0 bg-cover bg-bottom" style="background-image:url('cover.jpg'); height: 60vh; max-height:460px;">
            <div class="container max-w-4xl mx-auto pt-16 md:pt-32 text-center break-normal">
                <!--Title-->
                    <p class="text-white font-extrabold text-3xl md:text-5xl">
                        👻 Ghostwind CSS
                    </p>
                    <p class="text-xl md:text-2xl text-gray-500">Welcome to my Blog</p>
            </div>
        </div>