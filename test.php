<?php

require __DIR__.'/vendor/autoload.php';

use App\Comunication\DataBase;


$db = new DataBase();

print_r($db->getrows());





