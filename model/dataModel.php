<?php


      class dataModel {
          private $_db = null;          

          function __construct()
          {
              global $g_databases;
	      $dbname = 'test';
	      $dsn = "mysql:host={$g_databases[$dbname]['host']};port={$g_databases[$dbname]['port']};dbname={$g_databases[$dbname]['dbname']}";
	      if (class_exists("PDO"))
              {
                  try {
	            $this->_db = new PDO($dsn, $g_databases[$dbname]['usr'], $g_databases[$dbname]['pwd'], array(PDO::ATTR_PERSISTENT => true));
	            if (!empty($this->_db)) $this->_db->exec("SET NAMES 'utf8';"); // must need to set names utf8, if not, Chinese will be wrong
                  }
                  catch (PDOException $e)
                  {
                      $this->_db = null;
                      die("error: " . $e->getMessage(). "<br/>");        
                  } 
              }
           }       
           

           function __destruct()
	   {
	       $this->_db = null;
	   }

	   public function queryDB()
	   {
               $sql = "show databases";
	       if (empty($this->_db)) return false;
	       $res = $this->_db->query($sql);
	       $rows = $res->fetchAll();

	       return $rows;
	   }

      }
