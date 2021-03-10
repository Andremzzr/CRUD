<?php


require_once __DIR__.'/assets/html/index.html';
require_once __DIR__.'/vendor/autoload.php';

use App\Comunication\DataBase;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

if (isset($_POST['btn-login'])) {
    $db = new DataBase();
    if ($db->verLogin($_POST['email'], $_POST['password'])) {
        header('Status: 303 Moved Permanently', false, 303);
        header('Location: feed.php');

    }
    else{
        ?>
        <script type="text/javascript" src="/js/file.js"></script>
        <?php
    }
}

if (isset($_POST['btn-sin'])) {
    header('Status: 303 Moved Permanently', false, 303);
    header('Location: cadastro.php');
}