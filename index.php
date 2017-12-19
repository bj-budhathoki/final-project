<?php
session_start();
if(!isset($_SESSION['user'])){
 require_once 'core/init.php';
 include 'includes/header.php';
 include 'includes/nav.php';
 include 'includes/content.php';
 include 'includes/footer.php';
}else{
	header("Location:welcome.php");
}
?>
