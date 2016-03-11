<!DOCTYPE html>
<html lang="en">
<?php include('connection.php'); global $conn ?> 
<?php include('side.php');?>
<?php session_start(); ?>
<head>
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
                            <h2>Treatments </h2> ADD <a href="create_treatment.php"><span class="icon-plus icon-2x" style="color: #b2c831; margin-left: 10px"></a>

                        </legend>
                        </fieldset>
                       <!-- <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
                        <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>
                        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>-->
                         <?php
                            function getalldetails($id) 
                            {
                                global $conn;
                                if ($stmt = $conn->prepare("SELECT treat_id, start_date, disease, doctor, type, consultation, hospital FROM `treatement` where id = ?  ")) 
                                     {
                                        $stmt->bind_param("i", $id);
                                        $stmt->execute();
                                        $stmt->bind_result($treat_id, $start_date, $disease, $doctor, $type, $consultation, $hospital);
                                        while ($stmt->fetch()) 
                                        {
                                        $rows[] = array('treat_id' =>$treat_id, 'start_date' => $start_date, 'disease' => $disease, 'doctor' => $doctor, 'type' => $type, 'consultation' => $consultation, 'hospital' => $hospital );
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
                                if ($stmt = $conn->prepare("SELECT treat_id, start_date, disease, doctor, type, consultation, hospital FROM `treatement` where id = ? and MONTH(start_date) = 1  ")) 
                                     {
                                        $stmt->bind_param("i", $id);
                                        $stmt->execute();
                                        $stmt->bind_result($treat_id, $start_date, $disease, $doctor, $type, $consultation, $hospital);
                                        while ($stmt->fetch()) 
                                        {
                                        $rows[] = array('treat_id' =>$treat_id, 'start_date' => $start_date, 'disease' => $disease, 'doctor' => $doctor, 'type' => $type, 'consultation' => $consultation, 'hospital' => $hospital );
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
                                if ($stmt = $conn->prepare("SELECT treat_id, start_date, disease, doctor, type, consultation, hospital FROM `treatement` where id = ? and MONTH(start_date) = 2 ")) 
                                     {
                                        $stmt->bind_param("i", $id);
                                        $stmt->execute();
                                        $stmt->bind_result($treat_id, $start_date, $disease, $doctor, $type, $consultation, $hospital);
                                        while ($stmt->fetch()) 
                                        {
                                        $rows[] = array('treat_id' =>$treat_id, 'start_date' => $start_date, 'disease' => $disease, 'doctor' => $doctor, 'type' => $type, 'consultation' => $consultation, 'hospital' => $hospital );
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
                                if ($stmt = $conn->prepare("SELECT treat_id, start_date, disease, doctor, type, consultation, hospital FROM `treatement` where id = ? and MONTH(start_date) = 3 ")) 
                                     {
                                        $stmt->bind_param("i", $id);
                                        $stmt->execute();
                                        $stmt->bind_result($treat_id, $start_date, $disease, $doctor, $type, $consultation, $hospital);
                                        while ($stmt->fetch()) 
                                        {
                                        $rows[] = array('treat_id' =>$treat_id, 'start_date' => $start_date, 'disease' => $disease, 'doctor' => $doctor, 'type' => $type, 'consultation' => $consultation, 'hospital' => $hospital );
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
                                if ($stmt = $conn->prepare("SELECT treat_id, start_date, disease, doctor, type, consultation, hospital FROM `treatement` where id = ? and MONTH(start_date) = 4 ")) 
                                     {
                                        $stmt->bind_param("i", $id);
                                        $stmt->execute();
                                        $stmt->bind_result($treat_id, $start_date, $disease, $doctor, $type, $consultation, $hospital);
                                        while ($stmt->fetch()) 
                                        {
                                        $rows[] = array('treat_id' =>$treat_id, 'start_date' => $start_date, 'disease' => $disease, 'doctor' => $doctor, 'type' => $type, 'consultation' => $consultation, 'hospital' => $hospital );
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
                                if ($stmt = $conn->prepare("SELECT treat_id, start_date, disease, doctor, type, consultation, hospital FROM `treatement` where id = ? and MONTH(start_date) = 5  ")) 
                                     {
                                        $stmt->bind_param("i", $id);
                                        $stmt->execute();
                                        $stmt->bind_result($treat_id, $start_date, $disease, $doctor, $type, $consultation, $hospital);
                                        while ($stmt->fetch()) 
                                        {
                                        $rows[] = array('treat_id' =>$treat_id, 'start_date' => $start_date, 'disease' => $disease, 'doctor' => $doctor, 'type' => $type, 'consultation' => $consultation, 'hospital' => $hospital );
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
                                if ($stmt = $conn->prepare("SELECT treat_id, start_date, disease, doctor, type, consultation, hospital FROM `treatement` where id = ? and MONTH(start_date) = 6  ")) 
                                     {
                                        $stmt->bind_param("i", $id);
                                        $stmt->execute();
                                        $stmt->bind_result($treat_id, $start_date, $disease, $doctor, $type, $consultation, $hospital);
                                        while ($stmt->fetch()) 
                                        {
                                        $rows[] = array('treat_id' =>$treat_id, 'start_date' => $start_date, 'disease' => $disease, 'doctor' => $doctor, 'type' => $type, 'consultation' => $consultation, 'hospital' => $hospital );
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
                                if ($stmt = $conn->prepare("SELECT treat_id, start_date, disease, doctor, type, consultation, hospital FROM `treatement` where id = ? and MONTH(start_date) = 7 ")) 
                                     {
                                        $stmt->bind_param("i", $id);
                                        $stmt->execute();
                                        $stmt->bind_result($treat_id, $start_date, $disease, $doctor, $type, $consultation, $hospital);
                                        while ($stmt->fetch()) 
                                        {
                                        $rows[] = array('treat_id' =>$treat_id, 'start_date' => $start_date, 'disease' => $disease, 'doctor' => $doctor, 'type' => $type, 'consultation' => $consultation, 'hospital' => $hospital );
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
                                if ($stmt = $conn->prepare("SELECT treat_id, start_date, disease, doctor, type, consultation, hospital FROM `treatement` where id = ? and MONTH(start_date) = 8 ")) 
                                     {
                                        $stmt->bind_param("i", $id);
                                        $stmt->execute();
                                        $stmt->bind_result($treat_id, $start_date, $disease, $doctor, $type, $consultation, $hospital);
                                        while ($stmt->fetch()) 
                                        {
                                        $rows[] = array('treat_id' =>$treat_id, 'start_date' => $start_date, 'disease' => $disease, 'doctor' => $doctor, 'type' => $type, 'consultation' => $consultation, 'hospital' => $hospital );
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
                                if ($stmt = $conn->prepare("SELECT treat_id, start_date, disease, doctor, type, consultation, hospital FROM `treatement` where id = ? and MONTH(start_date) = 9 ")) 
                                     {
                                        $stmt->bind_param("i", $id);
                                        $stmt->execute();
                                        $stmt->bind_result($treat_id, $start_date, $disease, $doctor, $type, $consultation, $hospital);
                                        while ($stmt->fetch()) 
                                        {
                                        $rows[] = array('treat_id' =>$treat_id, 'start_date' => $start_date, 'disease' => $disease, 'doctor' => $doctor, 'type' => $type, 'consultation' => $consultation, 'hospital' => $hospital );
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
                                if ($stmt = $conn->prepare("SELECT treat_id, start_date, disease, doctor, type, consultation, hospital FROM `treatement` where id = ? and MONTH(start_date) = 10 ")) 
                                     {
                                        $stmt->bind_param("i", $id);
                                        $stmt->execute();
                                        $stmt->bind_result($treat_id, $start_date, $disease, $doctor, $type, $consultation, $hospital);
                                        while ($stmt->fetch()) 
                                        {
                                        $rows[] = array('treat_id' =>$treat_id, 'start_date' => $start_date, 'disease' => $disease, 'doctor' => $doctor, 'type' => $type, 'consultation' => $consultation, 'hospital' => $hospital );
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
                                if ($stmt = $conn->prepare("SELECT treat_id, start_date, disease, doctor, type, consultation, hospital FROM `treatement` where id = ? and MONTH(start_date) =  11")) 
                                     {
                                        $stmt->bind_param("i", $id);
                                        $stmt->execute();
                                        $stmt->bind_result($treat_id, $start_date, $disease, $doctor, $type, $consultation, $hospital);
                                        while ($stmt->fetch()) 
                                        {
                                        $rows[] = array('treat_id' =>$treat_id, 'start_date' => $start_date, 'disease' => $disease, 'doctor' => $doctor, 'type' => $type, 'consultation' => $consultation, 'hospital' => $hospital );
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
                                if ($stmt = $conn->prepare("SELECT treat_id, start_date, disease, doctor, type, consultation, hospital FROM `treatement` where id = ? and MONTH(start_date) = 12 ")) 
                                     {
                                        $stmt->bind_param("i", $id);
                                        $stmt->execute();
                                        $stmt->bind_result($treat_id, $start_date, $disease, $doctor, $type, $consultation, $hospital);
                                        while ($stmt->fetch()) 
                                        {
                                        $rows[] = array('treat_id' =>$treat_id, 'start_date' => $start_date, 'disease' => $disease, 'doctor' => $doctor, 'type' => $type, 'consultation' => $consultation, 'hospital' => $hospital );
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
                            function deleterow($treat_id)
                                {
                                 global $conn;
                                //$_doc= $_POST['delete'];
                                 if($stmt = $conn->prepare("DELETE from `treatement` WHERE treat_id = ?"))
                                     {
                                         $stmt->bind_param("i", $treat_id);
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
                                              <table class="table table-stripped" class="final" >
                                              <tr> 
                                                <th>Date Started</th>
                                                <th>Disease</th>
                                                <th>doctor</th>
                                                <th>hospital</th>
                                                <th>Type Of Treatment</th>
                                                <th>Consultation</th>
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
                                                echo "<td>$single[disease]</td>";
                                                echo "<td>$single[doctor]</td>";
                                                echo "<td>$single[hospital]</td>";
                                                echo "<td>$single[type]</td>";
                                                echo "<td>$single[consultation]</td>";
                                                echo "<td><form action='updatetreat.php' method='GET'>
                                                          <input type='hidden' name='edit' value='$single[treat_id]'>
                                                          <input type='submit' value='Edit' class='btn btn-primary' onclick='updatetreat.php'> </form> </td>";
                                                echo   "  <td><form action='' method='POST'>     
                                                          <input type='hidden' name='delete' value='$single[treat_id]'>
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
                                                echo "<td>$single[disease]</td>";
                                                echo "<td>$single[doctor]</td>";
                                                echo "<td>$single[hospital]</td>";
                                                echo "<td>$single[type]</td>";
                                                echo "<td>$single[consultation]</td>";
                                                echo "<td><form action='updatetreat.php' method='GET'>
                                                          <input type='hidden' name='edit' value='$single[treat_id]'>
                                                          <input type='submit' value='Edit' class='btn btn-primary' onclick='updatetreat.php'> </form> </td>";
                                                echo   "  <td><form action='' method='POST'>     
                                                          <input type='hidden' name='delete' value='$single[treat_id]'>
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
                                                echo "<td>$single[disease]</td>";
                                                echo "<td>$single[doctor]</td>";
                                                echo "<td>$single[hospital]</td>";
                                                echo "<td>$single[type]</td>";
                                                echo "<td>$single[consultation]</td>";
                                                echo "<td><form action='updatetreat.php' method='GET'>
                                                          <input type='hidden' name='edit' value='$single[treat_id]'>
                                                          <input type='submit' value='Edit' class='btn btn-primary' onclick='updatetreat.php'> </form> </td>";
                                                echo   "  <td><form action='' method='POST'>     
                                                          <input type='hidden' name='delete' value='$single[treat_id]'>
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
                                                echo "<td>$single[disease]</td>";
                                                echo "<td>$single[doctor]</td>";
                                                echo "<td>$single[hospital]</td>";
                                                echo "<td>$single[type]</td>";
                                                echo "<td>$single[consultation]</td>";
                                                echo "<td><form action='updatetreat.php' method='GET'>
                                                          <input type='hidden' name='edit' value='$single[treat_id]'>
                                                          <input type='submit' value='Edit' class='btn btn-primary' onclick='updatetreat.php'> </form> </td>";
                                                echo   "  <td><form action='' method='POST'>     
                                                          <input type='hidden' name='delete' value='$single[treat_id]'>
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
                                                echo "<td>$single[disease]</td>";
                                                echo "<td>$single[doctor]</td>";
                                                echo "<td>$single[hospital]</td>";
                                                echo "<td>$single[type]</td>";
                                                echo "<td>$single[consultation]</td>";
                                                echo "<td><form action='updatetreat.php' method='GET'>
                                                          <input type='hidden' name='edit' value='$single[treat_id]'>
                                                          <input type='submit' value='Edit' class='btn btn-primary' onclick='updatetreat.php'> </form> </td>";
                                                echo   "  <td><form action='' method='POST'>     
                                                          <input type='hidden' name='delete' value='$single[treat_id]'>
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
                                                echo "<td>$single[disease]</td>";
                                                echo "<td>$single[doctor]</td>";
                                                echo "<td>$single[hospital]</td>";
                                                echo "<td>$single[type]</td>";
                                                echo "<td>$single[consultation]</td>";
                                                echo "<td><form action='updatetreat.php' method='GET'>
                                                          <input type='hidden' name='edit' value='$single[treat_id]'>
                                                          <input type='submit' value='Edit' class='btn btn-primary' onclick='updatetreat.php'> </form> </td>";
                                                echo   "  <td><form action='' method='POST'>     
                                                          <input type='hidden' name='delete' value='$single[treat_id]'>
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
                                                echo "<td>$single[disease]</td>";
                                                echo "<td>$single[doctor]</td>";
                                                echo "<td>$single[hospital]</td>";
                                                echo "<td>$single[type]</td>";
                                                echo "<td>$single[consultation]</td>";
                                                echo "<td><form action='updatetreat.php' method='GET'>
                                                          <input type='hidden' name='edit' value='$single[treat_id]'>
                                                          <input type='submit' value='Edit' class='btn btn-primary' onclick='updatetreat.php'> </form> </td>";
                                                echo   "  <td><form action='' method='POST'>     
                                                          <input type='hidden' name='delete' value='$single[treat_id]'>
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
                                                echo "<td>$single[disease]</td>";
                                                echo "<td>$single[doctor]</td>";
                                                echo "<td>$single[hospital]</td>";
                                                echo "<td>$single[type]</td>";
                                                echo "<td>$single[consultation]</td>";
                                                echo "<td><form action='updatetreat.php' method='GET'>
                                                          <input type='hidden' name='edit' value='$single[treat_id]'>
                                                          <input type='submit' value='Edit' class='btn btn-primary' onclick='updatetreat.php'> </form> </td>";
                                                echo   "  <td><form action='' method='POST'>     
                                                          <input type='hidden' name='delete' value='$single[treat_id]'>
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
                                                echo "<td>$single[disease]</td>";
                                                echo "<td>$single[doctor]</td>";
                                                echo "<td>$single[hospital]</td>";
                                                echo "<td>$single[type]</td>";
                                                echo "<td>$single[consultation]</td>";
                                                echo "<td><form action='updatetreat.php' method='GET'>
                                                          <input type='hidden' name='edit' value='$single[treat_id]'>
                                                          <input type='submit' value='Edit' class='btn btn-primary' onclick='updatetreat.php'> </form> </td>";
                                                echo   "  <td><form action='' method='POST'>     
                                                          <input type='hidden' name='delete' value='$single[treat_id]'>
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
                                                echo "<td>$single[disease]</td>";
                                                echo "<td>$single[doctor]</td>";
                                                echo "<td>$single[hospital]</td>";
                                                echo "<td>$single[type]</td>";
                                                echo "<td>$single[consultation]</td>";
                                                echo "<td><form action='updatetreat.php' method='GET'>
                                                          <input type='hidden' name='edit' value='$single[treat_id]'>
                                                          <input type='submit' value='Edit' class='btn btn-primary' onclick='updatetreat.php'> </form> </td>";
                                                echo   "  <td><form action='' method='POST'>     
                                                          <input type='hidden' name='delete' value='$single[treat_id]'>
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
                                                echo "<td>$single[disease]</td>";
                                                echo "<td>$single[doctor]</td>";
                                                echo "<td>$single[hospital]</td>";
                                                echo "<td>$single[type]</td>";
                                                echo "<td>$single[consultation]</td>";
                                                echo "<td><form action='updatetreat.php' method='GET'>
                                                          <input type='hidden' name='edit' value='$single[treat_id]'>
                                                          <input type='submit' value='Edit' class='btn btn-primary' onclick='updatetreat.php'> </form> </td>";
                                                echo   "  <td><form action='' method='POST'>     
                                                          <input type='hidden' name='delete' value='$single[treat_id]'>
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
                                                echo "<td>$single[disease]</td>";
                                                echo "<td>$single[doctor]</td>";
                                                echo "<td>$single[hospital]</td>";
                                                echo "<td>$single[type]</td>";
                                                echo "<td>$single[consultation]</td>";
                                                echo "<td><form action='updatetreat.php' method='GET'>
                                                          <input type='hidden' name='edit' value='$single[treat_id]'>
                                                          <input type='submit' value='Edit' class='btn btn-primary' onclick='updatetreat.php'> </form> </td>";
                                                echo   "  <td><form action='' method='POST'>     
                                                          <input type='hidden' name='delete' value='$single[treat_id]'>
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
                                                echo "<td>$single[disease]</td>";
                                                echo "<td>$single[doctor]</td>";
                                                echo "<td>$single[hospital]</td>";
                                                echo "<td>$single[type]</td>";
                                                echo "<td>$single[consultation]</td>";
                                                echo "<td><form action='updatetreat.php' method='GET'>
                                                          <input type='hidden' name='edit' value='$single[treat_id]'>
                                                          <input type='submit' value='Edit' class='btn btn-primary' onclick='updatetreat.php'> </form> </td>";
                                                echo   "  <td><form action='' method='POST'>     
                                                          <input type='hidden' name='delete' value='$single[treat_id]'>
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