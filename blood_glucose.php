<!DOCTYPE html>
<?php session_start(); ?>
<?php include('connection.php'); global $conn ?> 
<html lang="en">

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
                        </ul>
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
                <legend > <h2>Blood Glucose<input type="hidden" name="glucose" value="2" /> </h2></legend>
    
                <div>
                <label style="margin-left:10px;" >Date</label>
                <br>
                    <input type="date" name="glu_date" style="margin-left:10px;" />
                </div>
<br>
                <div>
                <label style="margin-left:10px;" >Time</label>
                <br>
                    <input type="time" name="glu_time" style="margin-left:10px;" />
                </div>
<br>
                <div>
                <label style="margin-left:10px;">Reading</label><label style="margin-left:150px;" > Reading Type </label>
                <br>
                <input type="text" name="reading" style="margin-left:10px;">
                <select name ="type" style="margin-left:35px;">
                    <option value="mg">mg/dL </option>
                </select>
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
                  $glucose = $_POST['glucose'];
                  $glu_date = $_POST['glu_date'];   
                  $glu_time = $_POST['glu_time'];         
                  $reading = $_POST['reading'];
                  $type = $_POST['type'];
                  


            
                  if($stmt =$conn->prepare("INSERT INTO tracking_para(para_id, id, para_date, para_time, reading, type) values(?,?,?,?,?,?)"))
                   {
                    $stmt->bind_param('iisss', $glucose, $_SESSION['id'], $glu_date, $glu_time, $reading, $type);
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
