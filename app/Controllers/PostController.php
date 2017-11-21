<?php 

	namespace App\Controllers;

	use Core\Action;
	use Core\Session;
	use Core\DI\Container;

	class PostController extends Action
	{

		public function postView()
		{

			$post = Container::getModel("Post");
			$this->postView = $post->loadPost();

			$user = Container::getModel("User");
			$this->postAuthor = $user->loadUserById($this->postView['id_usuario']);

			$this->render('post');

		}

	}
