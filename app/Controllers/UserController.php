<?php 

	namespace App\Controllers;

	use Core\Action;
	use Core\Session;
	use Core\DI\Container;

	class UserController extends Action
	{

		public function index() {
			$this->render('index');
		}

		public function login() {

			$user = Container::getModel("User");
			$user->authenticateUser($_POST);

		}

		public function addPost() {

			$user = Container::getModel("User");
			$user->registerUser($_POST);
			
		}

		public function editPost() {
			$user = Container::getModel("User");
			$user->editUser($_POST);
		}

		public function deletePost() {
			Session::checkSessionId();

			$id = addslashes($_GET['id']);

			$usersModel = Container::getModel("User");
			$usersModel->deleteUser($id);

		}

		public function logout() {

			$user = Container::getModel("User");
			$user->logout();

		}

	}
