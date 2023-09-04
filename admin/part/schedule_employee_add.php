<?php
	include 'session.php';

	if(isset($_POST['add'])){
		$emp_id = $_POST['emp_id'];
		$name = $_POST['emp_name'];
		$days_off = $_POST['days_off'];
		$no_daysoff = $_POST['no_daysoff'];
		$no_dayson= $_POST['no_dayson'];
		$total_days = $_POST['total_days'];
		$month = $_POST['month'];
		
		$sql = "INSERT INTO schedule (emp_id, name, days_off, no_daysoff, no_dayson, total_days, month) VALUES ('$emp_id', '$name', '$days_off', '$no_daysoff', '$no_dayson', '$total_days', '$month')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Schedule added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Input schedule to edit first';
	}

	header('location: ../schedule_employee.php');
?>