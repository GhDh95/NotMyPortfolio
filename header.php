<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

<!-- Google  Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Italiana&family=Roboto&display=swap" rel="stylesheet">

    <!--  Tailwind cdn  -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#805ad5',
                        secondary: '#009378',
                        tertiary: '#F1F1F1',
                        fourth: '#ff926b',
                        fifth:'#ffc65a',
                        sixth: '#231F20',
                    },
                    fontFamily: {
                        Italiano: ['Italiano', 'serif'],
                        Roboto: ['Roboto', 'sans-serif']
                    },
                },
            }
        }
    </script>

<!-- titre du page, $_Server['PHP_SELF'] retourne /index.php et basename retourne le nom du fichier, en donnant un suffix a basename,
on peu se debarraser du extension du fichier-->
    <title> <?= basename($_SERVER['PHP_SELF'], ".php") ?> </title>

</head>
<body class="font-Roboto">

<div id="main-container" class="bg-clifford-300 max-w-7xl mx-auto flex flex-col">
<?php require_once 'components/navigation.php' ?>