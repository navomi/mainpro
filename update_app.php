<!DOCTYPE html>
<?php session_start(); ?>
<?php include('connection.php'); global $conn ?> 
<?php include('side.php');?>
<html lang="en">

<head>

</head>

<body>

   
           <div class="container">
    <form action="" method="POST">
    <br><br>
    <fieldset>
                <legend > <h2> Update Appointment </h2></legend>
    
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
                  $_edit= $_GET['edit'];
                  
                  $app_date = $_POST['app_date'];   
                  $app_time = $_POST['app_time'];         
                  $doctor = $_POST['doctor'];
                  $hospital = $_POST['hospital'];
                  $reason = $_POST['reason'];
                  //$parameter_no = print_r($_POST['edit']);
                  $fields = array('app_date', 'app_time', 'doctor', 'hospital', 'reason');

                   $error = false; //No errors yet
                  foreach($fields AS $fieldname) 
                    { //Loop trough each field
                      if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname]))
                        {
                           echo "<script type='text/javascript'>alert('field ".$fieldname." not entered , unsuccessfull entry');</script>";
                           //Display error with field
                           
                          $error = true; //Yup there are errors
                        }
                    }

              if(!$error)
              {     

                      global $conn;
                    if ($stmt = $conn->prepare("UPDATE `appointment` SET `app_date`=?,`app_time`=?,`doctor_name`=?,`hospital`=?, `reason`=? WHERE `app_id`=$_edit ")) echo"hi" ;
                     {
                      $stmt->bind_param("sssss", $app_date, $app_time, $doctor, $hospital, $reason);
                      $stmt->execute();
                      $result = $stmt->execute();
                      }
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
