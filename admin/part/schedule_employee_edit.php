<?php
	include 'session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['scheduleid'];
		$name = $_POST['edit_emp_name'];
		$days_off = $_POST['edit_days_off'];
		$no_daysoff = $_POST['edit_no_daysoff'];
		$no_dayson= $_POST['edit_no_dayson'];
		$total_days = $_POST['edit_total_days'];
		$month = $_POST['edit_month'];
		
		$sql = "UPDATE schedule SET name = '$name', days_off = '$days_off', no_daysoff = '$no_daysoff', no_dayson = '$no_dayson', total_days = '$total_days', month = '$month' WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Schedule updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Select schedule to edit first';
	}

	header('location: ../schedule_employee.php');
?>