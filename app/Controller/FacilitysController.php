<?php
class FacilitysController extends AppController {

	public $name = 'Facilitys';
	public $uses = array('Facility');
	public $components = array('Paginator');
	public function view() {
		//to retrieve all users, need just one line
		$this->set('facilitys', $this->Facility->find('all'));

		$conditions = array();

        if (!empty($this->params->query)) {
            // ==== Filter condition section ====
            $allow = array('facility_name');
            foreach ($this->params->query as $field => $keyword) {
                if (empty($keyword)) {
                    continue;
                }
                if (in_array($field, $allow)) {
                    $conditions['AND'][$field . ' LIKE'] = '%' . $keyword . '%';
                }
            }

            // ==== Search condition section ====
            if (!empty($this->params->query['the_keyword'])) {
                $is_keyword = $this->params->query['the_keyword'];
                $keyword_field = array('facility_name');
                foreach ($keyword_field AS $value) {
                    $conditions['OR'][$value . ' LIKE'] = '%' . $is_keyword . '%';
                }
            }
        }

        $this->Paginator->settings = array(
            'Facility' => array(
                'limit' => 20,
                'order' => array('FACILITY_NAME' => 'DESC'),
                'recursive' => 0
                )
        );

        $result = $this->Paginator->paginate('Facility', $conditions);
        $this->set(compact('result'));
	}
	
	public function add(){
	
		//check if it is a post request
		//this way, we won't have to do if(!empty($this->request->data))
		if ($this->request->is('post')){
			//save new user
			if ($this->Facility->save($this->request->data)){
			
				//set flash to user screen
				$this->Session->setFlash('Facility was added.');
				//redirect to user list
				$this->redirect(array('action' => 'view'));
				
			}else{
				//if save failed
				$this->Session->setFlash('Unable to add user. Please, try again.');
				
			}
		}
	}

	public function edit() {
		//get the id of the user to be edited
		$id = $this->request->params['pass'][0];
		
		//set the user id
		$this->Facility->id = $id;
		
		//check if a user with this id really exists
		if( $this->Facility->exists() ){
		
			if( $this->request->is( 'post' ) || $this->request->is( 'put' ) ){
				//save user
				if( $this->Facility->save( $this->request->data ) ){
				
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
				$this->request->data = $this->Facility->read();
			}
			
		}else{
			//if not found, we will tell the user that user does not exist
			$this->Session->setFlash('รายการนี้ไม่สามารถแก้ไขข้อมูลได้');
			$this->redirect(array('action' => 'view'));
				
			//or, since it we are using php5, we can throw an exception
			//it looks like this
			//throw new NotFoundException('The user you are trying to edit does not exist.');
		}
		

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
				if( $this->Facility->delete( $id ) ){
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
