<?php

require_once 'App/models/IndexModel.php';

class IndexController extends Controller {

	private $pageTpl = 'App/views/main.tpl.php';
	
	public function __construct() {
		$this->model = new IndexModel();
		$this->view = new View();
	}

	public function index() {
		$this->view->render( $this->pageTpl );
	}

	public function currentCurrency()
	{
		// code...

		if($_POST['params']['fromInput']!='' && $_POST['params']['toInput']!='')
		{
			$allCurrencies= $this->model->convert( $_POST['params']);
			echo "<br>";
			var_dump($allCurrencies);
			echo "<br>";
		}
		else {
			echo 'nth';
		}
	}

}
?>
