<!doctype html>
<?php include('connection.php'); global $conn ?> 
<?php include('side.php'); ?>
<?php session_start(); ?>
<?php
function getUserdetails($id)
{
    global $conn;
    if ($stmt = $conn->prepare("SELECT fname, phone, email, gender, age, address, emergency, lname, user_photo  FROM `user` where id = ? ")) 
         {
            //echo "hi";
	            $stmt->bind_param("i", $id);
	            $stmt->execute();
	            $stmt->bind_result($fname, $phone, $email, $gender, $age, $address, $emergency, $lname, $user_photo);
	            while ($stmt->fetch()) 
            {
            $rows[] = array('fname' => $fname, 'phone' => $phone, 'email' => $email, 'gender' => $gender, 'age' => $age, 'address' => $address, 'emergency' =>$emergency, 'lname' => $lname, 'user_photo' => $user_photo);
            //print_r($rows);
            }
            $stmt->close();
            return $rows;
           

}
    else 
        {
            printf("Error message: %s\n", $conn->error);
        }
}

?>
<?php
    function getbloodpressuredetails($id) 
    {
        global $conn;
        if ($stmt = $conn->prepare("SELECT para_date, reading, type  FROM `tracking_para` where id = ? and para_id = 2 ORDER BY para_date DESC LIMIT 1")) 
             {
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $stmt->bind_result($para_date, $reading, $type);
                while ($stmt->fetch()) 
                {
                $rows[] = array('para_date' => $para_date, 'reading' => $reading, 'type' => $type);
                }
                $stmt->close();
                return $rows;

    }
        else 
            {
                printf("Error message: %s\n", $conn->error);
                }
            }
?>
<?php
    function getbloodglucosedetails($id) 
    {
        global $conn;
        if ($stmt = $conn->prepare("SELECT para_date, reading, type  FROM `tracking_para` where id = ? and para_id = 2 ORDER BY para_date DESC LIMIT 1")) 
             {
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $stmt->bind_result($para_date, $reading, $type);
                while ($stmt->fetch()) 
                {
                $rows[] = array('para_date' => $para_date, 'reading' => $reading, 'type' => $type);
                }
                $stmt->close();
                return $rows;

    }
        else 
            {
                printf("Error message: %s\n", $conn->error);
                }
            }
?>
<?php
    function getweightdetails($id) 
    {
        global $conn;
        if ($stmt = $conn->prepare("SELECT para_date, reading, type  FROM `tracking_para` where id = ? and para_id = 3 ORDER BY para_date DESC LIMIT 1")) 
             {
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $stmt->bind_result($para_date, $reading, $type);
                while ($stmt->fetch()) 
                {
                $rows[] = array('para_date' => $para_date, 'reading' => $reading, 'type' => $type);
                }
                $stmt->close();
                return $rows;

    }
        else 
            {
                printf("Error message: %s\n", $conn->error);
                }
            }
?>
<?php
    function getheightdetails($id) 
    {
        global $conn;
        if ($stmt = $conn->prepare("SELECT para_date, reading, type  FROM `tracking_para` where id = ? and para_id = 4 ORDER BY para_date DESC LIMIT 1")) 
             {
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $stmt->bind_result($para_date, $reading, $type);
                while ($stmt->fetch()) 
                {
                $rows[] = array('para_date' => $para_date, 'reading' => $reading, 'type' => $type);
                }
                $stmt->close();
                return $rows;

    }
        else 
            {
                printf("Error message: %s\n", $conn->error);
                }
            }
?>
<?php
    function getheartratedetails($id) 
    {
        global $conn;
        if ($stmt = $conn->prepare("SELECT para_date, reading, type  FROM `tracking_para` where id = ? and para_id = 5 ORDER BY para_date DESC LIMIT 1")) 
            {
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $stmt->bind_result($para_date, $reading, $type);
                while ($stmt->fetch()) 
                {
                $rows[] = array('para_date' => $para_date, 'reading' => $reading, 'type' => $type);
                }
                $stmt->close();
                return $rows;

    }
        else 
            {
                printf("Error message: %s\n", $conn->error);
                }
            }
?>
<?php
// Connect to MySQL
function getappointmentdetails($id) 
{
   global $conn;
   if ($stmt = $conn->prepare("SELECT app_date, reason FROM `appointment` where id = ? ORDER BY app_date ASC ")) 
         {
            
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->bind_result($app_date, $reason);
            while ($stmt->fetch()) 
            {
            $rows[] = array('start' => $app_date, 'title' => $reason);
            }
            $stmt->close();
            return $rows;

}
    else 
        {
            printf("Error message: %s\n", $conn->error);
            }
        }

?>
<?php 
     $appointmentdetails = getappointmentdetails($_SESSION['id']);
     $appointment_date = json_encode($appointmentdetails);

