<?php session_start(); ?>
<?php
if( isset($_SESSION["email"]) && $_SESSION["email"] )
    {
        header("Location: index.php");
        exit;
    }
?>
<?php

include("head.php");
?>
<?php include('connection.php'); global $conn?> 

<html lang="en">
<head>
<hr>
    <title>Registeration form </title>
</head>
<style type="text/css">
    
</style>
<br> <center>
<body>
    <div id="wrapper">
      <form action="" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend>Please enter the following details:</legend>
                
                <div>
                <label >First Name</label>
                <br>
                    <input type="text" name="firstname" />
                </div>
<br>
                <div>
                <label >Last Name</label>
                <br>
                    <input type="text" name="lastname" />
                </div>

<br>
                <div>
                <label >Enter Your Phone Number</label>
                <br>
                    <input type="number" name="phone" />
                </div>
<br>
                <div>
                <label > Address </label>
                <br>
                <input type="text" name="address">
                </div>
<br>
                <div>
                <label > Age:</label>
                <br>
                <input type="date" name="DOB" max="2001-12-31" >
                </div>
<br>
                <div>
                <label >Gender</label>
                <br>
                <input type="radio" name="sex" value ="male" checked>Male
                <input type="radio" name="sex" value ="female">Female
                </div>
<br>
                <div>
                <label >Emergency Contact</label>
                <br>
                    <input type="number" name="emergency" />
                </div>
<br>
                <div>
                <label >Password (between 8-10 characters)</label>
                <!--Password-->
                <br>
                    <input type="password" name="password"  />
                </div> 
<br>
                <div>
                <label >Email-ID</label>
                <br>
                    <input type="email" name="email_id" />
                </div>  <br>
                <div>
             
                <input type="submit" name="submit" value="submit" class="btn btn-default"/>
                </div>
            </fieldset>    
        </form> 
            </div>
            </center>
</body>

<!--<?php// include('footer.html') ?>

<script src="js/jquery-1.11.2.min.js"></script> 
<script src="js/bootstrap.min.js"></script>-->


<?php

            if(isset($_POST['submit']))
                {
                  $firstname = $_POST['firstname'];
                  $lastname = $_POST['lastname'];
                  $phone = $_POST['phone'];
                  $address = $_POST['address'];
                  $DOB = $_POST['DOB'];
                  $gender = $_POST['sex'];
                  $emergency =$_POST['emergency'];
                  $password = $_POST['password'];
                  $email_id = $_POST['email_id'];
            

                  $fields = array('firstname', 'lastname', 'phone', 'address', 'DOB', 'sex','emergency', 'password', 'email_id');

                   $error = false; //No errors yet
                  foreach($fields AS $fieldname) 
                    { //Loop trough each field
                      if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname]))
                        {
                           echo "<script type='text/javascript'>alert('field ".$fieldname." not entered , registration unsuccessfull');</script>";
                           //Display error with field
                           
                          $error = true; //Yup there are errors
                        }
                     }

            if(!$error)
            {
              if (strlen ($password)>10 || strlen ($password)<8)
                {
                  echo "<font color=red> Password must be between 8 to 10 characters<font>";
                 }
              else
                {
                  if($stmt =$conn->prepare("INSERT INTO user(fname, id, phone, email, gender, age, address, emergency, lname, password) values(?,?,?,?,?,?,?,?,?,?)"))
                   {
                    $stmt->bind_param('sissssssss', $firstname, $row['id'], $phone, $email_id, $gender, $DOB, $address, $emergency, $lastname, $password );
                    $result = $stmt->execute();
                    $stmt->close();
                //echo $result;
                  }
                  else
                  {
                   echo "error with insertion ";
                  }  

                }
                    
           }
          }
               
        ?>

        <?php 
        if($result)
        {
          $message = "Succesfully Registered";
                echo "<script type='text/javascript'>alert('$message');</script>";

        }
        ?>
</body>
</html>


