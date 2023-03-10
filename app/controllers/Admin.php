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
			$data['descriptionEdit'] = $rowEdit->description;
			$data['statusEdit'] = $rowEdit->status;
		}
		$data['descriptionEdit'] = $data['descriptionEdit']??'';
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
			
			if(isset($_POST['editButton'])){
				$id = $_GET['edit'];
				if($admin->validate($_POST))
				{	
					$admin->update($id,$_POST);
					redirect("admin");
				}
				$data['errors'] = $admin->errors;
			}			
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
