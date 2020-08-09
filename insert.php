<?php 

include('dbConnection.php'); 

$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data, true);
$id = $mydata['id'];
$name = $mydata['name'];
$email = $mydata['email'];
$password = $mydata['password'];


if(!empty($name) && !empty($email) && !empty($password)) {
	$sql = "INSERT INTO student(id, name, email, password) VALUES('$id','$name', '$email', '$password') ON DUPLICATE KEY
	UPDATE name='$name', email='$email', password='$password'";
	if($conn->query($sql) == TRUE) {
		echo "<div class='alert alert-success col-sm-6 mt-3'>
			Student Data Successfully
		</div>";
	} else {
		echo "<div class='alert alert-danger col-sm-6 mt-3'>
			Unable to insert data
		</div>";
	}
} else {
	echo "<div class='alert alert-warning col-sm-6 mt-3'>
			Fill All Fields
		</div>";
}
?>