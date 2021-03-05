<?php

require_once __DIR__.'/assets/html/newbranch.html';


if(isset($_POST['btn-back'])) {
    header('Status: 303 Moved Permanently', false, 303);
    header('Location: feed.php');
}
if (isset($_POST['btn-fin'])) {
    if (strlen($_POST['branch']) > 0 and !intval($_POST['branch'])) {
        if (strlen($_POST['city']) > 0 and !intval($_POST['city'])) {
            header('Status: 303 Moved Permanently', false, 303);
            header('Location: feed.php');
        }
        else{
            ?>
            <script type="text/javascript" src="/js/newb.js"></script>
            <?php
        }
    }
    
}

?>