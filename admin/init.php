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

function promo_list()
{
	$sql	= "SELECT *
				FROM tbl_promotion
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

function promotion_add() {
	$created = date('Y-m-d');

	$sql	 = "INSERT INTO tbl_promotion
				(title, create_date) 
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
			$filePath 		= '../images/promotions/' . $slide_id . '/';
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

				$sql = "UPDATE tbl_promotion SET img_cover = '{$file_name}' WHERE id = '{$slide_id}'";
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

function invis_list_more($limit)
{
 $sql = "SELECT *
    FROM tbl_before_after_detail
	WHERE is_active = '1' AND categories = 8
    ORDER BY id ASC LIMIT $limit";
 
 return query($sql);
}

function braces_list_more($limit)
{
 $sql = "SELECT * FROM `tbl_before_after_detail` WHERE categories <> 8 AND categories <> 9 ORDER BY RAND( ) LIMIT $limit ";
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

<<<<<<< HEAD
function price_all_list()
{
	$sql	= "SELECT p.id, p.dsc, p.price, p.remark, p.update_date ,gp.name_group FROM tbl_prices p 
			   INNER JOIN tbl_group_price gp ON (p.grouping = gp.id) 
			   WHERE is_active = 1 
			   ORDER BY gp.id ";
	
	return query($sql);
}

=======
>>>>>>> 861605f35ecee4ac9580d22d220a1a966c2160e0
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

<<<<<<< HEAD
function celeb_list()
{
	$sql	= "SELECT *
				FROM tbl_celeds
				WHERE is_active = '1'
				ORDER BY id ASC";
	
	return query($sql);
}

=======
>>>>>>> 861605f35ecee4ac9580d22d220a1a966c2160e0
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

function prices_all_list($id)
{	
	$wheres[] = "id = '{$id}'";
	$where	= (!empty($wheres)) ? 'WHERE ' . implode('AND ', $wheres) : null;

	$sql	= "SELECT *
				FROM tbl_prices
				{$where}
				LIMIT 1";
	
	$result = query($sql);

	return (!empty($result)) ? current($result) : false;
}

function banner_before_detail($id)
{	
	$wheres[] = "id = '{$id}'";
	$where	= (!empty($wheres)) ? 'WHERE ' . implode('AND ', $wheres) : null;

	$sql	= "SELECT *
				FROM tbl_banner_before_after
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
	//	$folder_path = "assets/images/description\product";   
			// List of name of files inside 
			// specified folder 
			$files = glob($folder_path.'/*');  
			
			// Deleting all the files in the list 
			foreach($files as $file) { 
			
				if(is_file($file))  
				
					// Delete the given file 
					unlink($file);  
			} 
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

<<<<<<< HEAD
function celeb_list_add() {
	$created = date('Y-m-d');
	// print_r ($_POST);
	$description = htmlspecialchars($_POST['notes']);
=======
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
>>>>>>> 861605f35ecee4ac9580d22d220a1a966c2160e0
	$name = $_POST['name'];
	$link = htmlspecialchars($_POST['link_pdf']);

	$sql = "INSERT INTO `tbl_celeds`(`name`, `dsc`, `link`, `create_date`) VALUES ('{$name}','{$description}','{$link}','{$created}')";
	
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
			$filePath 		= '../images/celebss/' . $product_id . '/';
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

				$sql = "UPDATE tbl_celeds SET img_cover = '{$file_name}' WHERE id = '{$product_id}'";
				
				query($sql);
			}
		}
	}
<<<<<<< HEAD
	return $added;
=======

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
>>>>>>> 861605f35ecee4ac9580d22d220a1a966c2160e0
}

function before_after_detail_add() {
	$created = date('Y-m-d');
	// print_r ($_POST);
	$description = htmlspecialchars($_POST['description']);
	$name = $_POST['name'];
	$link = htmlspecialchars($_POST['link_pdf']);
	$cate = $_POST['categories'];

	$sql = "INSERT INTO `tbl_before_after_detail`(`name`, `dsc`, `link`, `categories`, `create_date`) VALUES ('{$name}','{$description}','{$link}','{$cate}','{$created}')";
	
<<<<<<< HEAD
	// print_r ($sql);
		
	// 	exit;
=======
	$result = query($sql);

	return (!empty($result)) ? current($result) : false;
}



function service_add() {
	$created = date('Y-m-d H:i:s');

	$sql	 = "INSERT INTO tbl_banner
				(name, short_desc, description, create_date) 
				VALUE 
				('{$_POST['name']}', '{$_POST['short_desc']}', '{$_POST['description']}', '{$created}')";
>>>>>>> 861605f35ecee4ac9580d22d220a1a966c2160e0
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

<<<<<<< HEAD
function review_detail_add() {
	$created = date('Y-m-d');
	// print_r ($_POST);
	$description = htmlspecialchars($_POST['description']);
	$name = $_POST['name'];
	$link = htmlspecialchars($_POST['link_pdf']);
=======
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
>>>>>>> 861605f35ecee4ac9580d22d220a1a966c2160e0

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

function price_all_edit() {
	$update_date 	= date('Y-m-d');
	$product_id 	= $_POST['price_id'];

	$prices = $_POST['price'];
	$rema = $_POST['remake'];

	$sql = "UPDATE `tbl_prices` SET `price`='{$prices}', `update_date`='{$update_date}' WHERE id = '{$product_id}' ";

	return query($sql);
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
	$created = date('Y-m-d');

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
	$created = date('Y-m-d');

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
			SET name = '{$_POST['name']}', link = '{$_POST['link']}',update_date = '{$update_date}'
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


// เริ่มแก้ไข new
function news_detail($id)
{	
	$wheres[] = "id = '{$id}'";
	$where	= (!empty($wheres)) ? 'WHERE ' . implode('AND ', $wheres) : null;

	$sql	= "SELECT *
				FROM tbl_service
				{$where}
				LIMIT 1";
	
	$result = query($sql);

	return (!empty($result)) ? current($result) : false;
}

function news_detail_edit() {
	$update_date 	= date('Y-m-d H:i:s');
	$new_id 	= $_POST['new_id'];
	
	

	$sql = "UPDATE tbl_service
			SET name = '{$_POST['name']}', description = '{$_POST['description']}',update_date = '{$update_date}'
			WHERE id = '{$new_id}'";
	// exit;
	$updated = query($sql);

	if(!empty($updated))
	{
		global $db_connected;

		if(!empty($_FILES['covImg']))
		{
			$file_name		= $_FILES['covImg']["name"];
			$file_name		= preg_replace('/[^\w\._]+/', '_', $file_name);
			$filePath 		= '../images/news_detail/'.$new_id. '/';
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
				$sql = "UPDATE tbl_service SET img_cover = '{$file_name}' WHERE id = '{$new_id}'";
				query($sql);
			}
		}
	}

	return $updated;
}


// จบแก้ไข new


// เริ่มแก้ไข review_edit
function reviews_edit($id)
{	
	$wheres[] = "id = '{$id}'";
	$where	= (!empty($wheres)) ? 'WHERE ' . implode('AND ', $wheres) : null;

	$sql	= "SELECT *
				FROM tbl_reviews_detail
				{$where}
				LIMIT 1";
	
	$result = query($sql);

	return (!empty($result)) ? current($result) : false;
}


function review_edit_detail() {
	$update_date 	= date('Y-m-d H:i:s');
	$review_id 	= $_POST['review_id'];
	
	

	$sql = "UPDATE tbl_reviews_detail
			SET name = '{$_POST['name']}', dsc = '{$_POST['description']}', link = '{$_POST['link']}',update_date = '{$update_date}'
			WHERE id = '{$review_id}'";
	// exit;
	$updated = query($sql);

	if(!empty($updated))
	{
		global $db_connected;

		if(!empty($_FILES['covImg']))
		{
			$file_name		= $_FILES['covImg']["name"];
			$file_name		= preg_replace('/[^\w\._]+/', '_', $file_name);
			$filePath 		= '../images/review_detail/'.$review_id. '/';
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
				$sql = "UPDATE tbl_reviews_detail SET img_cover = '{$file_name}' WHERE id = '{$review_id}'";
				query($sql);
			}
		}
	}

	return $updated;
}


// จบแก้ไข review_edit


// เริ่มแก้ไข promotion_edit
function promotion_edit($id)
{	
	$wheres[] = "id = '{$id}'";
	$where	= (!empty($wheres)) ? 'WHERE ' . implode('AND ', $wheres) : null;

	$sql	= "SELECT *
				FROM tbl_promotion
				{$where}
				LIMIT 1";
	
	$result = query($sql);

	return (!empty($result)) ? current($result) : false;
}


function promotion_edit_detail() {
	$update_date 	= date('Y-m-d H:i:s');
	$promotion_id 	= $_POST['promotion_id'];
	
	

	$sql = "UPDATE tbl_promotion
			SET title = '{$_POST['name']}',update_date = '{$update_date}'
			WHERE id = '{$promotion_id}'";
	// exit;
	$updated = query($sql);

	if(!empty($updated))
	{
		global $db_connected;

		if(!empty($_FILES['covImg']))
		{
			$file_name		= $_FILES['covImg']["name"];
			$file_name		= preg_replace('/[^\w\._]+/', '_', $file_name);
			$filePath 		= '../images/promotions/'.$promotion_id. '/';
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
				$sql = "UPDATE tbl_promotion SET img_cover = '{$file_name}' WHERE id = '{$promotion_id}'";
				query($sql);
			}
		}
	}

	return $updated;
}


// จบแก้ไข promotion_edit


// เริ่มแก้ไข celeb_edit
function celeb_edit($id)
{	
	$wheres[] = "id = '{$id}'";
	$where	= (!empty($wheres)) ? 'WHERE ' . implode('AND ', $wheres) : null;

	$sql	= "SELECT *
				FROM tbl_celeds
				{$where}
				LIMIT 1";
	
	$result = query($sql);

	return (!empty($result)) ? current($result) : false;
}


function celeb_edit_detail() {
	$update_date 	= date('Y-m-d H:i:s');
	$celeb_edit 	= $_POST['celeb_edit'];
	
	

	$sql = "UPDATE tbl_celeds
			SET name = '{$_POST['name']}', dsc = '{$_POST['description']}', link = '{$_POST['link']}',update_date = '{$update_date}'
			WHERE id = '{$celeb_edit}'";
	// exit;
	$updated = query($sql);

	if(!empty($updated))
	{
		global $db_connected;

		if(!empty($_FILES['covImg']))
		{
			$file_name		= $_FILES['covImg']["name"];
			$file_name		= preg_replace('/[^\w\._]+/', '_', $file_name);
			$filePath 		= '../images/celebss/'.$celeb_edit. '/';
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
				$sql = "UPDATE tbl_celeds SET img_cover = '{$file_name}' WHERE id = '{$celeb_edit}'";
				query($sql);
			}
		}
	}

	return $updated;
}

