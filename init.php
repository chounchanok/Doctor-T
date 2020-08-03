<?php
@session_start();

function check_login()
{
	if(!empty($_SESSION['user']))
	{
		return true;
	}

	return false;
}

require_once 'config/database.conf.php';
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

function reviews_list_more($limit)
{
	$sql	= "SELECT *
				FROM tbl_reviews
				WHERE is_active = '1'
				ORDER BY id ASC LIMIT $limit";
	
	return query($sql);
}

function slide_list()
{
	$sql	= "SELECT *
				FROM tbl_slide
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

function review_detail_list()
{
	$sql	= "SELECT *
				FROM tbl_reviews_detail
				WHERE is_active = '1'
<<<<<<< HEAD
				ORDER BY id ASC";
	
	return query($sql);
}

function celeb_topfooter_list()
{
	$sql = "SELECT *
			FROM tbl_celeds
			WHERE is_active = '1' AND is_selected = '1' ";
	
	return query($sql);
}

function before_topfooter_list()
{
	$sql = "SELECT *
			FROM tbl_before_after_detail
			WHERE is_active = '1' AND is_selected = '1' ";
	
	return query($sql);
}

function celebids_list()
{
	$sql	= "SELECT *
				FROM tbl_celeds
				WHERE is_active = '1' ";
=======
				ORDER BY id ASC LIMIT 6 ";
>>>>>>> 861605f35ecee4ac9580d22d220a1a966c2160e0
	
	return query($sql);
}

function review_detail_list_wh($id)
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

<<<<<<< HEAD
function news__list_sh($id)
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

function befors_list_sh($id)
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

function celeb_list_sh($id)
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

=======
>>>>>>> 861605f35ecee4ac9580d22d220a1a966c2160e0
function banner_before_list()
{
	$sql	= "SELECT *
				FROM tbl_banner_before_after
				WHERE is_active = '1'
				ORDER BY id ASC";
	
	return query($sql);
}

function before_list()
{
	$sql	= "SELECT *
				FROM tbl_before_after_detail
				WHERE is_active = '1' AND categories = 1
				ORDER BY id ASC";
	
	return query($sql);
}

function before_two_list()
{
	$sql	= "SELECT *
				FROM tbl_before_after_detail
				WHERE is_active = '1' AND categories = 2
				ORDER BY id ASC";
	
	return query($sql);
}

function before_tree_list()
{
	$sql	= "SELECT *
				FROM tbl_before_after_detail
				WHERE is_active = '1' AND categories = 3
				ORDER BY id ASC";
	
	return query($sql);
}

function before_four_list()
{
	$sql	= "SELECT *
				FROM tbl_before_after_detail
				WHERE is_active = '1' AND categories = 4
				ORDER BY id ASC";
	
	return query($sql);
}

function before_five_list()
{
	$sql	= "SELECT *
				FROM tbl_before_after_detail
				WHERE is_active = '1' AND categories = 5
				ORDER BY id ASC";
	
	return query($sql);
}

function before_six_list()
{
	$sql	= "SELECT *
				FROM tbl_before_after_detail
				WHERE is_active = '1' AND categories = 6
				ORDER BY id ASC";
	
	return query($sql);
}

function before_seven_list()
{
	$sql	= "SELECT *
				FROM tbl_before_after_detail
				WHERE is_active = '1' AND categories = 7
				ORDER BY id ASC";
	
	return query($sql);
}

function before_eng_list()
{
	$sql	= "SELECT *
				FROM tbl_before_after_detail
				WHERE is_active = '1' AND categories = 8
<<<<<<< HEAD
				ORDER BY id ASC ";
=======
				ORDER BY id ASC";
>>>>>>> 861605f35ecee4ac9580d22d220a1a966c2160e0
	
	return query($sql);
}

function before_ning_list()
{
	$sql	= "SELECT *
				FROM tbl_before_after_detail
				WHERE is_active = '1' AND categories = 9
				ORDER BY id ASC";
	
	return query($sql);
}

<<<<<<< HEAD
function rands_list()
{
	$sql	= "SELECT * FROM `tbl_before_after_detail` WHERE categories <> 8 AND categories <> 9 ORDER BY RAND( )";
	
	return query($sql);
}

function rands_before_list()
{
	$sql	= "SELECT * FROM `tbl_before_after_detail` WHERE categories <> 8 AND categories <> 9 ORDER BY RAND( )";
	
	return query($sql);
}

=======
>>>>>>> 861605f35ecee4ac9580d22d220a1a966c2160e0
function reviews_list()
{
	$sql	= "SELECT *
				FROM tbl_reviews
				WHERE is_active = '1'
				ORDER BY id ASC";
	
	return query($sql);
}

function reviews_list_page($limit)
{
	$sql	= "SELECT *
				FROM tbl_reviews
				WHERE is_active = '1'
				ORDER BY id ASC LIMIT $limit";
	
	return query($sql);
}

function newsdetail_all_list()
{
	$sql	= "SELECT *
				FROM tbl_service
				WHERE is_active = '1'
				ORDER BY id DESC";
	
	return query($sql);
}

function newsdetail_list()
{
	$sql	= "SELECT *
				FROM tbl_service
				WHERE is_active = '1' AND is_recommend = '1'
				ORDER BY id DESC";
	
	return query($sql);
}

function newsdetail_topfooter_list()
{
	$sql	= "SELECT *
				FROM tbl_service
				WHERE is_active = '1' AND is_selected = '1' ";
	
	return query($sql);
}

function promotion_topfooter_list()
{
	$sql	= "SELECT *
				FROM tbl_promotion
				WHERE is_active = '1' AND is_selected = '1' ";
	
	return query($sql);
}

function innovation_list()
{
	$sql	= "SELECT *
				FROM tbl_service
				WHERE is_active = '1' AND is_innovation = '1'
				ORDER BY id DESC";
	
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
	$created = date('Y-m-d H:i:s');

	$sql	 = "INSERT INTO tbl_categories
				(categories_name, short_desc, create_date) 
				VALUE 
				('{$_POST['name']}', '{$_POST['short_desc']}', '{$created}')";
	// exit;
	$added = query($sql);

	return $added;
}

function cate_edit() {
	$update_date = date('Y-m-d H:i:s');

	$sql	 = "UPDATE tbl_categories
					SET categories_name = '{$_POST['name']}', short_desc = '{$_POST['short_desc']}', update_date = '{$update_date}'
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

function product_detail($id)
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

function product_id1()
{	
	$sql	= "SELECT *
				FROM tbl_service
				WHERE id = 1";
	
	$result = query($sql);

	return (!empty($result)) ? current($result) : false;
}

function price_list_id1()
{	
	$sql	= "SELECT *
				FROM tbl_prices
				WHERE is_active = '1' AND grouping = '1' ";
	
	return query($sql);	
}

function price_list_id2()
{	
	$sql	= "SELECT *
				FROM tbl_prices
				WHERE is_active = '1' AND grouping = '2' ";
	
	return query($sql);	
}

function price_list_id3()
{	
	$sql	= "SELECT *
				FROM tbl_prices
				WHERE is_active = '1' AND grouping = '3' ";
	
	return query($sql);	
}

function price_list_id4()
{	
	$sql	= "SELECT *
				FROM tbl_prices
				WHERE is_active = '1' AND grouping = '4' ";
	
	return query($sql);	
}

function price_list_id5()
{	
	$sql	= "SELECT *
				FROM tbl_prices
				WHERE is_active = '1' AND grouping = '5' ";
	
	return query($sql);	
}

function price_list_id6()
{	
	$sql	= "SELECT *
				FROM tbl_prices
				WHERE is_active = '1' AND grouping = '6' ";
	
	return query($sql);	
}

function price_list_id7()
{	
	$sql	= "SELECT *
				FROM tbl_prices
				WHERE is_active = '1' AND grouping = '7' ";
	
	return query($sql);	
}

function price_list_id8()
{	
	$sql	= "SELECT *
				FROM tbl_prices
				WHERE is_active = '1' AND grouping = '8' ";
	
	return query($sql);	
}

function price_list_id9()
{	
	$sql	= "SELECT *
				FROM tbl_prices
				WHERE is_active = '1' AND grouping = '9' ";
	
	return query($sql);	
}

function price_list_id10()
{	
	$sql	= "SELECT *
				FROM tbl_prices
				WHERE is_active = '1' AND grouping = '10' ";
	
	return query($sql);	
}

function price_list_id11()
{	
	$sql	= "SELECT *
				FROM tbl_prices
				WHERE is_active = '1' AND grouping = '11' ";
	
	return query($sql);	
}

function price_list_id12()
{	
	$sql	= "SELECT *
				FROM tbl_prices
				WHERE is_active = '1' AND grouping = '12' ";
	
	return query($sql);	
}

function celebs_list()
{	
	$sql	= "SELECT *
				FROM tbl_celeds
				WHERE is_active = '1' ";
	
	return query($sql);
}

function promotion_page_list()
{	
	$sql	= "SELECT *
				FROM tbl_promotion
				WHERE is_active = 1 ";
	
	return query($sql);
}

function product_id2()
{	
	$sql	= "SELECT *
				FROM tbl_service
				WHERE id = 2";
	
	$result = query($sql);

	return (!empty($result)) ? current($result) : false;
}

function product_id3()
{	
	$sql	= "SELECT *
				FROM tbl_service
				WHERE id = 3";
	
	$result = query($sql);

	return (!empty($result)) ? current($result) : false;
}

function banner_id()
{	
	$sql	= "SELECT *
				FROM tbl_banner
				WHERE id = 1";
	
	$result = query($sql);

	return (!empty($result)) ? current($result) : false;
}

function banner_id2()
{	
	$sql	= "SELECT *
				FROM tbl_banner
				WHERE id = 2";
	
	$result = query($sql);

	return (!empty($result)) ? current($result) : false;
}


function product_add() {
	$created = date('Y-m-d H:i:s');

	$sql	 = "INSERT INTO tbl_product
				(name1, short_desc, desc1, categories, sub_categories, link1, 
				name2, desc2, link2, 
				name3, desc3, link3, 
				name4, desc4, link4, 
				name5, desc5, link5, 
				name6, desc6, link6, 
				name7, desc7, link7, 
				name8, desc8, link8, 
				name9, desc9, link9, 
				name10, desc10, link10, 
				create_date) 
				VALUE 
				('{$_POST['name']}', '{$_POST['short_desc']}', '{$_POST['description']}', '{$_POST['categories']}', '{$_POST['sub_cate']}', '{$_POST['link_pdf']}', 
				'{$_POST['name2']}', '{$_POST['description2']}', '{$_POST['link2']}', 
				'{$_POST['name3']}', '{$_POST['description3']}', '{$_POST['link3']}', 
				'{$_POST['name4']}', '{$_POST['description4']}', '{$_POST['link4']}', 
				'{$_POST['name5']}', '{$_POST['description5']}', '{$_POST['link5']}', 
				'{$_POST['name6']}', '{$_POST['description6']}', '{$_POST['link6']}', 
				'{$_POST['name7']}', '{$_POST['description7']}', '{$_POST['link7']}', 
				'{$_POST['name8']}', '{$_POST['description8']}', '{$_POST['link8']}', 
				'{$_POST['name9']}', '{$_POST['description9']}', '{$_POST['link9']}', 
				'{$_POST['name10']}', '{$_POST['description10']}', '{$_POST['link10']}', 
				'{$created}')";
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
			$filePath 		= '../assets/images/product/cover/' . $product_id . '/';
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

				$sql = "UPDATE tbl_product SET img_cover1 = '{$file_name}' WHERE id = '{$product_id}'";
				query($sql);
			}
		}

		if(!empty($_FILES['covImg2']))
		{
			$file_name		= $_FILES['covImg2']["name"];
			$file_name		= preg_replace('/[^\w\._]+/', '_', $file_name);
			$filePath 		= '../assets/images/product/cover/' . $product_id . '/';
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

			$moved = move_uploaded_file($_FILES['covImg2']["tmp_name"], $file_path);

			if($moved)
			{
				$originalFile 	= $file_path;
				$targetFile 	= $file_path;

				$sql = "UPDATE tbl_product SET img_cover2 = '{$file_name}' WHERE id = '{$product_id}'";
				query($sql);
			}
		}

		if(!empty($_FILES['covImg3']))
		{
			$file_name		= $_FILES['covImg3']["name"];
			$file_name		= preg_replace('/[^\w\._]+/', '_', $file_name);
			$filePath 		= '../assets/images/product/cover/' . $product_id . '/';
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

			$moved = move_uploaded_file($_FILES['covImg3']["tmp_name"], $file_path);

			if($moved)
			{
				$originalFile 	= $file_path;
				$targetFile 	= $file_path;

				$sql = "UPDATE tbl_product SET img_cover3 = '{$file_name}' WHERE id = '{$product_id}'";
				query($sql);
			}
		}

		if(!empty($_FILES['covImg4']))
		{
			$file_name		= $_FILES['covImg4']["name"];
			$file_name		= preg_replace('/[^\w\._]+/', '_', $file_name);
			$filePath 		= '../assets/images/product/cover/' . $product_id . '/';
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

			$moved = move_uploaded_file($_FILES['covImg4']["tmp_name"], $file_path);

			if($moved)
			{
				$originalFile 	= $file_path;
				$targetFile 	= $file_path;

				$sql = "UPDATE tbl_product SET img_cover4 = '{$file_name}' WHERE id = '{$product_id}'";
				query($sql);
			}
		}

		if(!empty($_FILES['covImg5']))
		{
			$file_name		= $_FILES['covImg5']["name"];
			$file_name		= preg_replace('/[^\w\._]+/', '_', $file_name);
			$filePath 		= '../assets/images/product/cover/' . $product_id . '/';
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

			$moved = move_uploaded_file($_FILES['covImg5']["tmp_name"], $file_path);

			if($moved)
			{
				$originalFile 	= $file_path;
				$targetFile 	= $file_path;

				$sql = "UPDATE tbl_product SET img_cover5 = '{$file_name}' WHERE id = '{$product_id}'";
				query($sql);
			}
		}

		if(!empty($_FILES['covImg6']))
		{
			$file_name		= $_FILES['covImg6']["name"];
			$file_name		= preg_replace('/[^\w\._]+/', '_', $file_name);
			$filePath 		= '../assets/images/product/cover/' . $product_id . '/';
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

			$moved = move_uploaded_file($_FILES['covImg6']["tmp_name"], $file_path);

			if($moved)
			{
				$originalFile 	= $file_path;
				$targetFile 	= $file_path;

				$sql = "UPDATE tbl_product SET img_cover6 = '{$file_name}' WHERE id = '{$product_id}'";
				query($sql);
			}
		}

		if(!empty($_FILES['covImg7']))
		{
			$file_name		= $_FILES['covImg7']["name"];
			$file_name		= preg_replace('/[^\w\._]+/', '_', $file_name);
			$filePath 		= '../assets/images/product/cover/' . $product_id . '/';
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

			$moved = move_uploaded_file($_FILES['covImg7']["tmp_name"], $file_path);

			if($moved)
			{
				$originalFile 	= $file_path;
				$targetFile 	= $file_path;

				$sql = "UPDATE tbl_product SET img_cover7 = '{$file_name}' WHERE id = '{$product_id}'";
				query($sql);
			}
		}

		if(!empty($_FILES['covImg8']))
		{
			$file_name		= $_FILES['covImg8']["name"];
			$file_name		= preg_replace('/[^\w\._]+/', '_', $file_name);
			$filePath 		= '../assets/images/product/cover/' . $product_id . '/';
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

			$moved = move_uploaded_file($_FILES['covImg8']["tmp_name"], $file_path);

			if($moved)
			{
				$originalFile 	= $file_path;
				$targetFile 	= $file_path;

				$sql = "UPDATE tbl_product SET img_cover8 = '{$file_name}' WHERE id = '{$product_id}'";
				query($sql);
			}
		}

		if(!empty($_FILES['covImg9']))
		{
			$file_name		= $_FILES['covImg9']["name"];
			$file_name		= preg_replace('/[^\w\._]+/', '_', $file_name);
			$filePath 		= '../assets/images/product/cover/' . $product_id . '/';
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

			$moved = move_uploaded_file($_FILES['covImg9']["tmp_name"], $file_path);

			if($moved)
			{
				$originalFile 	= $file_path;
				$targetFile 	= $file_path;

				$sql = "UPDATE tbl_product SET img_cover9 = '{$file_name}' WHERE id = '{$product_id}'";
				query($sql);
			}
		}

		if(!empty($_FILES['covImg10']))
		{
			$file_name		= $_FILES['covImg10']["name"];
			$file_name		= preg_replace('/[^\w\._]+/', '_', $file_name);
			$filePath 		= '../assets/images/product/cover/' . $product_id . '/';
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

			$moved = move_uploaded_file($_FILES['covImg10']["tmp_name"], $file_path);

			if($moved)
			{
				$originalFile 	= $file_path;
				$targetFile 	= $file_path;

				$sql = "UPDATE tbl_product SET img_cover10 = '{$file_name}' WHERE id = '{$product_id}'";
				query($sql);
			}
		}

	}

	return $added;
}

