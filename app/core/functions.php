<?php 

function show($stuff)
{
	echo "<pre>";
	print_r($stuff);
	echo "</pre>";
}

function esc($str)
{
	return htmlspecialchars($str);
}

function redirect($path)
{
	header("Location: " . ROOT."/".$path);
	die;
}


function makePhoto($photoCount,$dbpath,$allowed,$errors){
	 for($i = 0; $i < $photoCount; $i++){
		 $name = $_FILES['photo']['name'][$i];
		 $nameArray = explode('.',$name);
		 $fileName = $nameArray[0];
		 $fileExt = $nameArray[1];
		 $mime = explode('/', $_FILES['photo']['type'][$i]);
		 $mimeType = $mime[0];
		 $mimeExt = $mime[1];
		 $tmpLoc[] = $_FILES['photo']['tmp_name'][$i];

		 $fileSize = $_FILES['photo']['size'][$i];
		 $uploadName = md5(microtime().$i) . '.' . $fileExt;
		 $uploadPath[] = '../public/assets/images/' . $uploadName;
		 if($i != 0){
			 $dbpath .= ',';
		 }
		 $dbpath .= '../public/assets/images/' . $uploadName;
		 if($mimeType != 'image'){
			 $errors[] = 'The File must be an image.';
		 }
		 if(!in_array($fileExt, $allowed)){
			 $errors[] = 'The photo extension must be a png, jpg, jpeg, or gif.';
		 }
		 if($fileSize > 150000000){
			 $errors[] = 'The fileSize must be under 15MB';
		 }
		 if($fileExt != $mimeExt && ($mimeExt == 'jpeg' && $fileExt != 'jpg')){
			 $errors[] = 'File extension does not match the file.';
		 }
	  }

	$variables = [
		'tmpLoc'=>$tmpLoc,
    'uploadPath'=>$uploadPath,
    'dbpath'=>$dbpath ,
	  'errors' => $errors
	];
 return $variables;
}