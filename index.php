<?php


require_once __DIR__.'/assets/html/index.html';

if (isset($_POST['btn-login'])) {

    if ($_POST['email'] == 'teste@gmail.com' and $_POST['password'] == '123') {
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