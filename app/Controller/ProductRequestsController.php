<?php
class ProductRequestsController extends AppController {
	public $uses = array('Uom', 'Product','InventoryItem','Transfer','User');
	public $name = 'ProductRequests';
	public $components = array('Paginator');
	public function view() {
		//$this->set('products', $this->Product->find('all'));
		$conditions = array();
        // find all facility
        $list_product = $this->Transfer->find('all', array(
            'fields' => array(
            	'Transfer.transfer_id',
            	'User.user_id', 
            	'Product.product_id', 
            	'Product.product_name', 
            	'Product.uom_id',
            	'Uom.uom_name'
            ),
            'orders' => array('Product.product_id' => 'DESC'),
            'recursive' => 0
        ));
      	//echo '1<pre>';print_r($list_product);echo '</pre><hr/>';
        //exit;
        if (!isset($list_product)) {
            exit;
        }

        /*$ps = $this->Paginator->settings = array(
            'Product' => array(
            	'fields' => array(
            	'Product.product_id', 
            	'Product.product_name', 
            	'Product.uom_id', 
            	'Product.product_category_id',
            	'Product.product_type_id',
            	'Product.facility_id',
            	'ProductCategory.product_category_id',
            	'ProductCategory.category_name'
            	),
                'limit' => 20,
                'order' => array('Product.product_id' => 'DESC'),
                'recursive' => 0
            )
        );

        $result = $this->Paginator->paginate('Product', $ps);
        echo '2<pre>'; print_r('$result');echo '</pre><hr/>';*/
        $this->set(compact('list_product'));
	}

	
	public function add(){
		if($this->request->is('post')){
			// echo '<pre>';
			// //print_r($this->request->data);
			 print_r($this->Session->Read('Productprice'));
			// echo '</pre>';
			// die();	
			foreach ($this->Session->Read('Productprice') as $key => $value) {		
			$data_save['user_id'] = 1 ;	
			$data_save['inventory_item_id'] = $value['productId'] ;
			$data_save['transfer_account'] = $value['quantity'] ;	
				if($this->Transfer->save($data_save)){
					
					// $data_update = $value[''];
					// if($this->Transfer->updateAll($data_update)){

					// }else{

					// }
					echo 'b';
				}else{
					echo 'a';
				}


			}
		}		
		
	/*
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
	}*/
	}

	public function tmpProductpriceAdd() {
        $this->autoRender = false;

        if (isset($this->request->data['adtval_list_tmp'])) {
            $arrTmp = array();
            foreach ($this->request->data['adtval_list_tmp'] as $key => $value) :
                $arrTmp[$key] = array(
                    'productId' => $value[1],
                    'uomId' => $value[2],
                    'quantity' => $value[4]
                );


                $this->Session->write('Productprice', $arrTmp);

            endforeach;
        }
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
        $type_list = $this->ProductType->find('list', array(
            'fields' => array('ProductType.product_type_id', 'ProductType.product_type_name'),
            'recursive' => -1
        ));
        $category_list = $this->ProductCategory->find('list', array(
            'fields' => array('ProductCategory.product_category_id', 'ProductCategory.category_name'),
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
		$this->set(compact('facility_list','uom_list','type_list','category_list'));
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
