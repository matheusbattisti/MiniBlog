<?php 

	namespace App\Controllers;

	use Core\Action;
	use Core\Session;
	use Core\DI\Container;

	class AdminController extends Action
	{

		public function index() {
			Session::checkSessionId();
			$this->render('index');
		}

		public function listTeam() {
			Session::checkSessionId();

			$usersModel = Container::getModel("User");
			$this->users = $usersModel->fetchAll();

			$this->render('team');
		}

		public function add() {
			Session::checkSessionId();
			$this->render('adduser');
		}

		public function edit() {
			Session::checkSessionId();
			$this->render('edituser');
		}

		public function delete() {
			Session::checkSessionId();
			$this->render('deleteuser');
		}

		public function login() {
			$this->render('login');
		}

		public function loginPost() {
			$user = Container::getModel("User");
			$user->authenticateUser($_POST);
		}


	}
