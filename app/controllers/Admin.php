<?php 

class Admin
{
	use Controller;

	public function index()
	{
		$data = [];
		$admin = new AdminModel;
		$arr['user_id'] = $_SESSION['USER']->id;
		
		

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

			redirect("admin");
		}

		if(isset($_GET['edit'])){
			$arr['id'] = $_GET['edit'];
			$rowEdit = $admin->first($arr);
			$data['titleEdit'] = $rowEdit->title;
			$data['statusEdit'] = $rowEdit->status;
		}
		$data['titleEdit'] = $data['titleEdit']?? '';

		if(isset($_GET['imgi'])){
			$imgi = (int)$_GET['imgi'] ;
			$imgi = $imgi;
			$arrDel['id'] = $_GET['delete_image'];
			$rowDel = $admin->first($arrDel);
			$images = $rowDel->image;
			$image = explode(',', $images);
			$image_url = BASEURL . substr($image[$imgi], 3) ;
			unlink($image_url);
			unset($image[$imgi]);
			$imageImplode['image'] = implode(',', $image);
			$admin->update($arrDel['id'],$imageImplode);
			redirect("admin");
		}

		if($_SERVER['REQUEST_METHOD'] == "POST")
		{	
			if($admin->validate($_POST))
			{	
				$admin->insertImage($_POST, $_FILES);
				redirect("admin");
			}
			$data['errors'] = $admin->errors;			
		}
		if(isset($_GET['user_id']))
		{	
			// var_dump($_GET);die;
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
				// var_dump($data['image']);die;

		$arr['user_id'] = $_SESSION['USER']->id;
			$arr['status'] = 1;
			$row = $admin->where($arr);
			$_SESSION['ALBUM'] = $row;

		$this->view('admin',$data);
	}

}
