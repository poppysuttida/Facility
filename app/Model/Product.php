<?php
class Product extends AppModel {
	public $name = 'Product';
    public $useTable = 'PRODUCT';
    public $primaryKey = 'product_id';
    public $belongsTo = array(
        'Facility' => array(
            'className' => 'Facility',
            'foreignKey' =>'facility_facility_id'
        ),
        'Uom' => array(
            'className' => 'Uom',
            'foreignKey' => 'uom_uom_id'
        )
    );
 
    public $validate = array(
		'product_name'=>array(
			'Please enter your name.'=>array(
				'rule'=>'notEmpty',
				'message'=>'กรุณากรอกข้อมูล'
			)
		)
		
	);
}
?>