<?php

namespace Common\Authentication;

class InMemory implements IAuthentication
{	
	protected $user = ["chris","123pass"];
	
	public function authenticate($username, $password)
	{
		if(strcmp($username, $this->user[0]) == 0 && strcmp($password, $this->user[1]) == 0)
		{
			echo "Welcome ".$this->user[0];
		}
		else
		{
			echo "Access denied";
		}
	}
}

