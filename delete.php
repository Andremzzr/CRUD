<?php

require_once __DIR__.'/vendor/autoload.php';

use App\Comunication\DataBase;


session_start();

$db= new DataBase();


$nome =filter_input(INPUT_GET, 'nome', FILTER_SANITIZE_STRING);


$db->deleteBranch($nome);

if ($db->deleteBranch($nome)) {
    ?>
    <script href="succes.js"></script>

    <?php
}
