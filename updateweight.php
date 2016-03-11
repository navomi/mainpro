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
                <legend > <h2> Update Weight<input type="hidden" name="weight" value="3" /></h2></legend>
    
                <div>
                <label style="margin-left:10px;" >Date</label>
                <br>
                    <input type="date" name="weight_date" style="margin-left:10px;" max="2016-12-31" />
                </div>
<br>
                <div>
                <label style="margin-left:10px;" >Time</label>
                <br>
                    <input type="time" name="weight_time" style="margin-left:10px;" />
                </div>
<br>
                <div>
                <label style="margin-left:10px;">Reading</label><label style="margin-left:150px;" > Reading Type </label>
                <br>
                <input type="text" name="reading" style="margin-left:10px;">
                <select name ="type" style="margin-left:35px;">
                    <option value="kg"> kg </option>
                    <option value="pounds"> pounds </option>
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
                  $_edit= $_GET['edit'];
                  
                  $weight_date = $_POST['weight_date'];   
                  $weight_time = $_POST['weight_time'];         
                  $reading = $_POST['reading'];
                  $type = $_POST['type'];
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
                    if ($stmt = $conn->prepare("UPDATE `tracking_para` SET `para_date`=?,`para_time`=?,`reading`=?,`type`=? WHERE `parameter_no`=$_edit ")) echo"hi" ;
                     {
                            $stmt->bind_param("ssss", $weight_date, $weight_time, $reading, $type);
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
