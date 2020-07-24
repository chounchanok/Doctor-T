<?php 
require_once 'init.php';
require_once 'auth.php';

$data = array(
	'success'	=> 0
	,'image_url'=> null
	,'message'	=> null
);

if($_GET['action'] == 'upload_image')
{
	if(!empty($_FILES['file']))
	{
		$file_name		= $_FILES['file']["name"];
		$file_name		= preg_replace('/[^\w\._]+/', '_', $file_name);
		$storage_path	= storage_path($_REQUEST['path']);
		$file_path		= $storage_path . $file_name;

		if(file_exists($file_path))
		{
			$number			= 2;
			$file_exists	= true;
			$file_extension	= null;

			preg_match('/(\.([a-zA-Z]+))$/i', $file_name, $matchs);
			if(!empty($matchs[2]))
			{
				$file_extension = $matchs[2];
			}

			$file_name_only	= preg_replace("/(\.{$file_extension})/i", null, $file_name);

			while(file_exists($file_path))
			{
				$file_name = $file_name_only . "_{$number}.{$file_extension}";
				$file_path = $storage_path . $file_name;
				
				$number++;
			}
		}

		$moved = move_uploaded_file($_FILES['file']["tmp_name"], $file_path);

		if ($moved) {
			$data = array(
				'success'		=> 1
				,'image_url'	=> storage_url($_REQUEST['path']) . $file_name
				,'message'		=> null
			);
		} else {
			$data['message'] = 'Ooops! Your upload triggered the following error.' . $file_path;
		}	
	}
}

if($_GET['action'] == 'delete_image')
{
	$file_url = $_POST['file_url'];

	if(!empty($file_url))
	{
		$_file	= explode('/', $file_url);
		$file	= end($_file);

		unlink(storage_path($_REQUEST['path']) . $file);
	}
}

echo json_encode($data);
exit;
?>