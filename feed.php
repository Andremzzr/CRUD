a<?php


require_once __DIR__.'/assets/html/feed.html';
require_once __DIR__.'/vendor/autoload.php';

use App\Comunication\DataBase;

$resultados='';

$db = new DataBase();

foreach ($db->getrows() as $row) {
    $resultados.= ' <tr>
                    <th name="nome">'.$row['nome'].'</th>
                    <th>'.$row['city'].'</th>
                   
                    <th>
                    <button class="btn-view" name="btn-view">View</button><a href="delete.php?nome='.$row['nome'].'" class="btn-delete">Delete</a>
                    </th>
                           
                    </tr>';
}




?>

<body>
    <header >
        <div class="buttons">
        <a href="index.php" class="previous-round">&#8249;</a>
        <a href="newb.php" class="next-round">New Branch</a>
            </div>
    </header>
    <main>
    
    <form action ="" method="POST">
    <table >
        <thead class="table">
    <tr>
    <th class="title">Branch Name</th>
    <th class="title">City</th>
    <th class="title">Status</th>
    </tr>
    </thead>
  
    <tbody class="table">
        <?php echo $resultados?>
    </tbody>
           
   

    
    </table>
    <form>
    </main>
    </body>



    <?php
    if(isset($_POST['btn-view'])) {
        header('Status: 303 Moved Permanently', false, 303);
        header('Location: view.php');
    }
    

    ?>

