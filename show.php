<html>
<head>
//css
<style>
table
{
border-style:solid;
border-width:2px;
border-color:pink;
}
</style>
</head>
<body bgcolor="#EEFDEF">

<?php
	session_start();
	include 'conith.php';
	
?>

<?php
	
	$sql = "SELECT recipt_no,client_id,month,amount,due,fine, agent_id FROM payment";
	$result = $conn->query($sql);
	
	echo "<table class=\"table\">\n";
    echo "  <tr>\n";
    echo "    <th>RECIPT NO</th>\n";
    echo "    <th>CLIENT ID</th>\n";
    echo "    <th>MONTH</th>\n";
    echo "    <th>AMOUNT</th>\n";
	echo "    <th>DUE</th>\n";
    echo "    <th>FINE</th>\n";
	echo "    <th>UPDATE</th>\n";
    echo "  </tr>";
	
	if ($result->num_rows > 0) {
    // output data of each row
	while($row = $result->fetch_assoc()) {
		
		echo "<tr>\n";
		echo "    <td>".$row["recipt_no"]."</td>\n";
		echo "    <td>".$row["client_id"]."</td>\n";
		echo "    <td>".$row["month"]."</td>\n";
		echo "    <td>".$row["amount"]."</td>\n";
		echo "    <td>".$row["due"]."</td>\n";
		echo "    <td>".$row["fine"]."</td>\n";
		
		if($row["agent_id"]== $username || "ahmed" == $username){
			echo "<td>"."<a href='editPayment.php?recipt_no=".$row["recipt_no"]. "'>Edit</a>"."</td>\n";
		}else{
			echo "<td>"."<a class=\"dis\" href='editPayment.php?recipt_no=".$row["recipt_no"]. "'>Edit</a>"."</td>\n";
		}
		
		
	}
	
	echo "</table>\n";
	echo "\n";
	
	} else {
    echo "0 results";
}
$conn->close();
?>
</body>
</html>