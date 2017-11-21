<?php 

	namespace App\Models;

	use Core\Crud;
	use Core\Messages;
	use Core\Session;

	class Post extends Crud
	{

		protected $table = "posts";

		public function loadPost()
		{

			$postId = addslashes($_GET['id']);

			if(!empty($postId) && $postId != '') {
				return $this->find($postId);
			} else {
				Messages::setMessage('warning', 'Houve algum problema ao encontrar o post!');
				header('Location: /');
			}

		}

		public function createPost()
		{

			//checando se as variaveis vieram no post
			if(isset($_POST['titulo']) && !empty($_POST['titulo'])) {

				$postTitle 		 = addslashes($_POST['titulo']);
				$postContent 	 = addslashes($_POST['texto']);
				$userId 		 = addslashes($_POST['id_usuario']);

				$data = [
						'titulo' => $postTitle,
						'texto'  => $postContent,
						'id_usuario'  => $userId,
						'data_criacao' => date("D M d, Y G:i"),
					];

					$response = $this->insert($data);

					if($response == true) {

						//caso o usuario registre, limpa as mensagens
						Messages::setMessage('success', 'Post cadastrado com sucesso!');
						header('Location: /');
					}

			} else {
				Messages::setMessage('warning', 'Dados incompletos, por favor crie novamente o post');
				header('Location: /');
			}

		}

		public function updatePost()
		{

			//checando se as variaveis vieram no post, e se o email ja existe no banco
			if(isset($_POST['titulo']) && !empty($_POST['titulo'])) {

				$id = addslashes($_POST['post_id']);

				$data = [];

				if(isset($_POST['titulo'])) {
					$userName 		 = addslashes($_POST['titulo']);
					$data['titulo'] = $userName;
				}
				if(isset($_POST['texto'])) {
					$userEmail 		 = addslashes($_POST['texto']);
					$data['texto'] = $userEmail;
				}

				$response = $this->update($data, $id);

				if($response == true) {

					//caso o usuario registre, limpa as mensagens
					Messages::setMessage('success', 'Post editado com sucesso!');
					header('Location: /');
				}

			} else {
				Messages::setMessage('warning', 'O título não pode ser vazio');
				header('Location: /');
			}
		}

	}