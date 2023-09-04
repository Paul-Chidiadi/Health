<?php
	include 'session.php';

	if(isset($_POST['add'])){
		$name = $_POST['emp_name'];
		$location = $_POST['emp_location'];
		$phone = $_POST['emp_phone'];
		$salary = $_POST['emp_salary'];
		$gender = $_POST['emp_gender'];

		//creating employeeid
		$code = "1234567890ABCDEFGHIJ";
		$code = str_shuffle($code);
		$verify_code = substr($code, 0, 4);
		$emp_id = 'PHE-'.$verify_code;

		$sql = "INSERT INTO employees (emp_id, name, location, phone, salary, gender) VALUES ('$emp_id', '$name', '$location', '$phone', '$salary', '$gender')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Employee added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: ../employee.php');
?>