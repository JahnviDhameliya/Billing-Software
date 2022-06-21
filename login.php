<?php
	session_start();
	include 'conith.php';
	
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$username = $_POST["username"];
		$password = $_POST["password"];
	}
	
	$sql = "SELECT agent_password from agent where agent_id='$username'";
	$result = $conn->query($sql);        

    while($row = $result->fetch_assoc()) {
		if($password == $row["agent_password"]){
			echo "welcome you have successfully logeed in";
			$_SESSION["username"] = $username;
			header("Location: home.php");
		}
    }
	$sql = "SELECT client_password from client where client_id='$username'";
	$result = $conn->query($sql);        

    while($row = $result->fetch_assoc()) {
		if($password == $row["client_password"]){
			echo "welcome you have successfully logeed in";
			$_SESSION["username"] = $username;
			header("Location: clientHome.php");
		}
    }
	$sql = "SELECT name from nominee where nominee_id='$username'";
	$result = $conn->query($sql);        

    while($row = $result->fetch_assoc()) {
		if($password == $row["name"]){
			echo "welcome you have successfully logeed in";
			$_SESSION["username"] = $username;
			header("Location: nomineeHome.php");
		}
    }

	$sql = "SELECT system from policy where policy_id='$username'";
	$result = $conn->query($sql);        

    while($row = $result->fetch_assoc()) {
		if($password == $row["system"]){
			echo "welcome you have successfully logeed in";
			$_SESSION["username"] = $username;
			header("Location: partyRegister.php");
		}
    }
	
	$sql = "SELECT user_password from user where user_id='$username'";
	$result = $conn->query($sql);        

    while($row = $result->fetch_assoc()) {
		if($password == $row["user_password"]){
			echo "welcome you have successfully logeed in";
			$_SESSION["username"] = $username;
			header("Location: allAccount.php");
		}
    }
	
	if(!isset($_SESSION["username"])){
		header("Location: index.php");
	}
?>