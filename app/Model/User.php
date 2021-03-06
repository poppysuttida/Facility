<?php
class User extends AppModel {
	public $name = 'User';
	public $useTable = 'USER';
    public $primaryKey = 'user_id';
	public $displayField = 'name';
	
	public $validate = array(
		'U_name'=>array(
			'Please enter your name.'=>array(
				'rule'=>'notEmpty',
				'message'=>'Please enter your name.'
			)
		),
		'username'=>array(
			'The username must be between 5 and 15 characters.'=>array(
				'rule'=>array('between', 5, 15),
				'message'=>'The username must be between 5 and 15 characters.'
			),
			'That username has already been taken'=>array(
				'rule'=>'isUnique',
				'message'=>'That username has already been taken.'
			)
		)
	);
	
}
?>