<?php 

class Album
{
	use Controller;

	public function index()
	{	
		if(!is_loged_in()){
			login_error_redirect();
		}

		$data = [];
		$album = new AlbumModel;
		$admin = new AdminModel;
		$arr['id'] = (isset($_GET['view']))?$_GET['view']:'';;
		$data['id'] = (isset($_GET['view']))?$_GET['view']:'';;
		$viewid = $data['id'];

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

		if(isset($_GET['imgi'])){
			$imgi = (int)$_GET['imgi'] ;
			$arrDel['id'] = $_GET['delete_image'];
			$rowDel = $admin->first($arrDel);
			$images = $rowDel->image;
			$image = explode(',', $images);
			$image_url = BASEURL . substr($image[$imgi], 3) ;
			unlink($image_url);
			unset($image[$imgi]);
			$imageImplode['image'] = implode(',', $image);
			$admin->update($arrDel['id'],$imageImplode);
			redirect("album?view=$viewid");
		}

		
		$row = $album->where($arr);
		$data['adminData'] = $row;

		$count = ($data['adminData'])? count($data['adminData']): 0;

		for($i = 0 ; $i < $count; $i++){
			$data['image'][] =
				explode(',',$data['adminData'][$i]->image);
				$data['title'][$i] = $data['adminData'][$i]->title;
				$data['imageId'][$i] = $data['adminData'][$i]->id; 
		}

		

		$this->view('album',$data);
	}

}
