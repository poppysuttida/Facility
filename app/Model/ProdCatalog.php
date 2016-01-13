<?php
class ProdCatalog extends AppModel {
	public $name = 'ProdCatalog';
    public $useTable = 'PRODCATALOG';
    public $primaryKey = 'product_catalog_id';
    public $displayField = 'name';
	

	public $validate = array(
		'product_catalog_name'=>array(
			'Please enter your name.'=>array(
				'rule'=>'notEmpty',
				'message'=>'กรุณากรอกข้อมูลให้ครบ'
			)
		)
		
	);

}
?>