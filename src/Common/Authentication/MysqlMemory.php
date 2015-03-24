<?php

namespace Common\Authentication;
use PDO;

class MysqlMemory implements IAuthentication
{	
	function authenticate($username, $password)
	{
		try 
		{
			$conn = new PDO('mysql:host=localhost;dbname=user_database', 'root', '');
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} 
		catch(PDOException $e) 
		{
			echo 'ERROR: ' . $e->getMessage();
		}
		
		$sql = 'SELECT * FROM user_login';
		foreach ($conn->query($sql) as $row) {
			echo "username: " . $row['username'] . "<br>";
			echo "password: " . $row['password'] . "<br><br>";
		}
		
		$search = $conn->query('SELECT * FROM user_login WHERE BINARY username =' . $conn->quote($username) . ' and BINARY password =' . $conn->quote($password) . '');
		$data = $search->fetch();
		echo var_dump($data);
		
		if($data != null)
		{
			echo "Welcome to mysql database";
		}
		else
		{
			echo "Access denied";
		}
	}
}

