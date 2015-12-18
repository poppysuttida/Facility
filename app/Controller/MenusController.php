<?php
App::uses('AppController', 'Controller');

class MenusController extends AppController {
	public $name = 'Menus';
  	public $helpers = array('Html');
	public $uses = array();

	public function index() {
		$menuActive = '';
		$this->set(compact('menuActive'));
	}

}
