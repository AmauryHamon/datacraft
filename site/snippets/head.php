<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>datacraft</title>
    <?= css('assets/css/style.css') ?>
</head>
<body x-data="site" :class="modal ? 'bg-ultralightgreen' : 'bg-lightgrey'">

<?php snippet('nav')?>
<main class="min-h-screen">