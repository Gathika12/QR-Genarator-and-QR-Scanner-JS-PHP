 <?php include_once('../config/config.php'); 
if(isset($_POST['submit'])){
	$stuid = $_POST['stuid']; 
	$first_name = $_POST['first_name']; 
	$last_name = $_POST['last_name']; 
	$email = $_POST['email']; 
	$grade = $_POST['grade'];
	$profile = $_FILES['profile_picture']['name']; 
	$temp_profile = $_FILES['profile_picture']['tmp_name']; 
	$todays_date = date('Ymd').time();
	$profile_folder = "../uploads/".$todays_date.$profile;

	$insert = "INSERT INTO `user`(`stuid`,`first_name`, `last_name`, `email`, `grade`, `profile_picture`) 
	VALUES ('".$stuid."','".$first_name."','".$last_name."','".$email."','".$grade."','".$profile_folder."')";
$res = mysqli_query($conn,$insert);
if($res){
	move_uploaded_file($temp_profile, $profile_folder);

	//echo "Inserted";
	header("location:../index.php");

}
else{
	echo "fail";

}

	
}

 ?>
