<?php
class ProductsController extends AppController {

	public function index() {
		
	}

	public function searchjson() {

		$search = null;
		if(!empty($this->request->query['search'])) {
			$search = $this->request->query['search'];
			$terms = explode(' ', trim($search));
			$terms = array_diff($terms, array(''));
			$conditions = array();
			foreach($terms as $term) {
				$conditions[] = array('Product.name LIKE' => '%' . $term . '%');
			}
			$products = $this->Product->find('all', array(
				'fields' => array(
					'Product.name'
				),
				'conditions' => $conditions,
				'limit' => 200,
				'recursive' => -1
			));
		}

		echo json_encode($products);
		$this->autoRender = false;
	}

}
