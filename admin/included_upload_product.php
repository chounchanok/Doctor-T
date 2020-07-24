<?php
require_once '../config/database.conf.php';
$db_config  = $config['database'][$config['database']['connect_type']];
$db_connected = mysqli_connect($db_config['host'], $db_config['username'], $db_config['password'], $db_config['database_name']);

mysqli_set_charset($db_connected, $config['database']['charset']);
// change directory
// we are doing it while including this file
// default directory is /php-generated-input/
// chdir('./php');
include('vendor/upload/class.fileuploader.php');

$product_id = $_GET['id'];
$filePath 	= '../assets/images/product/' . $product_id . '/';
$path 		= realpath($filePath);
$updated 	= date('Y-m-d H:i:s');

if ( !is_dir($path) ) {
	mkdir($filePath);
}
		
// create an empty array
$appendedFiles = array();

// scan uploads directory
$uploadsFiles = array_diff(scandir($filePath), array('.', '..'));

// add files to our array with
// made to use the correct structure of a file
foreach($uploadsFiles as $file) {
	// skip if directory
	if(is_dir($file))
		continue;

	// add file to our array
	// !important please follow the structure below
	$appendedFiles[] = array(
		"name" => $file,
		"type" => FileUploader::mime_content_type($filePath . $file),
		"size" => filesize($filePath . $file),
		"file" => $filePath . $file,
		"data" => array(
			"url" => 'http://localhost/fileuploader/examples/php-generated-input/uploads/' . $file
		)
	);
}

// initialize FileUploader
$FileUploader = new FileUploader('pdImg', array(
    // 'limit' => 4,
    // 'maxSize' => 4,
	// 'fileMaxSize' => 4,
    'extensions' => ['jpg', 'jpeg', 'png'],
    'required' => false,
    'uploadDir' => $filePath,
    'title' => 'name',
	'replace' => false,
    'listInput' => true,
    'files' => $appendedFiles
));

// call to upload the files
$data = $FileUploader->upload();

// get the fileList
$fileList = $FileUploader->getFileList();			

if ( !empty($fileList) ) {
	$sql_max	= "SELECT max(order_id) AS max_id
				FROM tbl_product_image
				product_id = '{$product_id}'
				LIMIT 1";
	
	$result_max = mysqli_query($db_connected, $sql_max);

	if ($result_max) {
		$i = $result_max['max_id'];
	} else {
		$i = 0;
	}

	foreach ($fileList as $img) {
		$i++;

		$sql = "INSERT INTO tbl_product_image (product_id, img_name, order_id, create_date) VALUE ('{$product_id}', '{$img['name']}', '{$i}', '{$updated}')";
		
		mysqli_query($db_connected, $sql);
	}
}

if($data['hasWarnings']) {
    $warnings = $data['warnings'];
    
	echo '<pre>';
    print_r($warnings);
	echo '</pre>';
}

// print_r($FileUploader);
// exit;

// unlink the files
// !important only for appended files
// you will need to give the array with appendend files in 'files' option of the fileUploader
foreach($FileUploader->getRemovedFiles('file') as $key=>$value) {
	$sqlDel = "DELETE FROM tbl_product_image WHERE product_id = '{$product_id}' AND img_name = '{$value['name']}'";
	$result = mysqli_query($sqlDel);

	unlink($filePath . $value['name']);
}