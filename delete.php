<?php

require_once __DIR__.'/vendor/autoload.php';

use App\Comunication\DataBase;


session_start();

$db= new DataBase();


$nome =filter_input(INPUT_GET, 'nome', FILTER_SANITIZE_STRING);

try {
    $db->deleteBranch($nome);
    header('Status: 303 ', false, 303);
    header('Location: feed.php');
} catch (Exception $e) {
    ?>
    <script> alert("Ocorreu um erro, tente novamente");</script>
    <?php
}

