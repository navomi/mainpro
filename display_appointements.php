<!DOCTYPE html>
<html lang="en">
<?php include('connection.php'); global $conn ?> 
<?php include('side.php'); ?>
<?php session_start(); ?>
<head>
<link rel='stylesheet' href='assets/css/fullcalendar.css' />
    <script src='assets/lib/jquery.min.js'></script>
    <script src='assets/lib/moment.min.js'></script>
    <script src='assets/js/fullcalendar.js'></script>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css">

</head>

<body>

  
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <fieldset>
   
                        <legend > 
                            <h2>Appointment </h2> ADD <a href="create_appointment.php"><span class="icon-plus icon-2x" style="color: #b2c831; margin-left: 10px"></a>

                        </legend>
                        </fieldset>
                       <!-- <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
                        <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>
                        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>-->
                            <?php
// Connect to MySQL
                            function getdatedetails($id) 
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
                                 $datedetails = getdatedetails($_SESSION['id']);
                                 $data = json_encode($datedetails);
                            
                            ?>
                         <?php
                            function getalldetails($id) 
                            {
                                global $conn;
                                if ($stmt = $conn->prepare("SELECT app_id, app_date, app_time, doctor_name, hospital, reason  FROM `Appointment`  where id = ? ")) 
                                     {
                                        $stmt->bind_param("i", $id);
                                        $stmt->execute();
                                        $stmt->bind_result($app_id, $app_date, $app_time, $doctor_name, $hospital, $reason);
                                        while ($stmt->fetch()) 
                                        {
                                        $rows[] = array('app_id' => $app_id,'app_date' => $app_date, 'app_time' => $app_time, 'doctor_name' => $doctor_name, 'hospital' => $hospital, 'reason' => $reason );
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
                                if ($stmt = $conn->prepare("SELECT app_id, app_date, app_time, doctor_name, hospital, reason  FROM `Appointment`  where id = ? and MONTH(app_date) = 1 ")) 
                                     {
                                        $stmt->bind_param("i", $id);
                                        $stmt->execute();
                                        $stmt->bind_result($app_id, $app_date, $app_time, $doctor_name, $hospital, $reason);
                                        while ($stmt->fetch()) 
                                        {
                                        $rows[] = array('app_id' => $app_id,'app_date' => $app_date, 'app_time' => $app_time, 'doctor_name' => $doctor_name, 'hospital' => $hospital, 'reason' => $reason );
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
                                if ($stmt = $conn->prepare("SELECT app_id, app_date, app_time, doctor_name, hospital, reason  FROM `Appointment`  where id = ? and MONTH(app_date) = 2 ")) 
                                     {
                                        $stmt->bind_param("i", $id);
                                        $stmt->execute();
                                        $stmt->bind_result($app_id, $app_date, $app_time, $doctor_name, $hospital, $reason);
                                        while ($stmt->fetch()) 
                                        {
                                        $rows[] = array('app_id' => $app_id,'app_date' => $app_date, 'app_time' => $app_time, 'doctor_name' => $doctor_name, 'hospital' => $hospital, 'reason' => $reason );
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
                                if ($stmt = $conn->prepare("SELECT app_id, app_date, app_time, doctor_name, hospital, reason  FROM `Appointment`  where id = ? and MONTH(app_date) = 3 ")) 
                                     {
                                        $stmt->bind_param("i", $id);
                                        $stmt->execute();
                                        $stmt->bind_result($app_id, $app_date, $app_time, $doctor_name, $hospital, $reason);
                                        while ($stmt->fetch()) 
                                        {
                                        $rows[] = array('app_id' => $app_id,'app_date' => $app_date, 'app_time' => $app_time, 'doctor_name' => $doctor_name, 'hospital' => $hospital, 'reason' => $reason );
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
                                if ($stmt = $conn->prepare("SELECT app_id, app_date, app_time, doctor_name, hospital, reason  FROM `Appointment`  where id = ? and MONTH(app_date) = 4 ")) 
                                     {
                                        $stmt->bind_param("i", $id);
                                        $stmt->execute();
                                        $stmt->bind_result($app_id, $app_date, $app_time, $doctor_name, $hospital, $reason);
                                        while ($stmt->fetch()) 
                                        {
                                        $rows[] = array('app_id' => $app_id,'app_date' => $app_date, 'app_time' => $app_time, 'doctor_name' => $doctor_name, 'hospital' => $hospital, 'reason' => $reason );
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
                                if ($stmt = $conn->prepare("SELECT app_id, app_date, app_time, doctor_name, hospital, reason  FROM `Appointment`  where id = ? and MONTH(app_date) = 5 ")) 
                                     {
                                        $stmt->bind_param("i", $id);
                                        $stmt->execute();
                                        $stmt->bind_result($app_id, $app_date, $app_time, $doctor_name, $hospital, $reason);
                                        while ($stmt->fetch()) 
                                        {
                                        $rows[] = array('app_id' => $app_id,'app_date' => $app_date, 'app_time' => $app_time, 'doctor_name' => $doctor_name, 'hospital' => $hospital, 'reason' => $reason );
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
                                if ($stmt = $conn->prepare("SELECT app_id, app_date, app_time, doctor_name, hospital, reason  FROM `Appointment`  where id = ? and MONTH(app_date) = 6")) 
                                     {
                                        $stmt->bind_param("i", $id);
                                        $stmt->execute();
                                        $stmt->bind_result($app_id, $app_date, $app_time, $doctor_name, $hospital, $reason);
                                        while ($stmt->fetch()) 
                                        {
                                        $rows[] = array('app_id' => $app_id,'app_date' => $app_date, 'app_time' => $app_time, 'doctor_name' => $doctor_name, 'hospital' => $hospital, 'reason' => $reason );
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
                                if ($stmt = $conn->prepare("SELECT app_id, app_date, app_time, doctor_name, hospital, reason  FROM `Appointment`  where id = ? and MONTH(app_date) = 7 ")) 
                                     {
                                        $stmt->bind_param("i", $id);
                                        $stmt->execute();
                                        $stmt->bind_result($app_id, $app_date, $app_time, $doctor_name, $hospital, $reason);
                                        while ($stmt->fetch()) 
                                        {
                                        $rows[] = array('app_id' => $app_id,'app_date' => $app_date, 'app_time' => $app_time, 'doctor_name' => $doctor_name, 'hospital' => $hospital, 'reason' => $reason );
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
                                if ($stmt = $conn->prepare("SELECT app_id, app_date, app_time, doctor_name, hospital, reason  FROM `Appointment`  where id = ? and MONTH(app_date) = 8 ")) 
                                     {
                                        $stmt->bind_param("i", $id);
                                        $stmt->execute();
                                        $stmt->bind_result($app_id, $app_date, $app_time, $doctor_name, $hospital, $reason);
                                        while ($stmt->fetch()) 
                                        {
                                        $rows[] = array('app_id' => $app_id,'app_date' => $app_date, 'app_time' => $app_time, 'doctor_name' => $doctor_name, 'hospital' => $hospital, 'reason' => $reason );
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
                                if ($stmt = $conn->prepare("SELECT app_id, app_date, app_time, doctor_name, hospital, reason  FROM `Appointment`  where id = ? and MONTH(app_date) = 9 ")) 
                                     {
                                        $stmt->bind_param("i", $id);
                                        $stmt->execute();
                                        $stmt->bind_result($app_id, $app_date, $app_time, $doctor_name, $hospital, $reason);
                                        while ($stmt->fetch()) 
                                        {
                                        $rows[] = array('app_id' => $app_id,'app_date' => $app_date, 'app_time' => $app_time, 'doctor_name' => $doctor_name, 'hospital' => $hospital, 'reason' => $reason );
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
                                if ($stmt = $conn->prepare("SELECT app_id, app_date, app_time, doctor_name, hospital, reason  FROM `Appointment`  where id = ? and MONTH(app_date) = 10 ")) 
                                     {
                                        $stmt->bind_param("i", $id);
                                        $stmt->execute();
                                        $stmt->bind_result($app_id, $app_date, $app_time, $doctor_name, $hospital, $reason);
                                        while ($stmt->fetch()) 
                                        {
                                        $rows[] = array('app_id' => $app_id,'app_date' => $app_date, 'app_time' => $app_time, 'doctor_name' => $doctor_name, 'hospital' => $hospital, 'reason' => $reason );
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
                                if ($stmt = $conn->prepare("SELECT app_id, app_date, app_time, doctor_name, hospital, reason  FROM `Appointment`  where id = ? and MONTH(app_date) = 11 ")) 
                                     {
                                        $stmt->bind_param("i", $id);
                                        $stmt->execute();
                                        $stmt->bind_result($app_id, $app_date, $app_time, $doctor_name, $hospital, $reason);
                                        while ($stmt->fetch()) 
                                        {
                                        $rows[] = array('app_id' => $app_id,'app_date' => $app_date, 'app_time' => $app_time, 'doctor_name' => $doctor_name, 'hospital' => $hospital, 'reason' => $reason );
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
                                if ($stmt = $conn->prepare("SELECT app_id, app_date, app_time, doctor_name, hospital, reason  FROM `Appointment`  where id = ? and MONTH(app_date) = 12 ")) 
                                     {
                                        $stmt->bind_param("i", $id);
                                        $stmt->execute();
                                        $stmt->bind_result($app_id, $app_date, $app_time, $doctor_name, $hospital, $reason);
                                        while ($stmt->fetch()) 
                                        {
                                        $rows[] = array('app_id' => $app_id,'app_date' => $app_date, 'app_time' => $app_time, 'doctor_name' => $doctor_name, 'hospital' => $hospital, 'reason' => $reason );
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
                            function deleterow($app_id)
                                {
                                 global $conn;
                                //$_doc= $_POST['delete'];
                                 if($stmt = $conn->prepare("DELETE from `appointment` WHERE app_id = ?"))
                                     {
                                         $stmt->bind_param("i", $app_id);
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
                            <div id="calendar"></div>
                                <script>
                                $('#calendar').fullCalendar({
                                //defaultDate: '',
                                editable: true,
                                eventLimit: true, // allow "more" link when too many events
                                events: 
                                   <?php echo $data; ?>
                                });
                                </script>

                            <div class="panel-body bio-graph-info">
                              <form method="POST" action="">
                                    <label><h1>Details</h1></label>
                                    <label > Display By Month</label>
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
                                              <table class="table table-stripped" class="final" style= "margin:10px;">
                                              <tr> 
                                                <th>Date of the Appointment</th>
                                                <th>Time of the Appointment</th>
                                                <th>Doctors Name</th>
                                                <th>Hospital</th>
                                                <th>Reason</th>
                                                <th> </th>
                                                <th> </th>
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
                                                        echo "<td>$single[app_date]</td>";
                                                        echo "<td>$single[app_time]</td>";
                                                        echo "<td>$single[doctor_name] </td>";
                                                        echo "<td>$single[hospital] </td>";
                                                        echo "<td>$single[reason] </td>";
                                                        echo "<td><form action='updateapp.php' method='GET'>
                                                          <input type='hidden' name='edit' value='$single[app_id]'>
                                                          <input type='submit' value='Edit' class='btn btn-primary' onclick='updateapp.php'> </form> </td>";
                                                        echo   "  <td><form action='' method='POST'>     
                                                          <input type='hidden' name='delete' value='$single[app_id]'>
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
                                                        echo "<td>$single[app_date]</td>";
                                                        echo "<td>$single[app_time]</td>";
                                                        echo "<td>$single[doctor_name] </td>";
                                                        echo "<td>$single[hospital] </td>";
                                                        echo "<td>$single[reason] </td>";
                                                        echo "<td><form action='updateapp.php' method='GET'>
                                                          <input type='hidden' name='edit' value='$single[app_id]'>
                                                          <input type='submit' value='Edit' class='btn btn-primary' onclick='updateapp.php'> </form> </td>";
                                                        echo   "  <td><form action='' method='POST'>     
                                                          <input type='hidden' name='delete' value='$single[app_id]'>
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
                                                        echo "<td>$single[app_date]</td>";
                                                        echo "<td>$single[app_time]</td>";
                                                        echo "<td>$single[doctor_name] </td>";
                                                        echo "<td>$single[hospital] </td>";
                                                        echo "<td>$single[reason] </td>";
                                                        echo "<td><form action='updateapp.php' method='GET'>
                                                          <input type='hidden' name='edit' value='$single[app_id]'>
                                                          <input type='submit' value='Edit' class='btn btn-primary' onclick='updateapp.php'> </form> </td>";
                                                        echo   "  <td><form action='' method='POST'>     
                                                          <input type='hidden' name='delete' value='$single[app_id]'>
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
                                                        echo "<td>$single[app_date]</td>";
                                                        echo "<td>$single[app_time]</td>";
                                                        echo "<td>$single[doctor_name] </td>";
                                                        echo "<td>$single[hospital] </td>";
                                                        echo "<td>$single[reason] </td>";
                                                        echo "<td><form action='updateapp.php' method='GET'>
                                                          <input type='hidden' name='edit' value='$single[app_id]'>
                                                          <input type='submit' value='Edit' class='btn btn-primary' onclick='updateapp.php'> </form> </td>";
                                                        echo   "  <td><form action='' method='POST'>     
                                                          <input type='hidden' name='delete' value='$single[app_id]'>
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
                                                        echo "<td>$single[app_date]</td>";
                                                        echo "<td>$single[app_time]</td>";
                                                        echo "<td>$single[doctor_name] </td>";
                                                        echo "<td>$single[hospital] </td>";
                                                        echo "<td>$single[reason] </td>";
                                                        echo "<td><form action='updateapp.php' method='GET'>
                                                          <input type='hidden' name='edit' value='$single[app_id]'>
                                                          <input type='submit' value='Edit' class='btn btn-primary' onclick='updateapp.php'> </form> </td>";
                                                        echo   "  <td><form action='' method='POST'>     
                                                          <input type='hidden' name='delete' value='$single[app_id]'>
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
                                                        echo "<td>$single[app_date]</td>";
                                                        echo "<td>$single[app_time]</td>";
                                                        echo "<td>$single[doctor_name] </td>";
                                                        echo "<td>$single[hospital] </td>";
                                                        echo "<td>$single[reason] </td>";
                                                        echo "<td><form action='updateapp.php' method='GET'>
                                                          <input type='hidden' name='edit' value='$single[app_id]'>
                                                          <input type='submit' value='Edit' class='btn btn-primary' onclick='updateapp.php'> </form> </td>";
                                                        echo   "  <td><form action='' method='POST'>     
                                                          <input type='hidden' name='delete' value='$single[app_id]'>
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
                                                        echo "<td>$single[app_date]</td>";
                                                        echo "<td>$single[app_time]</td>";
                                                        echo "<td>$single[doctor_name] </td>";
                                                        echo "<td>$single[hospital] </td>";
                                                        echo "<td>$single[reason] </td>";
                                                        echo "<td><form action='updateapp.php' method='GET'>
                                                          <input type='hidden' name='edit' value='$single[app_id]'>
                                                          <input type='submit' value='Edit' class='btn btn-primary' onclick='updateapp.php'> </form> </td>";
                                                        echo   "  <td><form action='' method='POST'>     
                                                          <input type='hidden' name='delete' value='$single[app_id]'>
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
                                                        echo "<td>$single[app_date]</td>";
                                                        echo "<td>$single[app_time]</td>";
                                                        echo "<td>$single[doctor_name] </td>";
                                                        echo "<td>$single[hospital] </td>";
                                                        echo "<td>$single[reason] </td>";
                                                        echo "<td><form action='updateapp.php' method='GET'>
                                                          <input type='hidden' name='edit' value='$single[app_id]'>
                                                          <input type='submit' value='Edit' class='btn btn-primary' onclick='updateapp.php'> </form> </td>";
                                                        echo   "  <td><form action='' method='POST'>     
                                                          <input type='hidden' name='delete' value='$single[app_id]'>
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
                                                        echo "<td>$single[app_date]</td>";
                                                        echo "<td>$single[app_time]</td>";
                                                        echo "<td>$single[doctor_name] </td>";
                                                        echo "<td>$single[hospital] </td>";
                                                        echo "<td>$single[reason] </td>";
                                                        echo "<td><form action='updateapp.php' method='GET'>
                                                          <input type='hidden' name='edit' value='$single[app_id]'>
                                                          <input type='submit' value='Edit' class='btn btn-primary' onclick='updateapp.php'> </form> </td>";
                                                        echo   "  <td><form action='' method='POST'>     
                                                          <input type='hidden' name='delete' value='$single[app_id]'>
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
                                                        echo "<td>$single[app_date]</td>";
                                                        echo "<td>$single[app_time]</td>";
                                                        echo "<td>$single[doctor_name] </td>";
                                                        echo "<td>$single[hospital] </td>";
                                                        echo "<td>$single[reason] </td>";
                                                        echo "<td><form action='updateapp.php' method='GET'>
                                                          <input type='hidden' name='edit' value='$single[app_id]'>
                                                          <input type='submit' value='Edit' class='btn btn-primary' onclick='updateapp.php'> </form> </td>";
                                                        echo   "  <td><form action='' method='POST'>     
                                                          <input type='hidden' name='delete' value='$single[app_id]'>
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
                                                        echo "<td>$single[app_date]</td>";
                                                        echo "<td>$single[app_time]</td>";
                                                        echo "<td>$single[doctor_name] </td>";
                                                        echo "<td>$single[hospital] </td>";
                                                        echo "<td>$single[reason] </td>";
                                                        echo "<td><form action='updateapp.php' method='GET'>
                                                          <input type='hidden' name='edit' value='$single[app_id]'>
                                                          <input type='submit' value='Edit' class='btn btn-primary' onclick='updateapp.php'> </form> </td>";
                                                        echo   "  <td><form action='' method='POST'>     
                                                          <input type='hidden' name='delete' value='$single[app_id]'>
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
                                                        echo "<td>$single[app_date]</td>";
                                                        echo "<td>$single[app_time]</td>";
                                                        echo "<td>$single[doctor_name] </td>";
                                                        echo "<td>$single[hospital] </td>";
                                                        echo "<td>$single[reason] </td>";
                                                        echo "<td><form action='updateapp.php' method='GET'>
                                                          <input type='hidden' name='edit' value='$single[app_id]'>
                                                          <input type='submit' value='Edit' class='btn btn-primary' onclick='updateapp.php'> </form> </td>";
                                                        echo   "  <td><form action='' method='POST'>     
                                                          <input type='hidden' name='delete' value='$single[app_id]'>
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
                                                        echo "<td>$single[app_date]</td>";
                                                        echo "<td>$single[app_time]</td>";
                                                        echo "<td>$single[doctor_name] </td>";
                                                        echo "<td>$single[hospital] </td>";
                                                        echo "<td>$single[reason] </td>";
                                                        echo "<td><form action='updateapp.php' method='GET'>
                                                          <input type='hidden' name='edit' value='$single[app_id]'>
                                                          <input type='submit' value='Edit' class='btn btn-primary' onclick='updateapp.php'> </form> </td>";
                                                        echo   "  <td><form action='' method='POST'>     
                                                          <input type='hidden' name='delete' value='$single[app_id]'>
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