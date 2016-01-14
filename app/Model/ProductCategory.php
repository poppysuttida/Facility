<?php
class ProductCategory extends AppModel {
	public $name = 'ProductCategory';
    public $useTable = 'PRODUCTCATEGORY';
    public $primaryKey = 'product_category_id';
    public $belongsTo = array(
        
        'ProdCatalog' => array(
            'className' => 'ProdCatalog',
            'foreignKey' =>'product_catalog_id'
        ),
    );
 
    public $validate = array(
		'product_catalog_name'=>array(
			'Please enter your name.'=>array(
				'rule'=>'notEmpty',
				'message'=>'กรุณากรอกข้อมูล'
			)
		)
		
	);
}
?>