<?php
	$conn = new mysqli('localhost', 'paulchidiadi', 'chem2016214024', 'health');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>