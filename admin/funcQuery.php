<?php
require_once '../config/database.conf.php';
$db_config  = $config['database'][$config['database']['connect_type']];
$db_connected = mysqli_connect($db_config['host'], $db_config['username'], $db_config['password'], $db_config['database_name']);

mysqli_set_charset($db_connected, $config['database']['charset']);

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

function ip_address()
{
	$client  = @$_SERVER['HTTP_CLIENT_IP'];
	$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
	$remote  = $_SERVER['REMOTE_ADDR'];

	if(filter_var($client, FILTER_VALIDATE_IP))
	{
	    $ip = $client;
	}
	elseif(filter_var($forward, FILTER_VALIDATE_IP))
	{
	    $ip = $forward;
	}
	else
	{
	    $ip = $remote;
	}

	return $ip;
}


if ( $_POST['action'] == 'changeSts' ) {
	$id 		= $_POST['sid'];
	$status 	= $_POST['st'];
	$wheres[] 	= "id = '{$id}'";
	$where		= (!empty($wheres)) ? 'WHERE ' . implode('AND ', $wheres) : null;

	$sql	= "UPDATE tbl_slide
				SET is_recommend = '{$status}'
				{$where}";

	$result = query($sql);

	if ($result) {
		echo 'true';
	} else {
		echo 'false';
	}
}

if ( $_POST['action'] == 'delSlide' ) {
	$sql = "UPDATE tbl_slide SET is_active = '0' WHERE id = {$_POST['sid']}";
	$result = query($sql);

	if ($result) {
		echo 'true';
	} else {
		echo 'false';
	}
}

if ( $_POST['action'] == 'changeStpm' ) {
	$id 		= $_POST['pid'];
	$status 	= $_POST['st'];
	$wheres[] 	= "id = '{$id}'";
	$where		= (!empty($wheres)) ? 'WHERE ' . implode('AND ', $wheres) : null;

	$sql	= "UPDATE tbl_product
				SET is_recommend = '{$status}'
				{$where}";

	$result = query($sql);

	if ($result) {
		echo 'true';
	} else {
		echo 'false';
	}
}

if ( $_POST['action'] == 'delProduct' ) {
	$sql = "UPDATE tbl_product SET is_active = '0' WHERE id = {$_POST['pid']}";
	$result = query($sql);

	if ($result) {
		echo 'true';
	} else {
		echo 'false';
	}
}

if ( $_POST['action'] == 'changeStse' ) {
	$id 		= $_POST['sid'];
	$status 	= $_POST['st'];
	$wheres[] 	= "id = '{$id}'";
	$where		= (!empty($wheres)) ? 'WHERE ' . implode('AND ', $wheres) : null;

	$sql	= "UPDATE tbl_service
				SET is_recommend = '{$status}'
				{$where}";

	$result = query($sql);

	if ($result) {
		echo 'true';
	} else {
		echo 'false';
	}
}

if ( $_POST['action'] == 'delService' ) {
	$sql = "UPDATE tbl_service SET is_active = '0' WHERE id = {$_POST['pid']}";
	$result = query($sql);

	if ($result) {
		echo 'true';
	} else {
		echo 'false';
	}
}

if ( $_POST['action'] == 'changeStv' ) {
	$id 		= $_POST['vid'];
	$status 	= $_POST['st'];
	$wheres[] 	= "id = '{$id}'";
	$where		= (!empty($wheres)) ? 'WHERE ' . implode('AND ', $wheres) : null;

	$sql	= "UPDATE tbl_video
				SET is_recommend = '{$status}'
				{$where}";

	$result = query($sql);

	if ($result) {
		echo 'true';
	} else {
		echo 'false';
	}
}

if ( $_POST['action'] == 'delVideo' ) {
	$sql = "UPDATE tbl_video SET is_active = '0' WHERE id = {$_POST['vid']}";
	$result = query($sql);

	if ($result) {
		echo 'true';
	} else {
		echo 'false';
	}
}


if ( $_POST['action'] == 'delCustomer' ) {
	$sql = "UPDATE tbl_user SET is_active = '0' WHERE id = {$_POST['cid']}";
	$result = query($sql);

	if ($result) {
		echo 'true';
	} else {
		echo 'false';
	}
}



?>