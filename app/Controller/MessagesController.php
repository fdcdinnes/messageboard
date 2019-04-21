<?php

	class MessagesController extends AppController {
		public $helpers = array('Html', 'Form');

		public function index() {
			session_start();
			if(!isset($_SESSION['user_id'])){
				session_destroy();
				$this->redirect('../login');
			}
			$initialRow = 1;
			$limitRow = $initialRow;
			if ($this->request->is('post')) {
	    		$limitRow = (int) $this->request->data['submit'] + 1;
	    	}

			$messageCount = $this->Message->find('count', array(
		        'conditions' => array('OR' => array('to_id' => $_SESSION['user_id'], 'from_id' => $_SESSION['user_id'])),
		        'group' => 'LEAST(Message.to_id, Message.from_id), GREATEST(Message.to_id, Message.from_id)',
		    ));

	    	$message = $this->Message->find('all', array(
		        'conditions' => array('OR' => array('to_id' => $_SESSION['user_id'], 'from_id' => $_SESSION['user_id'])),
		        'group' => 'LEAST(Message.to_id, Message.from_id), GREATEST(Message.to_id, Message.from_id)',
		        'order' => 'Message.created DESC',
		        'limit'=>$limitRow,
		    ));
		    foreach($message as $msgky => $mymessages){
		    	$message[$msgky]['userReflect'] = ($message[$msgky]['Message']['from_id'] == $_SESSION['user_id']) ? 'ToUser' : 'FromUser';
		    }	

		    $listCount = count($message);
	    	$this->layout= 'messageboard';
	    	$this->set(compact('message', 'messageCount', 'listCount'));
	    	// $this->render(false);
    	}

    	public function generaldelete($param = null){
    		if ($this->request->is('get')) {
    			$paramData = explode('|', hex2bin($param));
    			$this->Message->deleteAll([
    				'OR' => array(
    					array('Message.to_id' => (int) $paramData[1], 'Message.from_id' => (int) $paramData[2]), 
    					array('Message.to_id' => (int) $paramData[2], 'Message.from_id' => (int) $paramData[1])
				    )
    			], false);
	    		$this->layout= '';
		    	$this->render(false);
	    	}
    	}

    	public function new(){
    		session_start();
			if(!isset($_SESSION['user_id'])){
				session_destroy();
				$this->redirect('../login');
			}
			
    		$this->loadModel('User');
	        $Users = $this->User->find('all', array('fields'=>array('id','name', 'image'), 'conditions' => array('id !=' => $_SESSION['user_id'])));
	       	$this->layout= 'messageboard';
	    	$this->set(compact('Users'));
	        // print_r($Users);
		    // $this->render(false);
    	}

    	public function send(){
    		session_start();
			if(!isset($_SESSION['user_id'])){
				session_destroy();
				$this->redirect('../login');
			}
			if ($this->request->is('post')) { 
				// $this->Flash->set('This is a message');   
				$this->request->data['from_id'] = $_SESSION['user_id'];
				$this->request->data['created'] = date('Y-m-d H:i:s');
		  		$messageCount = $this->Message->save($this->request->data);
		    	$this->redirect('../messages');
	    	}else{
	    		$this->redirect('../messages/new');
	    	}
    	}

    	public function reply($to_id = null){
    		session_start();
			if(!isset($_SESSION['user_id'])){
				session_destroy();
				$this->redirect('../login');
			}
			$this->loadModel('User');
			$Users = $this->User->findById(hex2bin($to_id));
			$messages = $this->Message->find('all', array(
		        'conditions' => array('OR' => array(
		        	array('to_id' => $Users['User']['id'], 'from_id' => $_SESSION['user_id']),
		        	array('to_id' => $_SESSION['user_id'], 'from_id' => $Users['User']['id']),
		        )),
		        'order' => 'Message.created ASC',
		    ));

	       	$this->layout= 'messageboard';
	    	$this->set(compact('Users', 'messages', '_SESSION'));
	    	;

    	}


    	public function sendreply(){
    		session_start();
			if(!isset($_SESSION['user_id'])){
				session_destroy();
				$this->redirect('../login');
			}
			if ($this->request->is('post')) {
				$this->request->data['to_id'] = hex2bin($this->request->data['to_id']);
				$this->request->data['from_id'] = $_SESSION['user_id'];
				$this->request->data['created'] = date('Y-m-d H:i:s');
		  		$messageCount = $this->Message->save($this->request->data);
		    	$this->redirect('../messages/reply/' . bin2hex($this->request->data['to_id']));
	    	}else{
	    		$this->redirect('../messages/new');
	    	}
    	}



	}

?>