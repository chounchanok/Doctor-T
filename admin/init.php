<?php 
session_start();

function check_login()
{
	if(!empty($_SESSION['user']))
	{
		return true;
	}

	return false;
}

require_once '../config/database.conf.php';
$db_config  = $config['database'][$config['database']['connect_type']];
$db_connected = mysqli_connect($db_config['host'], $db_config['username'], $db_config['password'], $db_config['database_name']);

mysqli_set_charset($db_connected, $config['database']['charset']);

if ( isset( $_POST['is_login'] ) ) {

	$password = md5( $_POST['password'] );
	$sql = "
		select *
		from tbl_doctor
		where username = '{$_POST['username']}' and password = '{$password}'
	";

	$result = query($sql);

	if (!empty($result)) {
		$_SESSION['user']['user_id']   	= $result[0]->id;
		$_SESSION['user']['username']  	= $result[0]->username;
		$_SESSION['user']['group_id']  	= $result[0]->group_id;
		$_SESSION['user']['first_name'] = $result[0]->first_name;
		$_SESSION['user']['last_name'] 	= $result[0]->last_name;
		header('location: index.php');
	}
}

function query($command_sql)
{
 GLOBAL $db_connected;

 if(!empty($db_connected) and is_object($db_connected) and (get_class($db_connected) == 'mysqli'))
 {
  $query_resource = mysqli_query($db_connected, $command_sql);
 }
 
 if(preg_match('/^\s*(select)\s*/i', $command_sql))
 {
  if(!empty($query_resource))
  {
   $i  = 0;
   $result = array();
   while($row = mysqli_fetch_object($query_resource))
   {
    $result[$i] = $row;
    $i++;
   }

   mysqli_free_result($query_resource);

   return $result;
  }
 }
 else
 {
  if(!empty($query_resource)) return true;
 }
 
 return false;
}

function customer_list()
{
	$sql = "SELECT tu.user_name , tu.id , tu.user_company , tu.last_name , tu.email , tu.tel , tu.date_time ,tp.name1 , tu.is_active  
			FROM tbl_user tu
			INNER JOIN tbl_product tp ON (tu.ids = tp.id) WHERE tu.is_active = '1'
			ORDER BY id DESC ";
	
	return query($sql);
}

///////////////////////////////////////////////////////////////////


function slide_list()
{
	$sql	= "SELECT *
				FROM tbl_slide
				WHERE is_active = '1'
				ORDER BY id ASC";
	
	return query($sql);
}

function slide_detail($id)
{	
	$wheres[] = "id = '{$id}'";
	$where	= (!empty($wheres)) ? 'WHERE ' . implode('AND ', $wheres) : null;

	$sql	= "SELECT *
				FROM tbl_slide
				{$where}
				LIMIT 1";
	
	$result = query($sql);

	return (!empty($result)) ? current($result) : false;
}

function slide_add() {
	$created = date('Y-m-d H:i:s');

	$sql	 = "INSERT INTO tbl_slide
				(name, create_date) 
				VALUE 
				('{$_POST['sname']}', '{$created}')";
	// exit;
	$added = query($sql);

	if(!empty($added))
	{
		global $db_connected;

		$slide_id = mysqli_insert_id($db_connected);

		if(!empty($_FILES['covImg']))
		{
			$file_name		= $_FILES['covImg']["name"];
			$file_name		= preg_replace('/[^\w\._]+/', '_', $file_name);
			$filePath 		= '../assets/images/slide/' . $slide_id . '/';
			$file_path		= $filePath . $file_name;

			if ( !is_dir($filePath) ) {
				mkdir($filePath);
			}
			
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

			$moved = move_uploaded_file($_FILES['covImg']["tmp_name"], $file_path);

			if($moved)
			{
				$originalFile 	= $file_path;
				$targetFile 	= $file_path;

				$sql = "UPDATE tbl_slide SET img_cover = '{$file_name}' WHERE id = '{$slide_id}'";
				query($sql);
			}
		}

	}

	return $added;
}

function reviews_list_more($limit)
{
 $sql = "SELECT *
    FROM tbl_reviews_detail
    WHERE is_active = '1'
    ORDER BY id ASC LIMIT $limit";
 
 return query($sql);
}

