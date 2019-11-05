<?php

require 'App/models/IndexModel.php';

class IndexController extends Controller {

	private $pageTpl = 'App/views/main.tpl.php';

	public function __construct() {
		$this->model = new IndexModel();
		$this->view = new View();
	}

	public function index() {
		$this->view->render($this->pageTpl);
	}

	public function currentCurrency()
	{
		// code...
		if($_POST['params']['fromInput']!='' && $_POST['params']['toInput']!='')
		{
			$allCurrencies= $this->model->convert( $_POST['params']);
			if($allCurrencies)
			{
				$output = $allCurrencies['fromValue']/$allCurrencies['toValue'];
				echo number_format($output, 2, '.', '');
			}
			else echo "API not available";
		}
		else {
			echo 'nth';
		}
	}

}
?>
