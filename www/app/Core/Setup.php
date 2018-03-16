<?php 
namespace Core;

class Setup {

	public static function setupTables() {

        $connection = \Core\Database::getConnection();
        try {
            $sql ="CREATE TABLE IF NOT EXISTS abonent(
                 id INT( 11 ) AUTO_INCREMENT PRIMARY KEY,
                 name VARCHAR(50),
                 surname VARCHAR(50),
                 description VARCHAR(250),
                 address VARCHAR(150), 
                 balance VARCHAR(150));";
            $connection->exec($sql);

        } catch(\PDOException $e) {
            echo $e->getMessage();
        }
	}

	public static function setupData() {
        $abonent = new \Models\Abonent();

        $data = [
            "name" => "Joe",
            "surname" => "Jones",
            "description" => "Programmer",
            "address" => "Los Angeles, CA 90017",
            "balance" => "110",
        ];
        $abonent->save($data);

        $data = [
            "name" => "Timothy",
            "surname" => "Jennings",
            "description" => "Personal banker",
            "address" => "Robertsville, NJ 07726",
            "balance" => "110",
        ];

        $abonent->save($data);
	}

}