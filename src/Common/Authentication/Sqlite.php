<?php

namespace Common\Authentication;
use PDO;

class Sqlite implements IAuthentication
{
	public function authenticate($username, $password)
	{
		try 
		{
			$conn = new PDO('sqlite:../src/Common/Authentication/user_auth.sqlite');
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} 
		catch(PDOException $e) 
		{
			echo 'ERROR: ' . $e->getMessage();
		}
		
		$sql = 'SELECT * FROM user';
		foreach ($conn->query($sql) as $row) {
			echo "username: " . $row['username'] . "<br>";
			echo "password: " . $row['password'] . "<br><br>";
		}
		
		$search = $conn->query('SELECT * FROM user WHERE username =' . $conn->quote($username) . ' and password =' . $conn->quote($password) . '');
		$data = $search->fetch();
		echo var_dump($data);
		
		if($data != null)
		{
			echo "Welcome to Sqlite database";
		}
		else
		{
			echo "Access denied";
		}
	}
}
