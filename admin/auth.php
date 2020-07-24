<?php 
if(!check_login())
{
	header('location: logout.php');
	exit;
}
?>