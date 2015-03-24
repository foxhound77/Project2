<?php

namespace Common\Authentication;

class FileBased implements IAuthentication
{
	public function authenticate($username, $password)
	{
		if($this->authenticateByFile($username, $password))
		{
			echo "Login successful<br/><br/>Welcome ".$username;
		}
		else
		{
			echo "Invalid username or password";
		}
	}
	
	public function authenticateByFile($username, $password)
	{
		$file = explode( PHP_EOL, file_get_contents( "..//src/Common/Authentication/filebase.txt" )); 
		echo var_dump($file);
		foreach( $file as $line ) 
		{
			list($user, $pass) = explode(",", $line);
			if (strcmp($username, $user) == 0 && strcmp($password, $pass) == 0)
			{
				return true;
			}
		}
		return false;
	}
}
