<?php
class Facilitylocation extends AppModel {
	public $name = 'Facilitylocation';
    public $useTable = 'FACILITYLOCATION';
    public $primaryKey = 'location_id';
	

	public $validate = array(
		'location_name'=>array(
			'Please enter your name.'=>array(
				'rule'=>'notEmpty',
				'message'=>'กรุณากรอกข้อมูลให้ครบ'
			)
		)
		
	);

}
?>