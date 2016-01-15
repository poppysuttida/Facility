<?php
class InventoryItemsController extends AppController {
	public $uses = array('InventoryItem', 'Product','Uom');
	public $name = 'InventoryItems';
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

	
	public function add(){
	
		// find list product
        $product_list = $this->Product->find('list', array(
            'fields' => array('Product.product_id', 'Product.product_name'),
            'recursive' => -1
        ));
        $uom_list = $this->Uom->find('list', array(
            'fields' => array('Uom.uom_id', 'Uom.uom_name'),
            'recursive' => -1
        ));

		//check if it is a post request
		//this way, we won't have to do if(!empty($this->request->data))
			if ($this->request->is('post')){
			$this->request->data['InventoryItem']['quantity_account'] = $this->request->data['InventoryItem']['quantity_total'];

			//save new InventoryItem
			if ($this->InventoryItem->save($this->request->data)){
			
				//set flash to InventoryItem screen
				$this->Session->setFlash('InventoryItem was added.');
				//redirect to InventoryItem list
				$this->redirect(array('action' => 'view'));
				
			}else{
				//if save failed
				$this->Session->setFlash('Unable to add InventoryItem. Please, try again.');
				
			}
		}
		$this->set(compact('product_list', 'uom_list'));
	}

	public function edit() {
		// find list product
        $product_list = $this->Product->find('list', array(
            'fields' => array('Product.product_id', 'Product.product_name'),
            'recursive' => -1
        ));
        $uom_list = $this->Uom->find('list', array(
            'fields' => array('Uom.uom_id', 'Uom.uom_name'),
            'recursive' => -1
        ));

		//get the id of the user to be edited
		$id = $this->request->params['pass'][0];
		
		//set the user id
		$this->InventoryItem->id = $id;

		//check if a user with this id really exists
		if( $this->InventoryItem->exists() ){
		
			if( $this->request->is( 'post' ) || $this->request->is( 'put' ) ){
				//save user
				if( $this->InventoryItem->save( $this->request->data ) ){
				
					//set to user's screen
					$this->Session->setFlash('แก้ไขข้อมูลเรียบร้อยแล้ว');
					
					//redirect to user's list
					$this->redirect(array('action' => 'view'));
					
				}else{
					$this->Session->setFlash('ไม่สามารถแก้ไขข้อมูลได้ กรุณาลองอีกครั้ง');
				}
				
			}else{
			
				//we will read the user data
				//so it will fill up our html form automatically
				$this->request->data = $this->InventoryItem->read();
			}
			
		}else{
			//if not found, we will tell the user that user does not exist
			$this->Session->setFlash('รายการนี้ไม่สามารถแก้ไขข้อมูลได้');
			$this->redirect(array('action' => 'view'));
				
			//or, since it we are using php5, we can throw an exception
			//it looks like this
			//throw new NotFoundException('The user you are trying to edit does not exist.');
		}
		$this->set(compact('product_list', 'uom_list'));
	}

	public function delete() {
		$id = $this->request->params['pass'][0];
		
		//the request must be a post request 
		//that's why we use postLink method on our view for deleting user
		if( $this->request->is('get') ){
		
			$this->Session->setFlash('คุณต้องการจะลบรายการนี้หรือไม่?');
			$this->redirect(array('action' => 'view'));
			
			//since we are using php5, we can also throw an exception like:
			//throw new MethodNotAllowedException();
		}else{
		
			if( !$id ) {
				$this->Session->setFlash('รหัสรายการไม่ถูกต้อง');
				$this->redirect(array('action'=>'view'));
				
			}else{
				//delete user
				if( $this->InventoryItem->delete( $id ) ){
					//set to screen
					$this->Session->setFlash('ลบข้อมูลเรียบร้อยแล้ว');
					//redirect to users's list
					$this->redirect(array('action'=>'view'));
					
				}else{	
					//if unable to delete
					$this->Session->setFlash('ไม่สามารถลบข้อมูลได้');
					$this->redirect(array('action' => 'view'));
				}
			}
		}
	}
	}	
?>
