<?php 

class Admin
{
	use Controller;

	public function index()
	{
		$data = [];
		$admin = new AdminModel;
		$arr['user_id'] = $_GET['id'];
		$row = $admin->where($arr);
		$data['adminData'] = $row;

		$data['id'] = empty($_SESSION['USER']) ? 'User':$_SESSION['USER']->id;
		$userId =$data['id'];

		$count = ($data['adminData'])? count($data['adminData']): 0;

		for($i = 0 ; $i < $count; $i++){
			$data['image'][$i] =
				explode(',',$data['adminData'][$i]->image);
				$data['title'][$i] = $data['adminData'][$i]->title;
				$data['imageId'][$i] = $data['adminData'][$i]->id; 
		}

		if(isset($_GET['delete_album'])){
			$id = $_GET['delete_album'];
			$arr['id'] = $_GET['delete_album'];
			$row = $admin->first($arr);
			$images = $row->image;
			$image = explode(',', $images);
			foreach($image as $key){
				$image_url = BASEURL . substr($key, 3) ;
				unlink($image_url);
			}
			$admin->delete($id);
			redirect("admin?id=$userId");
		}

		if(isset($_GET['imgi'])){
			$imgi = (int)$_GET['imgi'] ;
			$arr['id'] = $_GET['delete_image'];
			$row = $admin->first($arr);
			$images = $row->image;
			$image = explode(',', $images);
			$image_url = BASEURL . substr($image[$imgi], 3) ;
			unlink($image_url);
			unset($image[$imgi]);
			$imageImplode['image'] = implode(',', $image);
			$admin->update($arr['id'],$imageImplode);
			redirect("admin?id=$userId");
		}

		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			if($admin->validate($_POST))
			{	
				$admin->insertImage($_POST, $_FILES);
				redirect("admin?id=$userId");
			}
			$data['errors'] = $admin->errors;			
		}

		$arr['user_id'] = $_GET['id'];
			$arr['status'] = 1;
			$row = $admin->where($arr);
			$_SESSION['ALBUM'] = $row;

		$this->view('admin',$data);
	}

}
