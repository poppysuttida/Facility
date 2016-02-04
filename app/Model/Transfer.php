<?php
class Transfer extends AppModel {
	public $name = 'Transfer';
    public $useTable = 'TRANSFER';
    public $primaryKey = 'transfer_id';
    public $belongsTo = array(
       
        'User' => array(
           'className' => 'User',
            'foreignKey' => 'user_id'
       ),
        'InventoryItem' => array(
            'className' => 'InventoryItem',
            'foreignKey' =>'inventory_item_id'
        )
    );
 
    public $validate = array(		
	);
}
?>