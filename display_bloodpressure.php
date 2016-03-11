<!DOCTYPE html>
<?php include('connection.php');
include('side.php'); global $conn; ?> 
<?php session_start(); ?>
<html lang="en">

<head>

    <link rel="stylesheet" href="http://www.amcharts.com/lib/style.css" type="text/css">
    <script src="amcharts/amcharts.js" type="text/javascript"></script>
    <script src="amcharts/serial.js" type="text/javascript"></script>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
    
</head>
<body>
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <fieldset>
   
                        <legend > 
                            <h2>Blood Pressure </h2> ADD <a href="create_blood_pressure.php"><span class="icon-plus icon-2x" style="color: #b2c831; margin-left: 10px"></a> 

                        </legend>
                        </fieldset>
                       <!-- <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
                        <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>-->
                   <!-- MONTH(para_date) = 1 -->
                   <?php
                            function getalldetails($id) 
                            {
                                global $conn;
                                if ($stmt = $conn->prepare("SELECT parameter_no, para_date, para_time, reading, type  FROM `tracking_para` where id = ? and para_id = 1 ORDER BY para_date ASC")) 
                                     {
                                        $stmt->bind_param("i", $id);
                                        $stmt->execute();
                                        $stmt->bind_result($parameter_no, $para_date, $para_time, $reading, $type);
                                        while ($stmt->fetch()) 
                                        {
                                        $rows[] = array('parameter_no' => $parameter_no, 'para_date' => $para_date, 'para_time' => $para_time, 'reading' => $reading, 'type' => $type);
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
                            function getjanuarydetails($id) 
                            {
                                global $conn;
                                if ($stmt = $conn->prepare("SELECT parameter_no, para_date, para_time, reading, type  FROM `tracking_para` where id = ? and para_id = 1 and MONTH(para_date) = 1 ORDER BY para_date ASC")) 
                                     {
                                        $stmt->bind_param("i", $id);
                                        $stmt->execute();
                                        $stmt->bind_result($parameter_no, $para_date, $para_time, $reading, $type);
                                        while ($stmt->fetch()) 
                                        {
                                        $rows[] = array('parameter_no' => $parameter_no, 'para_date' => $para_date, 'para_time' => $para_time, 'reading' => $reading, 'type' => $type);
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

                            function getfebruarydetails($id) 
                            {
                                global $conn;
                                if ($stmt = $conn->prepare("SELECT parameter_no, para_date, para_time, reading, type  FROM `tracking_para` where id = ? and para_id = 1 and MONTH(para_date) = 2 ORDER BY para_date ASC")) 
                                     {
                                        $stmt->bind_param("i", $id);
                                        $stmt->execute();
                                        $stmt->bind_result($parameter_no, $para_date, $para_time, $reading, $type);
                                        while ($stmt->fetch()) 
                                        {
                                        $rows[] = array('parameter_no' => $parameter_no, 'para_date' => $para_date, 'para_time' => $para_time, 'reading' => $reading, 'type' => $type);
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
                            function getmarchdetails($id) 
                            {
                                global $conn;
                                if ($stmt = $conn->prepare("SELECT parameter_no, para_date, para_time, reading, type  FROM `tracking_para` where id = ? and para_id = 1 and MONTH(para_date) = 3 ORDER BY para_date ASC")) 
                                     {
                                        $stmt->bind_param("i", $id);
                                        $stmt->execute();
                                        $stmt->bind_result($parameter_no, $para_date, $para_time, $reading, $type);
                                        while ($stmt->fetch()) 
                                        {
                                        $rows[] = array('parameter_no' => $parameter_no, 'para_date' => $para_date, 'para_time' => $para_time, 'reading' => $reading, 'type' => $type);
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
                            function getaprildetails($id) 
                            {
                                global $conn;
                                if ($stmt = $conn->prepare("SELECT parameter_no, para_date, para_time, reading, type  FROM `tracking_para` where id = ? and para_id = 1 and MONTH(para_date) = 4 ORDER BY para_date ASC")) 
                                     {
                                        $stmt->bind_param("i", $id);
                                        $stmt->execute();
                                        $stmt->bind_result($parameter_no, $para_date, $para_time, $reading, $type);
                                        while ($stmt->fetch()) 
                                        {
                                        $rows[] = array('parameter_no' => $parameter_no, 'para_date' => $para_date, 'para_time' => $para_time, 'reading' => $reading, 'type' => $type);
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
                            function getmaydetails($id) 
                            {
                                global $conn;
                                if ($stmt = $conn->prepare("SELECT parameter_no, para_date, para_time, reading, type  FROM `tracking_para` where id = ? and para_id = 1 and MONTH(para_date) = 5 ORDER BY para_date ASC")) 
                                     {
                                        $stmt->bind_param("i", $id);
                                        $stmt->execute();
                                        $stmt->bind_result($parameter_no, $para_date, $para_time, $reading, $type);
                                        while ($stmt->fetch()) 
                                        {
                                        $rows[] = array('parameter_no' => $parameter_no, 'para_date' => $para_date, 'para_time' => $para_time, 'reading' => $reading, 'type' => $type);
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
                            function getjunedetails($id) 
                            {
                                global $conn;
                                if ($stmt = $conn->prepare("SELECT parameter_no, para_date, para_time, reading, type  FROM `tracking_para` where id = ? and para_id = 1 and MONTH(para_date) = 6 ORDER BY para_date ASC")) 
                                     {
                                        $stmt->bind_param("i", $id);
                                        $stmt->execute();
                                        $stmt->bind_result($parameter_no, $para_date, $para_time, $reading, $type);
                                        while ($stmt->fetch()) 
                                        {
                                        $rows[] = array('parameter_no' => $parameter_no, 'para_date' => $para_date, 'para_time' => $para_time, 'reading' => $reading, 'type' => $type);
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
                            function getjulydetails($id) 
                            {
                                global $conn;
                                if ($stmt = $conn->prepare("SELECT parameter_no, para_date, para_time, reading, type  FROM `tracking_para` where id = ? and para_id = 1 and MONTH(para_date) = 7 ORDER BY para_date ASC")) 
                                     {
                                        $stmt->bind_param("i", $id);
                                        $stmt->execute();
                                        $stmt->bind_result($parameter_no, $para_date, $para_time, $reading, $type);
                                        while ($stmt->fetch()) 
                                        {
                                        $rows[] = array('parameter_no' => $parameter_no, 'para_date' => $para_date, 'para_time' => $para_time, 'reading' => $reading, 'type' => $type);
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
                            function getaugustdetails($id) 
                            {
                                global $conn;
                                if ($stmt = $conn->prepare("SELECT parameter_no, para_date, para_time, reading, type  FROM `tracking_para` where id = ? and para_id = 1 and MONTH(para_date) = 8 ORDER BY para_date ASC")) 
                                     {
                                        $stmt->bind_param("i", $id);
                                        $stmt->execute();
                                        $stmt->bind_result($parameter_no, $para_date, $para_time, $reading, $type);
                                        while ($stmt->fetch()) 
                                        {
                                        $rows[] = array('parameter_no' => $parameter_no, 'para_date' => $para_date, 'para_time' => $para_time, 'reading' => $reading, 'type' => $type);
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
                            function getseptemberdetails($id) 
                            {
                                global $conn;
                                if ($stmt = $conn->prepare("SELECT parameter_no, para_date, para_time, reading, type  FROM `tracking_para` where id = ? and para_id = 1 and MONTH(para_date) = 9 ORDER BY para_date ASC")) 
                                     {
                                        $stmt->bind_param("i", $id);
                                        $stmt->execute();
                                        $stmt->bind_result($parameter_no, $para_date, $para_time, $reading, $type);
                                        while ($stmt->fetch()) 
                                        {
                                        $rows[] = array('parameter_no' => $parameter_no, 'para_date' => $para_date, 'para_time' => $para_time, 'reading' => $reading, 'type' => $type);
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
                            function getoctoberdetails($id) 
                            {
                                global $conn;
                                if ($stmt = $conn->prepare("SELECT parameter_no, para_date, para_time, reading, type  FROM `tracking_para` where id = ? and para_id = 1 and MONTH(para_date) = 10 ORDER BY para_date ASC")) 
                                     {
                                        $stmt->bind_param("i", $id);
                                        $stmt->execute();
                                        $stmt->bind_result($parameter_no, $para_date, $para_time, $reading, $type);
                                        while ($stmt->fetch()) 
                                        {
                                        $rows[] = array('parameter_no' => $parameter_no, 'para_date' => $para_date, 'para_time' => $para_time, 'reading' => $reading, 'type' => $type);
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
                            function getnovemberdetails($id) 
                            {
                                global $conn;
                                if ($stmt = $conn->prepare("SELECT parameter_no, para_date, para_time, reading, type  FROM `tracking_para` where id = ? and para_id = 1 and MONTH(para_date) = 11 ORDER BY para_date ASC")) 
                                     {
                                        $stmt->bind_param("i", $id);
                                        $stmt->execute();
                                        $stmt->bind_result($parameter_no, $para_date, $para_time, $reading, $type);
                                        while ($stmt->fetch()) 
                                        {
                                        $rows[] = array('parameter_no' => $parameter_no, 'para_date' => $para_date, 'para_time' => $para_time, 'reading' => $reading, 'type' => $type);
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
                            function getdecemberdetails($id) 
                            {
                                global $conn;
                                if ($stmt = $conn->prepare("SELECT parameter_no, para_date, para_time, reading, type  FROM `tracking_para` where id = ? and para_id = 1 and MONTH(para_date) = 12 ORDER BY para_date ASC")) 
                                     {
                                        $stmt->bind_param("i", $id);
                                        $stmt->execute();
                                        $stmt->bind_result($parameter_no, $para_date, $para_time, $reading, $type);
                                        while ($stmt->fetch()) 
                                        {
                                        $rows[] = array('parameter_no' => $parameter_no, 'para_date' => $para_date, 'para_time' => $para_time, 'reading' => $reading, 'type' => $type);
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

                            <?php $january = getjanuarydetails($_SESSION['id']);
                            $february = getfebruarydetails($_SESSION['id']);
                            $march = getmarchdetails($_SESSION['id']);
                            $april = getaprildetails($_SESSION['id']);
                            $may = getmaydetails($_SESSION['id']);
                            $june = getjunedetails($_SESSION['id']);
                            $july = getjulydetails($_SESSION['id']);
                            $august = getaugustdetails($_SESSION['id']);
                            $September = getseptemberdetails($_SESSION['id']);
                            $october = getoctoberdetails($_SESSION['id']);
                            $november = getnovemberdetails($_SESSION['id']);
                            $december = getdecemberdetails($_SESSION['id']);
                            $all = getalldetails($_SESSION['id']);

                            ?>
                            

                            <?php
                            function deleterow($parameter_no)
                                {
                                 global $conn;
                                //$_doc= $_POST['delete'];
                                 if($stmt = $conn->prepare("DELETE from `tracking_para` WHERE parameter_no = ?"))
                                     {
                                         $stmt->bind_param("i", $parameter_no);
                                         $stmt->execute();
                                     }
                                else
                                    {
                                        printf("Error message: %s\n", $conn->error);
                                    }
             # code...
                                } 
                            ?> 
                            <?php 
                                if(isset($_POST['delete']))
                                {
                                    deleterow($_POST['delete']);
                                } 
                                ?>

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
                                var chartData = AmCharts.loadJSON('chartdata_bloodpressure.php');

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
                              
                              <form method="POST" action="">
                                    <label><h1>Details</h1></label>
                                    <label style="margin: 10px;"> Display By Month</label>
                                    <select name ="month" >
                                    <option value="1">--ALL--</option>
                                    <option value="2"> january </option>
                                    <option value="3"> february </option>
                                    <option value="4"> March </option>
                                    <option value="5"> April </option>
                                    <option value="6"> May </option>
                                    <option value="7"> June </option>
                                    <option value="8"> July </option>
                                    <option value="9"> August </option>
                                    <option value="10"> September </option>
                                    <option value="11"> October </option>
                                    <option value="12"> November </option>
                                    <option value="13"> December </option>
                                    
                                    </select>
                                    <input type="submit">
                              </form>
                               

                              <div class="row">
                              
                                <div class="bio-row">

                                    <table id="final" class="table table-stripped" style= "margin:10px;">
                                      <tr>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Reading</th>
                                        <th> </th>
                                        <th> </th>
                                        <!--<th>Type</th>-->
                                       </tr>

                                        <?php

                                        if(isset($_POST['month'])){
                                            $select1 = $_POST['month'];
                                               
                                            switch ($select1) {
                                                case '1':
                                                 if(!$all) { 
                                                 echo '<td><h4>Nothing To Display. Add In Details<h4><td>'; 
                                                }                                                       
                                            else {
                                                foreach ($all as $single) {
                                                    echo "<tr>";
                                                echo "<td>$single[para_date]</td>";
                                                echo "<td>$single[para_time]</td>";
                                                echo "<td>$single[reading] $single[type]</td>";
                                                echo "<td><form action='updatepressure.php' method='GET'>
                                                          <input type='hidden' name='edit' value='$single[parameter_no]'>
                                                          <input type='submit' value='Edit' class='btn btn-primary' onclick='updatepressure.php'> </form> </td>";
                                                echo   "  <td><form action='' method='POST'>     
                                                          <input type='hidden' name='delete' value='$single[parameter_no]'>
                                                          <input type='submit' value='Delete' class='btn btn-primary'></form></td>";
                                                echo "</tr>";
                                            }
                                                 
                                            }
                                            break;

                                             case '2':
                                                 if(!$january) { 
                                                 echo '<td><h4>Nothing To Display. Add In Details<h4><td>'; 
                                                }                                                       
                                            else {
                                                foreach ($january as $single) {
                                                    echo "<tr>";
                                                echo "<td>$single[para_date]</td>";
                                                echo "<td>$single[para_time]</td>";
                                                echo "<td>$single[reading] $single[type]</td>";
                                                echo "<td><form action='updatepressure.php' method='GET'>
                                                          <input type='hidden' name='edit' value='$single[parameter_no]'>
                                                          <input type='submit' value='Edit' class='btn btn-primary' onclick='updatepressure.php'> </form> </td>";
                                                echo   "  <td><form action='' method='POST'>     
                                                          <input type='hidden' name='delete' value='$single[parameter_no]'>
                                                          <input type='submit' value='Delete' class='btn btn-primary'></form></td>";
                                                echo "</tr>";
                                            }
                                                 
                                            }
                                            break;

                                             case '3':
                                                 if(!$february) { 
                                                 echo '<td><h4>Nothing To Display. Add In Details<h4><td>'; 
                                                }                                                       
                                            else {
                                                foreach ($february as $single) {
                                                    echo "<tr>";
                                                echo "<td>$single[para_date]</td>";
                                                echo "<td>$single[para_time]</td>";
                                                echo "<td>$single[reading] $single[type]</td>";
                                                echo "<td><form action='updatepressure.php' method='GET'>
                                                          <input type='hidden' name='edit' value='$single[parameter_no]'>
                                                          <input type='submit' value='Edit' class='btn btn-primary' onclick='updatepressure.php'> </form> </td>";
                                                echo   "  <td><form action='' method='POST'>     
                                                          <input type='hidden' name='delete' value='$single[parameter_no]'>
                                                          <input type='submit' value='Delete' class='btn btn-primary'></form></td>";
                                                echo "</tr>";
                                            }
                                                 
                                            }
                                          
                                    
                                            break;

                                            case '4':
                                                 if(!$march) { 
                                                 echo '<td><h4>Nothing To Display. Add In Details<h4><td>'; 
                                                }                                                       
                                            else {
                                                foreach ($march as $single) {
                                                    echo "<tr>";
                                                echo "<td>$single[para_date]</td>";
                                                echo "<td>$single[para_time]</td>";
                                                echo "<td>$single[reading] $single[type]</td>";
                                                echo "<td><form action='updatepressure.php' method='GET'>
                                                          <input type='hidden' name='edit' value='$single[parameter_no]'>
                                                          <input type='submit' value='Edit' class='btn btn-primary' onclick='updatepressure.php'> </form> </td>";
                                                echo   "  <td><form action='' method='POST'>     
                                                          <input type='hidden' name='delete' value='$single[parameter_no]'>
                                                          <input type='submit' value='Delete' class='btn btn-primary'></form></td>";
                                                echo "</tr>";
                                            }
                                                 
                                            }
                                            break;
                                            case '5':
                                                 if(!$april) { 
                                                 echo '<td><h4>Nothing To Display. Add In Details<h4><td>'; 
                                                }                                                       
                                            else {
                                                foreach ($april as $single) {
                                                    echo "<tr>";
                                                echo "<td>$single[para_date]</td>";
                                                echo "<td>$single[para_time]</td>";
                                                echo "<td>$single[reading] $single[type]</td>";
                                                echo "<td><form action='updatepressure.php' method='GET'>
                                                          <input type='hidden' name='edit' value='$single[parameter_no]'>
                                                          <input type='submit' value='Edit' class='btn btn-primary' onclick='updatepressure.php'> </form> </td>";
                                                echo   "  <td><form action='' method='POST'>     
                                                          <input type='hidden' name='delete' value='$single[parameter_no]'>
                                                          <input type='submit' value='Delete' class='btn btn-primary'></form></td>";
                                                echo "</tr>";
                                            }
                                                 
                                            }
                                            break;
                                            case '6':
                                                 if(!$may) { 
                                                 echo '<td><h4>Nothing To Display. Add In Details<h4><td>'; 
                                                }                                                       
                                            else {
                                                foreach ($may as $single) {
                                                    echo "<tr>";
                                                echo "<td>$single[para_date]</td>";
                                                echo "<td>$single[para_time]</td>";
                                                echo "<td>$single[reading] $single[type]</td>";
                                                echo "<td><form action='updatepressure.php' method='GET'>
                                                          <input type='hidden' name='edit' value='$single[parameter_no]'>
                                                          <input type='submit' value='Edit' class='btn btn-primary' onclick='updatepressure.php'> </form> </td>";
                                                echo   "  <td><form action='' method='POST'>     
                                                          <input type='hidden' name='delete' value='$single[parameter_no]'>
                                                          <input type='submit' value='Delete' class='btn btn-primary'></form></td>";
                                                echo "</tr>";
                                            }
                                                 
                                            }
                                            break;

                                            case '7':
                                                 if(!$june) { 
                                                 echo '<td><h4>Nothing To Display. Add In Details<h4><td>'; 
                                                }                                                       
                                            else {
                                                foreach ($june as $single) {
                                                    echo "<tr>";
                                                echo "<td>$single[para_date]</td>";
                                                echo "<td>$single[para_time]</td>";
                                                echo "<td>$single[reading] $single[type]</td>";
                                                echo "<td><form action='updatepressure.php' method='GET'>
                                                          <input type='hidden' name='edit' value='$single[parameter_no]'>
                                                          <input type='submit' value='Edit' class='btn btn-primary' onclick='updatepressure.php'> </form> </td>";
                                                echo   "  <td><form action='' method='POST'>     
                                                          <input type='hidden' name='delete' value='$single[parameter_no]'>
                                                          <input type='submit' value='Delete' class='btn btn-primary'></form></td>";
                                                echo "</tr>";
                                            }
                                                 
                                            }
                                            break;

                                            case '8':
                                                 if(!$july) { 
                                                 echo '<td><h4>Nothing To Display. Add In Details<h4><td>'; 
                                                }                                                       
                                            else {
                                                foreach ($july as $single) {
                                                    echo "<tr>";
                                                echo "<td>$single[para_date]</td>";
                                                echo "<td>$single[para_time]</td>";
                                                echo "<td>$single[reading] $single[type]</td>";
                                                echo "<td><form action='updatepressure.php' method='GET'>
                                                          <input type='hidden' name='edit' value='$single[parameter_no]'>
                                                          <input type='submit' value='Edit' class='btn btn-primary' onclick='updatepressure.php'> </form> </td>";
                                                echo   "  <td><form action='' method='POST'>     
                                                          <input type='hidden' name='delete' value='$single[parameter_no]'>
                                                          <input type='submit' value='Delete' class='btn btn-primary'></form></td>";
                                                echo "</tr>";
                                            }
                                                 
                                            }
                                            break;

                                            case '9':
                                                 if(!$august) { 
                                                 echo '<td><h4>Nothing To Display. Add In Details<h4><td>'; 
                                                }                                                       
                                            else {
                                                foreach ($august as $single) {
                                                    echo "<tr>";
                                                echo "<td>$single[para_date]</td>";
                                                echo "<td>$single[para_time]</td>";
                                                echo "<td>$single[reading] $single[type]</td>";
                                                echo "<td><form action='updatepressure.php' method='GET'>
                                                          <input type='hidden' name='edit' value='$single[parameter_no]'>
                                                          <input type='submit' value='Edit' class='btn btn-primary' onclick='updatepressure.php'> </form> </td>";
                                                echo   "  <td><form action='' method='POST'>     
                                                          <input type='hidden' name='delete' value='$single[parameter_no]'>
                                                          <input type='submit' value='Delete' class='btn btn-primary'></form></td>";
                                                echo "</tr>";
                                            }
                                                 
                                            }
                                            break;
                                            
                                            case '10':
                                                 if(!$september) { 
                                                 echo '<td><h4>Nothing To Display. Add In Details<h4><td>'; 
                                                }                                                       
                                            else {
                                                foreach ($september as $single) {
                                                    echo "<tr>";
                                                echo "<td>$single[para_date]</td>";
                                                echo "<td>$single[para_time]</td>";
                                                echo "<td>$single[reading] $single[type]</td>";
                                                echo "<td><form action='updatepressure.php' method='GET'>
                                                          <input type='hidden' name='edit' value='$single[parameter_no]'>
                                                          <input type='submit' value='Edit' class='btn btn-primary' onclick='updatepressure.php'> </form> </td>";
                                                echo   "  <td><form action='' method='POST'>     
                                                          <input type='hidden' name='delete' value='$single[parameter_no]'>
                                                          <input type='submit' value='Delete' class='btn btn-primary'></form></td>";
                                                echo "</tr>";
                                            }
                                                 
                                            }
                                            break;
                                            case '11':
                                                 if(!$october) { 
                                                 echo '<td><h4>Nothing To Display. Add In Details<h4><td>'; 
                                                }                                                       
                                            else {
                                                foreach ($october as $single) {
                                                    echo "<tr>";
                                                echo "<td>$single[para_date]</td>";
                                                echo "<td>$single[para_time]</td>";
                                                echo "<td>$single[reading] $single[type]</td>";
                                                echo "<td><form action='updatepressure.php' method='GET'>
                                                          <input type='hidden' name='edit' value='$single[parameter_no]'>
                                                          <input type='submit' value='Edit' class='btn btn-primary' onclick='updatepressure.php'> </form> </td>";
                                                echo   "  <td><form action='' method='POST'>     
                                                          <input type='hidden' name='delete' value='$single[parameter_no]'>
                                                          <input type='submit' value='Delete' class='btn btn-primary'></form></td>";
                                                echo "</tr>";
                                            }
                                                 
                                            }
                                            break;
                                            case '12':
                                                 if(!$november) { 
                                                 echo '<td><h4>Nothing To Display. Add In Details<h4><td>'; 
                                                }                                                       
                                            else {
                                                foreach ($november as $single) {
                                                    echo "<tr>";
                                                echo "<td>$single[para_date]</td>";
                                                echo "<td>$single[para_time]</td>";
                                                echo "<td>$single[reading] $single[type]</td>";
                                                echo "<td><form action='updatepressure.php' method='GET'>
                                                          <input type='hidden' name='edit' value='$single[parameter_no]'>
                                                          <input type='submit' value='Edit' class='btn btn-primary' onclick='updatepressure.php'> </form> </td>";
                                                echo   "  <td><form action='' method='POST'>     
                                                          <input type='hidden' name='delete' value='$single[parameter_no]'>
                                                          <input type='submit' value='Delete' class='btn btn-primary'></form></td>";
                                                echo "</tr>";
                                            }
                                                 
                                            }
                                            break;
                                            case '13':
                                                 if(!$december) { 
                                                 echo '<td><h4>Nothing To Display. Add In Details<h4><td>'; 
                                                }                                                       
                                            else {
                                                foreach ($december as $single) {
                                                    echo "<tr>";
                                                echo "<td>$single[para_date]</td>";
                                                echo "<td>$single[para_time]</td>";
                                                echo "<td>$single[reading] $single[type]</td>";
                                                echo "<td><form action='updatepressure.php' method='GET'>
                                                          <input type='hidden' name='edit' value='$single[parameter_no]'>
                                                          <input type='submit' value='Edit' class='btn btn-primary' onclick='updatepressure.php'> </form> </td>";
                                                echo   "  <td><form action='' method='POST'>     
                                                          <input type='hidden' name='delete' value='$single[parameter_no]'>
                                                          <input type='submit' value='Delete' class='btn btn-primary'></form></td>";
                                                echo "</tr>";
                                            }
                                                 
                                            }
                                            break;

                                            default:
                                                    echo "<tr>";
                                                    echo"<td>no option available</td>";
                                                    echo "</tr>";
                                                    break;
                                           
                                        }
                                    }
                                        ?>
                                    </table>
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