?>
<?php
// Connect to MySQL
function getdatedetails($id) 
{
   global $conn;
   if ($stmt = $conn->prepare("SELECT start_date, end_date, pres_name FROM `prescription` where id = ? ORDER BY start_date ASC ")) 
         {
            
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->bind_result($start_date, $end_date, $pres_name);
            while ($stmt->fetch()) 
            {
            $rows[] = array('start' => $start_date, 'end' => $end_date, 'title' => $pres_name);
            }
            $stmt->close();
            return $rows;

}
    else 
        {
            printf("Error message: %s\n", $conn->error);
            }
        }

?>
<?php 
     $datedetails = getdatedetails($_SESSION['id']);
     $data = json_encode($datedetails);

?>
    
<?php $userdeets = getUserdetails($_SESSION['id']);?>
<?php $userdeets = getbloodpressuredetails($_SESSION['id']);?>
<?php $userdeets = getbloodglucosedetails($_SESSION['id']);?>
<?php $userdeets = getweightdetails($_SESSION['id']);?>
<?php $userdeets = getheightdetails($_SESSION['id']);?>
<?php $userdeets = getheartratedetails($_SESSION['id']);?>

<html><head>
    

    <!-- Le styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">
    <link href="assets/css/font-style.css" rel="stylesheet">
    <link href="assets/css/flexslider.css" rel="stylesheet">
    
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
	<link rel="stylesheet" href="font-awesome/css/font-awesome.css">
<link rel='stylesheet' href='assets/css/fullcalendar.css' />
    <script src='assets/lib/jquery.min.js'></script>
    <script src='assets/lib/moment.min.js'></script>
    <script src='assets/js/fullcalendar.js'></script>
    

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

  	<!-- Google Fonts call. Font Used Open Sans & Raleway -->
	<link href="http://fonts.googleapis.com/css?family=Raleway:400,300" rel="stylesheet" type="text/css">
  	<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">

<script type="text/javascript">
$(document).ready(function () {

    $("#btn-blog-next").click(function () {
      $('#blogCarousel').carousel('next')
    });
     $("#btn-blog-prev").click(function () {
      $('#blogCarousel').carousel('prev')
    });

     $("#btn-client-next").click(function () {
      $('#clientCarousel').carousel('next')
    });
     $("#btn-client-prev").click(function () {
      $('#clientCarousel').carousel('prev')
    });
    
});

 $(window).load(function(){

    $('.flexslider').flexslider({
        animation: "slide",
        slideshow: true,
        start: function(slider){
          $('body').removeClass('loading');
        }
    });  
});

