<?php

require_once __DIR__.'/assets/html/newemploye.html';

use \App\Database;


if (isset($_POST['btn-back'])) {
    header('Status: 303 Moved Permanently', false, 303);
    header('Location: view.php');
}
if(isset($_POST['btn-fin'])) {
    $db = new Database;
    $db->criarEmploye($_POST[''], $_POST['']);


    header('Status: 303 Moved Permanently', false, 303);
    header('Location: view.php');

}