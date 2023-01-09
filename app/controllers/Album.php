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
		$likesAlbum = new LikesModel;
		$dislikesAlbum = new DislikesModel;
		$arr['id'] = (isset($_GET['view']))?$_GET['view']:$_GET['views'];;
		$data['id'] = (isset($_GET['view']))?$_GET['view']:$_GET['views'];;
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
				$data['description'][$i] = $data['adminData'][$i]->description; 
				$likeId['album'] = $data['adminData'][$i]->id; 
				$dislikeId['album'] = $data['adminData'][$i]->id; 
			if(!empty($likesAlbum->where($likeId))){

				$data['likes'][$i] = count($likesAlbum->where($likeId));
			} else {
				$data['likes'][$i] =0;
			}

			if(!empty($dislikesAlbum->where($dislikeId))){

				$data['dislikes'][$i] = count($dislikesAlbum->where($dislikeId));
			} else {
				$data['dislikes'][$i] =0;
			}
		}

		if(isset($_GET['dislikes']))
		{		
			$dataDislikes['user'] = $_SESSION['USER']->first_name;
			$dataId['user'] = $_SESSION['USER']->first_name;
			$id = $_GET['id'];
			$dataDislikes['album'] = $_GET['dislikes'];
			$dataDislikes['dislikes'] = 1;
			$dataId['album'] = $_GET['dislikes'];
			$albumId = $_GET['dislikes'];
			$rowdata = $dislikesAlbum ->first($dataId);
			$data['disliked'] = $dislikesAlbum ->first($dataId);
			$dataId['liked'] = $likesAlbum ->first($dataId);
			$dislikeId = $dataId['liked']->id;
			if(empty($rowdata)){
				$dislikesAlbum->insert($dataDislikes);
				$likesAlbum->delete($dislikeId);
			}
			redirect("album?views=$id");
		}

		if(isset($_GET['likes']))
		{		
			$dataLike['user'] = $_SESSION['USER']->first_name;
			$dataId['user'] = $_SESSION['USER']->first_name;
			$id = $_GET['id'];
			$dataLike['album'] = $_GET['likes'];
			$dataLike['likes'] = 1;
			$dataId['album'] = $_GET['likes'];
			$albumId = $_GET['likes'];
			$rowdata = $likesAlbum ->first($dataId);
			$data['liked'] = $likesAlbum ->first($dataId);
			$dataId['disliked'] = $dislikesAlbum ->first($dataId);
			$likedId = $dataId['disliked']->id;
			if(empty($rowdata)){
				$likesAlbum->insert($dataLike);
				$dislikesAlbum->delete($likedId);
			}
			redirect("album?views=$id");
		}

		

		$this->view('album',$data);
	}

}
