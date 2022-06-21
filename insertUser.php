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
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Insert Client</title>
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
<?php include 'header.php'; 
?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Insert
						<button class="btn" align="center" style="background:linear-gradient(120deg,#191970, #900C3F ,#581845);color: white;"> 
                        <a href="addclient.php" class="btn" style="background:linear-gradient(120deg,#191970, #900C3F ,#581845);color: white;">Add User</a>
                        </button>
						</h1>
                    
                
				
				
<?php
   

	    $user_id       = $_POST["user_id"];
		$user_password = $_POST["user_password"];
		$name            = $_POST["name"];
		$add1             = $_POST["add1"];
		$add2      = $_POST["add2"];
		$city = $_POST["city"];
		$state            = $_POST["state"];
		$statecode           = $_POST["statecode"];
		$regnum         = $_POST["regnum"];
        $mob1            = $_POST["mob1"];
		$email           = $_POST["email"];
		$bankdetail         = $_POST["bankdetail"];
		$fileToUpload       = $_POST["fileToUpload"];
        $tnc       = $_POST["tnc"];
		$agent_id        = $_POST["agent_id"];
		
		
	
		
		
		$profileImage = basename($_FILES["fileToUpload"]["name"]);
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a act
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check !== false) {
				echo "profile picture uploaded " . $check["mime"] . "."; echo '</br>';
				$uploadOk = 1;
			} else {
				echo "."; echo '</br>';
				$uploadOk = 0;
			}
		
		// Check file size
		$uploadOk == 1;
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			echo "";  echo '</br>';
		// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			//	echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			} else {
				echo "";   echo '</br>';
			}
		}
		
	$sql = "INSERT INTO user "."VALUES('$user_id', '$user_password', '$name', '$add1', '$add2', '$city', '$state', '$statecode', '$regnum', '$mob1', '$email','$bankdetail','$profileImage','$tnc','$agent_id')";
	
	if ($conn->query($sql) === true) {
			echo "New ADDED";  echo '</br>';
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;  echo '</br>';
		}
		
		
		
		/// NOMINEE BEING ADDED
   /*$sql = "INSERT INTO nominee "."VALUES('$nominee_id', '$client_id', '$nominee_name', '$nominee_sex', '$nominee_birth_date', '$nominee_nid', '$nominee_relationship','$priority', '$nominee_phone')";
	
	if ($conn->query($sql) === true) {
			echo "New ADDED";  echo '</br>';
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;  echo '</br>';
		}*/
		
	
?>


			

                </div>

            
        </div>
        <!-- /. PAGE WRAPPER  -->


    </div>
    <!-- /. WRAPPER  -->

   
    


</body>
</html>
