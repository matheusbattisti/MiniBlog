<?php 

	namespace App\Controllers;

	use Core\Action;
	use Core\Session;
	use Core\DI\Container;

	class PostController extends Action
	{

		public function index() {
			$this->render('index');
		}

		public function addPostCreate() {

			$user = Container::getModel("POST");
			$user->authenticateUser($_POST);

		}

	}
