<?php
/**
 * File name: AuthController.php
 *
 * Project: Project1
 *
 * PHP version 5
 *
 * $LastChangedDate$
 * $LastChangedBy$
 */

namespace Controllers;
use Common\Authentication\InMemory;
use Common\Authentication\FileBased;
use Common\Authentication\MysqlMemory;
use Common\Authentication\Sqlite;
/**
 * Class AuthController
 */
class AuthController extends Controller
{
    /**
     * Function execute
     *
     * @access public
     */
    public function action()
    {
        $postData = $this->request->getPost();

        //echo 'Authenticate the above two different ways' . var_dump($postData). "<br/>";
		
		if($postData->auth === 'inFile')
		{
			$fileMemory = new FileBased();
			$fileMemory->authenticate($postData->username, $postData->password);
		}
		else if($postData->auth === 'inMemory')
		{
			$memory = new InMemory();
			$memory->authenticate($postData->username, $postData->password);
		}
		else if($postData->auth === 'inSqlite')
		{
			$memory = new Sqlite();
			$memory->authenticate($postData->username, $postData->password);
		}
		else
		{
			$mysql = new MysqlMemory();
			$mysql->authenticate($postData->username, $postData->password);
		}
    }
}
