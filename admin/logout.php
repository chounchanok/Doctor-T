<?php 
require_once 'init.php'; 
session_destroy();
header('location: login.php');
?>