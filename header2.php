<?php
	session_start();
	include'conith.php';
	$username = $_SESSION["username"];

	$sql = "SELECT name FROM client WHERE client_id = '$username'";
	$result = $conn->query($sql);
    $name2=$result->fetch_assoc();

	if ($result->num_rows > 0) {
     
    }
    else {
	header("Location: partyRegister.php");
    
   }
	
?>

<body>
<div id="wrapper">
     
     <!-- /. NAV TOP  -->
     <nav class="navbar-default navbar-side" role="navigation">
         <div class="sidebar-collapse">
             <ul class="nav" id="main-menu">
                 <li>
                     <div class="user-img-div">
  

                         <div class="inner-text">
                         <center>    <?php
                                 if(!isset($_SESSION["username"])){
                                     header("Location: index.php");
                                 }else {
                                     echo "welcome, ".$name2["name"];
                                 }
                             ?></center>
                         
                           
                         </div>
                     </div>

                 </li>	</ul>

                 
                 <ul class="nav-2" id="menu2">			
                 
                   <li>
                   <a href="addComplaint.php">Add New Record</a>
                   </li>  
                   <li>
                   <a href="clientHome.php">All Record</a>
                   </li>  
                   <li>
                   <a href="<?php echo "logout.php" ?>">Logout</a>
                   </li> 
             
             </ul>
                 

         </div>
     

     </nav>
		  
	