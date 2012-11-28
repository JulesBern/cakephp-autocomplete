<?php
App::uses('AppController', 'Controller');
class UsersController extends AppController {

	public $components = array('RequestHandler');
	public function index() {
		
	}

	public function searchjson() {
		$term=$_GET['term'];
		$this->autoRender=false;      
		$r=$this->User->find('all', array('conditions' => array('username LIKE' => '%'.$term.'%')));
		foreach ($r as $c) {
		   $tmp[]=array('id' => $c['User']['id'],'value' => $c['User']['username'],'label' =>$c['User']['username']); 
		}
		echo json_encode($tmp);
		exit();
	}

}
