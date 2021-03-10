<?php

require_once __DIR__.'/assets/html/cadastro.html';
require_once __DIR__.'/vendor/autoload.php';

use App\Comunication\DataBase;

if (isset($_POST['btn-back'])) {
    header('Status: 303 ', false, 303);
    header('Location: index.php');
}

if (isset($_POST['btn-fin'])) {
    if ($_POST['email'] != '') {
        if ($_POST['user'] != '') {
           
        
            if ($_POST['password'] == $_POST['password-comfirm']) {
                $db = new DataBase();
                $db->setLogin($_POST['email'], $_POST['user'], $_POST['password']);


                header('Status: 303 ', false, 303);
                header('Location: index.php');
            }
        }
    }    
}