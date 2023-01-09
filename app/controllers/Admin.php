<?php 

class Admin
{
	use Controller;

	public function index()
	{	
		if(!is_loged_in()){
			login_error_redirect();
		}
		
		$data = [];
		$admin = new AdminModel;
		$arr['user_id'] = $_SESSION['USER']->id;
		
		if(isset($_GET['edit'])){
			$arr['id'] = $_GET['edit'];
			$rowEdit = $admin->first($arr);
			$data['titleEdit'] = $rowEdit->title;
			$data['statusEdit'] = $rowEdit->status;
		}
		$data['titleEdit'] = $data['titleEdit']?? '';


		if($_SERVER['REQUEST_METHOD'] == "POST")
		{	

			if(isset($_POST['secondButton'])){
				if($admin->validatePhoto($_FILES)){
					$admin->singlePhotoQuery($_POST, $_FILES);
					redirect("admin");
				}
				$data['errors'] = $admin->errors;
			}
			
			if(isset($_POST['firstButton'])){
				if($admin->validate($_POST))
				{	
					$admin->insertImage($_POST, $_FILES);
					redirect("admin");
				}
				$data['errors'] = $admin->errors;
			}			
		}
		
		if(isset($_GET['user_id']))
		{	
			if($admin->validateGet($_GET)){
				$id = $_GET['id'];
				$data['title'] = $_GET['title'];
				$data['status'] = $_GET['status'];
				array_shift($data);
				$admin->update($id, $data);
				redirect("admin");
			}
			$data['errors'] = $admin->errors;			
		}

		$row = $admin->where($arr);
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

		$arr['user_id'] = $_SESSION['USER']->id;
		

		$this->view('admin',$data);
	}

}
