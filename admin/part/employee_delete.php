<?php
	include 'session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['del_emp_id'];
		$sql = "DELETE FROM employees WHERE emp_id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Employee deleted successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Select item to delete first';
	}

	header('location: ../employee.php');
	
?>