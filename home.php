<?php 

session_start();
include('dbconnect.php');
//include('register.php');



 $uid=$_SESSION['sid'];

					 $sql="SELECT * FROM teacher_info WHERE tid='$uid'";
					$run_query=mysqli_query($conn,$sql);
					$row=mysqli_fetch_array($run_query);
					 $res=mysqli_query($conn,$sql);
					 $ssubject=$row['subject'];
					 $clr=$row['classroom'];
					 $name=$row['name'];
                    


					
					
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>PROFILE</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
<div style="background-image: url('images/bg-02.jpg');">

	<div class="limiter">
		
			<nav class="navbar navbar-expand-md navbar-dark	 bg-dark">
                <a href="display1.php" class="navbar-brand">Timetable</a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
            
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav">
						<a href="logout.php" class="nav-item nav-link">Logout</a>
						<a href="profile.php" class="nav-item nav-link">Profile</a>
						<a href="notes.html" class="nav-item nav-link">Write Notes</a>
						<a href="checknotes.php" class="nav-item nav-link">Check Notes</a>

						<a href="tutorial.html" class="nav-item nav-link">Schedule Tutorial</a>

						<a href="check-tutorial.php" class="nav-item nav-link">Check Tutorial</a>


						<!-- <a href="display1.php" class="nav-item nav-link">view</a> -->

						<a href="ping.php" class="nav-item nav-link">Ping</a>
						<a href="receive-ping.php" class="nav-item nav-link">Messages</a>

						<a href="examtt.php" class="nav-item nav-link">Exam timetable</a>
						
                    </div>
					<div class="form-group">

					<form class="form-inline ml-auto" action="displayother.php" method="post">
					
		<select name="CR" class="list-group-item" >
            <option selected disabled>Select teacher</option>
            <?php
            $q = mysqli_query($conn,
                "SELECT * FROM teacher_info ");
            while ($row = mysqli_fetch_assoc($q)) {
                echo " \"<option value=\"{$row['name']}\">{$row['name']}</option>\"";
            }
            ?>
		</select>
		
			<button type="submit" class="btn btn-outline-light">Search</button>
			
			
			</form> 
</div>
 <div  class="form-group" >


		 <form method="post", class="form-inline ml-auto"> 
		 <p>Class Notification:</p>
       						 <input type="submit" name="button1" onclick="myFunction()" value="TURN ON"/>  

				</form>

		</div>

		<!-- <div  class="form-group" >


			<form method="post", class="form-inline ml-auto"> 
			<p>  Messages:</p>
					   <input type="submit" name="button1" onclick="myFunction1()" value="CHECK"/>  

	   </form>

                </div> -->
            </nav>
            
	</div>
		</div>

		<?php

			$today=date("l");
			$todaymod=strtolower($today);

	
			$q= mysqli_query($conn, 
			"SELECT period1,period2,period3,period4,period5,period6,period7,period8 FROM $name where day= '$todaymod'");
			$row=mysqli_fetch_array($q);
			$period = array('period1', 'period2', 'period3', 'period4', 'period5','period6','period7','period8');
			$i=0;
			while($i<8)
	{
	$p=$period[$i];
	$per=$row[$p];
	if(strcmp($per,$ssubject)==0){
	$fin=$p;
	$i++;
	}
	else{
		$i++;
		continue;
	}
	
}

?>


<script>
function myFunction() {
	alert(  "Today's Subject,location and time:  <?php  echo $ssubject," ",$clr ," ",$fin?>");
  
}
</script>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>


</html>