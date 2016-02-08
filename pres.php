<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>
<?php include('connection.php'); global $conn ?>

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
    <form action="" method="POST" enctype="multipart/form-data">
    <br><br>
    <fieldset>
                <legend > <h2>Prescription </h2></legend>

                 <div>
                <label style="margin-left:10px;" > Name Of The Prescription  </label>
                <br>
                    <input type="text" name="name" style="margin-left:10px;"> 
                </div>
<br>    
                <div>
                <label style="margin-left:10px;" > Strength Of The Doasge  </label>(Ex:1..1000)
                <br>
                    <input type="text" name="strength" style="margin-left:10px;"> 
                <select name ="type" style="height:25px;">
                    <option value="mg">mg </option>
                    <option value="ml">ml </option>
                    <option value="drops">drops </option>
                </select>
                </div>
<br>    
                <div>
                <label style="margin-left:10px;" > Dosage Amount  </label>
                <br>
                    <select name ="amount" style="margin-left:10px; height:25px ">
                    <option value="once daily">once daily</option>
                    <option value="twice daily">twice daily </option>
                    <option value="thrice daily">thrice daily </option>
                    <option value="four daily">four daily</option>
                    <option value="five daily">five daily </option>
                    <option value="once weekly">once weekly </option>
                    <option value="once monthly">once monthly </option>
                    <option value="others">others </option>

                </select>
                </div>
                
<br>    
                <div>
                <label style="margin-left:10px;" > Prescribed By </label>
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
                <label style="margin-left:10px;" > Instruction </label>
                <br>
                    <textarea class=".form-control:focus" rows="5" cols="70" name="instruction" style="margin-left:10px;"> </textarea> 
                </div>
<br>
                <div>
                <label style="margin-left:10px;" > Start Date  </label>
            
                     <input type="date" name="sdate" style="margin-left:10px;" />
                
                <label style="margin-left:10px;" >Last Date</label>
                
                     <input type="date" name="ldate" style="margin-left:10px;" />
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
        if(isset($_POST['submit'])) {
            $name = $_POST['name'];
            $strength = $_POST['strength'];
            $type = $_POST['type'];
            $amount = $_POST['amount'];
            $instruction = $_POST['instruction'];
            $sdate = $_POST['sdate'];
            $ldate = $_POST['ldate'];
            $doctor = $_POST['doctor'];
            $hospital = $_POST['hospital'];
            $reason = $_POST['reason'];

            if ($stmtt=$conn->prepare("INSERT INTO prescription (pres_name, id, start_date, end_date, prescribed_by, instruction, hospital, reason) values (?,?,?,?,?,?,?,?)")) {
                echo "hi";
                $stmtt->bind_param('sissssss', $name, $_SESSION['id'], $sdate, $ldate, $doctor, $instruction, $hospital, $reason);
                $result = $stmtt->execute();
                $stmtt->close();
                if ($result) {
                    if ($stmt1 = $conn->prepare("SELECT pres_id from prescription WHERE pres_name = ? LIMIT 1")) {
                      $stmt1->bind_param('s', $name);
                      $stmt1->execute();
                      $stmt1->bind_result($pres_id);
                      while ($stmt1->fetch())
                        $row = array('pres_id' => $pres_id);
                      $stmt1->close();
                    }
                    if($stmt =$conn->prepare("INSERT INTO medicine(pres_id, strength, metric, dosage_amount) values(?,?,?,?)")) {
                    $stmt->bind_param('iiss', $row['pres_id'], $strength, $type, $amount);
                    $result = $stmt->execute();
                    $stmt->close();
                    } else {
                        echo "<script type='text/javascript'>alert('1');</script>";
                    }
                }
            }
            else
            {
                echo "<script type='text/javascript'>alert('2');</script>";
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
