<?php

require_once __DIR__.'/assets/html/newemploye.html';
require_once __DIR__.'/vendor/autoload.php';

use App\Comunication\DataBase;

$branch = filter_input(INPUT_GET, "nome", FILTER_SANITIZE_STRING);
if (isset($_POST['btn-back'])) {
    header('Status: 303 Moved Permanently', false, 303);
    header('Location: view.php?nome='.$branch);
}
if(isset($_POST['btn-fin'])) {
    $db = new Database;
    $db->addEmploye($branch, $_POST['employe'], $_POST['occupation']);


    header('Status: 303 Moved Permanently', false, 303);
    header('Location: view.php?nome='.$branch);

}