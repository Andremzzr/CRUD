<?php

require __DIR__.'/vendor/autoload.php';

use App\Comunication\DataBase;


$pdo = new PDO('sqlite:company.db');


$statament = $pdo->prepare("SELECT * FROM `branchs`");


$rows = $statament->fetchAll(PDO::FETCH_ASSOC);

print_r($rows);