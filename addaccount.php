
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
<?php include 'header3.php'; 
$uniqueId  = time();
$uniqueId2 = time().'-'.mt_rand();

?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Add Account</h1>
						
                    
                

<form action="insertaccount.php" method="post" enctype="multipart/form-data">
<input style="display:none" type="text" name="client_id" value="<?php echo"$uniqueId"; ?>" required>
<input style="display:none" type="text" name="client_password" value="<?php echo"$uniqueId"; ?>" required>
<input style="display:none" type="text" name="agent_id">
<input style="display:none" type="text" name="policy_id" value="<?php echo $_SESSION["username"]; ?>" >
Name:            <input type="text" name="name" required><br>
		     <input style="display:none" class="img" type="file" name="fileToUpload"/> 
    <input style="display:none" type="text" name="sex" >
      <input style="display:none" type="text" name="birth_date" >
  <input style="display:none" type="text" name="maritial_status">
  <input  style="display:none" type="text" name="nid" >
Mobile:           <input type="text" name="phone" pattern="^[0-9]{10}$"  ><br>
Address:         <input type="text" name="address" ><br>
      <!-- <input style="display:none" type="text" name="policy_id">-->
<input style="display:none" type="text" name="agent_id" value="<?php echo $_SESSION["username"]; ?>" required><br>



<input style="display:none" type="text" name="nominee_id" value="<?php echo"$uniqueId2"; ?>" required>
<input style="display:none" type="text" name="nominee_name" >
<input style="display:none" type="text" name="nominee_sex" >
<input style="display:none" type="text" name="nominee_birth_date" >
<input style="display:none" type="text" name="nominee_nid" >
<input style="display:none" type="text" name="nominee_relationship" >
<input style="display:none" type="text" name="priority" >
<input style="display:none" type="text" name="nominee_phone" >


<input type="submit">

</form>
				
				

                </div>

            
        </div>
        <!-- /. PAGE WRAPPER  -->


    </div>
    <!-- /. WRAPPER  -->

   
    


</body>
</html>
