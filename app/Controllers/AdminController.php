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

			$usersModel = Container::getModel("User");
			$this->userInfo = $usersModel->loadUser();
			
			$this->render('edituser');
		}

		public function login() {
			$this->render('login');
		}

		public function loginPost() {
			$user = Container::getModel("User");
			$user->authenticateUser($_POST);
		}

		public function listPosts() {
			Session::checkSessionId();

			//get posts
			$postsModel = Container::getModel("Post");
			$this->posts = $postsModel->fetchAll();

			//get author
			$i = 0;

			foreach($this->posts as $post) {

				$usersModel = Container::getModel("User");
				$this->userInfo = $usersModel->find($post['id_usuario']);

				$this->posts[$i] += ['username' => $this->userInfo['nome']];

				$i++;

			}

			$this->render('posts');
		}

		public function addPost() {

			Session::checkSessionId();

			$this->userId = $_SESSION['user']['id'];
			$this->render('addpost');
		}

		public function postCreate() {

			Session::checkSessionId();

			$post = Container::getModel("Post");
			$post->createPost($_POST);

		}

		public function editPost()
		{

			Session::checkSessionId();

			$postModel = Container::getModel("Post");
			$this->postInfo = $postModel->loadPost();

			$this->render('editpost');
		}

		public function postUpdate()
		{
			Session::checkSessionId();

			$post = Container::getModel("Post");
			$post->updatePost($_POST);
		}

	}
