<?php
	class UsersController extends AppController {
		public $helpers = array('Html', 'Form');
		
		public function index() {
			session_start();
			if(!isset($_SESSION['user_id'])){
				session_destroy();
				$this->redirect('../login');
			}
			
	    	$this->layout= '';
	        $this->set('user', $this->User->find('all'));
    	}
		public function checkemail($email = null){
			$this->layout= '';
	        $this->render(false);
			$email = $this->User->findByEmail($email);
			print_r(json_encode($email)); 
	        return true;
		}

		public function add(){
			$this->layout= '';
	        $this->render(false);
	        $this->request->data;
	        $this->request->data['password'] = md5($this->request->data['password']);
			$this->request->data['created_ip'] = $this->get_client_ip();
			$this->request->data['modified_ip'] = $this->get_client_ip();
	        if ($this->request->is('post')) {
	            $this->User->create();
	            if ($this->User->save($this->request->data)) {	               
	            	print_r(json_encode(['user_id' => $this->User->getInsertID()])); 	            	
	            }
	            $this->Flash->error(__('Unable to add your post.'));
	        }
	        return true;
		}


		public function get_client_ip() {
		    $ipaddress = '';
		    if (isset($_SERVER['HTTP_CLIENT_IP']))
		        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
		    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
		        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
		    else if(isset($_SERVER['HTTP_X_FORWARDED']))
		        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
		    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
		        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
		    else if(isset($_SERVER['HTTP_FORWARDED']))
		        $ipaddress = $_SERVER['HTTP_FORWARDED'];
		    else if(isset($_SERVER['REMOTE_ADDR']))
		        $ipaddress = $_SERVER['REMOTE_ADDR'];
		    else
		        $ipaddress = 'UNKNOWN';
		    return $ipaddress;
		}


		public function profile($id = null){
			session_start();
			if(!isset($_SESSION['user_id'])){
				session_destroy();
				$this->redirect('../login');
			}

			$this->layout= '';
	        $user = $this->User->findById($_SESSION['user_id']);	       
			if(!empty($user)){
				$user = $user['User'];
				$bday = new DateTime($user['birthdate']);
				$today = new Datetime(date('m.d.y'));
				$diff = $today->diff($bday);
				$user['age'] = $diff->y;
				$user['Labelgender'] = ($user['gender'] == '') ? 'Not specified' : (($user['gender'] == 1) ? 'Male': 'Female');
				$user['lastLoginIn'] = date('F d, Y  h a', strtotime($user['last_login_time']));;
				$user['ConBirthDate'] = date('F d, Y', strtotime($user['birthdate']));;
				$user['dateJoined'] = date('F d, Y  h a', strtotime($user['created']));
 			}else{
				array();
			}
	        $this->set('user', $user);
		}

		public function edit($id = null){
			session_start();
			if(!isset($_SESSION['user_id'])){
				session_destroy();
				$this->redirect('../login');
			}

			$this->layout= '';
	        $user = $this->User->findById($_SESSION['user_id']);	       
			if(!empty($user)){
				$user = $user['User'];
				$bday = new DateTime($user['birthdate']);
				$today = new Datetime(date('m.d.y'));
				$diff = $today->diff($bday);
				$user['age'] = $diff->y;
				$user['Labelgender'] = ($user['gender'] == '') ? 'Not specified' : (($user['gender'] == 1) ? 'Male': 'Female');
				$user['lastLoginIn'] = date('F d, Y  h a', strtotime($user['last_login_time']));;
				$user['ConBirthDate'] = date('F d, Y', strtotime($user['birthdate']));;
				$user['dateJoined'] = date('F d, Y  h a', strtotime($user['created']));
 			}else{
				array();
			}
	        $this->set('user', $user);
		}


		public function update_account($id = null){
			session_start();
			if(!isset($_SESSION['user_id'])){
				session_destroy();
				$this->redirect('../login');
			}

			if ($this->request->is('post')){

				$this->User->create();
				$this->layout= '';
				$this->render(false);
				$this->request->data;

				# validate -------------
				if(strlen($this->request->data['name']) < 5 || strlen($this->request->data['name']) > 20){
					$this->redirect('../users/edit/' . $_SESSION['user_id'] .'?error_update=name');

				}elseif(str_replace(' ', '', $this->request->data['hubby']) == ''){
					$this->redirect('../users/edit/' . $_SESSION['user_id'] .'?error_update=hubby');

				}else{	
					$user = $this->User->findById($_SESSION['user_id']);
					$this->User->id = $user['User']['id'];
					$this->User->saveField('name', $this->request->data['name']);
					$this->User->saveField('gender', $this->request->data['gender']);
					$this->User->saveField('birthdate', date('Y-m-d', strtotime($this->request->data['birthdate'])));
					$this->User->saveField('hubby', $this->request->data['hubby']);
					
					if($_FILES['image']['size'] > 0){
						$target_path = WWW_ROOT . 'img/userphoto/';
						$file_name = $_FILES['image']['name'];
						$to_path = $target_path . $file_name;
						$this->User->saveField('image', 'userphoto/' . $file_name);
						move_uploaded_file($_FILES['image']['tmp_name'], $to_path);
					}
					$this->redirect('../users/profile/' . $this->User->id);
				}	
				return true;
			}
		}


		public function logout(){
			session_start();
			session_destroy();
			$this->redirect('../login');
		}

	}
?>