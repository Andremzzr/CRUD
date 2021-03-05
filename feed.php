<?php


require_once __DIR__.'/assets/html/feed.html';

if(isset($_POST['btn-view'])) {
    header('Status: 303 Moved Permanently', false, 303);
    header('Location: view.php');
}


?>

