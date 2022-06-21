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
$sql5 = "SELECT distinct unit FROM unit";
$result5=$conn->query($sql5); 

?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Add Product</h1>
						
                    
                

<form action="insertProduct.php" method="post" enctype="multipart/form-data">
<input style="display:none" type="text" name="user_id" value="<?php echo $_SESSION["username"]; ?>" required><br>

Product Name:            <input type="text" name="name" required><br>
Code:            <input type="text" name="code" required><br>	     
Company:          <input type="text" name="company" ><br>
Category:      <select name="category">
  <option value="Sale">Sale</option>
  <option value="Service">Service</option>
</select>
Opening Balance:          <input type="text" name="opbal" ><br>
Unit:          <select name="unit" style="width:100%">
<?php
while($rows=$result5->fetch_assoc()){
    $id=$rows['unit'];
    echo"<option name='unit' value='$id' style='width:100%''>$id</option>";
}
?>

</select>

SGST:  <input type="text" name="charge1"><br>
CGST:  <input type="text" name="charge2"><br>
IGST:  <input type="text" name="charge3"><br>
Charge:  <input type="text" name="charge4"><br>
Dis1: <input type="text" name="dis1" >
Dis2:           <input type="text" name="dis2" ><br>
Price:           <input type="text" name="price"><br> 

<input type="submit">

</form>
				
				

                </div>

            
        </div>
        <!-- /. PAGE WRAPPER  -->


    </div>
    <!-- /. WRAPPER  -->

   
    


</body>
</html>