</script>


    
  </head>
  <body>
  
  	<!-- NAVIGATION MENU -->


    <div class="container" style="margin-left:300px;">

	  <!-- FIRST ROW OF BLOCKS -->     
      <div class="row">

      <!-- USER PROFILE BLOCK -->
        <div class="col-sm-4 col-lg-4">
      		<div class="dash-unit">
	      		<dtitle>User Profile</dtitle>
	      		<hr>
				<div class="thumbnail">

					<img src="<?php $name = getUserdetails($_SESSION['id']); echo 'upload/'.$name[0]['user_photo']; ?>" alt="<?php echo "No photo available"?>"  class="img-circle" height="180" width="180">
				</div><!-- /thumbnail -->
				<h1>
					<?php
                    $name = getUserdetails($_SESSION['id']);
                    echo $name[0]['fname']." ".$name[0]['lname'];
                    ?>
                </h1>
				<h3><?php
                    $name = getUserdetails($_SESSION['id']);
                    echo $name[0]['email'];
                    ?></h3>
				<br>
					<div class="info-user">
						<a href="user.php"><span aria-hidden="true" class="li_user fs1" style="margin-right: 10px"></span></a>
					</div>
				</div>
				</div>
        </div>
    </div>

      
       
      <div class="row" style="margin-left: 90px">
      	<div class="col-sm-3 col-lg-3">
	  
	  <!-- BARS CHART - lineandbars.js file -->     
      		<div class="half-unit" >
	      		<dtitle>blood pressure</dtitle>
	      		<hr>
	      		<div class="cont">
					<p><bold> <?php
                    $reading = getbloodpressuredetails($_SESSION['id']);
                    echo $reading[0]['reading']." ".$reading[0]['type'];
                    ?></p></bold>
				</div>
	      		<a href="create_blood_pressure.php"><span class="icon-plus icon-2x" style="color: #b2c831; margin-left:100px"></span></a>
      		</div>


	  <!-- TO DO LIST -->     
      		<div class="half-unit">
	      		<dtitle>Blood Glucose</dtitle>
	      		<hr>
	      		<div class="cont">
					<p><bold> <?php
                    $reading = getbloodglucosedetails($_SESSION['id']);
                    echo $reading[0]['reading']." ".$reading[0]['type'];
                    ?></p></bold>
				</div>
				<a href="create_blood_glucose.php"><span class="icon-plus icon-2x" style="color: #b2c831; margin-left:100px"></span></a>
	      		<!-- <span class="fa fa-plus fa-2x" style="color: #b2c831; margin-right: 50px"></span> -->
      		</div>

      	</div>

      	<div class="col-sm-3 col-lg-3">

	  <!-- LIVE VISITORS BLOCK -->     
      		<div class="half-unit">
	      		<dtitle>weight </dtitle>
	      		<hr>
	      		<div class="cont">
					<p><bold> <?php
                    $reading = getweightdetails($_SESSION['id']);
                    echo $reading[0]['reading']." ".$reading[0]['type'];
                    ?></p></bold>
				</div>
				<a href="create_weight.php"><span class="icon-plus icon-2x" style="color: #b2c831; margin-left:100px"></span></a>
      		</div>

      		<div class="half-unit">
	      		<dtitle>height</dtitle>
	      		<hr>
	      		<div class="cont">
					<p><bold> <?php
                    $reading = getheightdetails($_SESSION['id']);
                    echo $reading[0]['reading']." ".$reading[0]['type'];
                    ?></p></bold>
				</div>
				<a href="create_height.php"><span class="icon-plus icon-2x" style="color: #b2c831; margin-left:100px"></span></a>
	      		<!-- <span class="fa fa-plus fa-2x" style="color: #b2c831; margin-right: 50px"></span> -->
      		</div>
      	</div>

      	<div class="col-sm-3 col-lg-3">

	  <!-- LIVE VISITORS BLOCK -->     
      		<div class="half-unit">
	      		<dtitle>heart Rate </dtitle>
	      		<hr>
	      		<div class="cont">
					<p><bold> <?php
                    $reading = getheartratedetails($_SESSION['id']);
                    echo $reading[0]['reading']." ".$reading[0]['type'];
                    ?></p></bold>
				</div>
				<a href="create_heart_rate.php"><span class="icon-plus icon-2x" style="color: #b2c831; margin-left:100px"></span></a>
      		</div>

      		<div class="half-unit">
	      		<dtitle>Add Documents</dtitle>
	      		<hr>
	      		<div class="cont">
				</div>
				<a href="create_documents.php"><span class="icon-plus icon-3x" style="color: #b2c831; margin-left:90px"></span></a>
      		</div>



      	</div>

      	
    </div>
    <br>

      	<div class="row" style="margin-left: 90px">
      	<div class="col-sm-3 col-lg-5">
	  
	  <!-- BARS CHART - lineandbars.js file -->     
      			<div class="half-unit" style="width: 90%; height:70%">
	      		<dtitle>Upcoming Appointments </dtitle>
	      		<hr>
	      		<div id="calendar"></div>
                                <script>
                                $('#calendar').fullCalendar({
                                //defaultDate: '',
                                editable: true,
                                eventLimit: true, // allow "more" link when too many events
                                events: 
                                   <?php echo $appointment_date; 
                                   ?>

                                });
                                </script>
				<a href="create_appointments.php"><span class="icon-plus icon-2x" style="color: #b2c831; margin-left:150px"></span></a>
      		</div>
      		</div>  
      		<div class="col-sm-3 col-lg-5">
	  
	  <!-- BARS CHART - lineandbars.js file -->     
      			<div class="half-unit" style="width: 90%; height:70%">
	      		<dtitle>Prescription </dtitle>
	      		<hr>
	      		<div id="calendar-2"></div>
                                <script>
                                $('#calendar-2').fullCalendar({
                                //defaultDate: '',
                                editable: true,
                                eventLimit: true, // allow "more" link when too many events
                                events: 
                                   <?php  
                                   echo $data;?>

                                });
                                </script>
				<a href="create_prescription.php"><span class="icon-plus icon-2x" style="color: #b2c831; margin-left:150px"></span></a>
      		</div>
      		</div>  
</div>

   

      	
      	

	  
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="assets/js/lineandbars.js"></script>
    
	<script type="text/javascript" src="assets/js/dash-charts.js"></script>
	<script type="text/javascript" src="assets/js/gauge.js"></script>
	
	<!-- NOTY JAVASCRIPT -->
	<script type="text/javascript" src="assets/js/noty/jquery.noty.js"></script>
	<script type="text/javascript" src="assets/js/noty/layouts/top.js"></script>
	<script type="text/javascript" src="assets/js/noty/layouts/topLeft.js"></script>
	<script type="text/javascript" src="assets/js/noty/layouts/topRight.js"></script>
	<script type="text/javascript" src="assets/js/noty/layouts/topCenter.js"></script>
	
	<!-- You can add more layouts if you want -->
	<script type="text/javascript" src="assets/js/noty/themes/default.js"></script>
    <!-- <script type="text/javascript" src="assets/js/dash-noty.js"></script> This is a Noty bubble when you init the theme-->
	<script type="text/javascript" src="http://code.highcharts.com/highcharts.js"></script>
	<script src="assets/js/jquery.flexslider.js" type="text/javascript"></script>

    <script type="text/javascript" src="assets/js/admin.js"></script>
  
</body></html>