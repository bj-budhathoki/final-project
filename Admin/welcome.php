<?php
session_start();
include '../core/init.php';
 if(!isset($_SESSION['user'])){
 	echo"someting wrong";
 }else{
 include 'includes/header.php';
 include 'includes/main-nav.php';
 include 'includes/sidebar.php';
 include 'includes/content.php';
 include 'includes/footer.php';
 }

?>
