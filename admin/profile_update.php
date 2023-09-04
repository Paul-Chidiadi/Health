<?php
	include 'includes/session.php';

	if(isset($_GET['return'])){
		$return = $_GET['return'];
		
	}
	else{
		$return = 'home.php';
	}

	if(isset($_POST['save'])){
		$curr_password = $_POST['curr_password'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$photo = $_FILES['photo']['name'];
		if($curr_password === $user['password']){
			if(!empty($photo)){
				$filename = $photo;
				$move = 'uploads/'.$photo;
				$tmpName = $_FILES['photo']['tmp_name'];
				$sql = "UPDATE admin SET username = '$username', password = '$password', firstname = '$firstname', lastname = '$lastname', photo = '$filename' WHERE id = '".$user['id']."'";
				if($conn->query($sql)){
					move_uploaded_file($tmpName, $move);
					$_SESSION['success'] = 'Admin profile updated successfully';
				}
				else{
					$_SESSION['error'] = $conn->error;
				}
					
			}
			else{
				// $filename = $user['photo'];
				$_SESSION['error'] = 'Upload Image';
			}
		}
		else{
			$_SESSION['error'] = 'Incorrect password';
		}
	}
	else{
		$_SESSION['error'] = 'Fill up required details first';
	}

	header('location:'.$return);

?>