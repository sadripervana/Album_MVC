<?php 

class Profile
{
	use Controller;

	public function index()
	{	
		if(!is_loged_in()){
			login_error_redirect();
		}
		
		$data = [];
		$profile = new User;
		$data['id'] = empty($_SESSION['USER']) ? 'User':$_SESSION['USER']->id;
		
		if(isset($_GET['del'])){
			$id = $_GET['del'];
			$profile->delete($id);
			if(!empty($_SESSION['USER']))
			unset($_SESSION['USER']);
			redirect('home');
		}
		
		
		$row = $profile->where($data);
		$data['first_name'] = $row[0]->first_name;
		$data['last_name'] = $row[0]->last_name;
		$data['email'] = $row[0]->email;


		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			if($profile->validate($_POST))
			{	
				$_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

				$profile->update($data['id'],$_POST);
				redirect('profile');
			}

			$data['errors'] = $profile->errors;			
		}

		

		$this->view('profile',$data);
	}

}
