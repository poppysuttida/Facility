<?php
class FacilitysController extends AppController {

	public $name = 'Facilitys';
	public $uses = array('Facility','Facilitylocation');


	public function view() {
		//to retrieve all users, need just one line
		$this->set('facilitys', $this->Facility->find('all'));
	}

	public function add(){
	
		$location_list = $this->Facilitylocation->find('list', array(
            'fields' => array('Facilitylocation.location_id', 'Facilitylocation.location_name'),
            'recursive' => -1
        ));
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
		$this->set(compact('location_list'));
	}

	public function edit() {
		//get the id of the user to be edited
		$id = $this->request->params['pass'][0];
		
		//set the user id
		$this->Facility->id = $id;

		$location_list = $this->Facilitylocation->find('list', array(
            'fields' => array('Facilitylocation.location_id', 'Facilitylocation.location_name'),
            'recursive' => -1
        ));
		
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
		
		$this->set(compact('location_list'));
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
					$this->redirect(array('action' => 'view'));
				}
			}
		}
	}
}
?>
