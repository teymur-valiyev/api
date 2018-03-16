<?php 

namespace Models;

class AbstructModel {

    protected $tableName;
    protected $primaryField;
    protected $fileds = [];

	private $connection;

	public function __construct() {
		$this->connection = \Core\Database::getConnection();
	}


	public function getConnection() {
		return $this->connection;
	}

	public function save($data) {

        $columns = array_keys($data);
        $fileds = implode(",",$columns);
        $templateFields = "";
        foreach($columns as $column) {
            $templateFields .=":".$column.",";
        }
        $templateFields = rtrim($templateFields,',');
        $statement = $this->connection->prepare(
    "INSERT INTO {$this->tableName}({$fileds}) VALUES($templateFields)"
        );
        $statement->execute($data);
	}

	public function get($id) {
		$fileds = $this->getFiledsString();

		$query = "SELECT {$fileds} FROM {$this->tableName} 
				WHERE {$this->primaryField} = {$id}";
		$stmt = $this->connection->prepare($query);
       	$stmt->execute();
 
		return $stmt->fetch();
	}



	public function getAll() {
        $query = "SELECT {$this->getFiledsString()} FROM {$this->tableName} 
	             ORDER BY {$this->primaryField} ASC";

        $stmt = $this->connection->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll();
	}

    public function getFiledsString() {

        $fileds = implode(",", $this->fileds);
        $fileds = implode(",", [$this->primaryField, $fileds]);

        return $fileds;
    }
}