<?php 

	namespace App\Controllers;

	use Core\Action;
	use Core\Session;
	use Core\DI\Container;

	class IndexController extends Action
	{
		public function index() {
			$this->render('index');
		}

	}
