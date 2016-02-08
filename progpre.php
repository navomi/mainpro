<!DOCTYPE html>
<?php include('connection.php'); global $conn; ?> 
<?php session_start(); ?>
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
    <![endif]

main color : #1abc9c

    -->
     <link href="dashboard/css/otherstyles.css" rel="stylesheet"> 
      <link rel="stylesheet" href="http://www.amcharts.com/lib/style.css" type="text/css">
  <script src="amcharts/amcharts.js" type="text/javascript"></script>
<script src="amcharts/serial.js" type="text/javascript"></script>
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
                            <h2>Blood Pressure </h2> ADD <button><a href="blood_pressure.php">+</a></button>

                        </legend>
                        </fieldset>
                       <!-- <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
                        <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>-->
                   
                            <?php
                            function getbloodpressuredetails($id) 
                            {
                                global $conn;
                                if ($stmt = $conn->prepare("SELECT para_date, para_time, reading, type  FROM `tracking_para`  where $id = ? and para_id = 1 ORDER BY para_date ASC")) 
                                     {
                                        $stmt->bind_param("i", $id);
                                        $stmt->execute();
                                        $stmt->bind_result($para_date, $para_time, $reading, $type);
                                        while ($stmt->fetch()) 
                                        {
                                        $rows[] = array('para_date' => $para_date, 'para_time' => $para_time, 'reading' => $reading, 'type' => $type);
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
                            <?php $blood_pressure = getbloodpressuredetails($_SESSION['id']);?>

                            <script type="text/javascript">
                                AmCharts.loadJSON = function(url) {
                                // create the request
                                if (window.XMLHttpRequest) {
                                // IE7+, Firefox, Chrome, Opera, Safari
                                var request = new XMLHttpRequest();
                                } else {
                                // code for IE6, IE5
                                var request = new ActiveXObject('Chrome.XMLHTTP');
                                }

                                // load it
                                // the last "false" parameter ensures that our code will wait before the
                                // data is loaded
                                request.open('GET', url, false);
                                request.send();

                                // parse and return the output
                                return eval(request.responseText);
                                };
                                </script>
                                <div id="chartdiv" style="width: 600px; height: 300px;"></div>

                                                <!-- the chart code -->
                            <script>
                        var chart;

                        // create chart
                        AmCharts.ready(function() {

                        // load the data
                        var chartData = AmCharts.loadJSON('blooddata.php');

                        // SERIAL CHART
                        chart = new AmCharts.AmSerialChart();
                        chart.pathToImages = "amcharts/images/";
                        chart.dataProvider = chartData;
                        chart.categoryField = "para_date";
                        chart.dataDateFormat = "YYYY-MM-DD";

                        // GRAPHS

                        var graph1 = new AmCharts.AmGraph();
                        graph1.valueField = "reading";
                        graph1.bullet = "round";
                        graph1.bulletBorderColor = "#FFFFFF";
                        graph1.bulletBorderThickness = 2;
                        graph1.lineThickness = 2;
                        graph1.lineAlpha = 0.5;
                        chart.addGraph(graph1);



                        // CATEGORY AXIS
                        chart.categoryAxis.parseDates = true;

                        // WRITE
                        chart.write("chartdiv");
                        });

                                                </script>
                            

                            <div class="panel-body bio-graph-info">
                              <h1>Details</h1>
                              <div class="row">
                              
                                <div class="bio-row">
                                <table id="final" class="table table-stripped" style= "margin:10px;">
                                  <tr>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Reading</th>
                                    <!--<th>Type</th>-->
                                   </tr>
                                    <?php
                                        foreach ($blood_pressure as $single) {
                                            echo "<tr>";
                                            echo "<td>$single[para_date]</td>";
                                            echo "<td>$single[para_time]</td>";
                                            echo "<td>$single[reading] $single[type]</td>";
                                            //echo "<td>$single[type]</td>";
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
