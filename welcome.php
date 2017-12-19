<?php session_start();?>
<style>
.section-notFound{
	background-image: url('images/404.jpg');
	width: 100%;
	height: 100%;
}
</style>
<?php

if(!isset($_SESSION['user'])){	
echo'<section class="section-notFound">page not found
</section>';
}else{
 require_once 'core/init.php';
 include 'includes/header.php';
 include 'includes/welcome_nav.php';
include 'includes/welcome_content.php';
 include 'includes/footer.php';

}
