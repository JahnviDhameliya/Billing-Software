<?php
	session_start();
	include'conith.php';
	$username = $_SESSION["username"];

	$sql = "SELECT nominee_id FROM nominee WHERE nominee_id = '$username'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
     
    }
    else {
	    header("Location: allAccount.php");
   }
	
?>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0" style="background-color: black">
	        <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Admin Penal</a>
            </div>
            <div class="header-right">
			
                 
                 <a href="<?php echo "logout.php" ?>"><button style="font-size:24px; color:white; background:linear-gradient(120deg,#581845, #900C3F ,#191970); margin-top: 50%"><i class="fa fa-power-off"></i></button></a>

            </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <div class="user-img-div">
                            <img src="assets/img/user.png" class="img-thumbnail" />

                            <div class="inner-text">
                                <?php
									if(!isset($_SESSION["username"])){
										header("Location: index.php");
									}else {
										echo "welcome!!";
									}
								?>
                            <br />
                              
                            </div>
                        </div>

                    </li>
                    <li>
                      <a href="nomineeHome.php"><i class="fa fa-life-saver "></i>All Customers</a>
                    </li>
					<li>
                      <a href="addCustomer.php"><i class="fa fa-life-saver "></i>Add Customer</a>
                    </li>
					<li>
                      <a href="depri.php"><i class="fa fa-life-saver "></i>Depreciation</a>
                    </li>
                    <li>
                      <a href="trading.php"><i class="fa fa-life-saver "></i>Trading</a>
                    </li>
                    <li>
                      <a href="pnl.php"><i class="fa fa-life-saver "></i>PNL</a>
                    </li>
                    <li>
                      <a href="capital.php"><i class="fa fa-life-saver "></i>Capital</a>
                    </li>
                    
                    
                    <li>
                      <a href="bs.php"><i class="fa fa-life-saver "></i>Balance Sheet</a>
                    </li>
                </ul>
            </div>
        </nav>
        

        
        