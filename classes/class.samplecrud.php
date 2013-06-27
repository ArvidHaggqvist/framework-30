<?php

	// includes/trait.crud.php is required for the crud functions to work in classes like this, include it before you include this class 

	// The contents of this file does not actually do anything other than illustrate how the internal functions of framework-30 can work 

	class SampleCRUD {

		use CoreFunctions;

		protected $_db;
 
	    /**
	     * Checks for a database object and creates one if none is found
	     *
	     * @param object $db
	     * @return void
	     */
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

	    public function crudInsert($value, $value2) {

			$sql = 'INSERT INTO tablename (field,field2) VALUES ( :value, :value2 )';
			$this->insert($sql, [':value', ':value2'], [$value, $value2]);

	    }

	    public function crudRead() {

	        $sql = "SELECT field FROM tablename WHERE fieldname=:val";
	        $result = $this->queryDb($sql, [':val'], ['correspondingValue']]);

    	}

    	public function crudUpdate($value, $match) {
    		$sql = "UPDATE tablename
		        	SET field=?
		        	WHERE fieldname=?";

			$this->updateDb($sql, [$questionmarkonevalue, $questionmarktwovalue]);

    	}

    	public function crudDelete() {
    		$sql = "DELETE FROM tablename WHERE fieldname=:val";
    		$this->deleteFromDb($sql, [':val'], ['correspondingValue']);
    	}

	}