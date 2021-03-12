<?php 


require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/assets/html/editbranch.html';

use App\Comunication\DataBase;


?>
<body>

<main>
    <div class="login-screen">
        <h3>Edit Employe</h3>
   
<form method="POST">
    <label class="branch"> Employes's name: <br>
       
    </label>
    <input type="text" id="branch" name="branch" value="<?php echo filter_input(INPUT_GET, 'nome', FILTER_SANITIZE_STRING) ?>"><br>
    <label class="city"> Occupation: <br>
       
    </label>
    <input type="text" id="city" name="city" value="<?php echo filter_input(INPUT_GET, 'cargo', FILTER_SANITIZE_STRING)?>"><br>

    

 <button type="submit" class="btn-finish" name="btn-fin">Finish</button>
 <button type="submit" class="btn-back" name="btn-back">Back</button>
</div>
</main>
</form>
</body>
<footer>
    <div class="pezin">
        <a href="https://andremzzr.github.io/aboutMe/" class="link-tome">Made by Amdre</a>
    </div>
</footer>

<?php
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$branch =filter_input(INPUT_GET, 'branch', FILTER_SANITIZE_STRING);


if (isset($_POST['btn-back'])) {
    header('Status: 303 ', false, 303);
    header('Location: view.php?nome='.$branch.'');
}
if (isset($_POST['btn-fin'])) {
    try {
        $db = new DataBase();
        $db->editEmploye($id, $_POST['branch'], $_POST['city']);
        header('Status: 303 Moved Permanently', false, 303);
        header('Location: view.php?nome='.$branch.'');
        

    } catch (Exception $e) {
        echo "Error: ".$e;
    }
    
}
?>