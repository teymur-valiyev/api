<?php 

namespace Core;

class Database {

	private static $host = "localhost";
	private static $dbName = "test";
	private static $username = "test";
	private static $password = "test";

	private static $connection = null;

	private function __construct(){}

	public function setConfig($host,$dbName,$username,$password) {
		self::$host = $host;
		self::$dbName = $dbName;
		self::$username = $username;
		self::$password = $password;
	}

	public static function getConnection() {

		if(!isset(self::$connection)) {
			self::$connection = self::makeConnection();
		}
		
		return self::$connection;
	}

	public static function makeConnection() {
 
        try{
        	self::$connection = new \PDO(
        		"mysql:host=".self::$host.";dbname=".self::$dbName,
        	 	self::$username,
        	  	self::$password
        	);
        } catch(\PDOException $e){
            echo "Connection error: ".$e->getMessage();
        }
 
        return self::$connection;
	}
}