function slide_edit() {
	$slide_id 	= $_POST['slide_id'];

	$sql = "UPDATE tbl_slide
			SET name = '{$_POST['sname']}'
			WHERE id = '{$slide_id}'";
	// exit;
	$updated = query($sql);

	if(!empty($updated))
	{
		global $db_connected;

		if(!empty($_FILES['covImg']))
		{
			$file_name		= $_FILES['covImg']["name"];
			$file_name		= preg_replace('/[^\w\._]+/', '_', $file_name);
			$filePath 		= '../assets/images/slide/' . $slide_id . '/';
			$file_path		= $filePath . $file_name;

			if ( !is_dir($filePath) ) {
				mkdir($filePath);
			}
			
			if(file_exists($file_path))
			{
				unlink($file_path);
			}

			$moved = move_uploaded_file($_FILES['covImg']["tmp_name"], $file_path);

			if($moved)
			{
				$originalFile 	= $file_path;
				$targetFile 	= $file_path;

				$sql = "UPDATE tbl_slide SET img_cover = '{$file_name}' WHERE id = '{$slide_id}'";
				query($sql);
			}
		}
	}

	return $updated;
}

function categories_list($id = '')
{	
	if (!empty($id)) {
		$wheres[] = "categories_id = '{$id}'";
	}

	$wheres[] = "is_active = '1'";

	$where	= (!empty($wheres)) ? 'WHERE ' . implode('AND ', $wheres) : null;

	$sql	= "SELECT *
				FROM tbl_categories
				{$where}
				ORDER BY categories_id ASC";
	
	return query($sql);
}

function cate_list()
{
	$sql	= "SELECT *
				FROM tbl_categories
				WHERE is_active = '1'
				ORDER BY categories_id ASC";
	
	return query($sql);
}

function cate_detail($id)
{	
	$wheres[] = "categories_id = '{$id}'";
	$where	= (!empty($wheres)) ? 'WHERE ' . implode('AND ', $wheres) : null;

	$sql	= "SELECT *
				FROM tbl_categories
				{$where}
				LIMIT 1";
	
	$result = query($sql);

	return (!empty($result)) ? current($result) : false;
}

function cate_add() {
	$created = date('Y-m-d');

	$sql	 = "INSERT INTO tbl_categories
				(categories_name, create_date) 
				VALUE 
				('{$_POST['name']}', '{$created}')";
	// exit;
	$added = query($sql);

	return $added;
}

function cate_edit() {
	$update_date = date('Y-m-d');

	$sql	 = "UPDATE tbl_categories
					SET categories_name = '{$_POST['name']}', update_date = '{$update_date}'
					WHERE categories_id = '{$_POST['categories_id']}'";
	// exit;
	$updated = query($sql);

	return $updated;
}

function product_list()
{
	$sql	= "SELECT *
				FROM tbl_product
				WHERE is_active = '1'
				ORDER BY id ASC";
	
	return query($sql);
}

function before_after_list()
{
	$sql	= "SELECT *
				FROM tbl_before_after_detail
				WHERE is_active = '1'
				ORDER BY id ASC";
	
	return query($sql);
}

function reviews_list()
{
	$sql	= "SELECT *
				FROM tbl_reviews
				WHERE is_active = '1'
				ORDER BY id ASC";
	
	return query($sql);
}

function review_detail_list()
{
	$sql	= "SELECT *
				FROM tbl_reviews_detail
				WHERE is_active = '1'
				ORDER BY id ASC";
	
	return query($sql);
}

function product_detail($id)
{	
	$wheres[] = "id = '{$id}'";
	$where	= (!empty($wheres)) ? 'WHERE ' . implode('AND ', $wheres) : null;

	$sql	= "SELECT *
				FROM tbl_reviews
				{$where}
				LIMIT 1";
	
	$result = query($sql);

	return (!empty($result)) ? current($result) : false;
}

function product_add() {
	$created = date('Y-m-d');
	// print_r ($_POST);
	$description = htmlspecialchars($_POST['description']);
	$name = $_POST['name'];
	$link = htmlspecialchars($_POST['link_pdf']);

	$sql = "INSERT INTO `tbl_reviews`(`name`, `desc`, `link`, `create_date`) VALUES ('{$name}','{$description}','{$link}','{$created}')";
	
	// print_r ($sql);
		
	// 	exit;
	// exit;
	$added = query($sql);

	if(!empty($added))
	{
		global $db_connected;

		$product_id = mysqli_insert_id($db_connected);

		if(!empty($_FILES['covImg']))
		{
			$file_name		= $_FILES['covImg']["name"];
			$file_name		= preg_replace('/[^\w\._]+/', '_', $file_name);
			$filePath 		= '../images/reviews/' . $product_id . '/';
			$file_path		= $filePath . $file_name;

			if ( !is_dir($filePath) ) {
				mkdir($filePath);
			}
			
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

			$moved = move_uploaded_file($_FILES['covImg']["tmp_name"], $file_path);

			if($moved)
			{
				$originalFile 	= $file_path;
				$targetFile 	= $file_path;

				$sql = "UPDATE tbl_reviews SET img_cover = '{$file_name}' WHERE id = '{$product_id}'";
				
				query($sql);
			}
		}
	}
	return $added;
}

