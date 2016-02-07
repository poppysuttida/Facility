<?php
class LoginsController extends AppController {
	public $uses = array('User');
	public $name = 'Logins';
	public $components = array('Paginator', 'Session');
    
	public function view() {
		if (isset($this->request->data['User']['User_Name']) && isset($this->request->data['User']['Pass_word'])){
			$catalog_list = $this->User->find('first', array(
	            'conditions' => array(
	            	'User.user_name' => $this->request->data['User']['User_Name'],
	            	'User.user_last_name' => $this->request->data['User']['Pass_word']
	            ),
	            'recursive' => -1
	        ));
	        if(isset($catalog_list['User']['user_id'])){
	        	if($this->Session->write('user_login', $catalog_list['User'])){
		        	$this->redirect(array('controller' => 'Pages', 'action' => 'display'));
		        	exit;
	        	}
	        }
			//echo '<pre>'; print_r($this->Session->read('user_login')); echo '</pre>';
		}

		
		//to retrieve all users, need just one line
		//$this->set('logins', $this->Login->find('all'));
	}
	public function logout() {
  			$this->Session->setFlash('Good-Bye');
  			$this->redirect($this->Auth->logout());
 }
}
?>
