<?php

class Application_Model_SentemailsMapper
{
    protected $_dbTable;
	
	//Set table function
	public function setDbTable($dbTable)
	{
	    if(is_string($dbTable)){
		    $dbTable = new $dbTable();
		}
		if(!$dbTable instanceof Zend_Db_Table_Abstract){
			throw new Exception('Invalid tabel data gateway provided');
		}
		$this->_dbTable = $dbTable;
		return $this;
		
	}
	
	//Get table function
	public function getDbTable()
	{
		if(null === $this->_dbTable){
			$this->SetDbTable('Application_Model_DbTable_Sentemails');
		}
		return $this->_dbTable;
	}
	
	//Save the information to the table
	public function save(Application_Model_Sentemails $sentemails)
	{
		//set the data to what is sent in
		$data = array( 
			'email'=> $sentemails->getEmail(),
			'name' => $sentemails->getName(),
			'content'=> $sentemails->getContent(),
			'datetime'=> $sentemails->getdateTime('Y-m-d H:i:s'),
			'num' => $sentemails->getNum(),
		);
		
		//put the data into the table
		$this->getDbTable()->insert($data);
	}

	public function getAll()
	{
		$resultSet = $this->getDbTable()->fetchAll();
		$entries = array();
		foreach ($resultSet as $row){
			$entry = new Application_Model_Sentemails();
			$entry->setEmail($row->email)
				  ->setName($row->name)
				  ->setContent($row->content)
				  ->setDateTime($row->datetime)
				  ->setNum($row->num);
		    $entries[]=$entry;
		}
		return $entries;
	}


}