function before_after_detail_add() {
	$created = date('Y-m-d');
	// print_r ($_POST);
	$description = htmlspecialchars($_POST['description']);
	$name = $_POST['name'];
	$link = htmlspecialchars($_POST['link_pdf']);
	$cate = $_POST['categories'];

	$sql = "INSERT INTO `tbl_before_after_detail`(`name`, `dsc`, `link`, `categories`, `create_date`) VALUES ('{$name}','{$description}','{$link}','{$cate}','{$created}')";
	
	// print_r ($sql);
		
	// 	exit;
	// exit;
	$added = query($sql);

	if(!empty($added))
	{
		global $db_connected;

		$product_id = mysqli_insert_id($db_connected);

		if(!empty($_FILES['covImg']))
		{
			$file_name		= $_FILES['covImg']["name"];
			$file_name		= preg_replace('/[^\w\._]+/', '_', $file_name);
			$filePath 		= '../images/before_after/' . $product_id . '/';
			$file_path		= $filePath . $file_name;

			if ( !is_dir($filePath) ) {
				mkdir($filePath);
			}
			
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

			$moved = move_uploaded_file($_FILES['covImg']["tmp_name"], $file_path);

			if($moved)
			{
				$originalFile 	= $file_path;
				$targetFile 	= $file_path;

				$sql = "UPDATE tbl_before_after_detail SET img_cover = '{$file_name}' WHERE id = '{$product_id}'";
				
				query($sql);
			}
		}
	}
	return $added;
}

function review_detail_add() {
	$created = date('Y-m-d');
	// print_r ($_POST);
	$description = htmlspecialchars($_POST['description']);
	$name = $_POST['name'];
	$link = htmlspecialchars($_POST['link_pdf']);

	$sql = "INSERT INTO `tbl_reviews_detail`(`name`, `dsc`, `link`, `create_date`) VALUES ('{$name}','{$description}','{$link}','{$created}')";
	
	// print_r ($sql);
		
	// 	exit;
	// exit;
	$added = query($sql);

	if(!empty($added))
	{
		global $db_connected;

		$product_id = mysqli_insert_id($db_connected);

		if(!empty($_FILES['covImg']))
		{
			$file_name		= $_FILES['covImg']["name"];
			$file_name		= preg_replace('/[^\w\._]+/', '_', $file_name);
			$filePath 		= '../images/review_detail/' . $product_id . '/';
			$file_path		= $filePath . $file_name;

			if ( !is_dir($filePath) ) {
				mkdir($filePath);
			}
			
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

			$moved = move_uploaded_file($_FILES['covImg']["tmp_name"], $file_path);

			if($moved)
			{
				$originalFile 	= $file_path;
				$targetFile 	= $file_path;

				$sql = "UPDATE tbl_reviews_detail SET img_cover = '{$file_name}' WHERE id = '{$product_id}'";
				
				query($sql);
			}
		}
	}
	return $added;
}

function product_edit() {
	$update_date 	= date('Y-m-d H:i:s');
	$product_id 	= $_POST['product_id'];

	$description = htmlspecialchars($_POST['description']);
	$name = $_POST['name'];
	$link = htmlspecialchars($_POST['link_pdf']);

	$sql = "UPDATE `tbl_reviews` SET `name`='{$name}',`desc`='{$description}',`link`='{$link}',`update_date`='{$update_date}' WHERE id = '{$product_id}' ";
	// exit;
	$updated = query($sql);

	if(!empty($updated))
	{
		global $db_connected;

		if(!empty($_FILES['covImg']))
		{
			$file_name		= $_FILES['covImg']["name"];
			$file_name		= preg_replace('/[^\w\._]+/', '_', $file_name);
			$filePath 		= '../images/reviews/' . $product_id . '/';
			$file_path		= $filePath . $file_name;

			if ( !is_dir($filePath) ) {
				mkdir($filePath);
			}
			
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
					$file_path = $filePath . $file_name;
					
					$number++;
				}
			}

			$moved = move_uploaded_file($_FILES['covImg']["tmp_name"], $file_path);

			if($moved)
			{
				/*$originalFile 	= $file_path;
				$targetFile 	= $file_path;

				resizeImg( $originalFile, $targetFile, $file_extension, 1000, 1000 );*/
				$sql = "UPDATE tbl_reviews SET img_cover = '{$file_name}' WHERE id = '{$product_id}' ";
				query($sql);
			}
		}	
	}

	return $updated;
}

