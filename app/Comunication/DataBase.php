<?php



namespace App\Comunication;



use PDO;



class DataBase
{
    /**
     * DataBase connection
     *
     * @param  string $db_name
     * @return $pdo 
     */
    public function connect()
    {
        $pdo = new PDO('sqlite:company.db');

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
        $pdo = $pdo->connect();

        

        $statament = $pdo->prepare("INSERT INTO `branchs` (`id`,`nome`, `city`) VALUES (3,:nome, :city)");

        $statament->bindValue(":nome", $nome,   PDO::PARAM_STR);
        $statament->bindValue(":city", $cidade, PDO::PARAM_STR);
        
        $result = $statament->execute();   
    }
     
    /**
     * Return db lines in an array
     *
     * @return array 
     */
    public function getLines()
    {
        $pdo = new DataBase();
        $pdo= $pdo->connect();


        $statament = $pdo->prepare("SELECT * FROM branchs");

        $rows = $statament->fetchAll(PDO::FETCH_ASSOC);

        var_dump($rows);
    }

}

