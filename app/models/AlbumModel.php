<?php 

class AlbumModel
{
	use Model;

	protected $table = 'album';

	protected $allowedColumns = [
		'title',
		'image',
		'user_id',
		'status',
		'likes',
		'dislike'
	];
}