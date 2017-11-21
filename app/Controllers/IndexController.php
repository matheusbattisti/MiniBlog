<?php 

	namespace App\Controllers;

	use Core\Action;
	use Core\Session;
	use Core\DI\Container;

	class IndexController extends Action
	{
		public function index() {

			$postModel = Container::getModel("Post");
			$this->postsCount = count($postModel->findAll());

			$this->lastPosts = $postModel->lastPosts();

			$this->render('index');
		}

	}
