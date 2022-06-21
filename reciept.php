<!DOCTYPE html>
<html>
<head>
<style>
input[type=text],input[type=number],input[type=date], select {
    width: 20%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
.list{
    width: 20%;
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
 label {
     width:110px;
    margin-right: 0px;
    margin-left: 10px;
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



input[type=submit]{
    background:linear-gradient(120deg,#191970, #900C3F ,#581845);

    color: white;
    
  }
</style>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Payment</title>
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
$name=$_SESSION['username'];

$sql = "SELECT distinct acname FROM account where user_id='$name' ";
$result=$conn->query($sql); 


?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Reciept</h1>
						
                    
                

<form action="insertpayin.php" method="post" enctype="multipart/form-data">
    <label>Date:</label>
       <input type="date" name="date" required >
<label> Mode: </label><select name='mode'><option name='mode'>cash</option><option name='mode'>Bank</option></select>
<label> Reciept No:</label>        <input type="text" name="reciept_no" value="<?php echo"$uniqueId"; ?>" required><br>
		     
<label> Party Name:  </label>        <input list='name' name='p_name' class='list' autocomplete="off" >
<datalist id='name'>
<?php

while($rows=$result->fetch_assoc()){
    $id=$rows['acname'];
    echo"<option name='p_name' value='$id'>";

echo "</option>";


}
?>

</datalist>

<br>
<label> Total Amount: </label>     <input type="number" name="t_amount" >
<label> Discount Amount: </label> <input type="number" name="d_amount">
<label> Remark: </label> <input type="text" name="remark" >


     <input style="display:none" type="text" name="policy_id">
<input style="display:none" type="text" name="agent_id" value="<?php echo $_SESSION["username"]; ?>" required><br>





<input type="submit" value='Save'>

</form>
				
				

                </div>

            
        </div>
        <!-- /. PAGE WRAPPER  -->


    </div>
    <!-- /. WRAPPER  -->

   
    


</body>
</html>