function service_list()
{
	$sql	= "SELECT *
				FROM tbl_service
				WHERE is_active = '1'
				ORDER BY id ASC";
	
	return query($sql);
}

function banner_list()
{
	$sql	= "SELECT *
				FROM tbl_banner
				WHERE is_active = '1'
				ORDER BY id ASC";
	
	return query($sql);
}

function banner_before_after_list()
{
	$sql	= "SELECT *
				FROM tbl_banner_before_after
				WHERE is_active = '1'
				ORDER BY id ASC";
	
	return query($sql);
}

function newsdetail_list()
{
	$sql	= "SELECT *
				FROM tbl_service
				WHERE is_active = '1'
				ORDER BY id ASC";
	
	return query($sql);
}

function service_detail($id)
{	
	$wheres[] = "id = '{$id}'";
	$where	= (!empty($wheres)) ? 'WHERE ' . implode('AND ', $wheres) : null;

	$sql	= "SELECT *
				FROM tbl_banner
				{$where}
				LIMIT 1";
	
	$result = query($sql);

	return (!empty($result)) ? current($result) : false;
}


function service_add() {
	$created = date('Y-m-d H:i:s');

	$sql	 = "INSERT INTO tbl_banner
				(name, short_desc, description, create_date) 
				VALUE 
				('{$_POST['name']}', '{$_POST['short_desc']}', '{$_POST['description']}', '{$created}')";
	// exit;
	$added = query($sql);

	if(!empty($added))
	{
		global $db_connected;

		$service_id = mysqli_insert_id($db_connected);

		if(!empty($_FILES['covImg']))
		{
			$file_name		= $_FILES['covImg']["name"];
			$file_name		= preg_replace('/[^\w\._]+/', '_', $file_name);
			$filePath 		= '../images/' . $service_id


			 . '/';
			$file_path		= $filePath . $file_name;

			if ( !is_dir($filePath) ) {
				mkdir($filePath);
			}
			
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

			$moved = move_uploaded_file($_FILES['covImg']["tmp_name"], $file_path);

			if($moved)
			{
				$originalFile 	= $file_path;
				$targetFile 	= $file_path;

				$sql = "UPDATE tbl_banner SET img_cover = '{$file_name}' WHERE id = '{$service_id}'";
				query($sql);
			}
		}

	}

	return $added;
}

function before_after_add() {
	$created = date('Y-m-d');
	
	$names = $_POST['name'];

	$sql	 = "INSERT INTO `tbl_banner_before_after`(`name`, `create_date`) VALUES ('{$names}','{$created}')";
		// print_r ($sql);
		
		// exit;
	// exit;
	$added = query($sql);

	if(!empty($added))
	{
		global $db_connected;

		$service_id = mysqli_insert_id($db_connected);

		if(!empty($_FILES['covImg']))
		{
			$file_name		= $_FILES['covImg']["name"];
			$file_name		= preg_replace('/[^\w\._]+/', '_', $file_name);
			$filePath 		= '../images/banner_beforafter/' . $service_id . '/';
			$file_path		= $filePath . $file_name;

			if ( !is_dir($filePath) ) {
				mkdir($filePath);
			}
			
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

			$moved = move_uploaded_file($_FILES['covImg']["tmp_name"], $file_path);

			if($moved)
			{
				$originalFile 	= $file_path;
				$targetFile 	= $file_path;

				$sql = "UPDATE tbl_banner_before_after SET img_cover = '{$file_name}' WHERE id = '{$service_id}'";
				query($sql);
			}
		}
	}
	return $added;
}


function news_add() {
	$created = date('Y-m-d H:i:s');

	$sql	 = "INSERT INTO tbl_service
				(name, short_desc, description, create_date) 
				VALUE 
				('{$_POST['name']}', '{$_POST['short_desc']}', '{$_POST['description']}', '{$created}')";
	// exit;
	$added = query($sql);

	if(!empty($added))
	{
		global $db_connected;

		$service_id = mysqli_insert_id($db_connected);

		if(!empty($_FILES['covImg']))
		{
			$file_name		= $_FILES['covImg']["name"];
			$file_name		= preg_replace('/[^\w\._]+/', '_', $file_name);
			$filePath 		= '../images/news_detail/' . $service_id


			 . '/';
			$file_path		= $filePath . $file_name;

			if ( !is_dir($filePath) ) {
				mkdir($filePath);
			}
			
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

			$moved = move_uploaded_file($_FILES['covImg']["tmp_name"], $file_path);

			if($moved)
			{
				$originalFile 	= $file_path;
				$targetFile 	= $file_path;

				$sql = "UPDATE tbl_service SET img_cover = '{$file_name}' WHERE id = '{$service_id}'";
				query($sql);
			}
		}

	}

	return $added;
}


