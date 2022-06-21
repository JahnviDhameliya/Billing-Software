<!DOCTYPE html>
<html>
<head>
<style>
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


table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
input[type=submit]{
    background:linear-gradient(120deg,#191970, #900C3F ,#581845);

    color: white;
    
  }
</style>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Client</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
       <!--CUSTOM BASIC STYLES-->
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<?php include 'header5.php'; 
$uniqueId  = time();
$uniqueId2 = time().'-'.mt_rand();
$sql = "SELECT distinct type_name FROM type order by type_name";
$result=$conn->query($sql); 

?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Add Account</h1>
						
                    
                

<form action="insertAc.php" method="post" enctype="multipart/form-data">

<input style="display:none" type="text" name="user_id" value="<?php echo $_SESSION["username"]; ?>" required><br>
Name:            <input type="text" name="acname" required><br>
Type:            <select name="type_name" style="width:100%">
<?php
while($rows=$result->fetch_assoc()){
    $id=$rows['type_name'];
    echo"<option name='type_name' value='$id' >$id</option>";
}
?>

</select><br>     
Address1:          <input type="text" name="add1" ><br>
Address2:      <input type="text" name="add2" ><br>
City:  <input type="text" name="city"><br>
State: <input type="text" name="state" >
State Code:           <input type="text" name="statecode" ><br>
Mobile No.:           <input type="text" name="mob1" pattern="^[0-9]{10}$"  ><br> 
Email ID:           <input type="text" name="email"><br> 
RegNum:         <input type="text" name="regnum" ><br>
Open Balance:         <input type="text" name="opbal" ><br>
Bank Details:           <input type="text" name="bankdetail"><br> 
Information 1:           <input type="text" name="info1"><br>
Information 2:           <input type="text" name="info2"><br> 
Account ID:       <input type="text" name="account_id" value="<?php echo"$uniqueId"; ?>" required><br>
Password: <input type="text" name="a_password" required><br>
   
<input type="submit">

</form>
				
				

                </div>

            
        </div>
        <!-- /. PAGE WRAPPER  -->


    </div>
    <!-- /. WRAPPER  -->

   
    


</body>
</html>
