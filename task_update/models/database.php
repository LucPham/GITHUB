<?php  
   namespace Model\Db;
   
	class database {
		protected $pdo='';
    	protected $sql='';
    	protected $stateMent='';

    	public function __construct() {
    		try {
    			$this->pdo = new \PDO('mysql:host=localhost; dbname=nashtech', 'root', '');
    			$this->pdo->query('set names utf8');
    			$this->pdo->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
    		} catch (PDOException $e) {
    			print "Error!: " . $e->getMessage() . "<br/>";
            	die();
    		}
    	}
	}