<<<<<<< HEAD

// จบแก้ไข celeb_edit


function beforeafter_detail($id)
{	
	$wheres[] = "id = '{$id}'";
	$where	= (!empty($wheres)) ? 'WHERE ' . implode('AND ', $wheres) : null;

	$sql	= "SELECT *
				FROM tbl_before_after_detail
				{$where}
				LIMIT 1";
	
	$result = query($sql);

	return (!empty($result)) ? current($result) : false;
}

function beforeafter_dd_detail($id)
{	
	$wheres[] = "id = '{$id}'";
	$where	= (!empty($wheres)) ? 'WHERE ' . implode('AND ', $wheres) : null;

	$sql	= "SELECT tbf.id, tc.categories_name FROM tbl_before_after_detail tbf 
			   INNER JOIN tbl_categories tc ON (tbf.categories = tc.categories_id)
				{$where}
				LIMIT 1 ";
	
	$result = query($sql);

	return (!empty($result)) ? current($result) : false;
}




//เริ่มแก้ไขหน้า Before After

function beforeafter_edit() {
	$update_date 	= date('Y-m-d H:i:s');
	$beforeafter_id 	= $_POST['beforeafter_id'];
	
	

	$sql = "UPDATE tbl_before_after_detail
			SET name = '{$_POST['name']}', categories = '{$_POST['categories']}', dsc = '{$_POST['description']}', link = '{$_POST['link_youtube']}',update_date = '{$update_date}'
			WHERE id = '{$beforeafter_id}'";
	// exit;
	$updated = query($sql);

	if(!empty($updated))
	{
		global $db_connected;

		if(!empty($_FILES['covImg']))
		{
			$file_name		= $_FILES['covImg']["name"];
			$file_name		= preg_replace('/[^\w\._]+/', '_', $file_name);
			$filePath 		= '../images/before_after/'.$beforeafter_id. '/';
			$file_path		= $filePath . $file_name;

=======
function review_detail($id)
{	
	$wheres[] = "id = '{$id}'";
	$where	= (!empty($wheres)) ? 'WHERE ' . implode('AND ', $wheres) : null;

	$sql	= "SELECT *
				FROM tbl_reviews_detail
				{$where}
				LIMIT 1";
	
	$result = query($sql);

	return (!empty($result)) ? current($result) : false;
}


//เริ่มแก้ไขหน้า review/success story

function review_edit() {
	$update_date 	= date('Y-m-d H:i:s');
	$review_id 	= $_POST['review_id'];
	
	

	$sql = "UPDATE tbl_reviews_detail
			SET name = '{$_POST['name']}', dsc = '{$_POST['description']}', link = '{$_POST['link_youtube']}',update_date = '{$update_date}'
			WHERE id = '{$review_id}'";
	// exit;
	$updated = query($sql);

	if(!empty($updated))
	{
		global $db_connected;

		if(!empty($_FILES['covImg']))
		{
			$file_name		= $_FILES['covImg']["name"];
			$file_name		= preg_replace('/[^\w\._]+/', '_', $file_name);
			$filePath 		= '../images/review_detail/'.$review_id. '/';
			$file_path		= $filePath . $file_name;

>>>>>>> 861605f35ecee4ac9580d22d220a1a966c2160e0
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
<<<<<<< HEAD
				$sql = "UPDATE tbl_before_after_detail SET img_cover = '{$file_name}' WHERE id = '{$beforeafter_id}'";
=======
				$sql = "UPDATE tbl_reviews_detail SET img_cover = '{$file_name}' WHERE id = '{$review_id}'";
>>>>>>> 861605f35ecee4ac9580d22d220a1a966c2160e0
				query($sql);
			}
		}
	}

	return $updated;
<<<<<<< HEAD
}  //จบแก้ไขหน้า Before After



=======
}  //จบแก้ไขหน้า review/success story



function beforeafter_detail($id)
{	
	$wheres[] = "id = '{$id}'";
	$where	= (!empty($wheres)) ? 'WHERE ' . implode('AND ', $wheres) : null;

	$sql	= "SELECT *
				FROM tbl_before_after_detail
				{$where}
				LIMIT 1";
	
	$result = query($sql);

	return (!empty($result)) ? current($result) : false;
}




//เริ่มแก้ไขหน้า Before After

function beforeafter_edit() {
	$update_date 	= date('Y-m-d H:i:s');
	$beforeafter_id 	= $_POST['beforeafter_id'];
	
	

	$sql = "UPDATE tbl_before_after_detail
			SET name = '{$_POST['name']}', dsc = '{$_POST['description']}', link = '{$_POST['link_youtube']}',update_date = '{$update_date}'
			WHERE id = '{$beforeafter_id}'";
	// exit;
	$updated = query($sql);

	if(!empty($updated))
	{
		global $db_connected;

		if(!empty($_FILES['covImg']))
		{
			$file_name		= $_FILES['covImg']["name"];
			$file_name		= preg_replace('/[^\w\._]+/', '_', $file_name);
			$filePath 		= '../images/before_after/'.$beforeafter_id. '/';
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
				$sql = "UPDATE tbl_before_after_detail SET img_cover = '{$file_name}' WHERE id = '{$beforeafter_id}'";
				query($sql);
			}
		}
	}

	return $updated;
}  //จบแก้ไขหน้า review/success story
>>>>>>> 861605f35ecee4ac9580d22d220a1a966c2160e0


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

