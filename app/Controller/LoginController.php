<?php
	class LoginController extends AppController {
		public $helpers = array('Html', 'Form');
		public function index() {
	    	$this->layout= '';
	        $this->set('user', $this->Login->find('all'));
    	}

    	public function userlogin(){
    		$this->layout= '';
	        $this->render(false);
	        
	        $userEmail = $this->request->data['email'];
	        $userPassword = $this->request->data['password'];
	        $user = $this->Login->find('all', array(
		        'conditions' => array('email =' => $userEmail, 'password =' => md5($userPassword))
		    ));
		    if(!empty($user)){
		    	$this->Login->id = $user[0]['Login']['id'];
				$this->Login->saveField('last_login_time', date('Y-m-d H:i:s'));

				session_start();
				$_SESSION['user_id'] = $this->Login->id;
				$this->redirect('/users/profile/' . $this->Login->id);
		    }else{
				$this->redirect('/login?error_login=undefined user');
		    }
	        return true;
    	}
	}

?>