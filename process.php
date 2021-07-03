<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "employee";
	
	$myconn = new mysqli($servername,$username,$password,$database);
	
	if($myconn->connect_error)
	{
		die("Could not connect <br>$myconn->connect_error");
	}


if(isset($_GET['empId']))
{
	$result = $myconn->query("select * from employee where employee_id = '".$_GET['empId']."'");
	
	if($result->num_rows==1)
	{
		$row = $result->fetch_assoc();
		echo "<br><h1>Employee Data</h1>";
		echo "<form>";
		echo "<input type='text' disabled value=".$row['employee_id'].">";
		echo "<input type='text' disabled value=".$row['name'].">";
		echo "<input type='text' disabled value=".$row['phone'].">";
		echo "</form>";
	}
	else{
		echo "<br><h1>No data found!</h1>";
	}
}
else{
	echo "No empid sent!";
}
?>