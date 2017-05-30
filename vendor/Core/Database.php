<?php
namespace Core;
use \PDO;

Class Database{
	
	public static function connect($conf){
		$host 	= isset($conf['host'])? $conf['host'] : '';
		$user 	= isset($conf['user'])? $conf['user'] : '';
		$pass 	= isset($conf['pass'])? $conf['pass'] : '';
		$db 	= isset($conf['db'])? $conf['db'] : '';
		$charset = 'utf8';
		
		try{
			$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
			$opt = [
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
				PDO::ATTR_EMULATE_PREPARES => false,
			];
			$conn = new PDO($dsn, $user, $pass, $opt);
			$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		}catch(PDOException $e){
			die("Connection failed : ".$e->getMessage());
		}catch (Exception $e) {
		  echo "General Error: The user could not be added.<br>".$e->getMessage();
		}
		return $conn;
	}
	
	public static function pdo(){
		global $defaultConn;
		return $defaultConn;
	}
	
}
	
?>
