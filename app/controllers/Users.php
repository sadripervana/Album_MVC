<?php 

class Users
{
	use Controller;

	public function index()
	{	
		$data = [];
		$album = new AlbumModel;
		$arr['user_id'] = $_GET['id'];
		$arr['status'] = 1;

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
		}

		$this->view('user',$data);
	}

}