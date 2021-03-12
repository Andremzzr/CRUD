<?php



namespace App\Comunication;



use PDO;


/**
 * This class make all the connections with the database 
 */
class DataBase
{
    /**
     * DataBase connection
     *
     * @param  string $db_name
     * @return $pdo 
     */
    public function connect($db_name)
    {
        $pdo = new PDO('sqlite:db/'.$db_name);

        return $pdo;
    }

    /**
     * Adds a Branch in the DB
     *
     * @param  string $nome
     * @param  string $cidade
     * @return void
     */
    public function addBranch(string $nome, string $cidade)
    {
        
        $pdo = new DataBase();
        $pdo = $pdo->connect('company.db');

        $nome = filter_var($nome, FILTER_SANITIZE_STRING);
        $cidade = filter_var($cidade, FILTER_SANITIZE_STRING);

        $statament = $pdo->prepare("INSERT INTO `branchs` (`nome`, `city`) VALUES (:nome, :city)");

        $statament->bindValue(":nome", $nome,   PDO::PARAM_STR);
        $statament->bindValue(":city", $cidade, PDO::PARAM_STR);
        
        $result = $statament->execute();   
    }
     
    /**
     * Return db lines in an array
     *
     * @return array 
     */
    public function getrows()
    {
        $pdo = new DataBase();
        $pdo= $pdo->connect('company.db');


        $statament = $pdo->query("SELECT * FROM branchs");

        $rows = [];

        if ($statament) {
            while ($row = $statament->fetch(PDO::FETCH_ASSOC)) {
                $rows[] = $row;
            }

           
        }

        return $rows;
    }
    
    /**
     * Faz cadastro de usuário do sistema
     *
     * @param  string $email
     * @param  string $user
     * @param  string $password
     * @return void
     */
    public function setLogin(string $email, string $user, string $password)
    {
        $db = new DataBase();
        $db = $db->connect('login.db'); 

        $statament = $db->prepare("INSERT INTO `login` (`email`, `password`, `user`) VALUES (:email, :password, :user)");


        $email = filter_var($email, FILTER_SANITIZE_EMAIL);


        $statament->bindValue(":email", $email,   PDO::PARAM_STR);
        $statament->bindValue(":password", $password, PDO::PARAM_STR);
        $statament->bindValue(":user", $user, PDO::PARAM_STR);

        $result = $statament->execute();   
    }

    /**
     * Faz a verificação para logar no sistema
     *
     * @param  string $email
     * @param  string $password
     * @return boolean
     */
    public function verLogin(string $email, string $password)
    {
        $db = new DataBase();
        $db = $db->connect('login.db');

        $statament = $db->prepare("SELECT * FROM `login` WHERE `email` = :email AND `password` = :password");

        $statament->bindValue(":email", $email,   PDO::PARAM_STR);
        $statament->bindValue(":password", $password, PDO::PARAM_STR);

        $result = $statament->execute();

        $rows = [];

        if ($statament) {
            while ($row = $statament->fetch(PDO::FETCH_ASSOC)) {
                $rows[] = $row;
            }
        }

        if (count($rows) == 1) {
            return true;
        }
    }
    
    /**
     * Edit the branch in database
     *
     * @param  integer $id 
     * @param  string  $nome
     * @param  string  $cidade
     * @return void
     */
    public function editBranch(int $id,string $nome,string $cidade)
    {
        $db = new DataBase();
        $db = $db->connect('company.db');

        $nome = filter_var($nome, FILTER_SANITIZE_STRING);
        $cidade = filter_var($cidade, FILTER_SANITIZE_STRING);

       

        $statament = $db->prepare("UPDATE `branchs` SET `nome` = :nome, `city` = :city WHERE `id` = :id");

        
        $statament->bindValue(":nome", $nome,   PDO::PARAM_STR);
        $statament->bindValue(":city", $cidade, PDO::PARAM_STR);
        $statament->bindValue(":id", $id,   PDO::PARAM_INT);
        $result = $statament->execute();

    }

    /**
     * Delete a Branch from database
     *
     * @param  string $nome
     * @return void
     */
    public function deleteBranch(string $nome, )
    {   
        // DELETE ALL EMPLOYES THAT ARE IN THE BRANCH YOU WANNA DELETE
        $db = new DataBase();

        $db =$db->connect('employe.db');

        $statament = $db->prepare("DELETE FROM employe WHERE `branch` = :nome");

        $statament->bindValue(":nome", $nome, PDO::PARAM_STR);

        $result = $statament->execute();

        //DELETING THE BRANCH

        $db2 = new DataBase();

        $db2 =$db2->connect('company.db');

        $statament2 = $db2->prepare("DELETE FROM branchs WHERE `nome` = :nome");
        
        $statament2->bindValue(":nome", $nome, PDO::PARAM_STR);
        
        $result2 = $statament2->execute();


    }


    /**
     * Add Employe to a branch
     *
     * @param  string $branch
     * @param  string $nome
     * @param  string $cargo
     * @return void
     */
    public function addEmploye(string $branch,string $nome, string $cargo)
    {
        $db = new DataBase();
        $db = $db->connect('employe.db');

        $nome = filter_var($nome, FILTER_SANITIZE_STRING);
        $cargo = filter_var($cargo, FILTER_SANITIZE_STRING);

        $statament = $db->prepare("INSERT INTO `employe` (`branch`,`nome`, `cargo`) VALUES (:branch,:nome, :cargo)");

        $statament->bindValue(":branch", $branch, PDO::PARAM_STR);
        $statament->bindValue(":nome", $nome,   PDO::PARAM_STR);
        $statament->bindValue(":cargo", $cargo, PDO::PARAM_STR);
        
        $return =  $statament->execute();

    }

    /**
     * Delete an employe
     *
     * @param  string $nome
     * @return void
     */
    public function deleteEmploye(string $nome)
    {
        $db = new DataBase();
        $db =$db->connect('employe.db');

        $statament = $db->prepare("DELETE FROM employe WHERE `nome` = :nome");
        
        $statament->bindValue(":nome", $nome, PDO::PARAM_STR);
        
        $result = $statament->execute();
    }

    /**
     * Return db lines in an array
     *
     * @param  string $branch
     * @return array 
     */
    public function getEmployes(string $branch)
    {
        $pdo = new DataBase();
        $pdo= $pdo->connect('employe.db');


        $statament = $pdo->prepare("SELECT * FROM employe WHERE branch = :branch");

        $statament->bindValue(":branch", $branch, PDO::PARAM_STR);

        $statament->execute();

        $rows = [];

        if ($statament) {
            while ($row = $statament->fetch(PDO::FETCH_ASSOC)) {
                $rows[] = $row;
            }

           
        }

        return $rows;
    }
}

