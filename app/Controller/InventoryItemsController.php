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
             'InventoryItem.product_price',
             'InventoryItem.quantity_account',
             'InventoryItem.quantity_total', 
             'Product.product_name', 
             'Uom.uom_id'),
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
	
		// find all facility type
        $facility_list = $this->Facility->find('list', array(
            'fields' => array('Facility.facility_id', 'Facility.Facility_name'),
            'recursive' => -1
        ));
        $uom_list = $this->Uom->find('list', array(
            'fields' => array('Uom.uom_id', 'Uom.uom_name'),
            'recursive' => -1
        ));
		//check if it is a post request
		//this way, we won't have to do if(!empty($this->request->data))
		if ($this->request->is('post')){
			//save new user
			//echo '<pre>'; print_r($this->request->data); exit;
			if ($this->Product->save($this->request->data)){
			
				//set flash to user screen
				$this->Session->setFlash('Product was added.');
				//redirect to user list
				$this->redirect(array('action' => 'view'));
				
			}else{
				//if save failed
				$this->Session->setFlash('Unable to add Product. Please, try again.');
				
			}
		}
		$this->set(compact('facility_list', 'uom_list'));
	}

	public function edit() {
		//get the id of the user to be edited
		$id = $this->request->params['pass'][0];
		
		//set the user id
		$this->Product->id = $id;

		// find all facility type
        $facility_list = $this->Facility->find('list', array(
            'fields' => array('Facility.facility_id', 'Facility.Facility_name'),
            'recursive' => -1
        ));
        $uom_list = $this->Uom->find('list', array(
            'fields' => array('Uom.uom_id', 'Uom.uom_name'),
            'recursive' => -1
        ));
		
		//check if a user with this id really exists
		if( $this->Product->exists() ){
		
			if( $this->request->is( 'post' ) || $this->request->is( 'put' ) ){
				//save user
				if( $this->Product->save( $this->request->data ) ){
				
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
				$this->request->data = $this->Product->read();
			}
			
		}else{
			//if not found, we will tell the user that user does not exist
			$this->Session->setFlash('รายการนี้ไม่สามารถแก้ไขข้อมูลได้');
			$this->redirect(array('action' => 'view'));
				
			//or, since it we are using php5, we can throw an exception
			//it looks like this
			//throw new NotFoundException('The user you are trying to edit does not exist.');
		}
		$this->set(compact('facility_list', 'uom_list'));
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
				if( $this->Product->delete( $id ) ){
					//set to screen
					$this->Session->setFlash('ลบข้อมูลเรียบร้อยแล้ว');
					//redirect to users's list
					$this->redirect(array('action'=>'view'));
					
				}else{	
					//if unable to delete
					$this->Session->setFlash('ไม่สามารถลบข้อมูลได้');
					$this->redirect(array('action' => 'index'));
				}
			}
		}
	}
	}	
?>
