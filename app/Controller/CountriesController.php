<?php
App::uses('AppController', 'Controller');
class CountriesController extends AppController {

	public $components = array('RequestHandler');
	public function index() {
		
	}
	
	public function getcountry() {
        $term=$_GET['term'];
		$this->autoRender=false;        
        $this->loadModel('Country');
        $r=$this->Country->find('all', array('conditions' => array('name LIKE' => '%'.$term.'%')));
        foreach ($r as $c) {
           $tmp[]=array('id' => $c['Country']['id'],'value' => $c['Country']['name'],'label' =>$c['Country']['name']); 
        }
        echo json_encode($tmp);
        exit();
    }
    
    public function getcity() {
        $this->loadModel('City');
        $term=$_GET['term'];
        $this->autoRender=false;   
        $options = array(
            'conditions' => array(
                "City.country_id=".$this->request->query['negara_id'],
                "City.name LIKE '%".$term."%'"   
            )
        );
        $r=$this->City->find('all',$options);
        
        foreach ($r as $c) {
           $tmp[]=array('id' => $c['City']['id'],'value' => $c['City']['name'],'label' =>$c['City']['name']); 
        }
        echo json_encode($tmp);
        exit();
    }
    
	public function searchjson() {

		$negara = null;
		if(!empty($this->request->query['negara'])) {
			$negara = $this->request->query['negara'];
			$terms = explode(' ', trim($negara));
			$terms = array_diff($terms, array(''));
			$conditions = array();
			foreach($terms as $term) {
				$conditions[] = array('Country.name LIKE' => '%' . $negara . '%');
			}
			$countries = $this->Country->find('all', array(
				'fields' => array(
					'Country.name',
				),
				'conditions' => $conditions,
				'limit' => 200,
				'recursive' => -1
			));
		}

		echo json_encode($countries);
		$this->autoRender = false;
	}

}
