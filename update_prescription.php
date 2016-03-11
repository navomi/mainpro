<!DOCTYPE html>
<?php session_start(); ?>
<?php include('connection.php'); global $conn ?> 
<?php include('side.php');?>
<html lang="en">

<head>

    
<body>

    
           <div class="container">
    <form action="" method="POST">
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

            if(isset($_POST['submit']))
            {
                  $_edit= $_GET['edit'];
                  
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
                if ($stmt = $conn->prepare("UPDATE `Prescription` SET `pres_name` =? , `start_date` =?, `end_date` =?, `prescribed_by` =?, `instruction` =? , `hospital` =? , `reason` =? WHERE `pres_id`=$_edit ")) echo"hi" ;   
                     {
                        $stmt->bind_param("sssssss",$name, $sdate, $ldate, $doctor, $instruction, $hospital, $reason);
                        $stmt->execute();
                        $result = $stmt->execute();
                            if($result)
                            {
                                if ($stmt = $conn->prepare("UPDATE `medicine` SET `strength` =? , `metric` =?, `dosage_amount` =? WHERE `pres_id`=$_edit ")) echo"hi" ;
                                     {
                                        $stmt->bind_param("sss",$strength, $type, $amount);
                                        $stmt->execute();
                                        $resultt = $stmt->execute();
                                     }
                            }
                    }

        }
    }
        ?>
           
               
    

        <?php 
        if($resultt)
        {
          $message = "Update Succesfull";
                echo "<script type='text/javascript'>alert('$message');</script>";

        }
        ?>
</body>

</html>
