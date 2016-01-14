<?php
class Product extends AppModel {
	public $name = 'Product';
    public $useTable = 'PRODUCT';
    public $primaryKey = 'product_id';
    public $belongsTo = array(
       
        'Uom' => array(
           'className' => 'Uom',
            'foreignKey' => 'uom_id'
       ),
        'ProductType' => array(
            'className' => 'ProductType',
            'foreignKey' =>'product_type_id'
        ),
        'ProductCategory' => array(
           'className' => 'ProductCategory',
            'foreignKey' => 'product_category_id'
       ),
        'Facility' => array(
           'className' => 'Facility',
            'foreignKey' => 'facility_id'
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