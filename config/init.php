<?php 
require_once 'database.conf.php';
$db_config  = $config['database'][$config['database']['connect_type']];
$db_connected = mysqli_connect($db_config['host'], $db_config['username'], $db_config['password'], $db_config['database_name']);

mysqli_set_charset($db_connected, $config['database']['charset']);

if ( isset( $_POST['is_login'] ) ) {

	$password = md5( $_POST['password'] );
	$sql = "
		select *
		from tbl_admin
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
		$query_resource	= mysqli_query($db_connected, $command_sql);
	}
	
	if(preg_match('/^\s*(select)\s*/i', $command_sql))
	{
		if(!empty($query_resource))
		{
			$i		= 0;
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

function slide_list()
{
	$sql = "SELECT *
			FROM tbl_slide
			WHERE is_active = '1'
			ORDER BY id ASC";

	return query($sql);
}

function categories_list()
{
	$sql = "SELECT *
			FROM tbl_categories
			WHERE is_active = '1'
			ORDER BY categories_id ASC";

	return query($sql);
}

function categories_detail($id)
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

function product_total($category_id = '')
{
	$wheres[] = "is_active = '1'";

	if (!empty($category_id)) {
		$wheres[] = "categories = '{$category_id}'";
	}
	
	$where	= (!empty($wheres)) ? 'WHERE ' . implode(' AND ', $wheres) : null;

	$sql	= "SELECT count(1) AS counter
				FROM tbl_product
				{$where}
	";

	$result = query($sql);
	
	return (!empty($result)) ? current($result) : false;
}

function product_list()
{

	$page	= (!empty($_GET['page'])) ? $_GET['page'] : 1;
	$limit 	= 12;
	$start 	= ($page * $limit) - $limit;

	if (!empty($_GET['id'])) {
		$wheres[] = "p.categories = '{$_GET['id']}'";
	}

	$wheres[] = "p.is_active = '1'";

	$where	= (!empty($wheres)) ? 'WHERE ' . implode(' AND ', $wheres) : null;

	$sql = "SELECT p.*, c.categories_name
			FROM tbl_product p
			INNER JOIN tbl_categories c ON c.categories_id = p.categories
			{$where}
			ORDER BY create_date ASC
			LIMIT {$start},{$limit}";

	return query($sql);
}

function product_img_list($id = '')
{
	if (!empty($id)) {
		$wheres[] = "product_id = '{$id}'";
	}

	$where	= (!empty($wheres)) ? 'WHERE ' . implode('AND ', $wheres) : null;

	$sql = "SELECT *
			FROM tbl_product_image
			{$where}
			ORDER BY order_id ASC";

	return query($sql);
}

function product_random_list($cateID = '')
{
	if (!empty($_GET['cateID'])) {
		$wheres[] = "p.categories = '{$_GET['cateID']}'";
	}

	$wheres[] = "p.is_active = '1'";

	$where	= (!empty($wheres)) ? 'WHERE ' . implode(' AND ', $wheres) : null;

	$sql = "SELECT p.*, c.categories_name
			FROM tbl_product p
			INNER JOIN tbl_categories c ON c.categories_id = p.categories
			{$where}
			ORDER BY RAND()
			LIMIT 4";

	return query($sql);
}

function product_index_list()
{
	if (!empty($_GET['cateID'])) {
		$wheres[] = "p.categories = '{$_GET['cateID']}'";
	}

	$wheres[] = "p.is_active = '1'";

	$where	= (!empty($wheres)) ? 'WHERE ' . implode(' AND ', $wheres) : null;

	$sql = "SELECT p.*, c.categories_name
			FROM tbl_product p
			INNER JOIN tbl_categories c ON c.categories_id = p.categories
			{$where}
			ORDER BY p.id DESC
			LIMIT 9";

	return query($sql);
}

function product_detail($id = '')
{	
	if (!empty($id)) {
		$wheres[] = "p.id = '{$id}'";
	}
	
	$where	= (!empty($wheres)) ? 'WHERE ' . implode(' AND ', $wheres) : null;

	$sql	= "SELECT p.*, c.categories_name
				FROM tbl_product p
				INNER JOIN tbl_categories c ON c.categories_id = p.categories
				{$where}
				LIMIT 1";
	
	$result = query($sql);

	return (!empty($result)) ? current($result) : false;
}




function service_list()
{
	$sql = "SELECT *
			FROM tbl_service
			WHERE is_active = '1'
			ORDER BY id ASC
			LIMIT 2";

	return query($sql);
}
function customer_list()
{
	$sql = "SELECT * FROM tbl_user ";

	return query($sql);
}

function service_main_list()
{
	$page	= (!empty($_GET['page'])) ? $_GET['page'] : 1;
	$limit 	= 4;
	$start 	= ($page * $limit) - $limit;

	$sql = "SELECT *
			FROM tbl_service
			WHERE is_active = '1'
			ORDER BY id ASC
			LIMIT {$start},{$limit}";

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



function service_total()
{
	$wheres[] = "is_active = '1'";
	
	$where	= (!empty($wheres)) ? 'WHERE ' . implode(' AND ', $wheres) : null;

	$sql	= "SELECT count(1) AS counter
				FROM tbl_service
				{$where}
	";

	$result = query($sql);
	
	return (!empty($result)) ? current($result) : false;
}

function pagination( $total, $limit = 12 )
{
	$page 	= ( !empty($_GET['page']) ) ? $_GET['page'] : 1;
	$total 	= ceil( $total / $limit );
	$prev 	= $page - 1;
	$next 	= $page + 1;

	return array(
		'total'		=> $total
		,'page'		=> $page
		,'prev'		=> $prev
		,'next'		=> $next
	);
}

?>

