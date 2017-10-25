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
			$routes['edituser'] = array('route'=>'/admin/edituser', 'controller'=>'AdminController', 'action'=>'edit');
			$routes['logout'] = array('route'=>'/admin/logout', 'controller'=>'AdminController', 'action'=>'logout');
			$this->setRoutes($routes);
		}
	}


 ?>