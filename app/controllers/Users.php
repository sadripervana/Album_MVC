<?php 

class Users
{
	use Controller;

	public function index()
	{	
		$data = [];
		$album = new AlbumModel;
		$user = new User;
		
		$arr['user_id'] = $_GET['id'];
		$arrId['id'] = $_GET['id'];
		$arr['status'] = 1;

		$userData = $user->first($arrId);
		$data['first_name'] = $userData->first_name;
		$data['last_name'] = $userData->last_name;
		$data['date'] = $userData->date;
		$data['user_image'] = $userData->user_image;
		
		$data['user_id'] = $userData->id;
		$row = $album->where($arr);
		$data['adminData'] = $row;

		$data['id'] = empty($_SESSION['USER']) ? 'User':$_SESSION['USER']->id;
		$userId =$data['id'];

		$count = ($data['adminData'])? count($data['adminData']): 0;



		for($i = 0 ; $i < $count; $i++){
			$data['image'][] =
				explode(',',$data['adminData'][$i]->image);
				$data['title'][$i] = $data['adminData'][$i]->title;
				$data['imageId'][$i] = $data['adminData'][$i]->id;
				
				$data['description'][$i] = $data['adminData'][$i]->description;
				
		}



		

		$this->view('user',$data);
	}

}