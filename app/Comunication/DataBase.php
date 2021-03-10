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
        $pdo = new PDO('sqlite:'.$db_name);

        return $pdo;
    }

    /**
     * Adds a Branch in the DB
     *
     * @param  string $nome
     * @param  string $cidade
     * @return void
     */
    public function addBranch($nome, $cidade)
    {
        
        $pdo = new DataBase();
        $pdo = $pdo->connect('company.db');

        

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
     * Delete a Branch from database
     *
     * @param  string $nome
     * @return void
     */
    public function deleteBranch(string $nome)
    {
        $db = new DataBase();
        $db->connect('company.db');

        $statament = $db->prepare("DELETE * FROM `branchs` WHERE `nome` = :nome");
        
        $statament->bindValue(":nome", $nome, PDO::PARAM_STR);
        
        $result = $statament->execute();
    }


    /**
     * Add Employe to a branch
     *
     * @param  string $nome
     * @param  string $cargo
     * @return void
     */
    public function addEmploye(string $nome, string $cargo)
    {
        $db = new DataBase();
        $db->connect('employe.db');

        $statament = $db->prepare("INSERT INTO `employe` (`nome`, `cargo`) VALUES (:nome, :cargo)");


        $statament->bindValue(":nome", $nome,   PDO::PARAM_STR);
        $statament->bindValue(":cargo", $cargo, PDO::PARAM_STR);
        
        $return =  $statament->execute();

    }


}

