<?php 

	namespace App\Models;

	use Core\Crud;
	use Core\Messages;
	use Core\Session;

	class User extends Crud
	{

		protected $table = "usuarios";


		public function loadUser()
		{

			$userId = addslashes($_GET['id']);

			if(!empty($userId) && $userId != '') {
				return $this->find($userId);
			} else {
				Messages::setMessage('warning', 'Houve algum problema ao encontrar usuário!');
				header('Location: /');
			}

		}

		public function registerUser($data) {

			$emailExists = $this->findByEmail($_POST['email']);

			//checando se as variaveis vieram no post, e se o email ja existe no banco
			if(isset($_POST['email']) && !empty($_POST['email']) && $emailExists == '') {

				$userName 		 = addslashes($_POST['name']);
				$userEmail 		 = addslashes($_POST['email']);
				$userNivel 		 = $_POST['nivel'];
				$userPass 		 = $_POST['password'];
				$userConfirmPass = $_POST['confirmpassword'];

				//checando se a senha e a confirmação são iguais
				if($userPass == $userConfirmPass && $userPass != '') {
					
					$data = [
						'email' => $userEmail,
						'nome'  => $userName,
						'senha' => password_hash($userPass, PASSWORD_DEFAULT, ['cost' => 12]),
						'nivel'  => $userNivel,
					];

					$response = $this->insert($data);

					if($response == true) {

						//caso o usuario registre, limpa as mensagens
						Messages::setMessage('success', 'Usuário cadastrado com sucesso!');
						header('Location: /');
					}


				} else {
					Messages::setMessage('warning', 'A senha e a confirmação de senha não estão iguais!');
					header('Location: /');
				}

			} else {
				Messages::setMessage('warning', 'O e-mail não pode ser vazio ou já existe na base de dados!');
				header('Location: /');
			}

		}

		public function authenticateUser($data) {
			
			//checando se as variaveis vieram no post
			if(isset($_POST['email']) && $_POST['email'] != "") {

				$userEmail = addslashes($_POST['email']);
				$userPass = $_POST['password'];

				$userData = $this->findByEmail($userEmail);

				if(!empty($userData)) {

					$checked = password_verify($userPass, $userData['senha']);

					if($checked) {
						//caso o usuario autentique, limpa as mensagens
						$_SESSION['user']['id'] = $userData['id'];
						Messages::clearMessage();
						header('Location: /admin');
						
					} else {
						Messages::setMessage('warning', 'Usuário ou senha incorretos!');
						header('Location: /');
					}

				} else {
					Messages::setMessage('warning', 'Usuário ou senha incorretos!');
					header('Location: /');
				}

			} else {
				Messages::setMessage('warning', 'Usuário ou senha incorretos!');
				header('Location: /');
			}
		}

		public function edituser($data)
		{

			//checando se as variaveis vieram no post, e se o email ja existe no banco
			if(isset($_POST['email']) && !empty($_POST['email'])) {

				$id 			 = addslashes($_POST['id']);
				$userName 		 = addslashes($_POST['name']);
				$userEmail 		 = addslashes($_POST['email']);
				$userNivel 		 = $_POST['nivel'];
				$userPass 		 = $_POST['password'];
				$userConfirmPass = $_POST['confirmpassword'];

								//checando se a senha e a confirmação são iguais
				if($userPass == $userConfirmPass && $userPass != '') {
					
					$data = [
						'email' => $userEmail,
						'nome'  => $userName,
						'senha' => password_hash($userPass, PASSWORD_DEFAULT, ['cost' => 12]),
						'nivel'  => $userNivel,
					];

					$response = $this->update($data, $id);

					if($response == true) {

						//caso o usuario registre, limpa as mensagens
						Messages::setMessage('success', 'Usuário editado com sucesso!');
						header('Location: /');
					}


				} else {
					Messages::setMessage('warning', 'A senha e a confirmação de senha não estão iguais!');
					header('Location: /');
				}

			} else {
				Messages::setMessage('warning', 'O e-mail não pode ser vazio');
				header('Location: /');
			}
		}

		public function deleteUser($id)
		{
			if($id != '') {

				$userId = $id;
				$this->delete($id);
				Messages::setMessage('success', 'Usuário deletado com sucesso!');
				header('Location: /');

			} else {
				Messages::setMessage('warning', 'Houve algum problema ao deletar usuário!');
				header('Location: /');
			}
		}

		public function logout()
		{
			Session::destroySession();
			Messages::setMessage('success', 'Logout efetuado com sucesso!');
			header('Location: /');
			exit;
		}

	}