<?php
class Uom extends AppModel {
	public $name = 'Uom';
    public $useTable = 'UOM';
    public $primaryKey = 'uom_id';
	

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