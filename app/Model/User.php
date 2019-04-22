<?php
class User extends AppModel {
	public $useTable = 'users';
	public $validate = array(
		'name' => array(
	        'name-1' => array(
	           	'rule' => array('minLength', 5),
	           	'message' => 'Minimum length of 5 characters'
	         ),
	        'name-2' => array(
	            'rule' => array('maxLength', 20),
	            'message' => 'Maximum length of 20 characters'
	        )
	    ),
		'email' => 'email',
	    'password' => array(
	        'rule' => array('minLength', 8),
	        'message' => 'Password must be at least 8 characters long'
	    ),
	);
}
?>