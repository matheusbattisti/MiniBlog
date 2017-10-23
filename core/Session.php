<?php 

	namespace Core;

	class Session
	{

		public function __construct()
		{
		    if(!isset($_SESSION)) {
		        $this->initSession();
		    }
		}

		public static function initSession()
		{	
		    session_start(); 
		}


		/**
		* esta função libera as páginas se o id estiver setado ou for a pagina de login
		*/
		public static function checkSessionId() 
		{	
			if(isset($_SESSION['user'])) {
				$id = $_SESSION['user']['id'];
			}

			$url = $_SERVER['REQUEST_URI'];
			$actualUrl = strrchr(parse_url($url, PHP_URL_PATH), '/');

			if($actualUrl == '/login') { 
			    return true;
			    exit;
			} else if(!isset($id)) {
				header("Location: /admin/login");
			}
			
		}

		public static function destroySession()
		{
			unset($_SESSION['user']['id']);
		}

		public static function destroyMessages()
		{
			unset($_SESSION['message']);
		}

	}