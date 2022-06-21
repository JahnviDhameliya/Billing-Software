<?php
	session_start();
	include 'conith.php';
	$username = $_SESSION["username"];

	$sql = "SELECT name FROM agent WHERE agent_id = '$username'";
	$result = $conn->query($sql);
    $name=$result->fetch_assoc();

	if ($result->num_rows > 0) {
     
    }
    else {
	header("Location: clientHome.php");
   }
	
?>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0" style="background-color: black">
	
            <div class="navbar-header">
                	
                <a class="navbar-brand" href="index.php">Admin Penal</a>
            </div>

            <div class="header-right">

            <a href="<?php echo "logout.php" ?>"><button style="font-size:24px; color:white; background:linear-gradient(120deg,#581845, #900C3F ,#191970); margin-top: 50%"><i class="fa fa-power-off"></i></button>
			
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
										echo "welcome, ".$name["name"];
                                        
                                        
									}
								?>
                
                                                          
                            </div>
                        </div>

                    </li>
					          <li>
                      <a href="home.php"><i class="fa fa-life-saver "></i>HOME</a>
                    </li>
					          <li>
                      <a href="addComplaintadmin.php"><i class="fa fa-pencil-square-o "></i>ADD RECORD</a>
                    </li>
					<li>
                      <a href="register.php"><i class="fa fa-credit-card "></i>REGISTER</a>
                    </li>
                    			
					<li>
                      <a href="addClient.php"><i class="fa fa-life-saver "></i>ADD OFFICE STAFF</a>
                    </li>
					<li>
                      <a href="client.php"><i class="fa fa-users "></i>ALL OFFICE STAFF</a>
                    </li>
                    <li>
                      <a href="clientx.php"><i class="fa fa-life-saver "></i>OFFICE STAFF STATUS</a>
                    </li>
                    <li>
                      <a href="allAuditor.php"><i class="fa fa-users "></i>AUDITOR</a>
                    </li>   
                    <li>
                      <a href="finalRegister.php"><i class="fa fa-life-saver "></i>FINAL REGISTER</a>
                    </li>
                    <li>
                      <a href="cancelRegister.php"><i class="fa fa-life-saver "></i>CANCEL REGISTER</a>
                    </li>
                     
                    <li>
                      <a href="allPolicy.php"><i class="fa fa-users "></i>INCOME TAX RETURN USER</a>
                    </li>                    
                    <li>
                      <a href="allUser.php"><i class="fa fa-users "></i>GST USER</a>
                    </li>   
                   
                    
                   

                                       
				
                </ul>

            </div>
		

        </nav>