<?php
class Message extends AppModel {
	public $useTable = 'messages';
	public $hasOne = array(
        'FromUser' => array(
            'className' => 'User',
            'foreignKey' => false,
            'conditions' => array('FromUser.id = Message.from_id')
        ),
        'ToUser' => array(
            'className' => 'User',
            'foreignKey' => false,
            'conditions' => array('ToUser.id = Message.to_id')
        )
    );	
}
?>