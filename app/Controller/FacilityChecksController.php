<?php
class FacilityChecksController extends AppController {
	public $uses = array('InventoryItem', 'Product','Uom');
	public $name = 'FacilityChecks';
	public $components = array('Paginator');
	public function view() {
		//$this->set('products', $this->Product->find('all'));
		$conditions = array();
        // find all facility
        $list_item = $this->InventoryItem->find('all', array(
            'fields' => array('InventoryItem.inventory_item_id',
             'Product.product_name', 
             'InventoryItem.product_price', 
             'Uom.uom_id',
             'InventoryItem.quantity_total',
             'InventoryItem.quantity_account'),
            'recursive' => 0
        ));
        if (!isset($list_item)) {
            exit;
        }

        $this->Paginator->settings = array(
            'InventoryItem' => array(
                'limit' => 20,
                'order' => array('DESC'),
                'recursive' => 0
            )
        );

        $result = $this->Paginator->paginate('InventoryItem');
        $this->set(compact('result', 'list_item'));
	}
	}	
?>