function service_edit() {
	$update_date 	= date('Y-m-d H:i:s');
	$service_id 	= $_POST['service_id'];

	$sql = "UPDATE tbl_banner
			SET name = '{$_POST['name']}', short_desc = '{$_POST['short_desc']}', description = '{$_POST['description']}', update_date = '{$update_date}'
			WHERE id = '{$service_id}'";
	// exit;
	$updated = query($sql);

	if(!empty($updated))
	{
		global $db_connected;

		if(!empty($_FILES['covImg']))
		{
			$file_name		= $_FILES['covImg']["name"];
			$file_name		= preg_replace('/[^\w\._]+/', '_', $file_name);
			$filePath 		= '../images/' . $service_id . '/';
			$file_path		= $filePath . $file_name;

			if ( !is_dir($filePath) ) {
				mkdir($filePath);
			}
			
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
					$file_path = $filePath . $file_name;
					
					$number++;
				}
			}

			$moved = move_uploaded_file($_FILES['covImg']["tmp_name"], $file_path);

			if($moved)
			{
				/*$originalFile 	= $file_path;
				$targetFile 	= $file_path;

				resizeImg( $originalFile, $targetFile, $file_extension, 1000, 1000 );*/
				$sql = "UPDATE tbl_banner SET img_cover = '{$file_name}' WHERE id = '{$service_id}'";
				query($sql);
			}
		}
	}

	return $updated;
}

// function banner_edit() {
// 	$update_date 	= date('Y-m-d H:i:s');
// 	$banner_id 	= $_POST['service_id'];

// 	$sql = "UPDATE tbl_banner
// 			SET name = '{$_POST['name']}', update_date = '{$update_date}'
// 			WHERE id = '{$banner_id}'";
// 	// exit;
// 	$updated = query($sql);

// 	if(!empty($updated))
// 	{
// 		global $db_connected;

// 		if(!empty($_FILES['covImg']))
// 		{
// 			$file_name		= $_FILES['covImg']["name"];
// 			$file_name		= preg_replace('/[^\w\._]+/', '_', $file_name);
// 			$filePath 		= 'images/' . $banner_id . '/'
// 			$file_path		= $filePath . $file_name;

// 			if ( !is_dir($filePath) ) {
// 				mkdir($filePath);
// 			}
			
// 			if(file_exists($file_path))
// 			{
// 				$number			= 2;
// 				$file_exists	= true;
// 				$file_extension	= null;

// 				preg_match('/(\.([a-zA-Z]+))$/i', $file_name, $matchs);
// 				if(!empty($matchs[2]))
// 				{
// 					$file_extension = $matchs[2];
// 				}

// 				$file_name_only	= preg_replace("/(\.{$file_extension})/i", null, $file_name);

// 				while(file_exists($file_path))
// 				{
// 					$file_name = $file_name_only . "_{$number}.{$file_extension}";
// 					$file_path = $filePath . $file_name;
					
// 					$number++;
// 				}
// 			}

// 			$moved = move_uploaded_file($_FILES['covImg']["tmp_name"], $file_path);

// 			if($moved)
// 			{
// 				/*$originalFile 	= $file_path;
// 				$targetFile 	= $file_path;

// 				resizeImg( $originalFile, $targetFile, $file_extension, 1000, 1000 );*/
// 				$sql = "UPDATE tbl_banner SET img_cover = '{$file_name}' WHERE id = '{$banner_id}'";
// 				query($sql);
// 			}
// 		}
// 	}

// 	return $updated;
// }


function storage_path($destination = null)
{
	 if(!empty($destination))
		 {
		  	$destination = $destination . DIRECTORY_SEPARATOR;
		 }

 	return preg_replace('/((\\\|\/)admin)/', DIRECTORY_SEPARATOR, __DIR__) . 'assets/images/description' . DIRECTORY_SEPARATOR . $destination;
	}

function storage_url($destination = null)
{
 if(!empty($destination))
 {
  $destination = $destination . '/';
 }

 $_uri = explode('/', $_SERVER['PHP_SELF']);
 
 array_pop($_uri);
 array_pop($_uri);
 
 $_uri[0]= $_SERVER['HTTP_HOST'];
 $_uri[] = 'assets/images/description';
 $uri = implode('/', $_uri);

 return "http://{$uri}/{$destination}";
}

?>

