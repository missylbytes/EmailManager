<?php
class Application_Form_Sentemails extends Zend_Form
{
    public function init()
    { 
        // Set the method for the display form to POST
        $this->setMethod('post');
		
		//Phone Never got around to implementing this
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
  
        //Name
		$this->addElement('text', 'name', array(
		    'label'      =>'Your name:',
			'required'   => true
		));
  
        // Add the content element 
        $this->addElement('textarea', 'content', array(
            'label'      => 'Please enter content of email:',
            'required'   => true,
        ));
  
        // Add the submit button
        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Send Email',
        ));

    }
}

