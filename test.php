<?php

require __DIR__.'/vendor/autoload.php';

use App\Comunication\DataBase;


$pdo = new PDO('sqlite:test2.db');


$nome = "Testenome";
$cidade = "TesteCidade";

$statament = $pdo->prepare("INSERT INTO `test` (`nome`, `city`) VALUES (:nome, :city)");

$statament->bindValue(":nome", $nome,   PDO::PARAM_STR);
$statament->bindValue(":city", $cidade, PDO::PARAM_STR);
        
$result = $statament->execute();   








