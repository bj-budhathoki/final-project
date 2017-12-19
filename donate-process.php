<?php require_once 'core/init.php';?>
<?php
	if(isset($_POST['donate']))
	{
		$uname=$_POST['name'];
		$address=$_POST['address'];
		$phone=$_POST['phone'];
		$email=$_POST['email'];
		if($_FILES)
		{
			$errors= array();
			$photo=$_FILES['photo'];
			$name=$photo['name'];
			$nameArray=explode('.',$name);
			$fileName=$nameArray[0];
			$fileExt=$nameArray[1];
			$mine=explode('/',$photo['type']);
			$mineType=$mine[0];
			$mineExt=$mine[1];
			$filesize=$photo['size'];
			$tempLoc=$photo['tmp_name'];
			$allowed=Array('png','jpg','jpeg','gif');
			$uploadName=md5(microtime()).'.'.$fileExt;
			$uploadPath='images/donators/'.$uploadName;
			$dbpath=$uploadName;
			if($mineType != 'image')
			{
				$errors[].="the file must be images";

			}
			if(!in_array($fileExt, $allowed))
			{
				$errors[].="file extention must be in png,jpg, gif,jpeg";
			}
			if($filesize> 250000)
			{
				$errors[].="file must be under 25mb.";
			}
			if(!empty($errors))
			{
				echo" file error";
				
			}else{
				move_uploaded_file($tempLoc, $uploadPath);
				$sql="INSERT INTO tbl_blood_donators(name,address,phone,photo,email) VALUES('$uname','$address','$phone','$dbpath','$email')";
				if(mysqli_query($conn,$sql)){
					header('Location:blood-donors-list.php');
					
				}else{
					echo "some error".mysqli_connect_error();
				}
				
			}
		}else{echo"failed";}
	}else{
		echo"connecting error";
	}
?>