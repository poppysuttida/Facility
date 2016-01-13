<?php
class InventoryItem extends AppModel {
	public $name = 'InventoryItem';
    public $useTable = 'INVENTORYITEM';
    public $primaryKey = 'inventory_item_id';
    public $belongsTo = array( 
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