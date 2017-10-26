<?php 

	namespace Core;

	use Core\Init;

	class Route extends Init
	{
		protected function initRoutes() {
			$routes['home'] = array('route'=>'/', 'controller'=>'IndexController', 'action'=>'index');

			$routes['admin'] = array('route'=>'/admin', 'controller'=>'AdminController', 'action'=>'index');
			$routes['adminlogin'] = array('route'=>'/admin/login', 'controller'=>'AdminController', 'action'=>'login');
			$routes['adminloginpost'] = array('route'=>'/admin/login/post', 'controller'=>'AdminController', 'action'=>'loginPost');
			$routes['team'] = array('route'=>'/admin/team', 'controller'=>'AdminController', 'action'=>'listTeam');
			$routes['adduser'] = array('route'=>'/admin/team/adduser', 'controller'=>'AdminController', 'action'=>'add');

			$routes['adduserpost'] = array('route'=>'/user/add/post', 'controller'=>'UserController', 'action'=>'addPost');			
			$routes['edituser'] = array('route'=>'/user/edituser', 'controller'=>'UserController', 'action'=>'edit');
			$routes['deleteuser'] = array('route'=>'/user/deleteuser', 'controller'=>'UserController', 'action'=>'delete');
			$routes['logout'] = array('route'=>'/user/logout', 'controller'=>'UserController', 'action'=>'logout');
			$this->setRoutes($routes);
		}
	}


 ?>