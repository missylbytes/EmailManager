<?php

class Application_Model_Sentemails
{
    protected $_num;
	protected $_email;
	protected $_content;
	protected $_datetime;
	protected $_name;
	
	public function __construct(array $options = null)
	{
		if (is_array($options)) {
            $this->setOptions($options);
        }	
	}
	
	public function __set($name, $value)
    {
        $method = 'set' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid sent emails property');
        }
        $this->$method($value);
    }

	public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid sent emails property');
        }
        return $this->$method();
    }
 
    public function setOptions(array $options)
    {
        $methods = get_class_methods($this);
        foreach ($options as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (in_array($method, $methods)) {
                $this->$method($value);
            }
        }
        return $this;
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
		$this->_datetime = $ts;
		return $this;
	}
	
	public function getDateTime()
	{
		return $this->_datetime;
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

