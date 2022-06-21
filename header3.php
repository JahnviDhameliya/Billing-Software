<?php
	session_start();
	include'conith.php';
	$username = $_SESSION["username"];

	$sql = "SELECT policy_id FROM policy WHERE policy_id = '$username'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
     
    }
    else {
	    header("Location: nomineeHome.php");
   }

	
?>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0" style="background-color: black">
	        <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Client Penal</a>
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
                      <a href="partyRegister.php"><i class="fa fa-life-saver "></i>HOME</a>
                    </li>
                    <li>
                      <a href="addaccount.php"><i class="fa fa-life-saver "></i>ADD  ACCOUNT</a>
                    </li>
                    <li>
                      <a href="form1.php"><i class="fa fa-life-saver "></i>Pay IN</a>
                    </li>
                    <li>
                      <a href="form2.php"><i class="fa fa-life-saver "></i>Pay OUT</a>
                    </li>
                    <li>
                      <a href="incomeRegister.php"><i class="fa fa-life-saver "></i>Pay IN Register</a>
                    </li>
                    <li>
                      <a href="expenseRegister.php"><i class="fa fa-life-saver "></i>Pay OUT Register</a>
                    </li>
                </ul>
            </div>
        </nav>
        