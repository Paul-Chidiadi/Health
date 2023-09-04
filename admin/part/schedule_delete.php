<?php
	include 'session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['del_timeid'];
		$sql = "DELETE FROM work_hours WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Work-Hours deleted successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Select item to delete first';
	}

	header('location: ../schedule.php');
	
?>