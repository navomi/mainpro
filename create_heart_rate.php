<!DOCTYPE html>
<?php session_start(); ?>
<?php include('connection.php'); global $conn ?> 
<?php include('side.php') ?>
<html lang="en">

<head>

    

</head>

<body>

    
           <div class="container">
    <form action="" method="POST">
    <br><br>
    <fieldset>
                <legend > <h2>Heart Rate <input type="hidden" name="heart" value="5" /></h2></legend>
    
                <div>
                <label style="margin-left:10px;" >Date</label>
                <br>
                    <input type="date" name="heart_date" style="margin-left:10px;" max="2016-12-31" />
                </div>
<br>
                <div>
                <label style="margin-left:10px;" >Time</label>
                <br>
                    <input type="time" name="heart_time" style="margin-left:10px;" />
                </div>
<br>
                <div>
                <label style="margin-left:10px;">Reading</label><label style="margin-left:150px;" > Reading Type </label>
                <br>
                <input type="text" name="reading" style="margin-left:10px;">
                <select name ="type" style="margin-left:35px;">
                    <option value="bpm">bpm </option>
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
                  $heart = $_POST['heart'];
                  $heart_date = $_POST['heart_date'];   
                  $heart_time = $_POST['heart_time'];         
                  $reading = $_POST['reading'];
                  $type = $_POST['type'];

                  $fields = array('heart_date', 'heart_time', 'reading', 'type');

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
            

                  if($stmt =$conn->prepare("INSERT INTO tracking_para(para_id, id, para_date, para_time, reading, type) values(?,?,?,?,?,?)"))
                   {
                    $stmt->bind_param('iissss', $heart, $_SESSION['id'], $heart_date, $heart_time, $reading, $type);
                    $result = $stmt->execute();
                    $stmt->close();
                echo $result;
                  }
                  else
                  {
                   echo "error with insertion ";
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