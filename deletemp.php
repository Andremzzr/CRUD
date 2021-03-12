<?php



require_once __DIR__.'/vendor/autoload.php';

use App\Comunication\DataBase;


session_start();

$db= new DataBase();


$id =filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$nome = filter_input(INPUT_GET, 'nome', FILTER_SANITIZE_STRING);
try {
    $db->deleteEmploye($id);
    header('Status: 303 ', false, 303);
    header('Location: view.php?nome='.$nome.'');
} catch (Exception $e) {
    ?>
    <script> alert("Ocorreu um erro, tente novamente");</script>
    <?php
}
