<?php

	// Requires the inclusion of includes/trait.crud.php to work properly

	class User {

		use CoreFunctions;

		protected $_db;

	    public function __construct($db=NULL) {
	        if(is_object($db))
	        {
	            $this->_db = $db;
	        }
	        else
	        {
	            $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
	            $this->_db = new PDO($dsn, DB_USER, DB_PASS);
	        }
	    }

	    public function createAccount($username, $password, $email) {


			function generateHash($password) {
			    if (defined("CRYPT_BLOWFISH") && CRYPT_BLOWFISH) {
			        $salt = '$2y$11$' . substr(md5(uniqid(rand(), true)), 0, 22);
			        return crypt($password, $salt);
			    }
			    else {
			    	return $password;
			    }
			}
			$password = generateHash($password);

			$sql = 'INSERT INTO users
			  (
			   username,
			   password,
			   email
			  )

			VALUES
			  (
			    :username,
			    :password,
			    :email
			  )';

			$this->insert($sql, [':username', ':password', ':email'], [$username, $password, $email]);

	    }

	    public function accountLogin() {
	        $sql = "SELECT username, id
	                FROM users
	                WHERE username=:user
	                AND password=:pass
	                LIMIT 1";

	        $getpasswordsql = "SELECT password FROM users WHERE username=:user";

	        $gethashedpsw = $this->queryDb($getpasswordsql, [':user'], [$_POST['username']]);
	        $hashedpsw = $gethashedpsw[0][0];

	        $result = $this->queryDb($sql, [':user', ':pass'], [$_POST['username'], crypt($_POST['password'], $hashedpsw)]);
	        if(count($result) == 1) {
	        	$_SESSION['Username'] = htmlentities($_POST['username'], ENT_QUOTES);
	            $_SESSION['LoggedIn'] = 1;
	            $_SESSION['UserID'] = $result[0][1];
	            return TRUE;
	        }
	        else {
	        	return FALSE;
	        }
    	}

    	public function changeEmail($user, $email) {
    		$sql = "UPDATE users
		        	SET email=?
		        	WHERE id=?";

			$this->updateDb($sql, [$email, $user]);

		    echo "You changed your email to " . $email;
    	}

	}
