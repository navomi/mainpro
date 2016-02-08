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
    <link href="dashboard/css/otherstyles.css" rel="stylesheet">

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
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <fieldset>
   
                        <legend > 
                            <h2>Appointment </h2> ADD <button><a href="appoint.php">+</a></button>

                        </legend>
                        </fieldset>
                       <!-- <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
                        <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>
                        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>-->
                         <?php
                            function getappointmentdetails($id) 
                            {
                                global $conn;
                                if ($stmt = $conn->prepare("SELECT app_date, app_time, doctor_name, hospital, reason  FROM `Appointment`  where id = ? ")) 
                                     {
                                        $stmt->bind_param("i", $id);
                                        $stmt->execute();
                                        $stmt->bind_result($app_date, $app_time, $doctor_name, $hospital, $reason);
                                        while ($stmt->fetch()) 
                                        {
                                        $rows[] = array('app_date' => $app_date, 'app_time' => $app_time, 'doctor_name' => $doctor_name, 'hospital' => $hospital, 'reason' => $reason );
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
                            <div class="panel-body bio-graph-info">
                                          <h1>Details</h1>
                                          <div class="row">
                                          <?php $appointment = getappointmentdetails($_SESSION['id']);?>
                                              <div class="bio-row">
                                              <table class="table table-stripped" class="final" style= "margin:10px;">
                                              <tr> 
                                                <th>Date of the Appointment</th>
                                                <th>Time of the Appointment</th>
                                                <th>Doctors Name</th>
                                                <th>Hospital</th>
                                                <th>Reason</th>
                                                
                                                
                                               </tr>
                                                <?php
                                                    foreach ($appointment as $single) {
                                                        echo "<tr>";
                                                        echo "<td>$single[app_date]</td>";
                                                        echo "<td>$single[app_time]</td>";
                                                        echo "<td>$single[doctor_name] </td>";
                                                        echo "<td>$single[hospital] </td>";
                                                        echo "<td>$single[reason] </td>";
                                                        echo "</tr>";
                                                    }
                                                ?>
                                                </div>
                                                </table>
                                          </div>
                                      </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

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

</body>

</html>