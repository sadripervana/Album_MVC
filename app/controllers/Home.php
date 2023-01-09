<?php 

/**
 * home class
 */
class Home
{
	use Controller;

	public function index()
	{	

		$data['id'] = empty($_SESSION['USER']) ? 'User':$_SESSION['USER']->id;
		$users = new User;
		$arr['status'] = 1;
		$row = $users->findAll();
		$_SESSION['Users'] = $row;
		if(!empty($_SESSION['Users'])){
			$count = count($_SESSION['Users']);

			for($i = 0 ; $i < $count; $i++){
				$data['first_name'][$i] = $_SESSION['Users'][$i]->first_name;
				$data['last_name'][$i] = $_SESSION['Users'][$i]->last_name; 
				$data['date'][$i] = $_SESSION['Users'][$i]->date;
				$data['user_image'][$i] = $_SESSION['Users'][$i]->user_image; 
				$data['user_id'][$i] =  $_SESSION['Users'][$i]->id;
			}
		}
		
		
		
		$this->view('home',$data);
	}

}
