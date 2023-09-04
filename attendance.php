<?php
	include 'conn.php';
	
	if(isset($_POST['employee'])){

		include 'timezone.php';
		// include 'location.php';

		$employee = $_POST['employee'];
		$status = $_POST['status'];
		$date_now = date('Y-m-d');
		$get_loc = 'ifite'; #WRITE SCRIPT FOR GETTING EMPLOYEES CURRENT LOCATION

		#CHECK IF EMPLOYEE ID EXISTS
		$sql1 = "SELECT * FROM employees WHERE emp_id = '$employee'";
		$query1 = $conn->query($sql1);

		#check if user has timed in
		$timein = "SELECT * FROM attendance WHERE emp_id = '$employee' AND date = '$date_now' AND time_in != ''";
		$tin = $conn->query($timein);

		#check if user has done check in 1
		$checkin1 = "SELECT * FROM attendance WHERE emp_id = '$employee' AND date = '$date_now' AND check_one != ''";
		$cin1 = $conn->query($checkin1);

		#check if user has done check in 2
		$checkin2 = "SELECT * FROM attendance WHERE emp_id = '$employee' AND date = '$date_now' AND check_two != ''";
		$cin2 = $conn->query($checkin2);

		#check if user has timed out
		$timeout = "SELECT * FROM attendance WHERE emp_id = '$employee' AND date = '$date_now' AND time_out != ''";
		$tout = $conn->query($timeout);

		if($query1->num_rows > 0){
			$row1 = $query1->fetch_assoc();
			$location = $row1['location']; #get employees location from database
			$name = $row1['name']; #get employees name from database
			if($get_loc === $location){
				#FOR TIME IN
				if($status === 'in'){
					if($tin->num_rows > 0){
						echo 'You have timed in for today';
					}
					else{
						echo "face.php?status=in&name=$name&emp_id=$employee";
					}
				#FOR CHECKIN ONE
				}else if($status === 'check1'){
					if($tin->num_rows > 0){
						if($cin1->num_rows > 0){
							echo 'You have done the first Check In for today.';
						} else {
							echo "face.php?status=checkin1&name=$name&emp_id=$employee";
						}
					}else {
						echo 'You have not Timed in! Time in first.';
					}
				#FOR CHECKIN TWO
				}else if($status === 'check2'){
					if($cin1->num_rows > 0){
						if($cin2->num_rows > 0){
							echo 'You have done the second Check In for today.';
						} else {
							echo "face.php?status=checkin2&name=$name&emp_id=$employee";
						}
					} else {
						echo 'You have not done CHECK IN 1!';
					}
				#FOR TIME OUT
				}else if($status === 'out'){
					if($cin2->num_rows > 0){
						if($tout->num_rows > 0){
							echo 'You have timed out for today.';
						} else {
							echo "face.php?status=out&name=$name&emp_id=$employee";
						}
					} else {
						echo 'You have not done CHECK IN 2!';
					}
				}
			}
			else{
				echo 'You are at the wrong Location! Go to work';
			}
		}
		else{
			echo 'Employee ID not found';
		}
		
	}

	if(isset($_POST['insert'])){
		$status = $_POST['status'];
		$emp_id = $_POST['emp_id'];
		$emp_name = $_POST['emp_name'];
		$date_now = date('Y-m-d');
		$time = date('H:i:s');

		#GET MONTH SCRIPT
		$monthArray = array("JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC");
		$monthNum = date("n");
		$month_real_number = $monthNum - 1;
		$month = $monthArray[$month_real_number];

		if($status === "in") {
			$sql = "INSERT INTO attendance (emp_id, name, time_in, date, month) VALUES ('$emp_id', '$emp_name', '$time', '$date_now', '$month')";
			if($conn->query($sql)){
				echo 'Successful';
			}
			else{
				echo "Failed";
			}
		}else if($status === "checkin1") {
			$sql = "UPDATE attendance SET check_one = '$time' WHERE emp_id = '$emp_id' AND date = '$date_now'";
			if($conn->query($sql)){
				echo 'Successful';
			}
			else{
				echo "Failed";
			}
		}else if($status === "checkin2") {
			$sql = "UPDATE attendance SET check_two = '$time' WHERE emp_id = '$emp_id' AND date = '$date_now'";
			if($conn->query($sql)){
				echo 'Successful';
			}
			else{
				echo "Failed";
			}
		}else if($status === "out") {
			$sql = "UPDATE attendance SET time_out = '$time' WHERE emp_id = '$emp_id' AND date = '$date_now'";
			if($conn->query($sql)){
				echo 'Successful';
			}
			else{
				echo "Failed";
			}
		}

	}


?>