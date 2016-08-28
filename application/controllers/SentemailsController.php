<?php

class SentemailsController extends Zend_Controller_Action
{

    public function indexAction()
    { 
        $sentemails = new Application_Model_SentemailsMapper();
        $this->view->entries = $sentemails->getAll();
    }

	public function sendAction()
    {
        $request = $this->getRequest();
        $form    = new Application_Form_Sentemails();
  
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($request->getPost())) {
                $comment = new Application_Model_Sentemails($form->getValues());
                $mapper  = new Application_Model_SentemailsMapper();
                $mapper->save($comment);
                return $this->_helper->redirector('index');
  
            }
  
        }
        $this->view->form = $form;
    }
}

