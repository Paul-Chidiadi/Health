<?php
	include 'session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['timeid'];
		$time_in = $_POST['edit_time_in'];
		$time_in = date('H:i:s', strtotime($time_in));
		$check1 = $_POST['edit_check1'];
		$check1 = date('H:i:s', strtotime($check1));
		$check2 = $_POST['edit_check2'];
		$check2 = date('H:i:s', strtotime($check2));
		$time_out = $_POST['edit_time_out'];
		$time_out = date('H:i:s', strtotime($time_out));

		$sql = "UPDATE work_hours SET time_in = '$time_in', checkin_1 = '$check1', checkin_2 = '$check2', time_out = '$time_out' WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Work-Hours updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location: ../schedule.php');

?>