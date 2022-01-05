<?php
	$name = $_POST['name'];
	$email = $_POST['email'];
	$tel = $_POST['tel'];
	$contact = $_POST['contact'];
	$comments = $_POST['comments'];
	$link_address='../home.html';

	if(!empty($name) || !empty($email) || !empty($tel) || !empty($contact) ||  !empty($comments)){
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
			$INSERT =" INSERT INTO contact(name, email, tel, contact, comments) VALUES (?, ?, ?, ?, ?)";

			$stmt->close();

			$stmt = $conn->prepare($INSERT);
			$stmt->bind_param("ssss", $name, $email, $tel, $contact, $comments);
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