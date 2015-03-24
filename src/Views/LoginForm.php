<?php

namespace Views;


class LoginForm extends View
{
    public function __construct()
    {
        $this->content = <<<LOGIN_FORM
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
		<link rel="stylesheet" href="main.css" type="text/css">
        <title>Example Login Form</title>
    </head>
    <body>
        <div align="center">
            <form method="POST" action="/auth">
                Username: <input type="text" name="username" size="15" /><br /><br />
                Password: <input type="password" name="password" size="15" /><br /><br />
				<input type="radio" name="auth" value="inMemory" checked>In Memory
				<input type="radio" name="auth" value="inFile">In File
				<input type="radio" name="auth" value="inMysql">In MySQL
				<input type="radio" name="auth" value="inSqlite">In SQLite
                <p><input type="submit" value="Login" /></p>
            </form>
        </div>
    </body>
</html>
LOGIN_FORM;
    }
}
