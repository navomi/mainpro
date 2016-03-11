<!doctype html>
<?php include('connection.php'); global $conn ?> 
<?php include('side.php');?>
<?php session_start(); ?>
<?php
function getUserdetails($id)
{
    global $conn;
    if ($stmt = $conn->prepare("SELECT fname, phone, email, gender, age, address, emergency, lname, user_photo  FROM `user` where id = ? ")) 
         {
            //echo "hi";
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->bind_result($fname, $phone, $email, $gender, $age, $address, $emergency, $lname, $user_photo);
            while ($stmt->fetch()) 
            {
            $rows[] = array('fname' => $fname, 'phone' => $phone, 'email' => $email, 'gender' => $gender, 'age' => $age, 'address' => $address, 'emergency' =>$emergency, 'lname' => $lname, 'user_photo' => $user_photo);
            //print_r($rows);
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
    
                            <?php $userdeets = getUserdetails($_SESSION['id']);?>
<html><head>
    <meta charset="utf-8">
    <title>BLOCKS - Bootstrap Dashboard Theme</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="assets/css/bootstrapuser.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">
    <link href="assets/css/font-style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/register.css">

	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>

    

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
  	<!-- Google Fonts call. Font Used Open Sans & Raleway -->
	<link href="http://fonts.googleapis.com/css?family=Raleway:400,300" rel="stylesheet" type="text/css">
  	<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
	</head>
  <body>

  	<!-- NAVIGATION MENU -->

    <div class="container">
        <div class="row">
            <div class="col-lg-6">
        		<div class="register-info-wraper">
        			<div id="register-info">
        				<div class="cont2">
        					<div class="thumbnail">
								<img src="<?php $name = getUserdetails($_SESSION['id']); echo 'upload/'.$name[0]['user_photo']; ?>" alt="<?php echo "No photo available"?>" class="img-square" height="400" width="300">
                               <form method="POST" action=""  enctype="multipart/form-data"> 
                               <!--<span aria-hidden="true" class="li_pen fs1 btn-lg" name = "edit_picture"></span> --> 
                               <div class="image-upload">
                                <label for="file-input">
                                <span aria-hidden="true" class="li_pen fs1 btn-lg" name = "edit_picture"></span>
                                </label>
                                <input name="file" id="file-input" size="80"  type="file"/>
                                <input type="submit">
                               </div>
                               </form>
							</div><!-- /thumbnail -->

        				</div>
        				<div class="row">
                        
        			
                            <center>
                            <form id="register-form" class="form" method="POST" action="">
                                <legend>Edit Your Profile</legend>
                    
                                <div class="body">
                                    <!-- first name -->
                                    <label for="name">First name</label>
                                    <input name="firstname" class="input-huge" type="text" value = "<?php echo $userdeets[0]['fname']; ?>">
                                    <!-- last name -->
                                    <label for="Lastname">Last name</label>
                                    <input name="lastname" class="input-huge" type="text" value= "<?php echo $userdeets[0]['lname'];?>">
                                    <!-- username -->
                                    <label for="address">Address</label>
                                    <input name="address" class="input-huge" type="text" value="<?php echo $userdeets[0]['address']; ?>">
                                    <!-- username -->
                                    <label for="DOB">Date Of Birth</label>
                                    <input class="input-huge" type="date" name="DOB" max="2001-12-31" value="<?php echo $userdeets[0]['age']; ?>">
                                    <!-- username -->
                                    <label for="Gender">Gender</label>
                                    <input type="radio" name="sex" value ="male"  checked> Male
                                    <input type="radio" name="sex" value ="female"> Female
                                    <!-- username --> 
                                    <label for="phone" >Your Phone Number</label>
                                    <input class="input-huge" type="number" name="phone" value="<?php echo $userdeets[0]['phone']; ?>">
                                    <!-- username --> 
                                    <label for="emergency" >Emergency Number</label>
                                    <input class="input-huge" type="number" name="emergency" value="<?php echo $userdeets[0]['emergency']; ?>">                                    
                                    <!-- email -->
                                    <label for="email_id">E-mail</label>
                                    <input class="input-huge" type="email" name="email_id" value="<?php echo $userdeets[0]['email']; ?>">
                                    <!-- password -->

                                </div>
                    
                                <div class="footer">
                                
                                    <button type="submit" name="submit" value="submit"  class ="btn btn-default">Edit</button>
                                </div>
                             </form>
                            </center>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>


        		
       <?php

            
            if(isset($_POST['submit']))
                {
                    $session_id = $_SESSION['id'];
                  $firstname = $_POST['firstname'];
                  $lastname = $_POST['lastname'];
                  $phone = $_POST['phone'];
                  $address = $_POST['address'];
                  $DOB = $_POST['DOB'];
                  $gender = $_POST['sex'];
                  $emergency = $_POST['emergency'];
                  $email_id = $_POST['email_id'];
                               global $conn;

      if($stmt =$conn->prepare("UPDATE `user` SET `fname` = ?, `phone` = ?, `email` =?, `gender` =?, `age` =?, `address` =?, `emergency` = ?, `lname` =? WHERE `id` = $session_id ")) echo "hi";
                   {
                    $stmt->bind_param('ssssssss', $firstname, $phone, $email_id, $gender, $DOB, $address, $emergency, $lastname );
                    $result = $stmt->execute();
                    $stmt->close();
                //echo $result;
                  }
    }
            
            ?> 
            <?php 
        if($result)
        {
          $message = "Update Succesfull";
                echo "<script type='text/javascript'>alert('$message');</script>";

        }
        ?>
        <?php
        if(isset($_POST['file']))
        {
            $session_id = $_SESSION['id'];
            $picture = $_FILES["file"]["name"];
            if($stmt =$conn->prepare("UPDATE `user` SET `user_photo` = ? WHERE `id` = $session_id ")) echo "hi";
                   {
                    $stmt->bind_param('s', $picture );
                    $pic_result = $stmt->execute();
                    $stmt->close();
                //echo $result;
                  }
        }
        ?>
        <?php
        if($pic_result)
        {
          $message = "Picture Updated Succesfull";
                echo "<script type='text/javascript'>alert('$message');</script>";

        }
        ?>

        <?php

    $allowedExts = array("gif", "jpeg", "jpg", "png", "GIF". "JPEG", "JPG", "PNG");
    $temp = explode(".", $_FILES["file"]["name"]);
    $extension = end($temp);

     if ((($_FILES["file"]["type"] == "image/gif")
     || ($_FILES["file"]["type"] == "image/jpeg")
     || ($_FILES["file"]["type"] == "image/jpg")
     || ($_FILES["file"]["type"] == "image/pjpeg")
     || ($_FILES["file"]["type"] == "image/x-png")
     || ($_FILES["file"]["type"] == "image/png"))
     && ($_FILES["file"]["size"] < 1000000)
     && in_array($extension, $allowedExts)) 
        {
            if ($_FILES["file"]["error"] > 0) 
                {
                     echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
                } 
            else 
                {
                 echo "Upload: " . $_FILES["file"]["name"] . "<br>";
                 echo "Type: " . $_FILES["file"]["type"] . "<br>";
                 echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
                 echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";


                if (file_exists("upload/" . $_FILES["file"]["name"])) 
                    {
                        echo $_FILES["file"]["name"] . " already exists. ";
                    } 
                else 
                    {
                        move_uploaded_file($_FILES["file"]["tmp_name"],
                       "upload/" . $file);
                        echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
                    }
                }
       }    
     else 
       {
             echo "Invalid file";
       }

    echo "";

               
     // here pre tag will come in double quotes.
    //print_r($_POST);  // show post data
    //print_r($_FILES);  // show files data
    die; // die to stop execution. 

?>

	<!-- /footerwrap -->


    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/bootstrap.js"></script>

  
</body></html>