<?php
	$numGuests = $_POST['numGuests'];
	$section = $_POST['section'];
	$date1 = $_POST['date'];
	$time1 = $_POST['time'];
	$link_address='../home.html';

	if(!empty($numGuests) || !empty($section) || !empty($date1) || !empty($time1)){
		$host = "127.0.0.1";
		$dbUsername = "root";
		$dbPassword = "";
		$dbname = "hotel";
		
		$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

		if(mysqli_connect_error()){
			die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
		}
		else{
			$SELECT = "SELECT email FROM contact WHERE email = ? Limit 1";
			$INSERT =" INSERT INTO reserve(numGuests, section, date1, time1) VALUES (?, ?, ?, ?)";

			$stmt = $conn->prepare($INSERT);
			$stmt->bind_param("ssss", $numGuests, $section, $date1, $time1);
			$stmt->execute();
			
			echo "Record had been submitted sucessfully! <a href='".$link_address."'>Back</a>";
			
			$stmt->close();
			$conn->close();
		}
	}
	else{
		echo "All field are required <a href='".$link_address."'>Back</a>";
		die();
	}

?>