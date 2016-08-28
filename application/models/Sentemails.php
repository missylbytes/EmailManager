<?php

class Application_Model_Sentemails
{
    protected $_num;
	protected $_email;
	protected $_content;
	protected $_datetime;
	protected $_name;
	
	public function __construct($user_row = null)
	{
		if( !is_null($user_row) && $user_row instanceof Zend_Db_Table_Row ) {
            $this->num = $user_row->num;
            $this->addr = $user_row->email;
            $this->content= $user_row->content;
			$this->datetime= $user_row->datetime;
			$this->name=$user_row->name;
        }
	}
	
	public function setNum($num)
	{
		$this->_num = $num;
		return $this;
	}
	
	public function getNum()
	{
		return $this->_num;
	}
	
	public function setEmail($email)
	{
		$this->_email = $email;
		return $this;
	}
	
	public function getEmail()
	{
		return $this->_email;
	}
	
	public function setContent($content)
	{
		$this->_content = $content;
		return $this;
	}
	
	public function getContent()
	{
		return $this->_content;
	}
	
	public function setDateTime($ts)
	{
		$this->_date_time = $ts;
		return $this;
	}
	
	public function getDateTime()
	{
		return $this->_date_time;
	}
	
	public function setName($name)
	{
		$this->_name = $name;
		return $this;
	}
	
	public function getName()
	{
		return $this->_name;
	}

}

