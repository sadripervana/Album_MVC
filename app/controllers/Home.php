<?php 

/**
 * home class
 */
class Home
{
	use Controller;

	public function index()
	{

		$data['username'] = empty($_SESSION['USER']) ? 'User':$_SESSION['USER']->email;
		$data['password'] = empty($_SESSION['USER']) ? 'User':$_SESSION['USER']->password;
		$data['id'] = empty($_SESSION['USER']) ? 'User':$_SESSION['USER']->id;
		
		$count = ($_SESSION['ALBUM'])? count($_SESSION['ALBUM']): 0;

		for($i = 0 ; $i < $count; $i++){
			$data['image'][$i] =
				explode(',',$_SESSION['ALBUM'][$i]->image);
				$data['title'][$i] = $_SESSION['ALBUM'][$i]->title; 
		}
		
		
		$this->view('home',$data);
	}

}
