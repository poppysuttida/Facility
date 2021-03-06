<?php
class ProductsController extends AppController {
	public $uses = array('Uom', 'Product', 'Facility','ProductType','ProductCategory');
	public $name = 'Products';
	public $components = array('Paginator');
	public function view() {
		//$this->set('products', $this->Product->find('all'));
		$conditions = array();
        // find all facility
        $list_product = $this->Product->find('all', array(
            'fields' => array(
            	'Product.product_id', 
            	'Product.product_name', 
            	'Product.uom_id', 
            	'Product.product_category_id',
            	'Product.product_type_id',
            	'Product.facility_id',
            	'Uom.uom_name',
            	'ProductType.product_type_name',
            	'ProductCategory.category_name',
            	'Facility.facility_name'
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
		$this->set(compact('facility_list','uom_list','type_list','category_list'));
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
