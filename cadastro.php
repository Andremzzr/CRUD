<?php

require_once __DIR__.'/assets/html/cadastro.html';

if (isset($_POST['btn-back'])) {
    header('Status: 303 ', false, 303);
    header('Location: index.php');
}

if (isset($_POST['btn-fin'])) {
    if ($_POST['email'] != '') {
        if ($_POST['password'] == $_POST['password-comfirm']) {
            header('Status: 303 ', false, 303);
            header('Location: index.php');
        }
    }
    
}