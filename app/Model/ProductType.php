<?php
class ProductType extends AppModel {
	public $name = 'ProductType';
    public $useTable = 'PRODUCTTYPE';
    public $primaryKey = 'product_type_id';
    public $displayField = 'name';
	

	public $validate = array(
		'product_type_name'=>array(
			'Please enter your name.'=>array(
				'rule'=>'notEmpty',
				'message'=>'กรุณากรอกข้อมูลให้ครบ'
			)
		)
		
	);

}
?>