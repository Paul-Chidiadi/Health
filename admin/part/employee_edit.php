<?php
	include 'session.php';

	if(isset($_POST['edit'])){
		$emp_id = $_POST['edit_emp_id'];
		$name = $_POST['edit_emp_name'];
		$location = $_POST['edit_emp_location'];
		$phone = $_POST['edit_emp_phone'];
		$salary = $_POST['edit_emp_salary'];
		$gender = $_POST['edit_emp_gender'];
		
		$sql = "UPDATE employees SET name = '$name', location = '$location', phone = '$phone', salary = '$salary', gender = '$gender' WHERE emp_id = '$emp_id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Employee updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Select employee to edit first';
	}

	header('location: ../employee.php');
?>