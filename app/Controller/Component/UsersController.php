<?php class UsersController extends AppController {
 public $name = 'Users';
 public $helpers = array("Html","Form");
 public function register() {
   if ($this->request->is('post')) {
           if ($this->User->save($this->request->data)) {
                $this->Session->setFlash('สมัครสมาชิกเรียบร้อยแล้ว');
                $this->redirect(array('action' => 'register'));
   }
  }
 }
}
?>