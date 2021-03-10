<?php

require_once __DIR__.'/assets/html/newemploye.html';

use \App\Database;


if (isset($_POST['btn-back'])) {
    header('Status: 303 Moved Permanently', false, 303);
    header('Location: view.php');
}
if(isset($_POST['btn-fin'])) {
    $db = new Database;
    $db->addEmploye($_POST['employe'], $_POST['occupation']);


    header('Status: 303 Moved Permanently', false, 303);
    header('Location: view.php');

}