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
               <legend > <h2>Update Treatment </h2></legend>
    
                <div>
                <label style="margin-left:10px;" >Date</label>
                <br>
                     <input type="date" name="treat_date" style="margin-left:10px;" />
                </div>
<br>
<div>
                <label style="margin-left:10px;" > Type Of Treatment  </label> Ex:surgery
                <br>
                    <input type="text" name="type" style="margin-left:10px;"> 
                </div>
<br>
                <div>
                <label style="margin-left:10px;" > Whats The Reason </label>
                <br>
                    <textarea class=".form-control:focus" rows="5" cols="70" name="cause" style="margin-left:10px;"> </textarea>
                </div>
<br>
                <div>
                <label style="margin-left:10px;" > Doctor </label>
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
                <label style="margin-left:10px;" > Consultation </label>
                <br>
                    <textarea class=".form-control:focus" rows="7" cols="70" name="consultation" style="margin-left:10px;"> </textarea> 
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
                  $_edit= print_r($_GET['edit']);
                  
                  $treat_date = $_POST['treat_date'];   
                  $type = $_POST['type'];         
                  $doctor = $_POST['doctor'];
                  $hospital = $_POST['hospital'];
                  $consultation = $_POST['consultation'];
                  $cause = $_POST['cause'];;
                  $reason = $_POST['reason'];
                  //$parameter_no = print_r($_POST['edit']);
                  $fields = array('name', 'sdate', 'ldate', 'doctor', 'instruction', 'hospital', 'reason', 'strength', 'type', 'amount');

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
                    if ($stmt = $conn->prepare("UPDATE `treatement` SET `start_date` =?, `disease` =?, `doctor`=?, `type`=?, `consultation` =?, `hospital`=? WHERE `treat_id`=$_edit ")) echo"hi" ;
                    {
                      $stmt->bind_param("ssssss", $treat_date, $cause, $doctor, $type, $consultation, $hospital);
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
