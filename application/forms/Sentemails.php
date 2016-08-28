<?php
class Application_Form_Sentemails extends Zend_Form
{
    public function init()
    { 
        // Set the method for the display form to POST
        $this->setMethod('post');
  
        //Name
		$this->addElement('text', 'name', array(
		    'label'      =>'Your name:',
			'required'   => true
		));
		
		//Phone
		//$this->addElement('text', 'phone', array(
		//    'label'      =>'Your phone number:',
		//	'required'   => true
		//));
  
        // Email Address
        $this->addElement('text', 'email', array(  
            'label'      => 'Your email address:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array( 
                'EmailAddress',
            )
        ));
  
        // Add the comment element 
        $this->addElement('textarea', 'comment', array(
            'label'      => 'Please enter content of email:',
            'required'   => true,
            'validators' => array(
                array('validator' => 'StringLength', 'options' => array(0, 20))
                )
        ));
  
        // Add the submit button
        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Send Email',
        ));

    }
}

