<!DOCTYPE html>

<html>
<head>
<style>
.button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
	margin-left:2%;
	display:block;
	float: center;
}
.btn{
	background-color: #4CAF50;
	float: right;
	color:white;
	text-decoration:none;	
}

table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
	margin-left:0%;
	font-size:110%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
.dis {
	pointer-events: none;
	cursor: default;
	color:#595959;
}
.searchBar {
	float: auto;
	cursor: pointer;
	width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	
}
input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

.searchBar {
	float: auto;
	cursor: pointer;
	width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	
}
</style>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Search</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
       <!--CUSTOM BASIC STYLES-->
	   
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
<?php include 'header5.php'; 
$username=$_SESSION['username'];
?>
        <!-- /. NAV SIDE  -->
            <!-- /. NAV SIDE  -->
            <div id="page-wrapper">
            
            <div class="row">
                <div class="col-md-12">
         
                   
                </div>
            </div>
            <?php
	   $key       = $_POST["key"];
///////    SEARCHES IN sales
	   
$sql="SELECT * FROM sales WHERE date LIKE '%" . $key .  "%' OR ac_name LIKE '%" . $key ."%' OR bill_number LIKE '%" . $key ."%' OR bill_type LIKE '%" . $key ."%' OR payment_mode LIKE '%" . $key ."%'  ";  
$result = $conn->query($sql);
if ($result->num_rows > 0) {
       
echo "<table class=\"table\">\n";
echo "  <tr>\n";
echo "    <th>Date</th>\n";
echo "    <th>Account Name</th>\n";
echo "    <th>Bill Number</th>\n";
echo "    <th>Bill Type</th>\n";
echo "    <th>Payment Mode</th>\n";
echo "  </tr>";

while($row = $result->fetch_assoc()) {

echo "<tr>\n";
if($row["user_id"]== $username || "ITHub" == $username){
   echo "    <td>".$row["date"]."</td>\n";
}else{}

if($row["user_id"]== $username || "ITHub" == $username){
   echo "    <td>".$row["ac_name"]."</td>\n";
}else{}


if($row["user_id"]== $username || "ITHub" == $username){
   echo "    <td>".$row["bill_number"]."</td>\n";
}else{}
if($row["user_id"]== $username || "ITHub" == $username){
 echo "    <td>".$row["bill_type"]."</td>\n";
}else{}
if($row["user_id"]== $username || "ITHub" == $username){
 echo "    <td>".$row["payment_mode"]."</td>\n";
}else{}
echo "    </td>";
}

echo "</table>\n";
echo "\n";



} else {

echo "Nothing Found";
echo"<br>"; echo"<br>";
}

        ?>    
        </div>
        <!-- /. PAGE WRAPPER  -->


    </div>
    <!-- /. WRAPPER  -->

   
    
    

	
</body>
</html>
