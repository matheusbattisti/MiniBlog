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
			$routes['edituser'] = array('route'=>'/admin/team/edituser', 'controller'=>'AdminController', 'action'=>'edit');
			$routes['gerenciarposts'] = array('route'=>'/admin/posts', 'controller'=>'AdminController', 'action'=>'listPosts');

			$routes['addpost'] = array('route'=>'/admin/post/addpost', 'controller'=>'AdminController', 'action'=>'addPost');
			$routes['addpostcreate'] = array('route'=>'/admin/postcreate', 'controller'=>'AdminController', 'action'=>'postCreate');						
			$routes['editpost'] = array('route'=>'/admin/post/editpost', 'controller'=>'AdminController', 'action'=>'editPost');
			$routes['postupdate'] = array('route'=>'/admin/postupdate', 'controller'=>'AdminController', 'action'=>'postUpdate');
			$routes['deleteuser'] = array('route'=>'/user/deleteuser', 'controller'=>'AdminController', 'action'=>'deletePost');

			$routes['logout'] = array('route'=>'/user/logout', 'controller'=>'UserController', 'action'=>'logout');
			$this->setRoutes($routes);
		}
	}


 ?>