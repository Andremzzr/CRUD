<?php

require_once __DIR__.'/assets/html/view.html';
require_once __DIR__.'/vendor/autoload.php';

use App\Comunication\DataBase;

$resultados='';

$db = new DataBase();

$branch = filter_input(INPUT_GET, "nome", FILTER_SANITIZE_STRING);

foreach ($db->getEmployes($branch) as $row) {
    $resultados.= ' <tr>
                    <th>'.$row['id'].'</th>
                    <th>'.$row['branch'].'</th>
                    <th>'.$row['nome'].'</th>
                    <th>'.$row['cargo'].'</th>
                   
                    <th>
                    <a class="btn-view" name="btn-view" href="view.php?nome='.$row['branch'].'">View</a> <a href="edit.php?nome='.$row['nome'].'&cidade='.$row['cargo'].'&id='.$row['id'].'" class="btn-edit">Edit</a> <a href="delete.php?nome='.$row['nome'].'" class="btn-delete">Delete</a>
                    </th>
                           
                    </tr>';
}


?>
<body>
    <header >
        <div class="buttons">
        <a href="feed.php" class="previous-round">&#8249;</a>
        <a href="newemploye.php?nome=<?php echo $branch ?>" class="next-round">New Employe</a>
        </div>
    </header>
    <main>
    
    <table class="table">
    <thead>
    <th>Id</th>
    <th>Branch</th>
    <th>Employe</th>
    <th>Occupation</th>
    <th>Status</th>
  </tr>
  <tbody>
    <?php echo $resultados?>
    
  </tbody>
  <tr>
      
    </tr>
    
</thead>

    </table>
    
</main>
</body>
</html>