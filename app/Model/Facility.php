<?php
class Facility extends AppModel {
	public $name = 'Facility';
    public $useTable = 'FACILITY';
    public $primaryKey = 'facility_id';
    public $displayField = 'name';
	

	public $validate = array(
		'facility_name'=>array(
			'Please enter your name.'=>array(
				'rule'=>'notEmpty',
				'message'=>'กรุณากรอกข้อมูลให้ครบ'
			)
		)
		
	);

}
?>