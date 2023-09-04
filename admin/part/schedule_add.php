<?php
	include 'session.php';

	if(isset($_POST['add'])){
		$time_in = $_POST['time_in'];
		$time_in = date('H:i:s', strtotime($time_in));
		$check1 = $_POST['check1'];
		$check1 = date('H:i:s', strtotime($check1));
		$check2 = $_POST['check2'];
		$check2 = date('H:i:s', strtotime($check2));
		$time_out = $_POST['time_out'];
		$time_out = date('H:i:s', strtotime($time_out));

		$sql = "INSERT INTO work_hours (time_in, checkin_1, checkin_2, time_out) VALUES ('$time_in', '$check1', '$check2', '$time_out')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Work-Hours added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: ../schedule.php');

?>