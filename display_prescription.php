<!DOCTYPE html>
<html lang="en">
<?php include('connection.php'); global $conn ?> 
<?php include('side.php');?>
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
                            <h2>Prescription </h2> ADD <a href="create_prescription.php"><span class="icon-plus icon-2x" style="color: #b2c831; margin-left: 10px"></a>

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
                         <?php
                            function getalldetails($id) 
                            {
                                global $conn;
                                if ($stmt = $conn->prepare("SELECT p.pres_id, start_date, end_date, prescribed_by, instruction, hospital, reason, strength, metric, dosage_amount  FROM `prescription` p LEFT JOIN `medicine` m ON p.pres_id=m.pres_id where p.id = ? ")) 
                                     {
                                        $stmt->bind_param("i", $id);
                                        $stmt->execute();
                                        $stmt->bind_result($pres_id, $start_date, $end_date, $prescribed_by, $instruction, $hospital, $reason, $strength, $metric, $dosage_amount);
                                        while ($stmt->fetch()) 
                                        {
                                        $rows[] = array('pres_id'=> $pres_id,'start_date' => $start_date, 'end_date' => $end_date, 'prescribed_by' => $prescribed_by, 'instruction' => $instruction, 'hospital' => $hospital, 'reason' => $reason, 'strength' => $strength, 'metric' => $metric, 'dosage_amount' => $dosage_amount );
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
                                if ($stmt = $conn->prepare("SELECT p.pres_id, start_date, end_date, prescribed_by, instruction, hospital, reason, strength, metric, dosage_amount  FROM `prescription` p LEFT JOIN `medicine` m ON p.pres_id=m.pres_id where p.id = ? and MONTH(start_date) = 1 ")) 
                                     {
                                        $stmt->bind_param("i", $id);
                                        $stmt->execute();
                                        $stmt->bind_result($pres_id, $start_date, $end_date, $prescribed_by, $instruction, $hospital, $reason, $strength, $metric, $dosage_amount);
                                        while ($stmt->fetch()) 
                                        {
                                        $rows[] = array('pres_id'=> $pres_id,'start_date' => $start_date, 'end_date' => $end_date, 'prescribed_by' => $prescribed_by, 'instruction' => $instruction, 'hospital' => $hospital, 'reason' => $reason, 'strength' => $strength, 'metric' => $metric, 'dosage_amount' => $dosage_amount );
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
                                if ($stmt = $conn->prepare("SELECT p.pres_id, start_date, end_date, prescribed_by, instruction, hospital, reason, strength, metric, dosage_amount  FROM `prescription` p LEFT JOIN `medicine` m ON p.pres_id=m.pres_id where p.id = ? and MONTH(start_date) = 2 ")) 
                                     {
                                        $stmt->bind_param("i", $id);
                                        $stmt->execute();
                                        $stmt->bind_result($pres_id, $start_date, $end_date, $prescribed_by, $instruction, $hospital, $reason, $strength, $metric, $dosage_amount);
                                        while ($stmt->fetch()) 
                                        {
                                        $rows[] = array('pres_id'=> $pres_id,'start_date' => $start_date, 'end_date' => $end_date, 'prescribed_by' => $prescribed_by, 'instruction' => $instruction, 'hospital' => $hospital, 'reason' => $reason, 'strength' => $strength, 'metric' => $metric, 'dosage_amount' => $dosage_amount );
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
                                if ($stmt = $conn->prepare("SELECT p.pres_id, start_date, end_date, prescribed_by, instruction, hospital, reason, strength, metric, dosage_amount  FROM `prescription` p LEFT JOIN `medicine` m ON p.pres_id=m.pres_id where p.id = ? and MONTH(start_date) = 3 ")) 
                                     {
                                        $stmt->bind_param("i", $id);
                                        $stmt->execute();
                                        $stmt->bind_result($pres_id, $start_date, $end_date, $prescribed_by, $instruction, $hospital, $reason, $strength, $metric, $dosage_amount);
                                        while ($stmt->fetch()) 
                                        {
                                        $rows[] = array('pres_id'=> $pres_id,'start_date' => $start_date, 'end_date' => $end_date, 'prescribed_by' => $prescribed_by, 'instruction' => $instruction, 'hospital' => $hospital, 'reason' => $reason, 'strength' => $strength, 'metric' => $metric, 'dosage_amount' => $dosage_amount );
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
                                if ($stmt = $conn->prepare("SELECT p.pres_id, start_date, end_date, prescribed_by, instruction, hospital, reason, strength, metric, dosage_amount  FROM `prescription` p LEFT JOIN `medicine` m ON p.pres_id=m.pres_id where p.id = ? and MONTH(start_date) = 4 ")) 
                                     {
                                        $stmt->bind_param("i", $id);
                                        $stmt->execute();
                                        $stmt->bind_result($pres_id, $start_date, $end_date, $prescribed_by, $instruction, $hospital, $reason, $strength, $metric, $dosage_amount);
                                        while ($stmt->fetch()) 
                                        {
                                        $rows[] = array('pres_id'=> $pres_id,'start_date' => $start_date, 'end_date' => $end_date, 'prescribed_by' => $prescribed_by, 'instruction' => $instruction, 'hospital' => $hospital, 'reason' => $reason, 'strength' => $strength, 'metric' => $metric, 'dosage_amount' => $dosage_amount );
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
                                if ($stmt = $conn->prepare("SELECT p.pres_id, start_date, end_date, prescribed_by, instruction, hospital, reason, strength, metric, dosage_amount  FROM `prescription` p LEFT JOIN `medicine` m ON p.pres_id=m.pres_id where p.id = ? and MONTH(start_date) = 5")) 
                                     {
                                        $stmt->bind_param("i", $id);
                                        $stmt->execute();
                                        $stmt->bind_result($pres_id, $start_date, $end_date, $prescribed_by, $instruction, $hospital, $reason, $strength, $metric, $dosage_amount);
                                        while ($stmt->fetch()) 
                                        {
                                        $rows[] = array('pres_id'=> $pres_id,'start_date' => $start_date, 'end_date' => $end_date, 'prescribed_by' => $prescribed_by, 'instruction' => $instruction, 'hospital' => $hospital, 'reason' => $reason, 'strength' => $strength, 'metric' => $metric, 'dosage_amount' => $dosage_amount );
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
                                if ($stmt = $conn->prepare("SELECT p.pres_id, start_date, end_date, prescribed_by, instruction, hospital, reason, strength, metric, dosage_amount  FROM `prescription` p LEFT JOIN `medicine` m ON p.pres_id=m.pres_id where p.id = ? and MONTH(start_date) = 6 ")) 
                                     {
                                        $stmt->bind_param("i", $id);
                                        $stmt->execute();
                                        $stmt->bind_result($pres_id, $start_date, $end_date, $prescribed_by, $instruction, $hospital, $reason, $strength, $metric, $dosage_amount);
                                        while ($stmt->fetch()) 
                                        {
                                        $rows[] = array('pres_id'=> $pres_id,'start_date' => $start_date, 'end_date' => $end_date, 'prescribed_by' => $prescribed_by, 'instruction' => $instruction, 'hospital' => $hospital, 'reason' => $reason, 'strength' => $strength, 'metric' => $metric, 'dosage_amount' => $dosage_amount );
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
                                if ($stmt = $conn->prepare("SELECT p.pres_id, start_date, end_date, prescribed_by, instruction, hospital, reason, strength, metric, dosage_amount  FROM `prescription` p LEFT JOIN `medicine` m ON p.pres_id=m.pres_id where p.id = ? and MONTH(start_date) = 7 ")) 
                                     {
                                        $stmt->bind_param("i", $id);
                                        $stmt->execute();
                                        $stmt->bind_result($pres_id, $start_date, $end_date, $prescribed_by, $instruction, $hospital, $reason, $strength, $metric, $dosage_amount);
                                        while ($stmt->fetch()) 
                                        {
                                        $rows[] = array('pres_id'=> $pres_id,'start_date' => $start_date, 'end_date' => $end_date, 'prescribed_by' => $prescribed_by, 'instruction' => $instruction, 'hospital' => $hospital, 'reason' => $reason, 'strength' => $strength, 'metric' => $metric, 'dosage_amount' => $dosage_amount );
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
                                if ($stmt = $conn->prepare("SELECT p.pres_id, start_date, end_date, prescribed_by, instruction, hospital, reason, strength, metric, dosage_amount  FROM `prescription` p LEFT JOIN `medicine` m ON p.pres_id=m.pres_id where p.id = ? and MONTH(start_date) = 8")) 
                                     {
                                        $stmt->bind_param("i", $id);
                                        $stmt->execute();
                                        $stmt->bind_result($pres_id, $start_date, $end_date, $prescribed_by, $instruction, $hospital, $reason, $strength, $metric, $dosage_amount);
                                        while ($stmt->fetch()) 
                                        {
                                        $rows[] = array('pres_id'=> $pres_id,'start_date' => $start_date, 'end_date' => $end_date, 'prescribed_by' => $prescribed_by, 'instruction' => $instruction, 'hospital' => $hospital, 'reason' => $reason, 'strength' => $strength, 'metric' => $metric, 'dosage_amount' => $dosage_amount );
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
                                if ($stmt = $conn->prepare("SELECT p.pres_id, start_date, end_date, prescribed_by, instruction, hospital, reason, strength, metric, dosage_amount  FROM `prescription` p LEFT JOIN `medicine` m ON p.pres_id=m.pres_id where p.id = ? and MONTH(start_date) = 9 ")) 
                                     {
                                        $stmt->bind_param("i", $id);
                                        $stmt->execute();
                                        $stmt->bind_result($pres_id, $start_date, $end_date, $prescribed_by, $instruction, $hospital, $reason, $strength, $metric, $dosage_amount);
                                        while ($stmt->fetch()) 
                                        {
                                        $rows[] = array('pres_id'=> $pres_id,'start_date' => $start_date, 'end_date' => $end_date, 'prescribed_by' => $prescribed_by, 'instruction' => $instruction, 'hospital' => $hospital, 'reason' => $reason, 'strength' => $strength, 'metric' => $metric, 'dosage_amount' => $dosage_amount );
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
                                if ($stmt = $conn->prepare("SELECT p.pres_id, start_date, end_date, prescribed_by, instruction, hospital, reason, strength, metric, dosage_amount  FROM `prescription` p LEFT JOIN `medicine` m ON p.pres_id=m.pres_id where p.id = ? and MONTH(start_date) = 10 ")) 
                                     {
                                        $stmt->bind_param("i", $id);
                                        $stmt->execute();
                                        $stmt->bind_result($pres_id, $start_date, $end_date, $prescribed_by, $instruction, $hospital, $reason, $strength, $metric, $dosage_amount);
                                        while ($stmt->fetch()) 
                                        {
                                        $rows[] = array('pres_id'=> $pres_id,'start_date' => $start_date, 'end_date' => $end_date, 'prescribed_by' => $prescribed_by, 'instruction' => $instruction, 'hospital' => $hospital, 'reason' => $reason, 'strength' => $strength, 'metric' => $metric, 'dosage_amount' => $dosage_amount );
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
                                if ($stmt = $conn->prepare("SELECT p.pres_id, start_date, end_date, prescribed_by, instruction, hospital, reason, strength, metric, dosage_amount  FROM `prescription` p LEFT JOIN `medicine` m ON p.pres_id=m.pres_id where p.id = ? and MONTH(start_date) = 11 ")) 
                                     {
                                        $stmt->bind_param("i", $id);
                                        $stmt->execute();
                                        $stmt->bind_result($pres_id, $start_date, $end_date, $prescribed_by, $instruction, $hospital, $reason, $strength, $metric, $dosage_amount);
                                        while ($stmt->fetch()) 
                                        {
                                        $rows[] = array('pres_id'=> $pres_id,'start_date' => $start_date, 'end_date' => $end_date, 'prescribed_by' => $prescribed_by, 'instruction' => $instruction, 'hospital' => $hospital, 'reason' => $reason, 'strength' => $strength, 'metric' => $metric, 'dosage_amount' => $dosage_amount );
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
                                if ($stmt = $conn->prepare("SELECT p.pres_id, start_date, end_date, prescribed_by, instruction, hospital, reason, strength, metric, dosage_amount  FROM `prescription` p LEFT JOIN `medicine` m ON p.pres_id=m.pres_id where p.id = ? and MONTH(start_date) = 12 ")) 
                                     {
                                        $stmt->bind_param("i", $id);
                                        $stmt->execute();
                                        $stmt->bind_result($pres_id, $start_date, $end_date, $prescribed_by, $instruction, $hospital, $reason, $strength, $metric, $dosage_amount);
                                        while ($stmt->fetch()) 
                                        {
                                        $rows[] = array('pres_id'=> $pres_id,'start_date' => $start_date, 'end_date' => $end_date, 'prescribed_by' => $prescribed_by, 'instruction' => $instruction, 'hospital' => $hospital, 'reason' => $reason, 'strength' => $strength, 'metric' => $metric, 'dosage_amount' => $dosage_amount );
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
                            function deleterow($pres_id)
                                {
                                 global $conn;
                                //$_doc= $_POST['delete'];
                                 if($stmt = $conn->prepare("DELETE from `Prescription` and `medicine` WHERE pres_id = ?"))
                                     {
                                         $stmt->bind_param("i", $pres_id);
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
                                                <th>Date Started</th>
                                                <th>End Date</th>
                                                <th>Doctor</th>
                                                <th>Hospital</th>
                                                <th>Reason</th>
                                                <th>Strength</th>
                                                <th>Dosage Amount</th>
                                                <th>instruction</th>
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
                                                    echo "<td>$single[start_date]</td>";
                                                    echo "<td>$single[end_date]</td>";
                                                    echo "<td>$single[prescribed_by] </td>";
                                                    echo "<td>$single[hospital] </td>";
                                                    echo "<td>$single[reason] </td>";
                                                    echo "<td>$single[strength] $single[metric]</td>";
                                                    echo "<td>$single[dosage_amount]  </td>";
                                                    echo "<td>$single[instruction] </td>";
                                                    echo "<td><form action='update_prescription.php' method='GET'>
                                                      <input type='hidden' name='edit' value='$single[pres_id]'>
                                                      <input type='submit' value='Edit' class='btn btn-primary' onclick='update_prescription.php'> </form> </td>";
                                                    echo   "  <td><form action='' method='POST'>     
                                                      <input type='hidden' name='delete' value='$single[pres_id]'>
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
                                                   echo "<td>$single[start_date]</td>";
                                                    echo "<td>$single[end_date]</td>";
                                                    echo "<td>$single[prescribed_by] </td>";
                                                    echo "<td>$single[hospital] </td>";
                                                    echo "<td>$single[reason] </td>";
                                                    echo "<td>$single[strength] $single[metric]</td>";
                                                    echo "<td>$single[dosage_amount]  </td>";
                                                    echo "<td>$single[instruction] </td>";
                                                    echo "<td><form action='update_prescription.php' method='GET'>
                                                      <input type='hidden' name='edit' value='$single[pres_id]'>
                                                      <input type='submit' value='Edit' class='btn btn-primary' onclick='update_prescription.php'> </form> </td>";
                                                    echo   "  <td><form action='' method='POST'>     
                                                      <input type='hidden' name='delete' value='$single[pres_id]'>
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
                                                    echo "<td>$single[start_date]</td>";
                                                    echo "<td>$single[end_date]</td>";
                                                    echo "<td>$single[prescribed_by] </td>";
                                                    echo "<td>$single[hospital] </td>";
                                                    echo "<td>$single[reason] </td>";
                                                    echo "<td>$single[strength] $single[metric]</td>";
                                                    echo "<td>$single[dosage_amount]  </td>";
                                                    echo "<td>$single[instruction] </td>";
                                                    echo "<td><form action='update_prescription.php' method='GET'>
                                                      <input type='hidden' name='edit' value='$single[pres_id]'>
                                                      <input type='submit' value='Edit' class='btn btn-primary' onclick='update_prescription.php'> </form> </td>";
                                                    echo   "  <td><form action='' method='POST'>     
                                                      <input type='hidden' name='delete' value='$single[pres_id]'>
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
                                                   echo "<td>$single[start_date]</td>";
                                                    echo "<td>$single[end_date]</td>";
                                                    echo "<td>$single[prescribed_by] </td>";
                                                    echo "<td>$single[hospital] </td>";
                                                    echo "<td>$single[reason] </td>";
                                                    echo "<td>$single[strength] $single[metric]</td>";
                                                    echo "<td>$single[dosage_amount]  </td>";
                                                    echo "<td>$single[instruction] </td>";
                                                    echo "<td><form action='update_prescription.php' method='GET'>
                                                      <input type='hidden' name='edit' value='$single[pres_id]'>
                                                      <input type='submit' value='Edit' class='btn btn-primary' onclick='update_prescription.php'> </form> </td>";
                                                    echo   "  <td><form action='' method='POST'>     
                                                      <input type='hidden' name='delete' value='$single[pres_id]'>
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
                                                    echo "<td>$single[start_date]</td>";
                                                    echo "<td>$single[end_date]</td>";
                                                    echo "<td>$single[prescribed_by] </td>";
                                                    echo "<td>$single[hospital] </td>";
                                                    echo "<td>$single[reason] </td>";
                                                    echo "<td>$single[strength] $single[metric]</td>";
                                                    echo "<td>$single[dosage_amount]  </td>";
                                                    echo "<td>$single[instruction] </td>";
                                                    echo "<td><form action='update_prescription.php' method='GET'>
                                                      <input type='hidden' name='edit' value='$single[pres_id]'>
                                                      <input type='submit' value='Edit' class='btn btn-primary' onclick='update_prescription.php'> </form> </td>";
                                                    echo   "  <td><form action='' method='POST'>     
                                                      <input type='hidden' name='delete' value='$single[pres_id]'>
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
                                                    echo "<td>$single[start_date]</td>";
                                                    echo "<td>$single[end_date]</td>";
                                                    echo "<td>$single[prescribed_by] </td>";
                                                    echo "<td>$single[hospital] </td>";
                                                    echo "<td>$single[reason] </td>";
                                                    echo "<td>$single[strength] $single[metric]</td>";
                                                    echo "<td>$single[dosage_amount]  </td>";
                                                    echo "<td>$single[instruction] </td>";
                                                    echo "<td><form action='update_prescription.php' method='GET'>
                                                      <input type='hidden' name='edit' value='$single[pres_id]'>
                                                      <input type='submit' value='Edit' class='btn btn-primary' onclick='update_prescription.php'> </form> </td>";
                                                    echo   "  <td><form action='' method='POST'>     
                                                      <input type='hidden' name='delete' value='$single[pres_id]'>
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
                                                    echo "<td>$single[start_date]</td>";
                                                    echo "<td>$single[end_date]</td>";
                                                    echo "<td>$single[prescribed_by] </td>";
                                                    echo "<td>$single[hospital] </td>";
                                                    echo "<td>$single[reason] </td>";
                                                    echo "<td>$single[strength] $single[metric]</td>";
                                                    echo "<td>$single[dosage_amount]  </td>";
                                                    echo "<td>$single[instruction] </td>";
                                                    echo "<td><form action='update_prescription.php' method='GET'>
                                                      <input type='hidden' name='edit' value='$single[pres_id]'>
                                                      <input type='submit' value='Edit' class='btn btn-primary' onclick='update_prescription.php'> </form> </td>";
                                                    echo   "  <td><form action='' method='POST'>     
                                                      <input type='hidden' name='delete' value='$single[pres_id]'>
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
                                                    echo "<td>$single[start_date]</td>";
                                                    echo "<td>$single[end_date]</td>";
                                                    echo "<td>$single[prescribed_by] </td>";
                                                    echo "<td>$single[hospital] </td>";
                                                    echo "<td>$single[reason] </td>";
                                                    echo "<td>$single[strength] $single[metric]</td>";
                                                    echo "<td>$single[dosage_amount]  </td>";
                                                    echo "<td>$single[instruction] </td>";
                                                    echo "<td><form action='update_prescription.php' method='GET'>
                                                      <input type='hidden' name='edit' value='$single[pres_id]'>
                                                      <input type='submit' value='Edit' class='btn btn-primary' onclick='update_prescription.php'> </form> </td>";
                                                    echo   "  <td><form action='' method='POST'>     
                                                      <input type='hidden' name='delete' value='$single[pres_id]'>
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
                                                    echo "<td>$single[start_date]</td>";
                                                    echo "<td>$single[end_date]</td>";
                                                    echo "<td>$single[prescribed_by] </td>";
                                                    echo "<td>$single[hospital] </td>";
                                                    echo "<td>$single[reason] </td>";
                                                    echo "<td>$single[strength] $single[metric]</td>";
                                                    echo "<td>$single[dosage_amount]  </td>";
                                                    echo "<td>$single[instruction] </td>";
                                                    echo "<td><form action='update_prescription.php' method='GET'>
                                                      <input type='hidden' name='edit' value='$single[pres_id]'>
                                                      <input type='submit' value='Edit' class='btn btn-primary' onclick='update_prescription.php'> </form> </td>";
                                                    echo   "  <td><form action='' method='POST'>     
                                                      <input type='hidden' name='delete' value='$single[pres_id]'>
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
                                                    echo "<td>$single[start_date]</td>";
                                                    echo "<td>$single[end_date]</td>";
                                                    echo "<td>$single[prescribed_by] </td>";
                                                    echo "<td>$single[hospital] </td>";
                                                    echo "<td>$single[reason] </td>";
                                                    echo "<td>$single[strength] $single[metric]</td>";
                                                    echo "<td>$single[dosage_amount]  </td>";
                                                    echo "<td>$single[instruction] </td>";
                                                    echo "<td><form action='update_prescription.php' method='GET'>
                                                      <input type='hidden' name='edit' value='$single[pres_id]'>
                                                      <input type='submit' value='Edit' class='btn btn-primary' onclick='update_prescription.php'> </form> </td>";
                                                    echo   "  <td><form action='' method='POST'>     
                                                      <input type='hidden' name='delete' value='$single[pres_id]'>
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
                                                    echo "<td>$single[start_date]</td>";
                                                    echo "<td>$single[end_date]</td>";
                                                    echo "<td>$single[prescribed_by] </td>";
                                                    echo "<td>$single[hospital] </td>";
                                                    echo "<td>$single[reason] </td>";
                                                    echo "<td>$single[strength] $single[metric]</td>";
                                                    echo "<td>$single[dosage_amount]  </td>";
                                                    echo "<td>$single[instruction] </td>";
                                                    echo "<td><form action='update_prescription.php' method='GET'>
                                                      <input type='hidden' name='edit' value='$single[pres_id]'>
                                                      <input type='submit' value='Edit' class='btn btn-primary' onclick='update_prescription.php'> </form> </td>";
                                                    echo   "  <td><form action='' method='POST'>     
                                                      <input type='hidden' name='delete' value='$single[pres_id]'>
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
                                                    echo "<td>$single[start_date]</td>";
                                                    echo "<td>$single[end_date]</td>";
                                                    echo "<td>$single[prescribed_by] </td>";
                                                    echo "<td>$single[hospital] </td>";
                                                    echo "<td>$single[reason] </td>";
                                                    echo "<td>$single[strength] $single[metric]</td>";
                                                    echo "<td>$single[dosage_amount]  </td>";
                                                    echo "<td>$single[instruction] </td>";
                                                    echo "<td><form action='update_prescription.php' method='GET'>
                                                      <input type='hidden' name='edit' value='$single[pres_id]'>
                                                      <input type='submit' value='Edit' class='btn btn-primary' onclick='update_prescription.php'> </form> </td>";
                                                    echo   "  <td><form action='' method='POST'>     
                                                      <input type='hidden' name='delete' value='$single[pres_id]'>
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
                                                    echo "<td>$single[start_date]</td>";
                                                    echo "<td>$single[end_date]</td>";
                                                    echo "<td>$single[prescribed_by] </td>";
                                                    echo "<td>$single[hospital] </td>";
                                                    echo "<td>$single[reason] </td>";
                                                    echo "<td>$single[strength] $single[metric]</td>";
                                                    echo "<td>$single[dosage_amount]  </td>";
                                                    echo "<td>$single[instruction] </td>";
                                                    echo "<td><form action='update_prescription.php' method='GET'>
                                                      <input type='hidden' name='edit' value='$single[pres_id]'>
                                                      <input type='submit' value='Edit' class='btn btn-primary' onclick='update_prescription.php'> </form> </td>";
                                                    echo   "  <td><form action='' method='POST'>     
                                                      <input type='hidden' name='delete' value='$single[pres_id]'>
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