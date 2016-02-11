<?php
class ProductRequestsController extends AppController {
	public $uses = array('Uom', 'Product','InventoryItem','Transfer','User');
	public $name = 'ProductRequests';
	public $components = array('Paginator');
	public function view() {
		//$this->set('products', $this->Product->find('all'));
		$conditions = array();
        // find all Tranfer
        /*
        $product_list = $this->InventoryItem->find('list', array(
            'fields' => array('Product.product_id', 'Product.product_name'),
            'recursive' => -1
        ));
        $uom_list = $this->InventoryItem->find('list', array(
            'fields' => array('InventoryItem.uom_id', 'Uom.uom_name'),
            'recursive' => -1
        ));*/

        $list_item = $this->Transfer->find('all', array(
            'recursive' => 1
        ));
        if (!isset($list_item)) {
            exit;
        }

        $this->Paginator->settings = array(
            'Transfer' => array(
                'limit' => 20,
                'order' => array('DESC'),
                'recursive' => 2
            )
        );

        $result = $this->Paginator->paginate('Transfer');
        $this->set(compact('result', 'list_item','product_list','uom_list'));
	}


	public function add(){
		 $product_list = $this->InventoryItem->find('list', array(
            'fields' => array('InventoryItem.inventory_item_id', 'Product.product_name'),
            'recursive' => 2
        ));

		 $uom_list = $this->Uom->find('list', array(
            'fields' => array('Uom.uom_id', 'Uom.uom_name'),
            'recursive' => -1
        ));

		if($this->request->is('post')){
			// echo '<pre>';
			// //print_r($this->request->data);
			// print_r($this->Session->Read('user_login.user_id'));
			// echo '</pre>';
			// die();
			foreach ($this->Session->Read('Productprice') as $key => $value) {
			$data_save['user_id'] = $this->Session->Read('user_login.user_id') ;
			$data_save['inventory_item_id'] = $value['productId'] ;
			$data_save['transfer_account'] = $value['quantity'] ;
				if($this->Transfer->save($data_save)){
					$product_list = $this->InventoryItem->find('all', array(
							'conditions' => array('InventoryItem.inventory_item_id'=>$value['productId']),
							'recursive' => 0,
							'limit'=>1
					));
					$data_update['inventory_item_id'] = $value['productId'];
					$data_update['quantity_total'] = $product_list['0']['InventoryItem']['quantity_total'] - $value['quantity'];
					if($this->InventoryItem->save($data_update)){
						//echo 'บันทึกข้อมูลสำเร็จ';
					}else {
						$this->Session->setFlash('ไม่สาเบิกพัสดุได้');
						//redirect to user list
						$this->redirect(array('action' => 'view'));
					}
					//echo 'บันทึกข้อมูลสำเร็จ';
				}else{
					//set flash to user screen
					$this->Session->setFlash('ไม่สาเบิกพัสดุได้');
					//redirect to user list
					$this->redirect(array('action' => 'view'));
				}


			}
			$this->Session->setFlash('เบิกพัสดุสำเร็จ');
			//redirect to user list
			$this->redirect(array('action' => 'view'));

		}
		$this->set(compact('product_list','uom_list'));
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
                    //'uomId' => $value[2],
                    'quantity' => $value[2]
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
