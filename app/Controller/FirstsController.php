<?php

class FirstsController extends AppController{
    
    public $name = 'Firsts';
    
    public function beforeFilter() {
        parent::beforeFilter();
    }
    
    public function hello(){
        
        $title_for_layout = 'Welcome';
        $hello = 'Hello Cake PHP !';
        
        $this->set('helloWorld',$hello);
        $this->set(compact('title_for_layout'));
        $this->render('hello');
    }
     public function view(){
        
        $title_for_layout = 'Welcome';
        $hello = 'Hello Cake PHP !';
        
        $this->set('helloWorld',$hello);
        $this->set(compact('title_for_layout'));
        $this->render('hello');
    }
}
?>