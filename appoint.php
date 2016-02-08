<!DOCTYPE html>
<html lang="en">
<?php include('connection.php'); global $conn ?> 
<?php session_start(); ?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> MyHealthPal </title>

    <!-- Bootstrap Core CSS -->
    <link href="dashboard/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dashboard/css/simple-sidebar.css" rel="stylesheet"> 

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                      <font size="6">  MyHealthPal </font>
                    </a>
                </li>
                <li>
                    <a href="dashboard.php">Dashboard</a>
                </li>
                 <li data-toggle="collapse" href="#collapse1" ><a>Medical Parameters</a> </li>
                    <div id="collapse1" class="panel-collapse collapse">
                        <ul calss="sidebar-nav" >
                             <li > <a href="progpre.php">Blood Pressure </a></li>
                            <li ><a href="progglu.php" >Blood Glucose </a></li>
                            <li ><a href="progwei.php" >Weight </a></li>
                            <li ><a href="proghei.php" >Height </a></li>
                            <li ><a href="proghea.php" >Heart Rate </a></li>
                    </div>
                <li>
                    <a href="treatments.php">Treatments</a>
                </li>
                
                 <li data-toggle="collapse" href="#collapse2" ><a>Ailments</a> </li>
                    <div id="collapse2" class="panel-collapse collapse">
                        <ul calss="sidebar-nav" >
                            <li > <a href="#">Fever </a></li>
                            <li ><a href="#" >Skin Condition </a></li>
                            <li ><a href="#" >Dengue </a></li>
                            <li ><a href="#" >Typhoid </a></li>
                            <li ><a href="#" >Chicken Gunya </a></li>
                            <li ><a href="#" >Diarrhea </a></li>
                            <li ><a href="#" >Malaria</a></li>
                         </ul>
                    </div>
               <li>
                    <a href="appointements.php">Appointments</a>
                </li>
                 <li>
                    <a href="prescription.php">Prescription</a>
                </li>
                <li>
                    <a href="documents.php">Documents</a>
                </li>
                 <li>
                    <a href="logout.php">Logout</a>
                </li>
                
                
            </ul>
        </div>
           <div class="container">
    <form action="" method="POST">
    <br><br>
    <fieldset>
                <legend > <h2>Appointment </h2></legend>
    
                <div>
                <label style="margin-left:10px;" >Appointment Date</label>
                <br>
                     <input type="date" name="app_date" style="margin-left:10px;" />
                </div>
<br>
                <div>
                <label style="margin-left:10px;" >Time of the appointment</label>
                <br>
                     <input type="time" name="app_time" style="margin-left:10px;" />
                </div>
<br>
                <div>
                <label style="margin-left:10px;" > Doctors Name </label>
                <br>
                    <input type="text" name="doctor" style="margin-left:10px;"> 
                </div>
<br>
                 <div>
                <label style="margin-left:10px;" > hospital </label>
                <br>
                    <input type="text" name="hospital" style="margin-left:10px;"> 
                </div>
<br>
                <div>
                <label style="margin-left:10px;" > Reason </label>
                <br>
                    <textarea class=".form-control:focus" rows="7" cols="70" name="reason" style="margin-left:10px;"> </textarea> 
                </div>
<br>


                <input type="submit" style="margin-left:10px;" name="submit" value="submit" class="btn btn-default"/>
                </div>

    </fieldset>
    </form>
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="dashboard/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="dashboard/js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
 

<?php

            if(isset($_POST['submit']))
                {
                  $app_date = $_POST['app_date'];   
                  $app_time = $_POST['app_time'];         
                  $doctor = $_POST['doctor'];
                  $hospital = $_POST['hospital'];
                  $reason = $_POST['reason'];


            
                  if($stmt =$conn->prepare("INSERT INTO appointment(id, app_date, app_time, doctor_name, hospital, reason) values(?,?,?,?,?,?)"))
                   {
                    $stmt->bind_param('isssss', $_SESSION['id'],$app_date, $app_time, $doctor, $hospital, $reason  );
                    $result = $stmt->execute();
                    $stmt->close();
                echo $result;
                  }
                  else
                  {
                   echo "error with insertion ";
                  }  

                }
           
               
        ?>

        <?php 
        if($result)
        {
          $message = "Succesfull";
                echo "<script type='text/javascript'>alert('$message');</script>";

        }
        ?>

</body>
</html>