<!doctype html>
<?php include('connection.php'); global $conn ?> 
<?php include('side.php');?>
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
    
                            <?php $userdeets = getUserdetails($_SESSION['id']);?>
<html><head>
    <meta charset="utf-8">
    <title>BLOCKS - Bootstrap Dashboard Theme</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="assets/css/bootstrapuser.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">
    <link href="assets/css/font-style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/register.css">

	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>

    

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
	</head>
  <body>

  	<!-- NAVIGATION MENU -->

    <div class="container">
        <div class="row">

        	<div class="col-lg-3">
        		<center>
        		<div class="register-info-wraper">
        			<div id="register-info">
        				<div class="cont2">
        					<div class="thumbnail">
								<img src="<?php $name = getUserdetails($_SESSION['id']); echo 'upload/'.$name[0]['user_photo']; ?>" alt="<?php echo "No photo available"?>" class="img-square" height="400" width="300">
							</div><!-- /thumbnail -->

							<h2><?php
                    $name = getUserdetails($_SESSION['id']);
                    echo $name[0]['fname']." ".$name[0]['lname'];
                    ?></h2>
        				</div>
        				<div class="row">
        					<div class="col-lg-3">
        						<div class="cont3">
        							<p><ok>First Name:</ok>  <?php echo $userdeets[0]['fname']; ?></p>
        							<p><ok>Mail:</ok> <?php echo $userdeets[0]['email'] ?></p>
        							<p><ok>Date Of Birth:</ok> <?php echo $userdeets[0]['age']; ?></p>
        							<p><ok>Address:</ok> <?php echo $userdeets[0]['address'] ?></p>
        						</div>
        					</div>
        					<div class="col-lg-3">
        						<div class="cont3">
        						<p><ok>Last Name:</ok> <?php echo $userdeets[0]['lname'] ?></p>
        						<p><ok>Gender:</ok> <?php echo $userdeets[0]['gender'] ?></p>
        						<p><ok>Phone:</ok> <?php echo $userdeets[0]['phone']; ?></p>
        						<p><ok>Emergency Contact</ok> <?php echo $userdeets[0]['emergency'] ?></p>
        						</div>
        					</div>
        				</div><!-- /inner row -->
						<hr>
						<div class="cont2">
							<h2>Choose Your Option</h2>
						</div>
						<br>
							<div class="info-user2">
								<a href="dashboard.php"><span aria-hidden="true" class="li_shop fs1"></span></a>
								<a href="user_edit.php"><span aria-hidden="true" class="li_pen fs1"></span></a>
							</div>

        				</center>
        			</div>
              
        		</div>

        	</div>

        

	<!-- /footerwrap -->


    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/bootstrap.js"></script>

  
</body></html>