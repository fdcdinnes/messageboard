<?php

	class MessagesController extends AppController {
		public $helpers = array('Html', 'Form');

		public function index() {
			session_start();
			if(!isset($_SESSION['user_id'])){
				session_destroy();
				$this->redirect('../login');
			}
			$initialRow = 10;
			$limitRow = $initialRow;
			if ($this->request->is('post')) {
	    		$limitRow = (int) $this->request->data['submit'] + 10;
	    	}

			$messageCount = $this->Message->find('count', array(
		        'conditions' => array('OR' => array('to_id' => $_SESSION['user_id'], 'from_id' => $_SESSION['user_id'])),
		        'group' => 'LEAST(Message.to_id, Message.from_id), GREATEST(Message.to_id, Message.from_id)',
		    ));

        	$message = $this->Message->query("SELECT 
        					(SELECT CONCAT_WS('<|>',
        						COALESCE(msgs.id, 0),
        						COALESCE(msgs.to_id, 0),
        						COALESCE(msgs.from_id, 0),
        						COALESCE(msgs.content, ''),
        						COALESCE(msgs.created, ''),
        						COALESCE(msgs.modified, ''),
        						(". $this->userSubQuery('msgs.to_id')."),
        						(". $this->userSubQuery('msgs.from_id').")
        						)  
		                	FROM messages aS msgs
		                	WHERE (msgs.to_id =  msgp.to_id  AND msgs.from_id = msgp.from_id) OR (msgs.to_id = msgp.from_id AND msgs.from_id = msgp.to_id)
		                	ORDER BY msgs.modified DESC
		                	LIMIT 0, 1) messages
		                	FROM messages as msgp
		                	WHERE msgp.to_id = ". $_SESSION['user_id'] ." OR msgp.from_id = ". $_SESSION['user_id'] ."
		                	GROUP BY LEAST(msgp.to_id, msgp.from_id), GREATEST(msgp.to_id, msgp.from_id)
		                	ORDER BY msgp.id DESC
		                	LIMIT 0, $limitRow ");

        	$newMessage = array();        	
			foreach($message as $msgky => $mymessages){
				$messageExtract = explode('<|>', $mymessages[0]['messages']);
				$perMessage = array();
				$perMessage['id'] = $messageExtract[0];
				$perMessage['to_id'] = $messageExtract[1];
				$perMessage['from_id'] = $messageExtract[2];
				$perMessage['content'] = $messageExtract[3];
				$perMessage['created'] = $messageExtract[4];
				$perMessage['modified'] = $messageExtract[5];

				$newMessage[$msgky]['Message'] = $perMessage;				
				$newMessage[$msgky]['ToUser'] = $this->allocateUserdetail($messageExtract[6]);
				$newMessage[$msgky]['FromUser'] = $this->allocateUserdetail($messageExtract[7]);	
				$newMessage[$msgky]['userReflect'] = ($messageExtract[2] == $_SESSION['user_id']) ? 'ToUser' : 'FromUser';
			}
	    	// $message = $this->Message->find('all', array(
		    //     'conditions' => array('OR' => array('to_id' => $_SESSION['user_id'], 'from_id' => $_SESSION['user_id'])),
		    //     'group' => 'LEAST(Message.to_id, Message.from_id), GREATEST(Message.to_id, Message.from_id)',
		    //     'order' => 'Message.id DESC',
		    //     'limit'=>$limitRow,
		    // ));
		    // foreach($message as $msgky => $mymessages){
		    // 	$message[$msgky]['userReflect'] = ($message[$msgky]['Message']['from_id'] == $_SESSION['user_id']) ? 'ToUser' : 'FromUser';
		    // }	
		    $message = $newMessage;
		    $listCount = count($message);
	    	$this->layout= 'messageboard';
	    	$this->set(compact('message', 'messageCount', 'listCount'));
    	}

    	private function allocateUserdetail($userInfo = null){
    		$ToUser = explode('<:>', $userInfo);
    		$userInfoAllocate = [];
			$userInfoAllocate['id'] = $ToUser[0];
			$userInfoAllocate['name'] = $ToUser[1];
			$userInfoAllocate['email'] = $ToUser[2];
			$userInfoAllocate['password'] = $ToUser[3];
			$userInfoAllocate['image'] = $ToUser[4];
			$userInfoAllocate['gender'] = $ToUser[5];
			$userInfoAllocate['birthdate'] = $ToUser[6];
			$userInfoAllocate['hubby'] = $ToUser[7];
			$userInfoAllocate['last_login_time'] = $ToUser[8];
			$userInfoAllocate['created'] = $ToUser[9];
			$userInfoAllocate['modified'] = $ToUser[10];
			$userInfoAllocate['created_ip'] = $ToUser[11];
			$userInfoAllocate['modified_ip'] = $ToUser[12];
			return $userInfoAllocate;
    	}

    	private function userSubQuery($user_id = null){
    		$subquery = "SELECT CONCAT_WS('<:>',
			    		COALESCE(t.id, 0),
			    		COALESCE(t.name, ''),
			    		COALESCE(t.email, ''),
			    		COALESCE(t.password, ''),
						COALESCE(t.image, ''),
						COALESCE(t.gender, 0),
						COALESCE(t.birthdate, ''),
						COALESCE(t.hubby, ''),
						COALESCE(t.last_login_time, ''),
						COALESCE(t.created, ''),
						COALESCE(t.modified, ''),
						COALESCE(t.created_ip, ''),
						COALESCE(t.modified_ip, ''))
						FROM users t WHERE t.id = $user_id LIMIT 0, 1";
			return $subquery;
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
    	}

    	public function send(){
    		session_start();
			if(!isset($_SESSION['user_id'])){
				session_destroy();
				$this->redirect('../login');
			}
			if ($this->request->is('post')) { 
				$this->Flash->messageboardflash('Your message was already sent', array(
				    'key' => 'messagesent',
				    'params' => array(
				        'alert' => 'info',
				        'display' => 'alerttemp'
				    )
				));	
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
		    $sessionUserId = $_SESSION['user_id'];

			$initialRow = 10;
			$limitRow = $initialRow;
			if ($this->request->is('post')) {
	    		$limitRow = (int) $this->request->data['submit'] + 10;
	    	}

			$messageCount = $this->Message->find('count', array(
		       'conditions' => array('OR' => array(
		        	array('to_id' => $Users['User']['id'], 'from_id' => $_SESSION['user_id']),
		        	array('to_id' => $_SESSION['user_id'], 'from_id' => $Users['User']['id']),
		        )),
		    ));

			$messages = $this->Message->find('all', array(
		        'conditions' => array('OR' => array(
		        	array('to_id' => $Users['User']['id'], 'from_id' => $_SESSION['user_id']),
		        	array('to_id' => $_SESSION['user_id'], 'from_id' => $Users['User']['id']),
		        )),
		        'order' => 'Message.id ASC',
		        'limit' => $limitRow,
		    ));
			$listCount = count($messages);
	       	$this->layout= 'messageboard';
	    	$this->set(compact('Users', 'messages', 'sessionUserId', 'listCount', 'messageCount'));
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


    	public function permessagedelete($msg_id = null){
    		if ($this->request->is('get')) {
    			$messageId = hex2bin($msg_id);
    			$this->Message->deleteAll([
    				array('Message.id' => $messageId)
    			], false);
	    		$this->layout= '';
		    	$this->render(false);
	    	}
    	}

	}

?>