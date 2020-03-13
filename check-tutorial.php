<?php

session_start();
include('dbconnect.php');


$uid=$_SESSION['sid'];

					 $sql="SELECT * FROM teacher_info WHERE tid='$uid'";
					$run_query=mysqli_query($conn,$sql);
					$row=mysqli_fetch_array($run_query);
					 $res=mysqli_query($conn,$sql);
					 $ssubject=$row['subject'];
					 $clr=$row['classroom'];
					 $name=$row['name'];
                    
                     
                    
    $curdate=date("Y-m-d")  ;            
                     

	$qq = mysqli_query($conn, "SELECT * FROM tutorial WHERE date ='$curdate'");
      $row = mysqli_fetch_array($qq);
      $tutno=$row['tutorialno'];
    

 
      if($qq)
      {
          $message = "Your have a quiz/tutorial called :  $tutno  scheduled for today.";
          echo "<script type='text/javascript'>alert('$message');</script>";
      }
       else
       {
           alert("You have no messages.");
       }
     //header("Location:home.php");

    ?>
