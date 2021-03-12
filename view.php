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
                   <a href="editemploye.php?nome='.$row['nome'].'&cargo='.$row['cargo'].'&id='.$row['id'].'&branch='.$row['branch'].'" class="btn-edit">Edit</a> <a href="deletemp.php?id='.$row['id'].'&nome='.$row['branch'].'" class="btn-delete">Delete</a>
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