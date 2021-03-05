<?php

require_once __DIR__.'/assets/html/newemploye.html';

if (isset($_POST['btn-back'])) {
    header('Status: 303 Moved Permanently', false, 303);
    header('Location: view.php');
}
if(isset($_POST['btn-fin'])) {
    header('Status: 303 Moved Permanently', false, 303);
    header('Location: view.php');
}