function product_edit() {
	$update_date 	= date('Y-m-d H:i:s');
	$product_id 	= $_POST['product_id'];

	$sql = "UPDATE tbl_product
			SET name1 = '{$_POST['name']}', short_desc = '{$_POST['short_desc']}', desc1 = '{$_POST['description']}', categories = '{$_POST['categories']}', sub_categories = '{$_POST['sub_cate']}', link1 = '{$_POST['link_pdf']}', 
			name2 = '{$_POST['name2']}', desc2 = '{$_POST['description2']}', link2 = '{$_POST['link_pdf2']}', 
			name3 = '{$_POST['name3']}', desc3 = '{$_POST['description3']}', link3 = '{$_POST['link_pdf3']}', 
			name4 = '{$_POST['name4']}', desc4 = '{$_POST['description4']}', link4 = '{$_POST['link_pdf4']}',
			name5 = '{$_POST['name5']}', desc5 = '{$_POST['description5']}', link5 = '{$_POST['link_pdf5']}',
			name6 = '{$_POST['name6']}', desc6 = '{$_POST['description6']}', link6 = '{$_POST['link_pdf6']}',
			name7 = '{$_POST['name7']}', desc7 = '{$_POST['description7']}', link7 = '{$_POST['link_pdf7']}', 
			name8 = '{$_POST['name8']}', desc8 = '{$_POST['description8']}', link8 = '{$_POST['link_pdf8']}', 
			name9 = '{$_POST['name9']}', desc9 = '{$_POST['description9']}', link9 = '{$_POST['link_pdf9']}', 
			name10 = '{$_POST['name10']}', desc10 = '{$_POST['description10']}', link10 = '{$_POST['link_pdf10']}',  
			update_date = '{$update_date}'
			WHERE id = '{$product_id}'";
	// exit;
	$updated = query($sql);

	if(!empty($updated))
	{
		global $db_connected;

		if(!empty($_FILES['covImg']))
		{
			$file_name		= $_FILES['covImg']["name"];
			$file_name		= preg_replace('/[^\w\._]+/', '_', $file_name);
			$filePath 		= '../assets/images/product/cover/' . $product_id . '/';
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
				$sql = "UPDATE tbl_product SET img_cover1 = '{$file_name}' WHERE id = '{$product_id}'";
				query($sql);
			}
		}

		if(!empty($_FILES['covImg2']))
		{
			$file_name		= $_FILES['covImg2']["name"];
			$file_name		= preg_replace('/[^\w\._]+/', '_', $file_name);
			$filePath 		= '../assets/images/product/cover/' . $product_id . '/';
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

			$moved = move_uploaded_file($_FILES['covImg2']["tmp_name"], $file_path);

			if($moved)
			{
				/*$originalFile 	= $file_path;
				$targetFile 	= $file_path;

				resizeImg( $originalFile, $targetFile, $file_extension, 1000, 1000 );*/
				$sql = "UPDATE tbl_product SET img_cover2 = '{$file_name}' WHERE id = '{$product_id}'";
				query($sql);
			}
		}
		
		if(!empty($_FILES['covImg3']))
		{
			$file_name		= $_FILES['covImg3']["name"];
			$file_name		= preg_replace('/[^\w\._]+/', '_', $file_name);
			$filePath 		= '../assets/images/product/cover/' . $product_id . '/';
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

			$moved = move_uploaded_file($_FILES['covImg3']["tmp_name"], $file_path);

			if($moved)
			{
				/*$originalFile 	= $file_path;
				$targetFile 	= $file_path;

				resizeImg( $originalFile, $targetFile, $file_extension, 1000, 1000 );*/
				$sql = "UPDATE tbl_product SET img_cover3 = '{$file_name}' WHERE id = '{$product_id}'";
				query($sql);
			}
		}

		if(!empty($_FILES['covImg4']))
		{
			$file_name		= $_FILES['covImg4']["name"];
			$file_name		= preg_replace('/[^\w\._]+/', '_', $file_name);
			$filePath 		= '../assets/images/product/cover/' . $product_id . '/';
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

			$moved = move_uploaded_file($_FILES['covImg4']["tmp_name"], $file_path);

			if($moved)
			{
				/*$originalFile 	= $file_path;
				$targetFile 	= $file_path;

				resizeImg( $originalFile, $targetFile, $file_extension, 1000, 1000 );*/
				$sql = "UPDATE tbl_product SET img_cover4 = '{$file_name}' WHERE id = '{$product_id}'";
				query($sql);
			}
		}

		if(!empty($_FILES['covImg5']))
		{
			$file_name		= $_FILES['covImg5']["name"];
			$file_name		= preg_replace('/[^\w\._]+/', '_', $file_name);
			$filePath 		= '../assets/images/product/cover/' . $product_id . '/';
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

			$moved = move_uploaded_file($_FILES['covImg5']["tmp_name"], $file_path);

			if($moved)
			{
				/*$originalFile 	= $file_path;
				$targetFile 	= $file_path;

				resizeImg( $originalFile, $targetFile, $file_extension, 1000, 1000 );*/
				$sql = "UPDATE tbl_product SET img_cover5 = '{$file_name}' WHERE id = '{$product_id}'";
				query($sql);
			}
		}

		if(!empty($_FILES['covImg6']))
		{
			$file_name		= $_FILES['covImg6']["name"];
			$file_name		= preg_replace('/[^\w\._]+/', '_', $file_name);
			$filePath 		= '../assets/images/product/cover/' . $product_id . '/';
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

			$moved = move_uploaded_file($_FILES['covImg6']["tmp_name"], $file_path);

			if($moved)
			{
				/*$originalFile 	= $file_path;
				$targetFile 	= $file_path;

				resizeImg( $originalFile, $targetFile, $file_extension, 1000, 1000 );*/
				$sql = "UPDATE tbl_product SET img_cover6 = '{$file_name}' WHERE id = '{$product_id}'";
				query($sql);
			}
		}

		if(!empty($_FILES['covImg7']))
		{
			$file_name		= $_FILES['covImg7']["name"];
			$file_name		= preg_replace('/[^\w\._]+/', '_', $file_name);
			$filePath 		= '../assets/images/product/cover/' . $product_id . '/';
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

			$moved = move_uploaded_file($_FILES['covImg7']["tmp_name"], $file_path);

			if($moved)
			{
				/*$originalFile 	= $file_path;
				$targetFile 	= $file_path;

				resizeImg( $originalFile, $targetFile, $file_extension, 1000, 1000 );*/
				$sql = "UPDATE tbl_product SET img_cover7 = '{$file_name}' WHERE id = '{$product_id}'";
				query($sql);
			}
		}

		if(!empty($_FILES['covImg8']))
		{
			$file_name		= $_FILES['covImg8']["name"];
			$file_name		= preg_replace('/[^\w\._]+/', '_', $file_name);
			$filePath 		= '../assets/images/product/cover/' . $product_id . '/';
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

			$moved = move_uploaded_file($_FILES['covImg8']["tmp_name"], $file_path);

			if($moved)
			{
				/*$originalFile 	= $file_path;
				$targetFile 	= $file_path;

				resizeImg( $originalFile, $targetFile, $file_extension, 1000, 1000 );*/
				$sql = "UPDATE tbl_product SET img_cover8 = '{$file_name}' WHERE id = '{$product_id}'";
				query($sql);
			}
		}

		if(!empty($_FILES['covImg9']))
		{
			$file_name		= $_FILES['covImg9']["name"];
			$file_name		= preg_replace('/[^\w\._]+/', '_', $file_name);
			$filePath 		= '../assets/images/product/cover/' . $product_id . '/';
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

			$moved = move_uploaded_file($_FILES['covImg9']["tmp_name"], $file_path);

			if($moved)
			{
				/*$originalFile 	= $file_path;
				$targetFile 	= $file_path;

				resizeImg( $originalFile, $targetFile, $file_extension, 1000, 1000 );*/
				$sql = "UPDATE tbl_product SET img_cover9 = '{$file_name}' WHERE id = '{$product_id}'";
				query($sql);
			}
		}

		if(!empty($_FILES['covImg10']))
		{
			$file_name		= $_FILES['covImg10']["name"];
			$file_name		= preg_replace('/[^\w\._]+/', '_', $file_name);
			$filePath 		= '../assets/images/product/cover/' . $product_id . '/';
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

			$moved = move_uploaded_file($_FILES['covImg10']["tmp_name"], $file_path);

			if($moved)
			{
				/*$originalFile 	= $file_path;
				$targetFile 	= $file_path;

				resizeImg( $originalFile, $targetFile, $file_extension, 1000, 1000 );*/
				$sql = "UPDATE tbl_product SET img_cover10 = '{$file_name}' WHERE id = '{$product_id}'";
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

function service_detail($id)
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

function service_add() {
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
			$filePath 		= '../assets/images/service/' . $service_id


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

	$sql = "UPDATE tbl_service
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
			$filePath 		= '../assets/images/service/' . $service_id . '/';
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
				$sql = "UPDATE tbl_service SET img_cover = '{$file_name}' WHERE id = '{$service_id}'";
				query($sql);
			}
		}
	}

	return $updated;
}

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

