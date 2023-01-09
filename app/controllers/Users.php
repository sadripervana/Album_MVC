<?php 

class Users
{
	use Controller;

	public function index()
	{	
		$data = [];
		$album = new AlbumModel;
		$likesAlbum = new LikesModel;
		$dislikesAlbum = new DislikesModel;
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
				redirect("users?id=$id");
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
				redirect("users?id=$id");
		}

		$this->view('user',$data);
	}

}